<!--  reading all Template for Customer entity
 modernways.be
 created by an orm apart
 Entreprise de modes et de manières modernes
 created on Sunday 24th of January 2016 11:56:06 AM
 file name modernways/identity/src/AnOrmApart/View/User/ReadingAll.php
-->
<div class="list">
    <?php
    if (count($model->getList()) > 0) {
        ?>
        <table>
            <?php
            foreach ($model->getList() as $item) {
                ?>
                <tr>
                    <td>
                        <a href="index.php?uc=Customer-readingOne_<?php echo $item['Id']; ?>">
                            <span class="icon-close"></span><span class="screen-reader-text">Select</span>
                    </td>
                    <td>
                        <?php echo $item['Id'];?>
                    </td>
                    <td>
                        <?php echo $item['NickName'];?>
                    </td>
                    <td>
                        <?php echo $item['FirstName'];?>
                    </td>
                    <td>
                        <?php echo $item['LastName'];?>
                    </td>
                    <td>
                        <?php echo $item['City'];?>
                    </td>
                    <td>
                        <?php echo $item['IdCountry'];?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
    else
    {
        ?>
        <p>Geen Customers gevonden!</p>
        <?php
    }
    ?>
</div>
