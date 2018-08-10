<html>
<head>
  <title>
    Kasetsart University ICS File Generator
  </title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <style>
    body { padding-top: 70px; }
  </style>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">KUtoICS</a>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="jumbotron">
      <h1>
		สร้างไฟล์ปฏิทินตารางเรียน มก.
      </h1>
      <h2>
		ภาคต้น ปีการศึกษา 2561
      </h2>
      <!--<p>Copy the source code of <a href="https://std.regis.ku.ac.th/_Student_RptKu.php?mode=TIME_TABLE2">the timetable page</a>, and paste below, in order to generate the ICS file.</p>-->
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <form method="POST" action="/file">
          <div class="form-group">
            <label for="exampleInputEmail1">แปะซอร์สโค้ดจากหน้า<a href="https://std.regis.ku.ac.th/_Student_RptKu.php?mode=TIME_TABLE2">ตารางเรียน</a>ของระบบ</label>
            <textarea name="sourcecode" class="form-control" rows="10"></textarea>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="noClassID"> ซ่อนรหัสวิชา (01xxxxxx) จากชื่อวิชา
              </label>
            </div>
          </div>
          <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
          <button type="submit" class="btn btn-primary">สร้างตารางเรียน</button>
        </form>
      </div>
      <div class="col-sm-12 col-md-6">
		<h3>วิธีการใช้งานโดยคร่าว</h3>
		<p>คัดลอกโค้ด HTML จากหน้า<a href="https://std.regis.ku.ac.th/_Student_RptKu.php?mode=TIME_TABLE2">ตารางเรียน</a>ของระบบ regis.ku.ac.th แล้วแปะในช่องด้านข้าง ระบบจะสร้างไฟล์นามสกุล .ics มาให้</p>
		<p>หลังจากนั้น นำเข้าไฟล์ปฏิทินสู่บริการปฏิทินออนไลน์ตามคำแนะนำของผู้ให้บริการ</p>
		<ul>
		  <li>สำหรับ Calendar บนแมค double-click ไฟล์ได้ทันที</li>
		  <li>สำหรับ Google calendar <a href="https://support.google.com/calendar/answer/37118?hl=en">โปรดศึกษาจาก Google Support</a></li>
		</ul>
        <!--<img src="/guide.png" width="100%"></img>-->
      </div>
	</div>
	<div class="row">
	  <div class="col-lg-12">
		<hr>
		<p>จัดทำโดย <a href="https://srakrn.me/bio/">@srakrn</a> | ถ้า KUtoICS ช่วยให้งานของคุณน้อยลง <a href="https://paypal.me/srakrn">ลองซื้อชาให้ศิระกรสักแก้ว</a></p>
	  </div>
    </div>
  </div>
</body>
</html>
