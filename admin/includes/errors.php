<?php
if (isset($errors)) {
    if (count($errors) > 0) { ?>
        <div class="col-xs-12 alert alert-warning">
            <?php foreach ($errors as $error) {
                echo "<p >" . $error . "</p>";
            }
            ?>
        </div>
        <?php
    }
}
?>