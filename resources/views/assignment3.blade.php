<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Assignment 3</title>
</head>
<body>
  <h1>Assignment 3</h1>
  <p>Enter user information</p>
  <form method="POST" action="/user-details">
    @csrf
    <input required name="name" type="text" placeholder="Enter name" />
    <input required name="email" type="text" placeholder="Enter email" />
    <input required name="phone" type="text" placeholder="Enter phone" />
    <input required name="linkedin_profile" type="text" placeholder="Enter your linkedin profile url" />
    <textarea name="address" type="text" placeholder="Enter address" required></textarea>
    <button type="submit">Submit</button>
  </form>
</body>
</html>