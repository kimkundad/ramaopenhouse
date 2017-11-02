<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\registration;
use App\questionare;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function questionare()
    {
        $data['method'] = 'post';
        return view('questionare', $data);
    }

    public function registration()
    {
      $data['method'] = 'post';
      return view('registration', $data);
    }

    public function thanks_questionare()
    {
      return view('thanks_questionare');
    }

    public function thanks_registration()
    {
      return view('thanks_registration');
    }

    public function registration_store(Request $request)
    {

      //dd($request['edu_rank_1']);

     $this->validate($request, [
     'sex' => 'required',
     'first_name' => 'required',
     'last_name' => 'required',
     'age' => 'required',
     'edu_rank' => 'required',
     'edu_type' => 'required',
     'school' => 'required',
     'gpax' => 'required',
     'edu_rank_1' => 'required',
     'edu_rank_2' => 'required',
     'edu_rank_3' => 'required',
     'edu_rank_4' => 'required'
      ]);

     $package = new registration;
     $package->prefix_name = $request['sex'];
     $package->name = $request['first_name'];
     $package->surname = $request['last_name'];
     $package->age = $request['age'];
     $package->educational_background = $request['edu_rank'];
     $package->educational_plan = $request['edu_type'];
     $package->school_name = $request['school'];
     $package->gpax = $request['gpax'];
     $package->edu_rank_1 = $request['edu_rank_1'];
     $package->edu_rank_2 = $request['edu_rank_2'];
     $package->edu_rank_3 = $request['edu_rank_3'];
     $package->edu_rank_4 = $request['edu_rank_4'];
     $package->time_stamp = date('H:i', strtotime('+7 hour'));
     $package->save();

      return view('thanks_registration');

    }

    public function questionare_store(Request $request)
    {

      $this->validate($request, [
     'q_1' => 'required',
     'q_2' => 'required',
     'q_3' => 'required',
     'q_4' => 'required',
     'q_5' => 'required',
     'q_6' => 'required',
     'q_7' => 'required',
     'q_8' => 'required',
     'q_9' => 'required',
     'q_10' => 'required'
      ]);

      $package = new questionare;
      $package->question_01 = $request['q_1'];
      $package->question_02 = $request['q_2'];
      $package->question_03 = $request['q_3'];
      $package->question_04 = $request['q_4'];
      $package->question_05 = $request['q_5'];
      $package->question_06 = $request['q_6'];
      $package->question_07 = $request['q_7'];
      $package->question_08 = $request['q_8'];
      $package->question_09 = $request['q_9'];
      $package->question_10 = $request['q_10'];
      $package->q11_text = $request['q_11'];
      $package->time_stamp = date('H:i', strtotime('+7 hour'));
      $package->save();

       return view('thanks_questionare');

    }


}
