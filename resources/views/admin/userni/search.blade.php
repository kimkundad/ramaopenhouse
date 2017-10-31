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
                     <a class="btn btn-default" href="{{url('admin/user_2/create')}}" role="button"><i class="fa fa-plus"></i> เพิ่มรายชื่อใหม่</a>

                     <!-- popup -->




                   </div>

                   <div class="col-md-8 pull-right">
                     <br>
                     <div class="form-group ">
                       <label class="col-md-4 control-label"></label>
                       <div class="col-md-8">
                         <form class="form-horizontal" action="{{url('admin/user_2_search')}}" method="GET" enctype="multipart/form-data">
                           {{ csrf_field() }}
                         <div class="input-group input-search">
                           <input type="text" class="form-control" name="q" value="{{$search}}" placeholder="Search..." required>
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
                      <th>#</th>
                      <th>รอบงาน</th>
                      <th>ชื่อ-นามสกุล</th>
                      <th>ตำแหน่ง</th>
                      <th>สาขา</ht>
                      <th>พื้นที่</th>

                      <th>จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($objs)
                @foreach($objs as $u)
                    <tr>
                      <td>{{$u->code_id}}</td>
                      <td>
                        @if($u->part_day == 0)
                        รอบบ่าย
                        @else
                        รอบเช้า
                        @endif
                      </td>
                      <td>
                        @if($u->star_user == 1)
                        <i class="ap-questions-featured fa fa-graduation-cap"></i>
                        @endif
                        {{$u->name}}</td>
                      <td>{{$u->job_title}}</td>
                      <td><?=mb_substr(strip_tags($u->current_branch),0,32,'UTF-8')?></td>
                      <td><?=mb_substr(strip_tags($u->area),0,25,'UTF-8')?></td>

                      <td>

                        @if($u->status == 0)
                          <a type="button" style="float:left; margin: 3px;" class="btn btn-warning btn-xs"><i class="fa fa-meh-o"></i></a>
                             @else
                             <a type="button" style="float:left; margin: 3px;" class="btn btn-success btn-xs"><i class="fa fa-star"></i></a>
                             @endif




                        <a style="float:left; margin: 3px;" class="btn btn-primary btn-xs modal-sizes"
                         href="#modalSM-{{$u->id}}" role="button"><i class="fa fa-wrench"></i> </a>

                          <form  action="{{url('')}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
                            <input type="hidden" name="_method" value="DELETE">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-danger btn-xs" style="margin: 3px;"><i class="fa fa-times "></i></button>
                          </form>









                          <!-- popup -->
                           <div id="modalSM-{{$u->id}}" class="modal-block modal-block-sm mfp-hide">
										<section class="panel">
                    <!--  <form  action="{{url('admin/user_2/post_update')}}" method="post"  > -->
                     <form id="cutproduct1">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="user_id" value="{{$u->id}}">
											<header class="panel-heading">
												<h2 class="panel-title">แก้ไข {{$u->name}}?</h2>
											</header>
											<div class="panel-body">
												<div class="modal-wrapper">
                          <div class="modal-text">

                            <div class="form-group">
                              <label for="inputPassword3" class=" control-label"><b>Code ID :</b> {{$u->code_id}}</label>
                              <input type="hidden" class="form-control" id="code_id" value="{{$u->code_id}}">
                           </div>

                            <div class="form-group">
                              <label for="inputPassword3" class=" control-label"><b>ชื่อ-นามสกุล :</b> @if($u->star_user == 1)
                              <i class="ap-questions-featured fa fa-graduation-cap"></i>
                              @endif {{$u->name}}</label>
                              <input type="hidden" class="form-control" id="name" value="{{$u->name}}">
                           </div>

                           <div class="form-group">
                             <label for="inputPassword3"  class=" control-label"><b>รอบ :</b> @if($u->part_day == 0)
                             รอบบ่าย
                             @else
                             รอบเช้า
                             @endif</label>
                             <input type="hidden" class="form-control" id="part_day" value="{{$u->part_day}}">
                          </div>

                           <div class="form-group">
                             <label for="inputPassword3" class=" control-label"><b>ตำแหน่ง :</b> {{$u->job_title}}</label>
                             <input type="hidden" class="form-control" id="job_title" value="{{$u->job_title}}">
                          </div>

                          <div class="form-group">
                            <label for="inputPassword3" class=" control-label"><b>สาขา :</b> {{$u->current_branch}}</label>
                            <input type="hidden" class="form-control" id="current_branch" value="{{$u->current_branch}}">
                         </div>

                         <div class="form-group">
                           <label for="inputPassword3" class=" control-label"><b>พื้นที่ :</b> {{$u->area}}</label>
                           <input type="hidden" class="form-control" id="area" value="{{$u->area}}">
                        </div>

                        <div class="form-group">
                          <label for="inputPassword3" class=" control-label"><b>หมายเหตุ :</b> {{$u->remark}}
                            @if($u->star_user == 1)
                            <i class="ap-questions-featured fa fa-graduation-cap"></i> รายชื่อพิเศษ
                            @endif
                          </label>

                          <input type="hidden" id="id_user" class="form-control" name="id"   value="{{ $u->id }}" >
                        </div>




                               <div class="form-group">
                                 <label for="inputPassword3" class=" control-label">การร่วมกิจกรรม</label>
                               <select class="form-control" id="status_user" name="status_user">
                                <option value="">--เลือกสิทธิการเข้าร่วม--</option>


                                <option value="0" @if( $u->status == 0)
                                                                  selected="selected"
                                                                  @endif >ยังไม่มา</option>
                                <option value="1" @if( $u->status == 1)
                                                                  selected="selected"
                                                                  @endif >ได้เข้าร่วมงานแล้ว</option>

                              </select>
                              </div>

													</div>
												</div>
											</div>
											<footer class="panel-footer">
												<div class="row">
													<div class="col-md-12 text-right">

                             <a class="tooltip_flip tooltip-effect-1 btn btn-primary" type="button" id="submit">แก้ไข</a>
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

              </div>
            </section>

              </div>
            </div>
        </div>
