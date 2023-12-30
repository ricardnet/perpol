<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Portal Perpus</title>

  <!-- Favicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="asset/img/favicon.png" rel="icon">
  <!-- Bootstrap core CSS -->
  <link href="asset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="asset/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="asset/css/style.css" rel="stylesheet">
  <link href="asset/css/style-responsive.css" rel="stylesheet">
</head>

<body>
    <!--Coding login-->
    <div id="login-page">
        <div class="container">
            <form class="form-login" action="proses-login.php" method="POST">
                <h2 class="form-login-heading">Sign in now</h2>

                <div class="login-wrap">
                    <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
                    <br>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <br>
                    <button class="btn btn-theme btn-block" type="submit">
                        <i class="fa fa-lock"></i> SIGN IN
                    </button>
                </div>
                 <div class="col">
        <a href="https://www.facebook.com/" class="fb btn">
          <i class="fa fa-facebook fa-fw"></i> Login with Facebook
        </a>
        <a href="https://twitter.com/" class="twitter btn">
          <i class="fa fa-twitter fa-fw"></i> Login with Twitter
        </a>
        <a href="https://www.instagram.com/" class="instagram btn"><i class="fa fa-instagram fa-fw">
          </i> Login with Instagram
        </a>
        <a href="https://ads.google.com/" class="google btn"><i class="fa fa-google fa-fw">
          </i> Login with Google+
        </a>
      </div>
            </form>
        </div>
    </div>
    <!--Coding login-->

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="asset/lib/jquery/jquery.min.js"></script>
  <script src="asset/lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="asset/lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("asset/img/gambar.jpg", {
      speed: 500
    });
  </script>
</body>
</html>
