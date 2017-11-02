<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registration | Mahidol</title>
  <link rel="stylesheet" href="{{url('static/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('static/css/style.css')}}">
  <style>
  .bg-danger {

        padding: 15px;
        font-size: 20px;
  }
  </style>
</head>

<body>



  <form action="{{url('registration_store')}}" method="post">
    {{ method_field($method) }}
    {{ csrf_field() }}
    <div class="container">
      <img src="{{url('static/img/iron.png')}}" alt="iron">
      <div class="row header">
        <div class="col-12 text-center">
          <div class="subheader">
            <h5 class="color-head">แบบฟอร์มการลงทะเบียน เข้าเยี่ยมชมบูธ</h5>
            <h5 class="description">คณะแพทยศาสตร์โรงพยาบาลรามาธิบดี</h5>
          </div>
        </div>
      </div>
      <div class="subcontainer">
        <div class="row">
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="s_1" name="sex" type="radio" class="custom-control-input" value="นาย" required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">นาย</span>
            </label>
            <label class="custom-control custom-radio">
              <input id="s_2" name="sex" type="radio" value="นางสาว" class="custom-control-input">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">นางสาว</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="s_3" name="sex" type="radio" value="ด.ช." class="custom-control-input">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ด.ช.</span>
            </label>
            <label class="custom-control custom-radio">
              <input id="s_4" name="sex" type="radio" value="ด.ญ." class="custom-control-input">
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ด.ญ.</span>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6">
            <h5>ชื่อ</h5>
            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" >
            @if ($errors->has('first_name'))
                                    <p class="bg-danger">
                                        <strong>กรุณากรอกข้อมูลให้ครบถ้วน</strong>
                                    </p>
                                @endif
          </div>
          <div class="col-12 col-md-6">
            <h5>นามสกุล</h5>
            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="dropdown show">
              <h5>อายุ</h5>
              <select class="btn btn-default btn-md dropdown-toggle" name="age" required>
                <div class="dropdown-menu">
                  <option value="11" class="dropdown-item">11</option>
                  <option value="12" class="dropdown-item">12</option>
                  <option value="13" class="dropdown-item">13</option>
                  <option value="14" class="dropdown-item">14</option>
                  <option value="15" class="dropdown-item">15</option>
                  <option value="16" class="dropdown-item">16</option>
                  <option value="17" class="dropdown-item">17</option>
                  <option value="18" class="dropdown-item">18</option>
                  <option value="19" class="dropdown-item">19</option>
                  <option value="20" class="dropdown-item">20</option>
                  <option value="21" class="dropdown-item">21</option>
                  <option value="22" class="dropdown-item">22</option>
                  <option value="23" class="dropdown-item">23</option>
                  <option value="24" class="dropdown-item">24</option>
                  <option value="25" class="dropdown-item">25</option>
                  <option value="100" class="dropdown-item">มากกว่า 25</option>
                </div>
              </select>
              <span>&nbsp;&nbsp;&nbsp;ปี</span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="dropdown show">
              <h5>ระดับการศึกษา</h5>
              <select class="btn btn-default btn-md dropdown-toggle" name="edu_rank" required>
                <div class="dropdown-menu">
                  <option class="dropdown-item" value="มัธยมศึกษาปีที่ 1">มัธยมศึกษาปีที่ 1</option>
                  <option class="dropdown-item" value="มัธยมศึกษาปีที่ 2">มัธยมศึกษาปีที่ 2</option>
                  <option class="dropdown-item" value="มัธยมศึกษาปีที่ 3">มัธยมศึกษาปีที่ 3</option>
                  <option class="dropdown-item" value="มัธยมศึกษาปีที่ 4">มัธยมศึกษาปีที่ 4</option>
                  <option class="dropdown-item" value="มัธยมศึกษาปีที่ 5">มัธยมศึกษาปีที่ 5</option>
                  <option class="dropdown-item" value="มัธยมศึกษาปีที่ 6">มัธยมศึกษาปีที่ 6</option>
                  <option class="dropdown-item" value="อื่นๆ">อื่นๆ</option>
                </div>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6">
            <h5>แผนการศึกษา</h5>
            <input class="form-control" type="text" name="edu_type" id="edu_type" value="{{ old('edu_type') }}" required>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6">
            <h5>สถานศึกษา</h5>
            <input class="form-control" type="text" name="school" id="school" value="{{ old('school') }}" required>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6">
            <h5>เกรดเฉลี่ยรวม</h5>
            <input class="form-control" type="number" min="0" step="0.01" name="gpax" value="{{ old('gpax') }}" id="gpax" required>
          </div>
        </div>
        <div class="row school-rank-four">
          <div class="col-12">
            <h5>ลำดับคณะที่ให้ความสนใจ</h5>
          </div>
          <div class="col-12 ranking_font">
            อันดับที่ 1
            <select id="edu_rank_1" onblur="removeValue(this)" class="fix-dropdown btn btn-default btn-md dropdown-toggle" name="edu_rank_1" required>

                <option id="e_1_1" class="dropdown-item edu" value="0" {{ (old("edu_rank_1") == 0 ? "selected":"") }}>หลักสูตรแพทยศาสตรบัณฑิต</option>
                <option id="e_1_2" class="dropdown-item edu" value="1" {{ (old("edu_rank_1") == 1 ? "selected":"") }}>หลักสูตรพยาบาลศาสตรบัณฑิต</option>
                <option id="e_1_3" class="dropdown-item edu" value="2" {{ (old("edu_rank_1") == 2 ? "selected":"") }}>หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาปฏิบัติการฉุกเฉินทางการแพทย์</option>
                <option id="e_1_4" class="dropdown-item edu" value="3" {{ (old("edu_rank_1") == 3 ? "selected":"") }}>หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาความผิดปกติของการสื่อความหมาย</option>

            </select>
            <br />
            อันดับที่ 2
            <select id="edu_rank_2" onblur="removeValue(this)" class="fix-dropdown btn btn-default btn-md dropdown-toggle" name="edu_rank_2" required>

                <option id="e_2_1" class="dropdown-item edu" value="0" {{ (old("edu_rank_2") == 0 ? "selected":"") }}>หลักสูตรแพทยศาสตรบัณฑิต</option>
                <option id="e_2_2" class="dropdown-item edu" value="1" {{ (old("edu_rank_2") == 1 ? "selected":"") }}>หลักสูตรพยาบาลศาสตรบัณฑิต</option>
                <option id="e_2_3" class="dropdown-item edu" value="2" {{ (old("edu_rank_2") == 2 ? "selected":"") }}>หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาปฏิบัติการฉุกเฉินทางการแพทย์</option>
                <option id="e_2_4" class="dropdown-item edu" value="3" {{ (old("edu_rank_2") == 3 ? "selected":"") }}>หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาความผิดปกติของการสื่อความหมาย</option>

            </select>
            <br />
            อันดับที่ 3
            <select id="edu_rank_3" onblur="removeValue(this)" class="fix-dropdown btn btn-default btn-md dropdown-toggle" name="edu_rank_3" required>

                <option id="e_3_1" class="dropdown-item edu" value="0" {{ (old("edu_rank_3") == 0 ? "selected":"") }}>หลักสูตรแพทยศาสตรบัณฑิต</option>
                <option id="e_3_2" class="dropdown-item edu" value="1" {{ (old("edu_rank_3") == 1 ? "selected":"") }}>หลักสูตรพยาบาลศาสตรบัณฑิต</option>
                <option id="e_3_3" class="dropdown-item edu" value="2" {{ (old("edu_rank_3") == 2 ? "selected":"") }}>หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาปฏิบัติการฉุกเฉินทางการแพทย์</option>
                <option id="e_3_4" class="dropdown-item edu" value="3" {{ (old("edu_rank_3") == 3 ? "selected":"") }}>หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาความผิดปกติของการสื่อความหมาย</option>

            </select>
            <br />
            อันดับที่ 4
            <select id="edu_rank_4" onblur="removeValue(this)" class="fix-dropdown btn btn-default btn-md dropdown-toggle" name="edu_rank_4" required>

                <option id="e_4_1" class="dropdown-item edu" value="0" {{ (old("edu_rank_4") == 0 ? "selected":"") }}>หลักสูตรแพทยศาสตรบัณฑิต</option>
                <option id="e_4_2" class="dropdown-item edu" value="1" {{ (old("edu_rank_4") == 1 ? "selected":"") }}>หลักสูตรพยาบาลศาสตรบัณฑิต</option>
                <option id="e_4_3" class="dropdown-item edu" value="2" {{ (old("edu_rank_4") == 2 ? "selected":"") }}>หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาปฏิบัติการฉุกเฉินทางการแพทย์</option>
                <option id="e_4_4" class="dropdown-item edu" value="3" {{ (old("edu_rank_4") == 3 ? "selected":"") }}>หลักสูตรวิทยาศาสตรบัณฑิต สาขาวิชาความผิดปกติของการสื่อความหมาย</option>

            </select>
            <br />
          </div>
        </div>
        <div class="row button-section">
          <div class="col-12 text-center specific-custom">
            <input class="btn btn-custom" type="submit" value="ลงทะเบียน">
          </div>
        </div>
      </div>
    </div>
  </form>
</body>
<script src="{{url('static/js/jquery-3.2.1.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="{{url('static/js/bootstrap.min.js')}}"></script>

</html>
