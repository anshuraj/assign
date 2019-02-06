<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    #linkedin-signin {
      border: none;
      padding: 0;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h2>Assignment 2: Login with Linkedin</h2>

  <a href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id={{$clientId}}&redirect_uri={{$redirectUri}}&scope=r_basicprofile+r_emailaddress&state={{$csrfToken}}">
    <button id="linkedin-signin">
      <img src="/img/Linkedin-default.png"/>
    </button>
  </a>
</body>
</html>