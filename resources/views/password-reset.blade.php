<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

  <form  method="POST" action="{{route('reset-password')}}">
    @csrf

      <input type="email" name="email" id="">
      <input type="password" name="password" id="">
      <input type="password" name="password_confirmation" id="">
      <button type="submit">Reset Password</button>



  </form>
    
</body>
</html>