<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\registration;
use Illuminate\Support\Facades\DB;

class User_regisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $objs = registration::paginate(15);
      $data['objs'] = $objs;
      $data['datahead'] = "รายชื่อผู้ลงทะเบียน";
      return view('admin.userni.index', $data);
    }

    public function user_export(){
      $objs = registration::all();
      $objs_count = registration::count();
      $data['objs'] = $objs;
      $data['objs_count'] = $objs_count;
      return view('admin.userni.user_export', $data);
    }

    public function user_export2(Request $request){

      $search = $request->get('q');


      $get_count = DB::table('registrations')
              ->select(
              'registrations.*'
              )
              ->where('name', 'like', "%$search%")
              ->orWhere('surname', 'like', "%$search%")
              ->orWhere('school_name', 'like', "%$search%")
              ->count();

      if($get_count == 0){

        $arr_str=explode(" ",$search);

        $get_count = DB::table('registrations')
                ->select(
                'registrations.*'
                )
                ->where('name', 'like', "%$arr_str[0]%")
                ->orWhere('surname', 'like', "%$arr_str[0]%")
                ->orWhere('school_name', 'like', "%$arr_str[0]%")
                ->count();

        $objs = DB::table('registrations')
                ->select(
                'registrations.*'
                )
                ->where('name', 'like', "%$arr_str[0]%")
                ->orWhere('surname', 'like', "%$arr_str[0]%")
                ->orWhere('school_name', 'like', "%$arr_str[0]%")
                ->get();

      } else{

        $objs = DB::table('registrations')
                ->select(
                'registrations.*'
                )
                ->where('name', 'like', "%$search%")
                ->orWhere('surname', 'like', "%$search%")
                ->orWhere('school_name', 'like', "%$search%")
                ->get();

      }

      $data['objs'] = $objs;
      $data['objs_count'] = $objs_count;
      return view('admin.userni.user_export', $data);

    }


    public function user_regis_search(Request $request)
    {
      $this->validate($request, [
        'q' => 'required'
      ]);

      $search = $request->get('q');


      $get_count = DB::table('registrations')
              ->select(
              'registrations.*'
              )
              ->where('name', 'like', "%$search%")
              ->orWhere('surname', 'like', "%$search%")
              ->orWhere('school_name', 'like', "%$search%")
              ->count();

      if($get_count == 0){

        $arr_str=explode(" ",$search);

        $objs = DB::table('registrations')
                ->select(
                'registrations.*'
                )
                ->where('name', 'like', "%$arr_str[0]%")
                ->orWhere('surname', 'like', "%$arr_str[0]%")
                ->orWhere('school_name', 'like', "%$arr_str[0]%")
                ->paginate(15);

      } else{

        $objs = DB::table('registrations')
                ->select(
                'registrations.*'
                )
                ->where('name', 'like', "%$search%")
                ->orWhere('surname', 'like', "%$search%")
                ->orWhere('school_name', 'like', "%$search%")
                ->paginate(15);

      }






                      $data['count'] = $get_count;
                      $data['objs'] = $objs;
                      $data['search'] = $search;
                      $data['datahead'] = "รายชื่อผู้ลงทะเบียน";


                      return view('admin.userni.search', $data);

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
      $obj = registration::find($id);
      $obj->delete();

    //  echo $objs->image;;
      return redirect(url('admin/user_regis'))
      ->with('delete','ทำการลบ บทความ สำเร็จ');



    }
}
