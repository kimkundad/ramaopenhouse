@extends('admin.layouts.template')
@section('admin.stylesheet')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" />

<style>
.dataTables_wrapper .dataTables_filter input {
  margin-right: 10px;
  min-width: 120px;
  width: 100%;
  height: 34px;
  padding: 6px 12px;
  font-size: 14px;
  line-height: 1.42857143;
  color: #555;
  background-color: #fff;
  background-image: none;
  border: 1px solid #ccc;
  border-radius: 4px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
  -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
  -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
  transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
.dataTables_wrapper .dataTables_filter {
        float: none;
        margin-right: 10px;
    text-align: right;
}
.ap-questions-featured {
    margin-left: -10px;
    border: medium none;
    color: #ff951e;
    display: inline;
    font-size: 16px;
    height: auto;
    margin-right: 5px;
    padding: 0;
    position: static;
    vertical-align: baseline;
    width: auto;
}
</style>
@stop('admin.stylesheet')
@section('admin.content')






        <section role="main" class="content-body">

          <header class="page-header">
            <h2>{{$datahead}}</h2>

            <div class="right-wrapper pull-right">
              <ol class="breadcrumbs">
                <li>
                  <a href="dashboard.html">
                    <i class="fa fa-home"></i>
                  </a>
                </li>

                <li><span>{{$datahead}}</span></li>
              </ol>

              <a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
            </div>
          </header>


          <!-- start: page -->



<div class="row">
              <div class="row">
              <div class="col-xs-12">

            <section class="panel">
              <header class="panel-heading">
                <div class="panel-actions">
                  <a href="#"  class="panel-action panel-action-toggle" data-panel-toggle></a>

                </div>

                <h2 class="panel-title">{{$datahead}}</h2>
              </header>
              <div class="panel-body">


                <div class="row">
                   <div class="col-md-4">


                     <a class="btn btn-default" target="_blank" href="{{url('admin/user_export')}}" role="button"><i class="fa fa-file-excel-o"></i> Export Excel</a>

                   </div>

                   <div class="col-md-8 pull-right">

                     <div class="form-group ">
                       <label class="col-md-4 control-label"></label>
                       <div class="col-md-8">
                         <form class="form-horizontal" action="{{url('admin/user_2_search')}}" method="GET" enctype="multipart/form-data">
                           {{ csrf_field() }}
                         <div class="input-group input-search">
                           <input type="text" class="form-control" name="q" placeholder="Search..." required>
                           <span class="input-group-btn">
                             <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                           </span>
                         </div>
                       </form>
                       </div>
                     </div>
                   </div>

                 </div>


<br>



                <div class="table-responsive">
                <table id="example" class="table table-striped " cellspacing="0" width="100%">
                  <thead>
                    <tr>

                      <th>ชื่อ-นามสกุล</th>
                      <th>อายุ</th>
                      <th>ระดับการศึกษา</th>
                      <th>สถานศึกษา</th>
                      <th>เกรดเฉลี่ยรวม</th>
                      <th>จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($objs)
                @foreach($objs as $u)
                    <tr>
                      <td>{{$u->prefix_name}} {{$u->name}} {{$u->surname}}</td>

                      <td>{{$u->age}}</td>
                      <td>{{$u->educational_background}}</td>
                      <td>{{$u->educational_plan}}</td>
                      <td>{{$u->gpax}}</td>

                      <td>

                        <a style="float:left; margin: 3px; font-size: 10px; padding: 1px 3px;" class="btn btn-primary btn-xs modal-sizes"
                         href="#modalSM-{{$u->id}}" role="button"><i class="fa fa-graduation-cap"></i> </a>

                          <form  action="{{url('admin/user_regis/'.$u->id)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                            <input type="hidden" name="_method" value="DELETE">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-danger btn-xs" style="margin: 3px; font-size: 10px;"><i class="fa fa-times "></i></button>
                          </form>




                          <!-- popup -->
                           <div id="modalSM-{{$u->id}}" class="modal-block modal-block-mm mfp-hide">
										<section class="panel">
                    <!--  <form  action="{{url('admin/user_2/post_update')}}" method="post"  > -->
                     <form id="cutproduct1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="user_id" value="{{$u->id}}">
											<header class="panel-heading">
												<h2 class="panel-title">แก้ไข {{$u->prefix_name}} {{$u->name}} {{$u->surname}}?</h2>
											</header>
											<div class="panel-body">
												<div class="modal-wrapper" style="padding-top:10px;">
                          <div class="modal-text">



                            <div class="form-group" style="margin-bottom: 5px;">
                              <label for="inputPassword3" class=" control-label"><b>ชื่อ-นามสกุล :</b>  {{$u->prefix_name}} {{$u->name}} {{$u->surname}}</label>

                           </div>


                           <div class="form-group" style="margin-bottom: 5px;">
                             <label for="inputPassword3" class=" control-label"><b>อายุ :</b> {{$u->age}}</label>

                          </div>

                          <div class="form-group" style="margin-bottom: 5px;">
                            <label for="inputPassword3" class=" control-label"><b>ระดับการศึกษา :</b> {{$u->educational_background}}</label>

                         </div>

                         <div class="form-group" style="margin-bottom: 5px;">
                           <label for="inputPassword3" class=" control-label"><b>แผนการศึกษา :</b> {{$u->educational_plan}}</label>

                        </div>

                        <div class="form-group" style="margin-bottom: 5px;">
                          <label for="inputPassword3" class=" control-label"><b>สถานศึกษา :</b> {{$u->school_name}}
                          </label>

                          <input type="hidden" id="id_user" class="form-control" name="id"   value="{{ $u->id }}" >
                        </div>


                        <div class="form-group" style="margin-bottom: 5px;">
                          <label for="inputPassword3" class=" control-label"><b>เกรดเฉลี่ยรวม :</b> {{$u->gpax}}</label>
                       </div>
                       <br>
                       <h5 style="color:#000">ลำดับคณะที่ให้ความสนใจ</h5>
                       <hr>
                      <div class="form-group" style="margin-bottom: 5px;">
                        <label for="inputPassword3" class=" control-label"><b>อันดับที่ 1 :</b>
                          @if($u->edu_rank_1 == 0)
                            หลักสูตรแพทยศาสตรบัณฑิต
                          @elseif($u->edu_rank_1 == 1)
                            หลักสูตรพยาบาลศาสตรบัณฑิต
                          @elseif($u->edu_rank_1 == 2)
                            หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาปฏิบัติการฉุกเฉินทางการแพทย
                          @else
                            หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาความผิดปกติของการสื่อความหมาย
                          @endif
                          </label>
                     </div>

                     <div class="form-group" style="margin-bottom: 5px;">
                       <label for="inputPassword3" class=" control-label"><b>อันดับที่ 2 :</b> @if($u->edu_rank_2 == 0)
                         หลักสูตรแพทยศาสตรบัณฑิต
                       @elseif($u->edu_rank_2 == 1)
                         หลักสูตรพยาบาลศาสตรบัณฑิต
                       @elseif($u->edu_rank_2 == 2)
                         หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาปฏิบัติการฉุกเฉินทางการแพทย
                       @else
                         หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาความผิดปกติของการสื่อความหมาย
                       @endif</label>
                    </div>

                    <div class="form-group" style="margin-bottom: 5px;">
                      <label for="inputPassword3" class=" control-label"><b>อันดับที่ 3 :</b> @if($u->edu_rank_3 == 0)
                        หลักสูตรแพทยศาสตรบัณฑิต
                      @elseif($u->edu_rank_3 == 1)
                        หลักสูตรพยาบาลศาสตรบัณฑิต
                      @elseif($u->edu_rank_3 == 2)
                        หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาปฏิบัติการฉุกเฉินทางการแพทย
                      @else
                        หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาความผิดปกติของการสื่อความหมาย
                      @endif</label>
                   </div>

                   <div class="form-group" style="margin-bottom: 5px;">
                     <label for="inputPassword3" class=" control-label"><b>อันดับที่ 4 :</b> @if($u->edu_rank_4 == 0)
                       หลักสูตรแพทยศาสตรบัณฑิต
                     @elseif($u->edu_rank_4 == 1)
                       หลักสูตรพยาบาลศาสตรบัณฑิต
                     @elseif($u->edu_rank_4 == 2)
                       หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาปฏิบัติการฉุกเฉินทางการแพทย
                     @else
                       หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาความผิดปกติของการสื่อความหมาย
                     @endif</label>
                  </div>


													</div>
												</div>
											</div>
											<footer class="panel-footer">
                        <div class="row">
              <div class="col-md-12 text-right">


                <button class="btn btn-default modal-dismiss">ยกเลิก</button>
              </div>
            </div>
											</footer>
                      </form>
										</section>
									</div>





                      </td>
                    </tr>
                       @endforeach
              @endif

                  </tbody>
                </table>
                </div>
<div class="pagination"> {{ $objs->links() }} </div>
              </div>
            </section>

              </div>
            </div>
        </div>
</section>
@stop



@section('scripts')



@if ($message = Session::get('add_success'))
<script type="text/javascript">
PNotify.prototype.options.styling = "fontawesome";
new PNotify({
      title: 'ยินดีด้วยค่ะ',
      text: '{{$message}}',
      type: 'success'
    });
</script>
@endif

@if ($message = Session::get('delete'))
<script type="text/javascript">
PNotify.prototype.options.styling = "fontawesome";
new PNotify({
      title: 'ยินดีด้วยค่ะ',
      text: '{{$message}}',
      type: 'success'
    });
</script>
@endif





@stop('scripts')