</section>
@stop



@section('scripts')
<script src="{{url('node_modules/socket.io-client/dist/socket.io.js')}}"></script>
<script>
$(document).ready(function(){



$('.tooltip_flip.tooltip-effect-1').click(function(e){
  e.preventDefault();


  var $form = $(this).closest("form#cutproduct1");
            var formData =  $form.serializeArray();


            var dataString = {
                  code_id : $form.find("#code_id").val(),
                   name : $form.find("#name").val(),
                   part_day : $form.find("#part_day").val(),
                   job_title : $form.find("#job_title").val(),
                   current_branch : $form.find("#current_branch").val(),
                   area : $form.find("#area").val(),
                   id_user : $form.find("#id_user").val(),
                   status_user : $form.find("#status_user").val(),
                   _token : '{{ csrf_token() }}'
                 };



    $.ajax({
        type: "POST",
        url: "{{url('admin/user_2/post_update')}}",
        data: dataString,
        dataType: "json",
        cache : false,
        success: function(data){


          if(data.success == true){

          //  $("#notif").html(data.notif);

            var socket = io.connect( 'http://'+window.location.hostname+':3000' );

            socket.emit('new_count_message', {
              new_count_message: data.new_count_message,
              all_count_message: data.all_count_message,
              count_user_all_new: data.count_user_all_new
            });

            socket.emit('new_message', {
              code_id: data.code_id,
              name: data.name,
              part_day: data.part_day,
              job_title: data.job_title,
              current_branch: data.current_branch,
              area: data.area,
              income_time: data.income_time
            });
          //  alert(data.phone_bit);
          //  window.location.reload();





              PNotify.prototype.options.styling = "fontawesome";
              new PNotify({
                    title: 'ยินดีด้วยค่ะ',
                    text: 'ทำการเพิ่มผู้ลงทะเบียนใหม่',
                    type: 'success'
                  });



          } else if(data.success == false){

            $("#name").val(data.name);

          }

          var delayMillis = 2200; //1 second



          setTimeout(function() {
            window.location = "{{url('admin/user_2')}}";
          }, delayMillis);



        } ,error: function(xhr, status, error) {
          alert(error);
        },

    });

});

});
</script>



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

@if ($message = Session::get('success'))
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
