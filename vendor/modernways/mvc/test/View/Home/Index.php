<?php
/**
 * Created by PhpStorm.
 * User: jefin
 * Date: 18/01/2016
 * Time: 10:52
 */
?>
<article>
    <h1>Index</h1>
    <?php echo $entity;
    echo $action;
    echo 'I am in Index Home';
    $model = new \ModernWays\MvcTest\Model\Hello();
    $partialView('Home', 'Hello', $model);
    ?>
</article>
<div>
    <?php $appStateView(); ?>
</div>
