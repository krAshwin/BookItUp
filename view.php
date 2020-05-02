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
<style>
.search-btn:hover
{
    background-color: white;
    color: black !important;

}

.del-btn:hover{
    background-color: black;
    color:white !important;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
}
</style>
<?php
session_start();
if (!$_SESSION['suname']) {
    header('Location: login.php');
}
?>

<body>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-search" style="width: 100%;">
        <div class="container"><a class="navbar-brand" href="home.php" style="font-family: Montserrat, sans-serif;">BookItUp!</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><i class="fas fa-hamburger" style="color: white;"></i><span class="sr-only">Toggle navigation</span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <form class="form-inline mr-auto" target="_self" method="POST">
                    <div class="form-group"><label for="search-field" style="width: 50px;"></label><input class="form-control search-field" type="search" id="search-field" name="searchEvents" placeholder="Search for locations" style="font-family: Montserrat, sans-serif;color: white;" autocomplete="on"><button class="btn btn-outline-primary btn-sm search-btn" type="submit" style="border-radius: 50%;border: none;color:white; border-color:white;" name="search"><i class="fa fa-search"></i></div>
                </form>

                <?php
                if(isset($_POST['search'])) 
                echo '<script>window.location.href = "search.php?search_key='.$_POST['searchEvents'].'"</script>';
                ?>

                <?php if($_SESSION['suname'] == "admin") 
                echo '<ul class = "nav navbar-nav">
                <li class="nav-item" role="presentation"><a class="nav-link" href="admin_panel.php" style="font-family: Montserrat, sans-serif;">Admin Panel</a></li>
                </ul>'?><ul class = "nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="history.php" style="font-family: Montserrat, sans-serif;">Purchased History</a></li> 
                </ul>
                
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="cart.php" style="font-family: Montserrat, sans-serif;">Cart</a></li>
                </ul>
                <form method="POST">
                    <button class="btn btn-outline-light action-button" type="submit" role="button" name="logout" style="font-family: Montserrat, sans-serif;" data-toggle="tooltip" title="Click to logout!" data-placement="bottom" ><?php echo $_SESSION['suname']?></button>
                </form>
                <script>
                    $(document).ready(function(){
                    $('[data-toggle="tooltip"]').tooltip();
                    });
                </script>
                <?php
                if(isset($_POST['logout'])){
                    session_destroy();
                    header("Location: login.php");
                }
                ?>
            </div>
        </div>
    </nav>
    <div class="container">
        <p style="font-family: Montserrat, sans-serif;font-weight: normal;font-size: 24px;"><strong>Events</strong></p>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <?php
                include("viewPHP.php");
                displayView();
            ?>
        </div>
    </div>
    <div class="footer-dark" style="margin-top: 50px;">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li></li>
                            <li><a href="feedback.php">Feedback</a></li>
                            <li><a href="view.php">Events</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li></li>
                            <li><a href="about_us.php">Team</a></li>
                            <li></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>Book It Up!</h3>
                        <p></p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">BookItUp! @ 2020</p>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>