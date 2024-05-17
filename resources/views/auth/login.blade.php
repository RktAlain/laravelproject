<!DOCTYPE html>
<html lang="en">

<head>
    <title>Connexion</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Report Login Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <!-- //Meta tag Keywords -->
    <link href="//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
    <!--/Style-CSS -->
    <link rel="stylesheet" href="/asset/css/login1.css" type="text/css" media="all" />
    <!--//Style-CSS -->
    <link rel="icon" type="image/png" href="/asset/img/service-information.png">
    <link rel="stylesheet" href="/asset/css/font-awesome.min.css" type="text/css" media="all">

</head>

<body>

    <!-- form section start -->
    <section class="w3l-hotair-form">
        <h1>Gestion micro-edition</h1>
        <div class="container">
            <!-- /form -->
            <div class="workinghny-form-grid">
                <div class="main-hotair">
                    <div class="content-wthree">
                        <h2>Connexion</h2>
                        <form action="{{ route('auth.login') }}" method="post">
                            @csrf
                            <input type="text" class="text" type="text" id="email" name="email"
                                value="{{ old('email') }}" placeholder="Adresse email" required="" autofocus>
                            @error('email')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                            <input type="password" class="password" type="password" id="password" name="password"
                                placeholder="Mot de passe" required="" autofocus>
                            @error('password')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                            <button class="btn" type="submit">Se connecter</button>
                        </form>
                    </div>
                    <div class="w3l_form align-self">
                        <div class="left_grid_info">
                            <img src="asset/img/Business_Salesman.gif" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <!-- //form -->
        </div>
    </section>
    <!-- //form section start -->
</body>

</html>
