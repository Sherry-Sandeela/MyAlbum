<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MyAlbum</title>
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}" />
</head>
<body>
     <!-- Head sec  --> 
    <header class="header">
        <div class="logo">
            
            <span><strong>MyAlbum</strong> | Photo Albums Reinvented</span>
        </div>
        
        <div class="nav-buttons">
            <button class="login-btn" onclick="window.location.href='/login'">Login</button>
            
            <button class="register-btn" onclick="window.location.href='/register'">Register</button>

        </div>
    </header>

    <!-- Hero Sec -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>MAKING PHOTO<br>ALBUMS<br>TOGETHER</h1>
                <p>Share and create your photo book or<br>photo album. Relive the most<br>beautiful moments.</p>
            </div>
        </div>
    </section>
</body>
</html>
