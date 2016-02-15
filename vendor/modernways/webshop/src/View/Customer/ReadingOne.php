<!--  editing Template for Customer entity
 modernways.be
 created by an orm apart
 Entreprise de modes et de manières modernes
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
    <form class="room" action="index.php" method="post">
        <header>
            <h2>Customer</h2>
            <div id="command-panel" class="command-panel">
                <button type="submit" value="Customer-updatingOne" name="uc">
                    <span class="icon-pencil"></span><span
                        class="screen-reader-text">Updating</span></button>

                <button type="submit" value="Customer-insertingOne" name="uc">
                    <span class="icon-plus"></span><span
                        class="screen-reader-text">Inserten</span></button>
                <button type="submit" value="Customer-editing" name="uc">
                    <span class="icon-remove"></span><span
                        class="screen-reader-text">Delete</span></button>

                <button type="submit" value="Customer-editing" name="uc">
                    <span class="icon-close"></span><span
                        class="screen-reader-text">Sluiten</span></button>
            </div>
        </header>
        <?php $partialView('Customer', 'ReadingAll', $model); ?>
        <div class="detail">
            <fieldset>
                <div>
                    <label for="Customer-NickName">Roepnaam</label>
                    <input id="Customer-NickName" name="Customer-NickName" class="text" style="width: 40%;" type="text" value="<?php echo $model->getNickName();?>"  readonly />
                </div>
                <div>
                    <label for="Customer-FirstName">Voornaam</label>
                    <input id="Customer-FirstName" name="Customer-FirstName" class="text" style="width: 40%;" type="text" value="<?php echo $model->getFirstName();?>" readonly />
                </div>
                <div>
                    <label for="Customer-LastName">Achternaam</label>
                    <input id="Customer-LastName" name="Customer-LastName" class="text" style="width: 40%;" type="text" value="<?php echo $model->getLastName();?>" readonly />
                </div>
                <div>
                    <label for="Customer-City">Stad</label>
                    <input id="Customer-City" name="Customer-City" class="text" style="width: 40%;" type="text" value="<?php echo $model->getCity();?>" readonly />
                </div>
                <div>
                    <label for="Customer-IdCountry">Land</label>
                    <input id="Customer-IdCountry" name="Customer-IdCountry" class="text" style="width: 40%;" type="text" value="<?php echo $model->getIdCountry();?>" readonly />
                </div>
                <div>
                    <label for="Customer-Phone">Telefoon</label>
                    <input id="Customer-Phone" name="Customer-Phone" class="text" style="width: 40%;" type="text" value="<?php echo $model->getPhone();?>" readonly />
                </div>
                <div>
                    <label for="Customer-Mobile">Mobiel</label>
                    <input id="Customer-Mobile" name="Customer-Mobile" class="text" style="width: 40%;" type="text" value="<?php echo $model->getMobile();?>" readonly />
                </div>
            </fieldset>

        </div>
        <div class="feedback">
        </div>
    </form>
</div>
<?php $appStateView(); ?>
