<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\registration;
use App\questionare;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $count_re = registration::count();
      $count_q = questionare::count();

      $count_edu_rank_1 = registration::where('edu_rank_1', 0)->count();
      $count_edu_rank_2 = registration::where('edu_rank_2', 1)->count();
      $count_edu_rank_3 = registration::where('edu_rank_3', 2)->count();
      $count_edu_rank_4 = registration::where('edu_rank_4', 3)->count();

      $count_question_09_1 = questionare::where('question_09', 1)->count();
      $count_question_09_2 = questionare::where('question_09', 2)->count();
      $count_question_09_3 = questionare::where('question_09', 3)->count();
      $count_question_09_4 = questionare::where('question_09', 4)->count();

      $count_man = registration::where('prefix_name', 'นาย')
      ->orwhere('prefix_name', 'ด.ช.')
      ->count();
      $count_girl = registration::where('prefix_name', 'นางสาว')
      ->orwhere('prefix_name', 'ด.ญ.')
      ->count();
    //  dd($count_user_all);
      //$objs = bitcoin::paginate(15);


      $data['header'] = 'รายชื่อผู้ลงทะเบียนเข้างาน';

      $data['count_re'] = $count_re;
      $data['count_q'] = $count_q;
      $data['count_man'] = $count_man;
      $data['count_girl'] = $count_girl;

      $data['count_edu_rank_1'] = $count_edu_rank_1;
      $data['count_edu_rank_2'] = $count_edu_rank_2;
      $data['count_edu_rank_3'] = $count_edu_rank_3;
      $data['count_edu_rank_4'] = $count_edu_rank_4;

      $data['count_question_09_1'] = $count_question_09_1;
      $data['count_question_09_2'] = $count_question_09_2;
      $data['count_question_09_3'] = $count_question_09_3;
      $data['count_question_09_4'] = $count_question_09_4;

      return view('admin.dashboard.index', $data);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
