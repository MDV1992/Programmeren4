<div class="container-fluid floor">
    <?php $partialView('Shared', 'Header'); ?>

    <article class="showroom">
        <div class="jumbotron">
                <h1>Welkom bij Modernways</h1>
                <h3>Business made simple!!</h3>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <h2>Product</h2>
                <p>
                    De product beheer module biedt u de mogelijkheid uw producten continu up to date te houden.
                <br>Binnen deze module kunt u producten:
                <ul>
                    <li>Bekijken</li>
                    <li>Toevoegen</li>
                    <li>Wijzigen</li>
                    <li>Verwijderen</li>
                </ul>
                </p>
                <a href="index.php?uc=Product-editing" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Product</a>
            </div>
            <div class="col-sm-3">
                <h2>Supplier</h2>
                <p>
                    De supplier beheer module biedt u de mogelijkheid uw suppliers continu up to date te houden.
                    <br>Binnen deze module kunt u suppliers:
                <ul>
                    <li>Bekijken</li>
                    <li>Toevoegen</li>
                    <li>Wijzigen</li>
                    <li>Verwijderen</li>
                </ul>
                </p>
                <a href="index.php?uc=Supplier-editing" class="btn btn-primary"><span class="glyphicon glyphicon-transfer"></span> Supplier</a>
            </div>
            <div class="col-sm-6">

                <img src="images/Logo.png" width="50%" height="50%"/>
                <img src="images/Modernways.png" width="50%" height="50%"/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <h2>Customer</h2>
                <p>
                    De customer beheer module biedt u de mogelijkheid uw customers continu up to date te houden.
                    <br>Binnen deze module kunt u customers:
                <ul>
                    <li>Bekijken</li>
                    <li>Toevoegen</li>
                    <li>Wijzigen</li>
                    <li>Verwijderen</li>
                </ul>
                </p>
                <a href="index.php?uc=Customer-editing" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Customer</a>
            </div>
            <div class="col-sm-3">
                <h2>Order</h2>
                <p>
                    De order beheer module biedt u de mogelijkheid uw Orders continu up to date te houden.
                    <br>Binnen deze module kunt u Orders:
                <ul>
                    <li>Bekijken</li>
                    <li>Toevoegen</li>
                    <li>Wijzigen</li>
                    <li>Verwijderen</li>
                </ul>
                </p>
                <a href="index.php?uc=Order-editing" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt"></span> Order</a>
            </div>
            <div class="col-sm-3">
                <h2>Country</h2>
                <p>
                    De country beheer module biedt u de mogelijkheid uw countries continu up to date te houden.
                    <br>Binnen deze module kunt u countries:
                <ul>
                    <li>Bekijken</li>
                    <li>Toevoegen</li>
                    <li>Wijzigen</li>
                    <li>Verwijderen</li>
                </ul>
                </p>
                <a href="index.php?uc=Country-editing" class="btn btn-primary"><span class="glyphicon glyphicon-flag"></span> Country</a>
            </div>
            <div class="col-sm-3">
                <h2>Category</h2>
                <p>
                    De category beheer module biedt u de mogelijkheid uw Categories continu up to date te houden.
                    <br>Binnen deze module kunt u Categories:
                <ul>
                    <li>Bekijken</li>
                    <li>Toevoegen</li>
                    <li>Wijzigen</li>
                    <li>Verwijderen</li>
                </ul>
                </p>
                <a href="index.php?uc=Category-editing" class="btn btn-primary"><span class="glyphicon glyphicon-tags"></span> Category</a>
            </div>
        </div>
    </article>
    <?php $partialView('Shared', 'Footer'); ?>
</div>
