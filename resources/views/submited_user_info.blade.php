<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>User details</h1>

  <ul>
    <li>Name: {{ $decrypted["name"] }}</li>
    <li>Email: {{ $decrypted["email"] }}</li>
    <li>Phone: {{ $decrypted["phone"] }}</li>
    <li>LinkedIn profile: {{ $decrypted["linkedin_profile"] }}</li>
    <li>Address: {{ $decrypted["address"] }}</li>
  </ul>

  <a href="/">Home</a>
</body>
</html>