<div class="container-fluid floor">
    <?php $partialView('Shared', 'Header'); ?>
    <article class="showroom">
        <div class="row">
            <div class="col-sm-3">
                <a href="index.php?uc=Product-editing" class="btn btn-primary">Product</a>
            </div>
            <div class="col-sm-3">
                <a href="index.php?uc=Supplier-editing" class="btn btn-primary">Supplier</a>
            </div>
            <div class="col-sm-6">
                <img scr="http://etc.usf.edu/clipart/4700/4779/table_1_lg.gif" alt="afbeelding"/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <a href="index.php?uc=Customer-editing" class="btn btn-primary">Customer</a>
            </div>
            <div class="col-sm-3">
                <a href="index.php?uc=Order-editing" class="btn btn-primary">Order</a>
            </div>
            <div class="col-sm-3">
                <a href="index.php?uc=Country-editing" class="btn btn-primary">Country</a>
            </div>
            <div class="col-sm-3">
                <a href="index.php?uc=Category-editing" class="btn btn-primary">Category</a>
            </div>
        </div>
    </article>
    <?php $partialView('Shared', 'Footer'); ?>
</div>
