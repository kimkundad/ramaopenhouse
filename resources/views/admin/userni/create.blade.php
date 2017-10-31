@extends('admin.layouts.template')
@section('admin.content')

				<section role="main" class="content-body">

					<header class="page-header">
						<h2>{{$header}}</h2>

						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="dashboard.html">
										<i class="fa fa-home"></i>
									</a>
								</li>

								<li><span>{{$header}}</span></li>
							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right" ><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>


					<!-- start: page -->




							<div class="row">
							<div class="col-md-2">



							</div>







              <div class="col-md-8 col-lg-8">

							<div class="tabs">

								<div class="tab-content">

									<div id="edit" class="tab-pane active">

                    @if (count($errors) > 0)
                    <br>
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

										<form class="form-horizontal" id="cutproduct1">
                      {{ method_field($method) }}
											{{ csrf_field() }}

											<h4 class="mb-xlg">ใส่ข้อมูลนักเรียน</h4>

											<fieldset>
                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">ชื่อ-นามสกุล*</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" required="">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileFirstName">Code ID</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="code_id" id="code_id" value="{{ old('code_id') }}" >
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label">ตำแหน่ง</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="job_title" id="job_title" value="{{ old('job_title') }}" >
													</div>
												</div>
                        <div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">สาขา</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="current_branch" id="current_branch" value="{{ old('current_branch') }}" >
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileCompany">พื้นที่</label>
													<div class="col-md-8">
														<input type="text" class="form-control" name="area" id="area" value="{{ old('area') }}">
													</div>
												</div>



                        <div class="form-group">
                          <label class="col-md-3 control-label">รอบเข้างาน</label>
                          <div class="col-md-8">
                        <select class="form-control col-md-8" id="part_day" name="part_day" required="">
                         <option value="">--เลือกรอบเข้างาน--</option>

                         <option value="1">เช้า</option>
                         <option value="0">บ่าย</option>


                       </select>
                       </div>
                       </div>



												<div class="form-group">
													<label class="col-md-3 control-label" for="profileAddress">หมายเหตุ</label>
													<div class="col-md-8">
														<textarea class="form-control" rows="2" id="remark" name="remark">{{ old('remark') }}</textarea>
													</div>
												</div>

											</fieldset>








											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<a class="tooltip_flip tooltip-effect-1 btn btn-primary" type="button" id="submit">Submit</a>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												</div>
											</div>

										</form>

									</div>
								</div>
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



    var a=$form.find("#name").val();
    var b=$form.find("#code_id").val();
    var e=$form.find("#job_title").val();
    var c=$form.find("#current_branch").val();
    var d=$form.find("#area").val();
    var e=$form.find("#part_day").val();
    if (a==null || a=="",e==null || e=="")

      {
      alert("กรอกข้อมมูลให้ครบทุกช่องนะครับน้องๆ");
      return false;
      }




   var dataString = {
          name : $form.find("#name").val(),
          code_id : $form.find("#code_id").val(),
          job_title : $form.find("#job_title").val(),
          current_branch : $form.find("#current_branch").val(),
          area : $form.find("#area").val(),
          part_day : $form.find("#part_day").val(),
          _token : '{{ csrf_token() }}'
        };

    $.ajax({
        type: "POST",
        url: "{{url('admin/user_2')}}",
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
            console.log(data.all_count_message);


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



                PNotify.prototype.options.styling = "fontawesome";
                new PNotify({
                      title: 'ทำรายการไม่สำเร็จ',
                      text: data.data_message,
                      type: 'error'
                    });

          }




          var delayMillis = 2200;

          setTimeout(function() {
            window.location.reload();
          }, delayMillis);



        } ,error: function(xhr, status, error) {
          alert(error);
        },

    });

});

});
</script>

@stop('scripts')
