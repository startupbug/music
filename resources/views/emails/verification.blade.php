
<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
 
<body>
<h2>Welcome to the site {{$user['name']}}</h2>
<br/>
Click on link to verify your account 
<a href="{{route('verified_email',['email_token' => $user['email_token']])}}">Click Me</a>
</body>
 
</html>