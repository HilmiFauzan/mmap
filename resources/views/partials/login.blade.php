<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="https://iconarchive.com/download/i102631/graphicloads/flat-finance/global.ico">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Management | Login</title>
</head>
<body style="font-family: times;">
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 d-none d-md-flex bg-image"></div>


            <!-- The content half -->
            <div class="col-md-6" style="background-color: #FFB449;">
                <div class="login d-flex align-items-center py-5">

                    <!-- Demo content-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <div class="row row-cols-2">
                                    <div class="col-5 text-center">
                                        <h3 class="display-5 fs-1 text-light" id="login" onclick="
                                            document.getElementById('display2').className='sr-only'; 
                                            document.getElementById('display1').className='none'; 
                                            document.getElementById('login').className='text-light'; 
                                            document.getElementById('register').className='';">Login</h3>
                                    </div>
                                        <div class="hr border border-dark"></div>
                                    <div class="col-5 text-center">
                                        <h3 class="display-5" id="register" onclick="document.
                                            getElementById('display1').className='sr-only'; 
                                            document.getElementById('display2').className='none';
                                            document.getElementById('register').className='text-light'; 
                                            document.getElementById('login').className='';">Register</h3>
                                    </div>
                                </div>
                                <p class="text-muted mb-4 ml-4">Registrasi dengan satu langkah mudah!</p>

                                @include('partials/login-content')
                                @include('partials/register-content')

                                    <div class="text-center d-flex justify-content-between mt-4"><p>Kembali ke <a href="/" class="font-italic text-muted"> 
                                            <u>Home</u></a></p></div>
                            </div>
                        </div>
                    </div><!-- End -->

                </div>
            </div><!-- End -->

        </div>
    </div>
</body>
</html>
