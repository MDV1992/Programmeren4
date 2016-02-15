<!--  editing Template for Customer entity
 modernways.be
 created by an orm apart
 Entreprise de modes et de maniÃ¨res modernes
 created on Sunday 24th of January 2016 11:56:06 AM
 file name modernways/Webshop/src/AnOrmApart/View/Customer/Editing.php
-->

<div class="floor" id="second-floor" xmlns="http://www.w3.org/1999/html">
    <div class="control-panel">
        <a href="<index.php?uc=Admin-index" class="tile _14x1">
            <span class="icon-menu2"></span>
            <span class="screen-reader-text">Home</span>
        </a>
        <h1>Customer</h1>
    </div>
    <form class="room" action="Index.php" method="post">
        <header>
            <h2>Customer</h2>
            <div id="command-panel" class="command-panel">


                <button type="submit" value="Customer-insertOne" name="uc">
                    <span class="icon-disk"></span>
                    <span class="screen-reader-text">Opslaan</span></button>


                <button type="submit" value="Customer-editing" name="uc">
                    <span class="icon-close"></span><span
                        class="screen-reader-text">Sluiten</span></button>
            </div>
        </header>
        <?php $partialView('Customer', 'ReadingAll', $model);?>

        <div class="detail">
            <fieldset>
                <div>
                    <label for="Customer-NickName">Roepnaam</label>
                    <input id="Customer-NickName" name="Customer-NickName" required
                           class="text" style="width: 32.5%;" type="text">
                </div>
                <div>
                    <label for="Customer-FirstName">Voornaam</label>
                <textarea id="Customer-FirstName" name="Customer-FirstName" required
                          style="width: 40%"></textarea>
                </div>
                <div>
                    <label for="Customer-LastName">Familienaam</label>
                <textarea id="Customer-LastName" name="Customer-LastName" required
                          style="width: 40%"></textarea>
                </div>
                <div>
                    <label for="Customer-Address1">Adres 1</label>
                <textarea id="Customer-Address1" name="Customer-Address1" required
                          style="width: 40% "></textarea>
                </div>
                <div>
                    <label for="Customer-Address2">Adres 2</label>
                <textarea id="Customer-Address2" name="Customer-Address2"
                          style="width: 40%"></textarea>
                </div>
                <div>
                    <label for="Customer-City">Stad</label>
                <textarea id="Customer-City" name="Customer-City" required
                          style="width: 40%"></textarea>
                </div>
                <div>
                    <label for="Customer-Region">Regio</label>
                <textarea id="Customer-Region" name="Customer-Region"
                          style="width: 40%"></textarea>
                </div>
                <div>
                    <label for="Customer-PostalCode">Postcode</label>
                <textarea id="Customer-PostalCode" name="Customer-PostalCode" required
                          style="width: 40%"></textarea>
                </div>
                <div>
                    <label for="Customer-IdCountry">land</label>
                <textarea id="Customer-IdCountry" name="Customer-IdCountry" required
                          style="width: 40%"></textarea>
                </div>
                <div>
                    <label for="Customer-Phone">Telefoon</label>
                <textarea id="Customer-Phone" name="Customer-Phone"
                          style="width: 40%"></textarea>
                </div>
                <div>
                    <label for="Customer-Mobile">Mobiel</label>
                <textarea id="Customer-Mobile" name="Customer-Mobile"
                          style="width: 40%"></textarea>
                </div>
            </fieldset>

        </div>
        <div class="feedback">
        </div>
    </form>
</div>
<?php $appStateView(); ?>

*/