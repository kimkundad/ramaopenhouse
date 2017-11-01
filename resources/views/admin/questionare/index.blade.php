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
                <?php
                function DateThai($strDate)
                {
                $strYear = date("Y",strtotime($strDate))+543;
                $strMonth= date("n",strtotime($strDate));
                $strDay= date("j",strtotime($strDate));
                $strHour= date("H",strtotime($strDate));
                $strMinute= date("i",strtotime($strDate));
                $strSeconds= date("s",strtotime($strDate));
                $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                $strMonthThai=$strMonthCut[$strMonth];
                return "$strDay $strMonthThai $strYear";
                }
                 ?>




                 <div class="row">
                    <div class="col-md-4">


                      <a class="btn btn-default" target="_blank" href="{{url('admin/questionare_export')}}" role="button"><i class="fa fa-file-excel-o"></i> Export Excel</a>

                    </div>

                    <div class="col-md-8 pull-right">


                    </div>

                  </div>

<br>


                <div class="table-responsive">
                <table id="example" class="table table-striped " cellspacing="0" width="100%">
                  <thead>
                    <tr>

                      <th># ลำดับการกรอกแบบสอบถาม</th>
                      <th>เวลา</th>
                      <th>วันที่</th>
                      <th>จัดการ</th>
                    </tr>
                  </thead>
                  <tbody {{$i = 0}}>

                    @if($objs)
                @foreach($objs as $u)
                    <tr {{$i++}}>
                      <td><i class="fa fa-file-word-o "></i> รายละเอียดแบบสอบถามที่ {{$i}}</td>

                      <td>{{$u->time_stamp}} น.</td>
                      <td><?php echo DateThai($u->created_at); ?></td>

                      <td>

                        <a style="float:left; margin: 3px; font-size: 11px; padding: 1px 3px;" class="btn btn-primary btn-xs modal-sizes"
                         href="#modalSM-{{$u->id}}" role="button"><i class="fa fa-pencil-square-o "></i> </a>

                          <form  action="{{url('admin/user_questionare/'.$u->id)}}" method="post" onsubmit="return(confirm('Do you want Delete'))">
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
												<h2 class="panel-title"> แบบสอบถามที่ {{$i}}</h2>
											</header>
											<div class="panel-body">
												<div class="modal-wrapper" style="padding-top:10px;">
                          <div class="modal-text">

                            <table class="table">
                              <tr>
                                <td><b>1. สถานที่ในการจัดกิจกรรม เหมาะสมหรือไม่?</b></td>
                              </tr>
                              <tr>

                                <td>คำตอบ =
                                @if($u->question_01 == 1)
                                  <span class="text-danger"><span class="text-danger">ควรปรับปรุง</span></span>
                                @elseif($u->question_01 == 2)
                                  พอใช้
                                @elseif($u->question_01 == 3)
                                  ปานกลาง
                                @elseif($u->question_01 == 4)
                                  <span class="text-success">ดี</span>
                                @else
                                  <span class="text-success">ดีมาก</span>
                                @endif
                              </td>

                              </tr>
                              <tr>
                                <td><b>2. วันและเวลา 2 วันสำหรับในการจัดกิจกรรมเหมาะสมหรือไม่?</b></td>
                              </tr>
                              <tr>
                                <td>คำตอบ =

                                  @if($u->question_02 == 1)
                                    <span class="text-danger"><span class="text-danger">ควรปรับปรุง</span></span>
                                  @elseif($u->question_02 == 2)
                                    พอใช้
                                  @elseif($u->question_02 == 3)
                                    ปานกลาง
                                  @elseif($u->question_02 == 4)
                                    <span class="text-success">ดี</span>
                                  @else
                                    <span class="text-success">ดีมาก</span>
                                  @endif

                                </td>
                              </tr>
                              <tr>
                                <td><b>3. ระยะเวลาที่แต่ละหลักสูตรนำเสนอข้อมูล เหมาะสมหรือไม่?</b></td>
                              </tr>
                              <tr>
                                <td>คำตอบ =

                                  @if($u->question_03 == 1)
                                    <span class="text-danger">ควรปรับปรุง</span>
                                  @elseif($u->question_03 == 2)
                                    พอใช้
                                  @elseif($u->question_03 == 3)
                                    ปานกลาง
                                  @elseif($u->question_03 == 4)
                                    <span class="text-success">ดี</span>
                                  @else
                                    <span class="text-success">ดีมาก</span>
                                  @endif

                                </td>
                              </tr>

                              <tr>
                                <td><b>4. มีความเข้าใจเกี่ยวกับ 4 หลักสูตรของคณะแพทยศาสตร์ โรงพยาบาลรามาธิปบ<span class="text-success">ดีมาก</span>น้อยแค่ไหน?</b></td>
                              </tr>
                              <tr>
                                <td>คำตอบ =

                                  @if($u->question_04 == 1)
                                    <span class="text-danger">ควรปรับปรุง</span>
                                  @elseif($u->question_04 == 2)
                                    พอใช้
                                  @elseif($u->question_04 == 3)
                                    ปานกลาง
                                  @elseif($u->question_04 == 4)
                                    <span class="text-success">ดี</span>
                                  @else
                                    <span class="text-success">ดีมาก</span>
                                  @endif

                                </td>
                              </tr>


                              <tr>
                                <td><b>5. คุณรู้สึกประทับใจการดูแลของรุ่นพี่มากน้อยแค่ไหน?</b></td>
                              </tr>
                              <tr>
                                <td>คำตอบ =

                                  @if($u->question_05 == 1)
                                    <span class="text-danger">ควรปรับปรุง</span>
                                  @elseif($u->question_05 == 2)
                                    พอใช้
                                  @elseif($u->question_05 == 3)
                                    ปานกลาง
                                  @elseif($u->question_05 == 4)
                                    <span class="text-success">ดี</span>
                                  @else
                                    <span class="text-success">ดีมาก</span>
                                  @endif

                                </td>
                              </tr>


                              <tr>
                                <td><b>6. มีความเข้าใจแนวทางเข้าศึกษาต่อในคณะแพทยศาสตร์โรงพยาบาลรามาธิบดีอย่างไร?</b></td>
                              </tr>
                              <tr>
                                <td>คำตอบ =

                                  @if($u->question_06 == 1)
                                    <span class="text-danger">ควรปรับปรุง</span>
                                  @elseif($u->question_06 == 2)
                                    พอใช้
                                  @elseif($u->question_06 == 3)
                                    ปานกลาง
                                  @elseif($u->question_06 == 4)
                                    <span class="text-success">ดี</span>
                                  @else
                                    <span class="text-success">ดีมาก</span>
                                  @endif

                                </td>
                              </tr>

                              <tr>
                                <td><b>7. ชอบกิจกรรมหลักสูตรใดมากที่สุด (ตอบเพียง 1 ข้อ)</b></td>
                              </tr>
                              <tr>
                                <td>คำตอบ =

                                  @if($u->question_07 == 1)
                                    หลักสูตรแพทยศาสตรบัณทิต Doctor of Medicine Programme
                                  @elseif($u->question_07 == 2)
                                    หลักสูตรแพทยศาสตรบัณทิต Bachelor of Nursing Science
                                  @elseif($u->question_07 == 3)
                                    หลักสูตรวิทยาศาสตรบัณทิต สาขาวิชาความผิดปกติของการสื่อความหมาย Bachelor of Science Programme in Communication Disorders
                                  @else
                                    หลักสูตรวิทยาศาสตรบัณทิต สาขาวิชาปฏิบัติการฉุกเฉินการแพทย์ Bachelor of Science Programme in Emergency Medicine Operation
                                  @endif

                                </td>
                              </tr>

                              <tr>
                                <td><b>8. คุณมีความสนใจที่จะเลือกคณะแพทยศาสตร์โรงพยาบาลรามาธิบดี มากน้อยแค่ไหน?</b></td>
                              </tr>
                              <tr>
                                <td>คำตอบ =

                                  @if($u->question_08 == 1)
                                    ไม่เลือก
                                  @elseif($u->question_08 == 2)
                                    เป็นตัวเลือก
                                  @else
                                    เลือก
                                  @endif

                                </td>
                              </tr>

                              <tr>
                                <td><b>9. คุณสนใจเลือกเรียนสาขาอะไรมากที่สุด ในคณะแพทยศาสตร์โรงพยาบาลรามาธิบดี (ตอบเพียง 1 ข้อ)</b></td>
                              </tr>
                              <tr>
                                <td>คำตอบ =

                                  @if($u->question_09 == 1)
                                    หลักสูตรแพทยศาสตรบัณทิต
                                  @elseif($u->question_09 == 2)
                                    หลักสูตรพยาบาลศาสตรบัณทิต
                                  @elseif($u->question_09 == 3)
                                    หลักสูตรวิทยาศาสตรบัณทิต สาขาวิชาความผิดปกติของการสื่อความหมาย
                                  @else
                                    หลักสูตรวิทยาศาสตรบัณทิต สาขาวิชาปฏิบัติการฉุกเฉินการแพทย์
                                  @endif

                                </td>
                              </tr>

                              <tr>
                                <td><b>10. คุณจะแนะนำให้เพื่อนสมัครเข้าคณะแพทยศาสตร์โรงพยาบาลรามาธิบดีหรือไม่ ?</b></td>
                              </tr>
                              <tr>
                                <td>คำตอบ =

                                  @if($u->question_10 == 1)
                                    แนะนำ
                                  @else
                                    ไม่แนะนำ
                                  @endif

                                </td>
                              </tr>


                              <tr>
                                <td><b>11. ข้อเสนอแนะ</b></td>
                              </tr>
                              <tr>
                                <td>คำตอบ = {{$u->q11_text}}
                                </td>
                              </tr>


                            </table>


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
