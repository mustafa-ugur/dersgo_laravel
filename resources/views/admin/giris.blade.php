@if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->yonetici)
    <script type="text/javascript">
        window.location = "http://127.0.0.1:8000/admin/index"
    </script>
@else
    <!DOCTYPE html>
    <html>
    <head>
        <title>Admin Panel</title>
        <link rel="stylesheet" type="text/css" href="/assets_admin/login_css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <img class="wave" src="/assets_admin/login_img/wave.png">
    <div class="container">
        <div class="img">
            <img src="/assets_admin/login_img/bg.svg">
        </div>
        <div class="login-content">
            <form action="{{ route('admin.giris') }}" method="post">
                {{ csrf_field() }}
                <img src="/assets_admin/login_img/avatar.svg">
                <h2 class="title">Hoşgeldiniz</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>E-Posta</h5>
                        <input type="text" name="email" class="input">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Şifre</h5>
                        <input type="password" name="sifre" class="input">
                    </div>
                </div>
                <a href="#">Şifremi Unuttum</a>
                <input type="submit" class="btn" value="Giriş Yap">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="/assets_admin/login_js/main.js"></script>
    </body>
    </html>
@endif
