<?php
session_start();
$uris = explode("/", $_SERVER['PHP_SELF']);
$page = array_pop($uris);

if (isset($_POST['loginname'])) {
    $_SESSION['user'] = $_POST['loginname'];
    header('Location: index.php');
    exit();
}

if (empty($_SESSION['user'])) {
    if ($page != 'login.php' AND $page != 'index.php') {
        header('Location: login.php');
        exit();
    }
} else {

    if ($page === 'login.php') {
        header('Location: index.php');
        exit();
    }

}
if (isset($_GET['add_to_cart'])) {
    if (isset($_COOKIE['card'])) {
        $counter = $_COOKIE['card'][$_GET['add_to_cart']];
    } else {
        $counter = 0;
    }
    setcookie("card[" . $_GET['add_to_cart'] . "]", $counter+1);
    header('Location: index.php');

}
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit();
}
$arrayCookies = [
    46 => [
        "img" => "assets/img/product-46.jpg",
        "name" => "Pecan nuts",
        "cooker" => "Penny"
    ],
    36 => [
        "img" => "assets/img/product-36.jpg",
        "name" => "Chocolate chips",
        "cooker" => "Bernadette"
    ],

    32 => [
        "img" => "assets/img/product-32.jpg",
        "name" => "M&M's&copy; cookies",
        "cooker" => "Penny"
    ],
    58 => [
        "img" => "assets/img/product-58.jpg",
        "name" => "Chocolate cookie",
        "cooker" => "Bernadette"

    ]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Cookie Factory</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/styles.css"/>
</head>
<body>
<header>
    <!-- MENU ENTETE -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./">
                    <img class="pull-left" src="assets/img/cookie_funny_clipart.png" alt="The Cookies Factory logo">
                    <h1>The Cookies Factory</h1>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Chocolates chips</a></li>
                    <li><a href="#">Nuts</a></li>
                    <li><a href="#">Gluten full</a></li>
                    <li>
                        <a href="./cart.php" class="btn btn-warning navbar-btn">
                            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                            Cart
                        </a>
                    </li>
                    <li>
                        <?php
                        if (!empty($_SESSION['user'])) :
                            ?>
                            <a href="?logout" class="btn btn-warning navbar-btn">
                                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                Logout
                            </a>
                            <?Php
                        else :
                            ?>
                            <a href="login.php" class="btn btn-warning navbar-btn">
                                <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                                Login
                            </a>
                            <?php
                        endif;
                        ?>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="container-fluid text-right">
        <strong><?php echo(!empty($_SESSION['user']) ? "Bienvenue " . $_SESSION['user'] : "Hello Wilder !") ?></strong>
    </div>
</header>