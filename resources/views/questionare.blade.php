<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Questionare | Mahidol</title>
  <link rel="stylesheet" href="{{url('static/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('static/css/style.css')}}">
</head>

<body>

  @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


  <form action="{{url('questionare_store')}}" method="post">
    {{ method_field($method) }}
    {{ csrf_field() }}
    <div class="container">
      <img src="{{url('static/img/iron.png')}}" alt="iron">
      <div class="row header header_question">
        <div class="col-12 text-center">
          <div class="subheader">
            <h1 class="color-head">แบบสอบถาม</h1>
            <h5 class="description">เกี่ยวกับ คณะแพทยศาสตร์โรงพยาบาลรามาธิบดี</h5>
            <h5 class="description">ในงานเปิดบ้านมหิดล 60' มหาวิทยาลัยมหิดล</h5>
            <h6 class="place">3 - 4 พฤศจิกายน 2560</h6>
            <h6 class="place">สถานที่ อาคารพัฒนดล</h6>
            <h6 class="place">คณะสิ่งแวดล้อมมหาวิทยาลัยมหิดล ศาลายา</h6>
          </div>
        </div>
      </div>
      <div class="subcontainer question">
        <div class="row">
          <div class="col-12">
            <h2>1. สถานที่ในการจัดกิจกรรม เหมาะสมหรือไม่?</h2>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_1" name="q_1" type="radio" value="1" class="custom-control-input" @if(old('q_1') == 1) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ควรปรับปรุง</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_1" name="q_1" type="radio" value="2" class="custom-control-input" @if(old('q_1') == 2) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">พอใช้</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_1" name="q_1" type="radio" value="3" class="custom-control-input" @if(old('q_1') == 3) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ปานกลาง</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_1" name="q_1" type="radio" value="4" class="custom-control-input" @if(old('q_1') == 4) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ดี</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_1" name="q_1" type="radio" value="5" class="custom-control-input" @if(old('q_1') == 5) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ดีมาก</span>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h2>2. วันและเวลา 2 วันสำหรับในการจัดกิจกรรมเหมาะสมหรือไม่?</h2>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_2" name="q_2" type="radio" value="1" class="custom-control-input" @if(old('q_2') == 1) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ควรปรับปรุง</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_2" name="q_2" type="radio" value="2" class="custom-control-input" @if(old('q_2') == 2) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">พอใช้</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_2" name="q_2" type="radio" value="3" class="custom-control-input" @if(old('q_2') == 3) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ปานกลาง</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_2" name="q_2" type="radio" value="4" class="custom-control-input" @if(old('q_2') == 4) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ดี</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_2" name="q_2" type="radio" value="5" class="custom-control-input" @if(old('q_2') == 5) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ดีมาก</span>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h2>3. ระยะเวลาที่แต่ละหลักสูตรนำเสนอข้อมูล เหมาะสมหรือไม่?</h2>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_3" name="q_3" type="radio" value="1" class="custom-control-input" @if(old('q_3') == 1) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ควรปรับปรุง</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_3" name="q_3" type="radio" value="2" class="custom-control-input" @if(old('q_3') == 2) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">พอใช้</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_3" name="q_3" type="radio" value="3" class="custom-control-input" @if(old('q_3') == 3) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ปานกลาง</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_3" name="q_3" type="radio" value="4" class="custom-control-input" @if(old('q_3') == 4) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ดี</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_3" name="q_3" type="radio" value="5" class="custom-control-input" @if(old('q_3') == 5) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ดีมาก</span>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h2>4. มีความเข้าใจเกี่ยวกับ 4 หลักสูตรของคณะแพทยศาสตร์ โรงพยาบาลรามาธิปบดีมากน้อยแค่ไหน?</h2>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_4" name="q_4" type="radio" value="1" class="custom-control-input" @if(old('q_4') == 1) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ควรปรับปรุง</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_4" name="q_4" type="radio" value="2" class="custom-control-input" @if(old('q_4') == 2) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">พอใช้</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_4" name="q_4" type="radio" value="3" class="custom-control-input" @if(old('q_4') == 3) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ปานกลาง</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_4" name="q_4" type="radio" value="4" class="custom-control-input" @if(old('q_4') == 4) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ดี</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_4" name="q_4" type="radio" value="5" class="custom-control-input" @if(old('q_4') == 5) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ดีมาก</span>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h2>5. คุณรู้สึกประทับใจการดูแลของรุ่นพี่มากน้อยแค่ไหน?</h2>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_5" name="q_5" type="radio" value="1" class="custom-control-input" @if(old('q_5') == 1) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ควรปรับปรุง</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_5" name="q_5" type="radio" value="2" class="custom-control-input" @if(old('q_5') == 2) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">พอใช้</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_5" name="q_5" type="radio" value="3" class="custom-control-input" @if(old('q_5') == 3) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ปานกลาง</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_5" name="q_5" type="radio" value="4" class="custom-control-input" @if(old('q_5') == 4) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ดี</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_5" name="q_5" type="radio" value="5" class="custom-control-input" @if(old('q_5') == 5) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ดีมาก</span>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <h2>6. มีความเข้าใจแนวทางเข้าศึกษาต่อในคณะแพทยศาสตร์โรงพยาบาลรามาธิบดีอย่างไร?</h2>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_6" name="q_6" type="radio" value="1" class="custom-control-input" @if(old('q_6') == 1) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ควรปรับปรุง</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_6" name="q_6" type="radio" value="2" class="custom-control-input" @if(old('q_6') == 2) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">พอใช้</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_6" name="q_6" type="radio" value="3" class="custom-control-input" @if(old('q_6') == 3) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ปานกลาง</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_6" name="q_6" type="radio" value="4" class="custom-control-input" @if(old('q_6') == 4) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ดี</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_6" name="q_6" type="radio" value="5" class="custom-control-input" @if(old('q_6') == 5) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ดีมาก</span>
            </label>
          </div>
        </div>

        <div class="row question_seven">
          <div class="col-12">
            <h2>7. ชอบกิจกรรมหลักสูตรใดมากที่สุด (ตอบเพียง 1 ข้อ)</h2>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_7" name="q_7" type="radio" value="1" class="custom-control-input" @if(old('q_7') == 1) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">หลักสูตรแพทยศาสตรบัณทิต Doctor of Medicine Programme</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_7" name="q_7" type="radio" value="2" class="custom-control-input" @if(old('q_7') == 2) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">หลักสูตรแพทยศาสตรบัณทิต Bachelor of Nursing Science</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_7" name="q_7" type="radio" value="3" class="custom-control-input" @if(old('q_7') == 3) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">หลักสูตรวิทยาศาสตรบัณทิต สาขาวิชาความผิดปกติของการสื่อความหมาย Bachelor of Science Programme in Communication Disorders</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_7" name="q_7" type="radio" value="4" class="custom-control-input" @if(old('q_7') == 4) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">หลักสูตรวิทยาศาสตรบัณทิต สาขาวิชาปฏิบัติการฉุกเฉินการแพทย์ Bachelor of Science Programme in Emergency Medicine Operation</span>
            </label>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <h2>8. คุณมีความสนใจที่จะเลือกคณะแพทยศาสตร์โรงพยาบาลรามาธิบดี มากน้อยแค่ไหน?</h2>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_8" name="q_8" type="radio" value="1" class="custom-control-input" @if(old('q_8') == 1) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ไม่เลือก</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_8" name="q_8" type="radio" value="2" class="custom-control-input" @if(old('q_8') == 2) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">เป็นตัวเลือก</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_8" name="q_8" type="radio" value="3" class="custom-control-input" @if(old('q_8') == 3) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">เลือก</span>
            </label>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <h2>9. คุณสนใจเลือกเรียนสาขาอะไรมากที่สุด ในคณะแพทยศาสตร์โรงพยาบาลรามาธิบดี (ตอบเพียง 1 ข้อ)</h2>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_9" name="q_9" type="radio" value="1" class="custom-control-input" @if(old('q_9') == 1) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">หลักสูตรแพทยศาสตรบัณทิต</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_9" name="q_9" type="radio" value="2" class="custom-control-input" @if(old('q_9') == 2) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">หลักสูตรพยาบาลศาสตรบัณทิต</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_9" name="q_9" type="radio" value="3" class="custom-control-input" @if(old('q_9') == 3) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">หลักสูตรวิทยาศาสตรบัณทิต สาขาวิชาความผิดปกติของการสื่อความหมาย</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_9" name="q_9" type="radio" value="4" class="custom-control-input" @if(old('q_9') == 4) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">หลักสูตรวิทยาศาสตรบัณทิต สาขาวิชาปฏิบัติการฉุกเฉินการแพทย์</span>
            </label>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <h2>10. คุณจะแนะนำให้เพื่อนสมัครเข้าคณะแพทยศาสตร์โรงพยาบาลรามาธิบดีหรือไม่ ?</h2>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_10" name="q_10" type="radio" value="1" class="custom-control-input" @if(old('q_10') == 1) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">แนะนำ</span>
            </label>
          </div>
          <div class="col-12">
            <label class="custom-control custom-radio">
              <input id="q_10" name="q_10" type="radio" value="2" class="custom-control-input" @if(old('q_10') == 2) checked @endif required>
              <span class="custom-control-indicator"></span>
              <span class="custom-control-description">ไม่แนะนำ</span>
            </label>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <h2>11. ข้อเสนอแนะ</h2>
          </div>
          <div class="col-12">
            <div class="form-group">
              <textarea id="q_11" class="form-control" name="q_11" rows="3">{{ old('q_11') }}</textarea>
            </div>
          </div>
        </div>


        <div class="row button-section">
          <div class="col-12 text-center specific-custom">
            <input class="btn btn-custom" type="submit" value="ส่งแบบสอบถาม">
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
