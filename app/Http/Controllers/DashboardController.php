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

    public function get_chart(){

      $get_count1 = DB::table('questionares')
                ->where('question_01', 1)
                ->count();

                $get_count2 = DB::table('questionares')
                          ->where('question_01', 2)
                          ->count();

                          $get_count3 = DB::table('questionares')
                                    ->where('question_01', 3)
                                    ->count();


                                    $get_count4 = DB::table('questionares')
                                              ->where('question_01', 4)
                                              ->count();

                                              $get_count5 = DB::table('questionares')
                                                        ->where('question_01', 5)
                                                        ->count();


                $arr[0] = [ 'label' => 'ควรปรับปรุง', 'data' =>[[1, $get_count1]],'color' => '#0088cc' ];
                $arr[1] = [ 'label' => 'พอใช้', 'data' =>[[1, $get_count2]],'color' => '#2baab1' ];
                $arr[2] = [ 'label' => 'ปานกลาง', 'data' =>[[1, $get_count3]],'color' => '#734ba9' ];
                $arr[3] = [ 'label' => 'ดี', 'data' =>[[1, $get_count4]],'color' => '#E36159' ];
                $arr[4] = [ 'label' => 'ดีมาก', 'data' =>[[1, $get_count5]],'color' => '#f0ad4e' ];

              return response()->json($arr);

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
