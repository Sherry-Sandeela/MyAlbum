@php 
// date and time ko operate krny lia carbon library
use Carbon\Carbon;
    $expireTime = session('reset_otp_expire_time');
    $expireTimestamp = $expireTime ? \Carbon\Carbon::parse($expireTime)->timestamp:null;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Reset Code</title>
    <link rel="stylesheet" href="{{ asset('css/Registration.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>

    <form action="{{ route('reset.code.verify') }}" method="POST">
        @csrf
        <h2>Enter Verification Code</h2>

        <label for="code">Reset Code:</label><br>
        <input type="text" name="code" placeholder="Enter the code sent to your email" value="{{ old('code') }}" required><br>

        <button type="submit">Verify Code</button>

        <hr>
        <p>Code will expire in: <span id="timer">{{ $remainingSeconds }}</span></p>
        <a id="resendLink" href="{{route('reset.code.resend')}}" style="display: none">Resend Code</a>

        <script>
            let timeCount= {{ $remainingSeconds }};
            let timerElement=document.getElementById('timer');
            let resendLink=document.getElementById('resendLink');

            if(timeCount <= 0){
                timerElement.textContent = "Expired";
                 resendLink.style.display = 'inline';
          }else{
                let countdown = setInterval(() => {
                  timeCount--;
                  if(timeCount > 0){
            timerElement.textContent = timeCount;
                } else {
                   clearInterval(countdown);
                   timerElement.textContent = "Expired";
                   resendLink.style.display = 'inline';
                   }
                 }, 1000);
        }
        </script>
        <p class="login-link">
            <a href="{{ route('login') }}">Back to Login</a>
        </p>
    </form>

    <x-toastr />

</body>
</html>
