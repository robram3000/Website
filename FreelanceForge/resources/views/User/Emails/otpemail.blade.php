<!DOCTYPE html>
<html>
<head>
    <title>Your OTP Code</title>
</head>
<body>
    <img src="{{ URL('images/Bg-Login.png') }}" alt="Overlay Image">
    <h1>Your OTP Code</h1>
  
    <p>Your OTP is: <strong>{{ $data['otp'] }}</strong></p>

    <p>Please enter this code to complete your verification.</p>
</body>
</html>
