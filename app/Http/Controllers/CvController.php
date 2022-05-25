<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\CV;
use App\Models\Recruit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use stdClass;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = CV::all();
        return view('Cv.list', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recruit_list = Recruit::where('status',  Status::On)
            ->where('numRecruit', '>', 0)->get();

        return view('Cv.create', compact('recruit_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recruit = Recruit::find($request->recruit_id);

        if ($recruit->numRecruit > 0) {
            if ($recruit->status == Status::Off) {
                $stt_message = 'fail';
                $message = 'Thêm thất bại, Tuyển dụng đã đóng!';
                return redirect()->route('cv.index')->with($stt_message, $message);
            }
        } else {
            $stt_message = 'fail';
            $message = 'Thêm thất bại, Số lượng tuyển dụng đã hết!';
            return redirect()->route('cv.index')->with($stt_message, $message);
        }

        // kiểm tra có files sẽ xử lý
        if ($request->hasFile('file')) {
            $allowedfileExtension = ['pdf'];
            $file = $request->file('file');
            // flag xem có thực hiện lưu DB không. Mặc định là có
            $exe_flg = true;
            // kiểm tra tất cả các files xem có đuôi mở rộng đúng không

            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);

            if (!$check) {
                // nếu có file không đúng đuôi mở rộng thì đổi flag thành false
                $exe_flg = false;
            }

            if ($exe_flg) {
                $add = CV::create($request->all());

                $filename = Storage::disk('public')->put('cv', $file);

                $add->file = $filename;
                $add->save();

                $stt_message = 'success';
                $message = 'Thêm thành công';

                $add->recruit->minusNumRecruit();
            } else {
                $stt_message = 'fail';
                $message = 'Thêm thất bại';
            }
        } else {
            $stt_message = 'fail';
            $message = 'Thêm thất bại';
        }



        return redirect()->route('cv.index')->with($stt_message, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Cv.list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = CV::find($id);
        $recruit_list = Recruit::where('status', '=', 1)->get();
        return view('Cv.update', compact('detail', 'recruit_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = CV::find($id)->file;

        if (Storage::has($file)) {
            Storage::disk('public')->delete($file);
        }

        $update = CV::find($id)->update($request->all());

        if ($update) {

            if ($request->hasFile('file')) {
                
                $file_temp = $request->file('file');
                $filename = Storage::disk('public')->put('cv', $file_temp);

                CV::find($id)->update([
                    'file' => $filename,
                ]);
            }

            $stt_message = 'success';
            $message = 'Sữa thành công';
        } else {
            $stt_message = 'fail';
            $message = 'Sữa thất bại';
        }
        return redirect()->route('cv.index')->with($stt_message, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recruit = CV::find($id)->recruit;
        $file = CV::find($id)->file;
        $delete = CV::find($id)->delete();

        if ($delete) {
            $stt_message = 'success';
            $message = 'Xóa thành công';

            Storage::disk('public')->delete($file);
            $recruit->plusNumRecruit();
        } else {
            $stt_message = 'fail';
            $message = 'Xóa thất bại';
        }

        $res = new stdClass;
        $res->status = $stt_message;
        $res->message = $message;

        return response()->json($res);
    }
}
