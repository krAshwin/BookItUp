<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Book It Up</title>
    <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body style="background-image: linear-gradient(to right, #ff8177 0%, #ff867a 0%, #ff8c7f 21%, #f99185 52%, #cf556c 78%, #b12a5b 100%);">
    <nav class="navbar navbar-light navbar-expand-md" style="height: 100px;">
        <div class="container-fluid"><a class="navbar-brand bookitup" href="#" style="position: absolute;left: 0;top: 20px;padding: 10px;color: #f45147;">BookItUp!&nbsp; -&nbsp; login</a><button class="navbar-toggler" data-toggle="collapse"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button></div>
    </nav>
    <div class="login-clean">
        <?php include("loginPHP.php");?>
        <form method="post">
            <div class="illustration"><i class="icon ion-log-in"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="uid" placeholder="Username" style="font-family: Montserrat, sans-serif;" autofocus=""></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" style="font-family: Montserrat, sans-serif;"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" style="font-family: Montserrat, sans-serif;">Log In</button><h5 style="color:red; float:left; font-size:12px;" class="mt-2"><?php echo $error; ?></h5></div><a class="forgot" href="registration.php" style="font-family: Montserrat, sans-serif;">New User? Register here</a></form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>