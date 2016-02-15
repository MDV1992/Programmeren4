<?php

require('../../../autoload.php');

// instanciate noticeboard class
// make an object of the Feedback class
// object maken van de Feedback klasse
$uc = 'Home-Index';
$appState = new \ModernWays\Dialog\Model\NoticeBoard();
$route = new \ModernWays\Mvc\Route($appState);
$route->setUrl($uc);
$routeConfig = new \ModernWays\Mvc\RouteConfig('\ModernWays\MvcTest', $route, $appState);
$view = $routeConfig->invokeActionMethod();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>MVC test</title>
</head>
<body>

<?php call_user_func($view); ?>

</body>
</html>

