<?php session_start(); ?>
<?php require("botdetect.php");
require("rest.php");
require_once('sweetcaptcha.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
  <title>Device Independent CAPTCHA Features Demo</title>
  <link type="text/css" rel="Stylesheet" href="stylesheet.css" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link type="text/css" rel="Stylesheet" href="<?php echo CaptchaUrls::LayoutStylesheetUrl() ?>" />
</head>
<body>
  <form method="post" action="" id="form1">

    <h1>Device Independent CAPTCHA Features Demo</h1>

    <fieldset>
      <legend>PHP CAPTCHA validation</legend>
      <?php 
	  
	  //read these parameters through the cache
	  $x = "botdetect"; //sweetcaptcha
	  $width = 300;
	  $height  =300;
	  
	  if ($x=="botdetect"){
	  
	  echo "<label for='CaptchaCode'>Retype the characters from the picture:</label>";
      
      // Adding BotDetect Captcha to the page
        $FeaturesDemoCaptcha = new Captcha("FeaturesDemoCaptcha");
        $FeaturesDemoCaptcha->UserInputID = "CaptchaCode";
        $FeaturesDemoCaptcha->ImageStyle = null;
        $FeaturesDemoCaptcha->CodeLength = null;
		$FeaturesDemoCaptcha->ImageWidth =300; //$_POST['ImageWidth'];
		$FeaturesDemoCaptcha->ImageHeight =200;// $_POST['ImageHeight'];
		$FeaturesDemoCaptcha->SoundStyle = null;
        echo $FeaturesDemoCaptcha->Html(); 

      echo "<div class='validationDiv'>
          <input name='CaptchaCode' type='text' id='CaptchaCode' />
          <input type='submit' name='ValidateCaptchaButton' value='Validate' id='ValidateCaptchaButton' />";

           // Captcha user input validation (only if the form was sumbitted)
            if ($_POST && isset($_POST['ValidateCaptchaButton'])) {
              $isHuman = $FeaturesDemoCaptcha->Validate();
              if (!$isHuman) {
                // Captcha validation failed, show error message
                echo "<span class=\"incorrect\">Incorrect code</span>";
              } else {
                // Captcha validation passed, perform protected action
                echo "<span class=\"correct\">Correct code</span>";
              }
            }
          
      echo "</div>";
	  
	  }else if($x=="sweetcaptcha"){
	  
	  if (empty($_POST)) {
  // print sweetcaptcha in your form


  echo "<form method='post'>
    <p>This is your form you like SweetCapcha to protect</p>
    <p>You can set up it normally as you like <input type='text' name='name' value='' placeholder='Name' /></p>
    <!-- implement sweetcaptcha -->";
     echo $sweetcaptcha->get_html(); 
  
echo"  <!-- continue with your form -->
    <input type='submit' />
  </form>";


} else { 
  // looks like someone has submitted a form, let's validate it
  if (isset($_POST['sckey']) and isset($_POST['scvalue']) and $sweetcaptcha->check(array('sckey' => $_POST['sckey'], 'scvalue' => $_POST['scvalue'])) == "true") {
    // success! your form was validated
    // do what you like next ...
    echo "Success! carry on if you will";
  }
  else {
    // alas! the validation has failed, the user might be a spam bot or just got the result wrong
    // handle this as you like
    echo "Boohoo! captcha validation failed!";
  }
}	  
	  }?>
    </fieldset>

  </form>
</body>
</html>
