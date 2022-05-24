<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use stdClass;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Skill::all();
        return view('Skill.list', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Skill.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add = Skill::create($request->all());

        if ($add) {
            $stt_message = 'success';
            $message = 'Thêm thành công';
        } else {
            $stt_message = 'fail';
            $message = 'Thêm thất bại';
        }

        return redirect()->route('skills.index')->with($stt_message, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Skill::find($id);
        return view('Skill.list', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = Skill::find($id);
        $list = Skill::all();
        return view('Skill.update', compact('detail','list'));
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
        $update = Skill::find($id)->update($request->all());

        if ($update) {
            $stt_message = 'success';
            $message = 'Update Success';
        } else {
            $stt_message = 'fail';
            $message = 'Update Failed';
        }

        return redirect()->route('skills.index')->with($stt_message, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Skill::find($id)->delete();

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
