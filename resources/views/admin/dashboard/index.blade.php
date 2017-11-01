
@extends('admin.layouts.template')
@section('admin.content')

<style type="text/css">
.select2-container .select2-choice {
        display: block;
        height: 35px;
    }
    .dataTables_wrapper .dataTables_length .select2-container {
        margin-right: 10px;
        width: 85px;
    }

    .dataTables_wrapper .dataTables_filter input {
         margin-left: 0em;
         display: block;
width: 99%;
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
    .dataTables_wrapper .dataTables_filter label {
       width: 100%;
       float: left;
    }
    .panel-body {
padding: 10px;
}
table.dataTable.nowrap th, table.dataTable.nowrap td {
white-space: normal;
}
.widget-summary .summary .title {
    margin: 0;
    font-size: 16px;
    font-size: 1.2rem;
    line-height: 22px;
    line-height: 2.2rem;
    color: #333333;
    font-weight: 500;
}
.bg-quaternary {
    background: #734BA9;
    color: #FFF;
}
.panel-featured-quaternary {
    border-color: #734BA9;
}
</style>

<audio id="notif_audio"><source src="{!! asset('sounds/notify.ogg') !!}" type="audio/ogg"><source src="{!! asset('sounds/notify.mp3') !!}" type="audio/mpeg"><source src="{!! asset('sounds/notify.wav') !!}" type="audio/wav"></audio>

	<?php

	            function DateThai($strDate)
	            {
	            $strYear = date("Y",strtotime($strDate))+543;
	            $strMonth= date("n",strtotime($strDate));
	            $strDay= date("j",strtotime($strDate));
	            $strHour= date("H",strtotime($strDate));
	            $strMinute= date("i",strtotime($strDate));
	            $strSeconds= date("s",strtotime($strDate));
	            $strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
	            $strMonthThai=$strMonthCut[$strMonth];
	            return "$strDay $strMonthThai $strYear $strHour:$strMinute.น";
	            }

	             ?>

				<section role="main" class="content-body">


					<!-- start: page -->



					<div class="row">


            <div class="col-md-6">

              <section class="panel">
								<header class="panel-heading panel-heading-transparent">


									<h2 class="panel-title">Dashboard Stats</h2>
								</header>
								<div class="panel-body" style="font-size: 14px;">
									<div class="table-responsive" >
										<table class="table table-striped mb-none">
											<thead>
												<tr>

													<th>Project</th>
													<th>Total</th>

												</tr>
											</thead>
											<tbody>

												<tr>
													<td><i class="fa fa-user text-success"></i> จำนวนผู้กรอกแบบสอบถาม</td>
													<td><span class="label label-success">{{$count_q}}</span></td>
												</tr>

                        <tr>
													<td><i class="fa fa-user text-primary"></i> จำนวนผู้ลงทะเบียน</td>
													<td><span class="label label-primary">{{$count_re}}</span></td>
												</tr>

                        <tr>
													<td><i class="fa fa-child text-danger"></i> จำนวนผู้ชาย</td>
													<td><span class="label label-danger">{{$count_man}}</span></td>
												</tr>


                        <tr>
													<td><i class="fa fa-female text-warning"></i> จำนวนผู้หญิง</td>
													<td><span class="label label-warning">{{$count_girl}}</span></td>
												</tr>



											</tbody>
										</table>
									</div>
								</div>
							</section>

            </div>




            <div class="col-md-6">

              <section class="panel">
								<header class="panel-heading panel-heading-transparent">


									<h2 class="panel-title">&nbsp</h2>
								</header>
								<div class="panel-body" style="font-size: 14px;">
									<div class="table-responsive" >
										<table class="table table-striped mb-none">
											<thead>
												<tr>

													<th>ลำดับคณะที่ให้ความสนใจ อันดับที่ 1 (ลงทะเบียน)</th>
													<th>Total</th>

												</tr>
											</thead>
											<tbody>

												<tr>
													<td><i class="fa fa-user text-success"></i> หลักสูตรแพทยศาสตรบัณฑิต</td>
													<td><span class="label label-success">{{$count_edu_rank_1}}</span></td>
												</tr>

                        <tr>
													<td><i class="fa fa-user text-primary"></i> หลักสูตรพยาบาลศาสตรบัณฑิต</td>
													<td><span class="label label-primary">{{$count_edu_rank_2}}</span></td>
												</tr>


                        <tr>
													<td><i class="fa fa-user text-danger"></i> สาขาวิชาปฏิบัติการฉุกเฉินทางการแพทย์</td>
													<td><span class="label label-danger">{{$count_edu_rank_3}}</span></td>
												</tr>

                        <tr>
													<td><i class="fa fa-user text-warning"></i> สาขาวิชาความผิดปกติของการสื่อความหมาย</td>
													<td><span class="label label-warning">{{$count_edu_rank_4}}</span></td>
												</tr>



											</tbody>
										</table>
									</div>
								</div>
							</section>

            </div>








            <div class="col-md-6">

              <section class="panel">
								<header class="panel-heading panel-heading-transparent">


									<h2 class="panel-title">&nbsp</h2>
								</header>
								<div class="panel-body" style="font-size: 14px;">
									<div class="table-responsive" >
										<table class="table table-striped mb-none">
											<thead>
												<tr>

													<th>สนใจเลือกเรียนสาขาอะไรมากที่สุด (แบบสอบถาม)</th>
													<th>Total</th>

												</tr>
											</thead>
											<tbody>

												<tr>
													<td><i class="fa fa-user text-success"></i> หลักสูตรแพทยศาสตรบัณฑิต</td>
													<td><span class="label label-success">{{$count_question_09_1}}</span></td>
												</tr>

                        <tr>
													<td><i class="fa fa-user text-primary"></i> หลักสูตรพยาบาลศาสตรบัณฑิต</td>
													<td><span class="label label-primary">{{$count_question_09_2}}</span></td>
												</tr>


                        <tr>
													<td><i class="fa fa-user text-danger"></i> สาขาวิชาความผิดปกติของการสื่อความหมาย</td>
													<td><span class="label label-danger">{{$count_question_09_3}}</span></td>
												</tr>

                        <tr>
													<td><i class="fa fa-user text-warning"></i> สาขาวิชาปฏิบัติการฉุกเฉินทางการแพทย์</td>
													<td><span class="label label-warning">{{$count_question_09_4}}</span></td>
												</tr>



											</tbody>
										</table>
									</div>
								</div>
							</section>

            </div>





											</div>








</section>
@stop

@section('scripts')



@stop('scripts')
