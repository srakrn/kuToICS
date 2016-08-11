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
        Kasetsart U. ICS File Generator
      </h1>
      <p>Copy the source code of <a href="https://std.regis.ku.ac.th/_Student_RptKu.php?mode=TIME_TABLE2">the timetable page</a>, and paste below, in order to generate the ICS file.</p>
    </div>
    <form method="POST" action="/file">
      <div class="form-group">
        <label for="exampleInputEmail1">Paste your source code here</label>
        <textarea name="sourcecode" class="form-control"></textarea>
      </div>
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>
</html>
