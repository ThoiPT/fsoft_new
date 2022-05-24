<?php

namespace App\Http\Controllers;

use App\Models\CV;
use App\Models\Recruit;
use Illuminate\Http\Request;
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
        $recruit_list = Recruit::where('status','=',1)->get();
        return view('Cv.create',compact('recruit_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add = CV::create($request->all());

        if ($add) {
            $stt_message = 'success';
            $message = 'Thêm thành công';
            $add -> recruit -> minusNumRecruit();
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
        $recruit_list = Recruit::where('status','=',1)->get();
        return view('Cv.update', compact('detail','recruit_list'));
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
        $update = CV::find($id)->update($request->all());
        if ($update) {
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
        $delete = CV::find($id)->delete();

        if ($delete) {
            $stt_message = 'success';
            $message = 'Xóa thành công';
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
