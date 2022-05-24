<?php

namespace App\Http\Controllers;

use App\Models\Recruit;
use App\Models\RecruitSkill;
use Illuminate\Http\Request;
use stdClass;

class RecruitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Recruit::all();
        return view('Recruit.list', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Recruit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add = Recruit::create($request->all());
        foreach ($request->skills as $v) {
            $add1 = RecruitSkill::create([
                'recruit_id' => $add->id,
                'skill_id' => $v,
            ]);
        }

        if ($add && $add1) {
            $stt_message = 'success';
            $message = 'Thêm thành công';
        } else {
            $stt_message = 'fail';
            $message = 'Thêm thất bại';
        }

        return redirect()->route('recruits.create')->with($stt_message, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Recruit::find($id);
        return view('Recruit.list', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = Recruit::find($id);
        return view('Recruit.edit', compact('detail'));
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
        $update = Recruit::find($id)->update($request->all());

        foreach ($request->skills as $v) {
            $update1 = RecruitSkill::where('recruit_id', $id)->create([
                'skill_id' => $v,
            ]);
        }

        if ($update && $update1) {
            $stt_message = 'success';
            $message = 'Sữa thành công';
        } else {
            $stt_message = 'fail';
            $message = 'Sữa thất bại';
        }

        return redirect()->route('recruits.edit')->with($stt_message, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $delete = Recruit::find($id)->delete();
        $delete = false;

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
