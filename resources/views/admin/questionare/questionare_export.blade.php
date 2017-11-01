<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=registration.xls");
header("Pragma: no-cache");
header("Expires: 0");


echo '<table border="1">';
//make the column headers what you want in whatever order you want
echo '<tr>
	<th> สถานที่ในการจัดกิจกรรม เหมาะสมหรือไม่? </th>
	<th> วันและเวลา 2 วันสำหรับในการจัดกิจกรรมเหมาะสมหรือไม่? </th>
	<th> ระยะเวลาที่แต่ละหลักสูตรนำเสนอข้อมูล เหมาะสมหรือไม่? </th>

	<th> มีความเข้าใจเกี่ยวกับ 4 หลักสูตรของคณะแพทยศาสตร์ โรงพยาบาลรามาธิปบดีมากน้อยแค่ไหน? </th>
	<th> คุณรู้สึกประทับใจการดูแลของรุ่นพี่มากน้อยแค่ไหน? </th>
	<th> มีความเข้าใจแนวทางเข้าศึกษาต่อในคณะแพทยศาสตร์โรงพยาบาลรามาธิบดีอย่างไร? </th>

	<th> ชอบกิจกรรมหลักสูตรใดมากที่สุด </th>
	<th> คุณมีความสนใจที่จะเลือกคณะแพทยศาสตร์โรงพยาบาลรามาธิบดี มากน้อยแค่ไหน? </th>
	<th> คุณสนใจเลือกเรียนสาขาอะไรมากที่สุด ในคณะแพทยศาสตร์โรงพยาบาลรามาธิบดี </th>
	<th> คุณจะแนะนำให้เพื่อนสมัครเข้าคณะแพทยศาสตร์โรงพยาบาลรามาธิบดีหรือไม่ ? </th>
  <th> ข้อเสนอแนะ </th>
  <th> เวลา </th>
  <th> วันที่ </th>
	    </tr>';
//loop the query data to the table in same order as the headers

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

@if($objs)
	@foreach($objs as $u)

    <tr>

			<td>
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

      <td>

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

      <td>

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

      <td>

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


      <td>

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


      <td>

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


      <td>

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


      <td>

        @if($u->question_08 == 1)
          ไม่เลือก
        @elseif($u->question_08 == 2)
          เป็นตัวเลือก
        @else
          เลือก
        @endif

      </td>

      <td>

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

      <td>

        @if($u->question_10 == 1)
          แนะนำ
        @else
          ไม่แนะนำ
        @endif

      </td>


      <td> {{$u->q11_text}}</td>





			<td>{{$u->time_stamp}} น.</td>
			<td><?php echo DateThai($u->created_at); ?></td>
		</tr>
	@endforeach
@endif
<?php
echo '</table>';
?>
