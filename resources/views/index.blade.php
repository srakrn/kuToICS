<html>
<head>
  <title>
    Kasetsart University ICS File Generator
  </title>
</head>
<body>
  <h1>
    Kasetsart University ICS File Generator
  </h1>
  <hr/>
  <p>Paste the source code from timetable page here</p>
  <form method="POST" action="/file">
    <textarea name="sourcecode"></textarea>
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <button type="submit">Submit</button>
  </form>
</body>
</html>
