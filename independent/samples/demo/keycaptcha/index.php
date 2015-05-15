<form method="POST" action="">
    <input name="form_field"/>
    <?php
    if (!class_exists('KeyCAPTCHA_CLASS')) {
        // Replace /path_to_keycaptcha_file/ with real path to keycaptcha.php file
        include('keycaptcha.php');
    }
    $kc_o = new KeyCAPTCHA_CLASS();
    echo $kc_o->render_js();
    ?>  
    <input type="hidden" name="capcode" id="capcode" value="false" />
    <input type="submit" value="Save" id="postbut" class="button" />
</form> 
<?php
    if (isset($_POST['form_field'])){
        if (!class_exists('KeyCAPTCHA_CLASS')) {
            // Replace /path_to_keycaptcha_file/ with real path to keycaptcha.php file
            include('keycaptcha.php');
        }
        $kc_o = new KeyCAPTCHA_CLASS();
        if ($kc_o->check_result($_POST['capcode'])) {
            // A visitor solved CAPTCHA task correctly
            // Add your code that will save the data of your form
        }
        else {
            // A visitor solved CAPTCHA task incorrectly
            // Add your code that will generate an error message
        }
    }
?> 