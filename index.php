<?php
/**
 * Created by PhpStorm.
 * User: jefin
 * Date: 25/01/2016
 * Time: 19:51
 */
// laadt de composer autoloader
require __dir__ . '/vendor/autoload.php';

$appState = new \ModernWays\AnOrmApart\NoticeBoard();
$route = new \ModernWays\Mvc\Route($appState, 'Admin-Index');
$routeConfig = new \ModernWays\Mvc\RouteConfig('\ModernWays\Webshop', $route, $appState);
$view = $routeConfig->invokeActionMethod();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="css/app.css" rel="stylesheet" type="text/css"/>
    <title>Webshop</title>
</head>
<body>
    <?php call_user_func($view); ?>
</body>
</html>
