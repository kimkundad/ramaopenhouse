<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=registration.xls");
header("Pragma: no-cache");
header("Expires: 0");


echo '<table border="1">';
//make the column headers what you want in whatever order you want
echo '<tr>
	<th> ชื่อ-นามสกุล </th>
	<th> อายุ </th>
	<th> ระดับการศึกษา </th>

	<th> แผนการศึกษา </th>
	<th> สถานศึกษา </th>
	<th> เกรดเฉลี่ยรวม </th>

	<th> อันดับที่ 1 </th>
	<th> อันดับที่ 2 </th>
	<th> อันดับที่ 3 </th>
	<th> อันดับที่ 4 </th>

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
			<td>{{$u->prefix_name}} {{$u->name}} {{$u->surname}}</td>
			<td>{{$u->age}}</td>
			<td>{{$u->educational_background}}</td>
			<td>{{$u->educational_plan}}</td>
			<td>{{$u->school_name}}</td>
			<td>{{$u->gpax}}</td>
			<td>
				@if($u->edu_rank_1 == 0)
					หลักสูตรแพทยศาสตรบัณฑิต
				@elseif($u->edu_rank_1 == 1)
					หลักสูตรพยาบาลศาสตรบัณฑิต
				@elseif($u->edu_rank_1 == 2)
					หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาปฏิบัติการฉุกเฉินทางการแพทย
				@else
					หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาความผิดปกติของการสื่อความหมาย
				@endif
			</td>
			<td>
				@if($u->edu_rank_2 == 0)
					หลักสูตรแพทยศาสตรบัณฑิต
				@elseif($u->edu_rank_2 == 1)
					หลักสูตรพยาบาลศาสตรบัณฑิต
				@elseif($u->edu_rank_2 == 2)
					หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาปฏิบัติการฉุกเฉินทางการแพทย
				@else
					หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาความผิดปกติของการสื่อความหมาย
				@endif
			</td>
			<td>
				@if($u->edu_rank_3 == 0)
				หลักสูตรแพทยศาสตรบัณฑิต
			@elseif($u->edu_rank_3 == 1)
				หลักสูตรพยาบาลศาสตรบัณฑิต
			@elseif($u->edu_rank_3 == 2)
				หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาปฏิบัติการฉุกเฉินทางการแพทย
			@else
				หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาความผิดปกติของการสื่อความหมาย
			@endif
		</td>
			<td>
				@if($u->edu_rank_4 == 0)
					หลักสูตรแพทยศาสตรบัณฑิต
				@elseif($u->edu_rank_4 == 1)
					หลักสูตรพยาบาลศาสตรบัณฑิต
				@elseif($u->edu_rank_4 == 2)
					หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาปฏิบัติการฉุกเฉินทางการแพทย
				@else
					หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาความผิดปกติของการสื่อความหมาย
				@endif
			</td>
			<td>{{$u->time_stamp}} น.</td>
			<td><?php echo DateThai($u->created_at); ?></td>
		</tr>
	@endforeach
@endif
<?php
echo '</table>';
?>
