<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Recruit;
use App\Models\RecruitSkill;
use App\Models\Skill;
use App\Models\Vacancy;
use Carbon\Carbon;
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
        $vacancy_list =  Vacancy::all();
        $skill_list = Skill::all();
        // Lấy ngày giờ hiện tại
        $timeCurrent = Carbon::now('Asia/Ho_Chi_Minh');
        // Format lại chỉ lấy ngày tháng năm, truyền qua view để ràng buộc Open, Close
        $timeFormat = $timeCurrent -> toDateString();
        return view('Recruit.create', compact('vacancy_list', 'skill_list','timeFormat'));
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
            $message = 'Recruit Add Success';
        } else {
            $stt_message = 'fail';
            $message = 'Recruit Add Failed';
        }

        return redirect()->route('recruits.index')->with($stt_message, $message);
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
        // $detail->skills return list skill of recruit

        $vacancy_list =  Vacancy::all();
        $skill_list = Skill::all();

        return view('Recruit.list', compact('detail', 'vacancy_list', 'skill_list'));
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

        $vacancy_list =  Vacancy::all();
        $skill_list = Skill::all();

        return view('Recruit.update', compact('detail', 'vacancy_list', 'skill_list'));
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

        $del = RecruitSkill::where('recruit_id', $id)->delete();

        foreach ($request->skills as $v) { //id of table skills
            $update1 = RecruitSkill::where('recruit_id', $id)->create([
                'recruit_id' => $id,
                'skill_id' => $v,
            ]);
        }

        if ($update && $update1) {
            $stt_message = 'success';
            $message = 'Recruit Update Success';
        } else {
            $stt_message = 'fail';
            $message = 'Recruit Update Failed ';
        }

        return redirect()->route('recruits.index')->with($stt_message, $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Recruit::find($id)->delete();

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
