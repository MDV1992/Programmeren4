<div class="floor" id="second-floor" xmlns="http://www.w3.org/1999/html">
    <div class="control-panel">
        <a href="index.php?uc=Admin-index" class="tile _14x1">
            <span class="icon-menu2"></span>
            <span class="screen-reader-text">Home</span>
        </a>

        <h1>Customer</h1>
    </div>
    <form class="room" action="index.php" method="post">
        <header>
            <h2>Customer</h2>

            <div id="command-panel" class="command-panel">
                <button type="submit" value="Customer-updateOne" name="uc">
                    <span class="icon-disk"></span>
                    <span class="screen-reader-text">Update</span>
                </button>
                <a href="index.php?uc=Customer-editing">
                    <span class="icon-close"></span><span
                        class="screen-reader-text">Sluiten</span></a>
            </div>
        </header>
        <div class="detail">
            <fieldset>
                <div>
                    <input id="Customer-Id" name="Customer-Id" style="width: 6em;"
                           type="hidden" value="<?php echo $model->getId(); ?>" readonly/>
                </div>
                <div>
                    <label for="Customer-NickName">Roepnaam</label>
                    <input id="Customer-NickName" name="Customer-NickName"
                           class="text" style="width: 32.5%;" type="text"
                           value="<?php echo $model->getNickName(); ?>" required/>
                </div>
                <div>
                    <label for="Customer-FirstName">Voornaam</label>
                    <input id="Customer-FirstName" name="Customer-FirstName"
                           class="text" style="width: 32.5%;" type="text"
                           value="<?php echo $model->GetFirstName(); ?>" required/>
                </div>
                <div>
                    <label for="Customer-LastName">Achternaam</label>
                    <input id="Customer-LastName" name="Customer-LastName"
                           class="text" style="width: 32.5%;" type="text"
                           value="<?php echo $model->GetLastName(); ?>" required/>
                </div>
                <div>
                    <label for="Customer-Address1">Adres 1</label>
                    <input id="Customer-Address1" name="Customer-Address1"
                           class="text" style="width: 32.5%;" type="text"
                           value="<?php echo $model->GetAddress1(); ?>" required/>
                </div>
                <div>
                    <label for="Customer-Address2">Adres 2</label>
                    <input id="Customer-Address2" name="Customer-Address2"
                           class="text" style="width: 32.5%;" type="text"
                           value="<?php echo $model->GetAddress2(); ?>"/>
                </div>
                    <label for="Customer-City">Stad</label>
                    <input id="Customer-City" name="Customer-City"
                            class="text" style="width: 32.5%;" type="text"
                            value="<?php echo $model->GetCity(); ?>" required/>
                </div>
                <div>
                    <label for="Customer-Region">Regio</label>
                    <input id="Customer-Region" name="Customer-Region"
                            class="text" style="width: 32.5%;" type="text"
                            value="<?php echo $model->GetRegion(); ?>"/>
                </div>
                <div>
                    <label for="Customer-PostalCode">Postcode</label>
                    <input id="Customer-PostalCode" name="Customer-PostalCode"
                            class="text" style="width: 32.5%;" type="text"
                            value="<?php echo $model->GetPostalCode(); ?>" required/>
                </div>
                <div>
                    <label for="Customer-IdCountry">Land</label>
                    <input id="Customer-IdCountry" name="Customer-IdCountry"
                            class="text" style="width: 32.5%;" type="text"
                            value="<?php echo $model->GetIdCountry(); ?>" required/>
                </div>
                <div>
                    <label for="Customer-Phone">Telefoon</label>
                    <input id="Customer-Phone" name="Customer-Phone"
                            class="text" style="width: 32.5%;" type="text"
                            value="<?php echo $model->GetIdPhone(); ?>"/>
                </div>
                <div>
                    <label for="Customer-Mobile">Mobiel</label>
                    <input id="Customer-Mobile" name="Customer-Mobile"
                            class="text" style="width: 32.5%;" type="text"
                            value="<?php echo $model->GetMobile(); ?>"/>
                </div>
        </div>
        </fieldset>
</div>
<div class="feedback">
</div>
</form>
<?php $partialView('Customer', 'ReadingAll', $model); ?>
</div>
<?php $appStateView(); ?>

