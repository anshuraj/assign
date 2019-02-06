<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>LinkedIn User profile details</h1>
  <ul>
    <li>Name: {{ $user_data["name"] }}</li>
    <li>Email: {{ $user_data["email"] }}</li>
    <li>Phone: N/A</li>
    <li>Profile Link: {{ $user_data["public_profile"] }}</li>
  </ul>

  <strong>Phone number is not available because of permission issue with linkedin.</strong>

  <a href="/">Home</a>
</body>
</html>