<?php
require 'functions.php';
$connection = dbConnect();

$voornaam = '';
$achternaam = '';
$email = '';
$bericht = '';

//opslag variabele (array) voor errors
$errors = [];

//checken voor gegevens
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $voornaam = $_POST['Voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $bericht = $_POST['bericht'];
    $tijdstip = date('Y-m-d H:i:s');

    //fouten controleren / input valideren
    if(isEmpty($voornaam) ){
        $errors['Voornaam'] = 'Please provide a name';
    }

    if(isEmpty($achternaam) ){
        $errors['achternaam'] = 'Please provide a surname';
    }

    if(!isValidEmail($email)){
        $errors['email'] = 'Please provide a valid email';
    }

    if(!hasMinLength($bericht, 5)){
        $errors['bericht'] = 'question cannot be shorter than 5 characters';
    }

    //print_r($errors);

    if( count($errors) == 0){


    $sql = "INSERT INTO `berichten` (`Voornaam`, `achternaam`, `email`, `bericht`, `tijdstip`) 
            VALUES (:Voornaam, :achternaam, :email, :bericht, :tijdstip); ";
   $statement = $connection->prepare($sql);
   $params = [
    'Voornaam' => $voornaam,
    'achternaam' => $achternaam,
    'email' => $email,
    'bericht' => $bericht,
    'tijdstip' => $tijdstip
   ];
   $statement->execute($params);

   //redirecten naar contact pagina
   header('Location: bedankt.html');
   exit;
}

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neural</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js" defer></script>
</head>


<body id="js--body">
    <header class="header"> 
        <h1 id="js--menu" class="headerButton">contact</h1>
      
    </header>

     <footer id="contact" class="footer">

        <form action="contact.php" method="POST" novalidate>
            <h2 class="text-contact">Get in touch with us!</h2>
            <?php if(!empty($errors['Voornaam'])):?>
                    <p class="form__error"><?php echo $errors['Voornaam']?></p>
            <?php endif;?>
                    
            <div>
                <label for="Voornaam">Name</label>
                <input id="Voornaam" name="Voornaam" value="<?php echo $voornaam;?>" type="text" required>
            </div>
            <div>
                <?php if(!empty($errors['achternaam'])):?>
                        <p class="form__error"><?php echo $errors['achternaam']?></p>
                <?php endif;?>
                    
                <label for="achternaam">last name</label>
                <input id="achternaam" name="achternaam" type="text" value="<?php echo $achternaam;?>"  required>
            </div>
            <div>
            <?php if(!empty($errors['email'])):?>
                    <p class="form__error"><?php echo $errors['email']?></p>
            <?php endif;?>
                    
            <label for="Voornaam">Email</label>
            <input class="email" id="email" name="email" type="email" value="<?php echo $email;?>"  required>
            </div>
            <div>
            <?php if(!empty($errors['bericht'])):?>
                    <p class="form__error"><?php echo $errors['bericht']?></p>
            <?php endif;?>
                    
            <label for="Voornaam">Question</label>
            <textarea id="bericht" name="bericht" class="bigText"><?php echo $bericht;?></textarea>
            </div>
            <input id="send" class="submit" type="submit" value="Send">
        </form>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2420.4892390042455!2d5.1070148155817225!3d52.65114023425479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c8a8936fe0db6b%3A0x3af534d1cba40772!2sBreitnerhof%2C%20Hoorn!5e0!3m2!1snl!2snl!4v1655110320987!5m2!1snl!2snl" width="450" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </footer>
    
    
    
</body>
</html>