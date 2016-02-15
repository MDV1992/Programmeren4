<?php
/**
 * Created by PhpStorm.
 * User: jefin
 * Date: 13/01/2016
 * Time: 19:25
 */
// require('../../../autoload.php');

require __DIR__ . '/vendor/autoload.php';

$uc = 'Home-Index';
$appState = new \ModernWays\Dialog\Model\NoticeBoard();
$route = new \ModernWays\Mvc\Route($appState);
$route->setUrl($uc);
$routeConfig = new \ModernWays\Mvc\RouteConfig('\ModernWays\Webshop', $route, $appState);
$view = $routeConfig->invokeActionMethod();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Webwinkel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="css/app.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
    call_user_func($view);
?>

</body>
</html>
