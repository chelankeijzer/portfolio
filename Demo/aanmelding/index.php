<!DOCTYPE HTML>  
<html>
<head>

<style>
<!-- aanmelding =========aap========================================================================================= -->

form { width: 800px; border-style: solid;
   border-color: #f2f2f2;}

body { font-family: Arial, Helvetica, sans-serif; }

.error {color: #FF0000; width: 250px; }
.mededeling {color: #FF0000; margin-left : 115px;}

<!-- labeltekst input-box -->
label {}
.labeltekst { position : absolute; background-color: white; margin-left : 20em; }
input[type=text] { margin-left : 35em;   width: 250px; }
textarea {margin-left : 35em;  width: 250px; }
.geslachtbuttons {margin-left : 30em; }
.knopje {margin-left : 450px; }

h2   {margin-left : 300px;}
h3   {margin-left : 300px;}
p {
    display: block;
    margin-left: 350px;
    margin-right: 0;
}

<!-- ================================================================================================== -->
.sidenav {
    height: 100%;
    width: 160px;
    position: fixed;
    z-index: 3;
    top: 0;
    left: 0;
    overflow-x: hidden;
    padding-top: 20px;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.main {
    margin-left: 160px; /* Same as the width of the sidenav */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .side


<!-- ================================================================================================== -->
</style>

</head>
 
<body >

<!-- ================================================================================================== -->

<?php

/* Set internal character encoding to UTF-8 */
/* mb_internal_encoding("UTF-8"); */

/* Display current internal character encoding */
/* echo mb_internal_encoding(); */


// definieer variable-en en zet ze op een lege waarde
$loginOk = False ;
$voornaamErr = $bedrijfsnaamErr  = $achternaamErr = $postcodeErr = $plaatsErr = $emailErr = $geslachtErr = $websiteErr = $adresErr = "";
$voornaam = $bedrijfsnaam = $achternaam = $postcode = $plaats = $email = $geslacht = $comment = $website = $adres = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // controleer invoer

    if (empty($_POST["bedrijfsnaam"])) {
    $bedrijfsnaamErr = "Bedrijfsnaam is verplicht";
  } else {
    $bedrijfsnaam = test_input($_POST["bedrijfsnaam"]);
    // controleer of voornaam alleen maar letters and spaties bevat
    if (!preg_match("/^[a-zA-Z ]*$/",$bedrijfsnaam)) {
      $bedrijfsErr = "Alleen letters en spaties toegestaan"; 
    }
  }
  
  
  if (empty($_POST["voornaam"])) {
    $voornaamErr = "voornaam is verplicht";
  } else {
    $voornaam = test_input($_POST["voornaam"]);
    // controleer of voornaam alleen maar letters, spaties en punt bevat
    if (!preg_match("/^[a-zA-Z. ]*$/",$voornaam)) {
      $voornaamErr = "Alleen letters en spaties toegestaan"; 
    }
  }

  
  if (empty($_POST["achternaam"])) {
    $achternaamErr = "achternaam is verplicht";
  } else {
    $achternaam = test_input($_POST["achternaam"]);
    // controleer of voornaam alleen maar letters and spaties bevat
    if (!preg_match("/^[a-zA-Z ]*$/",$achternaam)) {
      $achternaamErr = "Alleen letters en spaties toegestaan"; 
    }
  }
  
  
  if (empty($_POST["adres"])) {
    $adresErr = "Adres is verplicht";
  } else {
    $adres = test_input($_POST["adres"]);
    // check if adres only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$adres)) {
      $adresErr = "Alleen letters, cijfers en spaties toegestaan"; 
    }
  }
  

  if (empty($_POST["postcode"])) {
    $postcodeErr = "Postcode is verplicht";
  } else {
    $postcode = test_input($_POST["postcode"]);
    // check if postcode only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9 ]*$/",$postcode)) {
      $postcodeErr = "Alleen letters, cijfers en spaties toegestaan"; 
    }
  }

  if (empty($_POST["plaats"])) {
    $plaatsErr = "Plaats is verplicht";
  } else {
    $plaats = test_input($_POST["plaats"]);
    // check if voornaam only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$plaats)) {
      $plaatsErr = "Only letters and white space allowed"; 
    }
  }
  
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is verplicht";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
	  $loginOk = False	;
    } else { $loginOk = True ;}
  }
    

	if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["geslacht"])) {
    $geslachtErr = "geslacht is verplicht";
  } else {
    $geslacht = test_input($_POST["geslacht"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!-- ================================================================================================== -->




<!--  
<div style="background-color: #ff0000;height: 100%;width: 160px;position: fixed;z-index: 3;
top: 0;left: 0;overflow-x: hidden;padding-top: 20px;"class="sidenav">
  <a href="#about"></a>
.</div>
--> 


<h2>Aanmelding</h2>

<p><span class="mededeling">De met een ( * ) gemarkeerde velden moeten worden ingevuld.</span></p>
<form   method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  <div class="inputbox" ; >

<!-- Bedrijf info -->
    <span class="labeltekst">Bedrijfsnaam:</span>
    <input type="text" name="bedrijfsnaam" value="<?php echo $bedrijfsnaam;?>">
    <span class="error">* <?php echo $bedrijfsnaamErr;?></span>
    <br><br>

    
    <span class="labeltekst">adres:</span>
    <input type="text" name="adres" value="<?php echo $adres;?>">
    <span class="error">* <?php echo $adresErr;?></span>
    <br><br>

    <span class="labeltekst">postcode:</span>
    <input type="text" name="postcode" value="<?php echo $postcode;?>">
    <span class="error">* <?php echo $postcodeErr;?></span>
    <br><br>
  
    <span class="labeltekst">plaats:</span>
    <input type="text" name="plaats" value="<?php echo $plaats;?>">
    <span class="error">* <?php echo $plaatsErr;?></span>
    <br><br>

    <span class="labeltekst">website:</span>
    <input type="text" name="website" value="<?php echo $website;?>">
    <span class="error"><?php echo $websiteErr;?></span>
    <br>
	
 
<!-- Contactpersoon --> 
<h3>Contactpersoon</h3>

  <span class="labeltekst">geslacht:</span>

  <div class="geslachtbuttons">
  <input type="radio" name="geslacht" <?php if (isset($geslacht) && $geslacht=="vrouw") echo "checked";?> value="vrouw">vrouw
  <input type="radio" name="geslacht" <?php if (isset($geslacht) && $geslacht=="man") echo "checked";?> value="man">man
  <input type="radio" name="geslacht" <?php if (isset($geslacht) && $geslacht=="anders") echo "checked";?> value="anders">anders  
  <span class="error">* <?php echo $geslachtErr;?></span>
  </div>

  <br>
 
    <span class="labeltekst">voornaam:</span>
    <input type="text" name="voornaam" value="<?php echo $voornaam;?>">
    <span class="error">* <?php echo $voornaamErr;?></span>
    <br><br>
  
    <span class="labeltekst">achternaam:</span>
    <input type="text" name="achternaam" value="<?php echo $achternaam;?>">
    <span class="error">* <?php echo $achternaamErr;?></span>
    <br><br>

    <span class="labeltekst">e-mail:</span>
    <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>

    <span class="labeltekst">commentaar:</span>
    <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
    <br><br>

  </div>

  <input type="submit" name="submit" value="aanmelden" class="knopje">
<br><br>


<!-- Contactpersoon
  <input type="submit" name="submit" value="aanmelden" margin-left : 100px >  
--> 
  
  </form>
  

<!-- ================================================================================================== -->

<?php

/* 
if ($loginOk == True) {
   echo "Login OK";
   echo $email ;
   readfile("bugatti.html");
} else {
   echo "Login bad";
}

exit;

 */
echo "<h2><br>Je invoer:<br></h2>";

echo "<p> <font color=blue>bedrijfsnaam : {$bedrijfsnaam} </font> </p>";
echo "<p> <font color=blue>voornaam : {$voornaam} </font> </p>";
echo "<p> <font color=blue>achternaam : {$achternaam} </font> </p>";

echo "<p> <font color=blue>adres : {$adres} </font> </p>";
echo "<p> <font color=blue>postcode : {$postcode} </font> </p>";
echo "<p> <font color=blue>plaats : {$plaats} </font> </p>";
echo "<p> <font color=blue>email : {$email} </font> </p>";
echo "<p> <font color=blue>website : {$website} </font> </p>";
echo "<p> <font color=blue>geslacht : {$geslacht} </font> </p>";
echo "<p> <font color=blue>comment : {$comment} </font> </p>";


?>
<!-- ================================================================================================== -->



</body>
</html>
