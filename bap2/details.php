<?php
require 'functions.php';
$connection = dbConnect();




$id = $_GET['id'];
$check_int = filter_var($id, FILTER_VALIDATE_INT);
if($check_int == false){
    echo "dit is geen getal (integer)";
    exit;
}



$statement = $connection->prepare('SELECT * FROM `products` WHERE id=?');
$params = [$id];
$statement->execute($params);
$product = $statement->fetch(PDO::FETCH_ASSOC);

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
        <img class="logo1" src="img/neaural.png" alt="">
        <input list="products1" id="placeholder" type="text" placeholder="search for a product">
        <datalist id="products1">
            <option value="spot">
            <option value="mavic 2">
            <option value="ultimaker3">
            <option value="os0 lidar sensor">
            <option value="stretch">
            <option value="spot arm"></option>
          </datalist>
        <button id="js--menu" class="headerButton">≡</button>
      
    </header>
    <nav id="js--nav" class="mainNavigation">
        <ul class="mainNavigationList">
            <li class="mainNavigationListItem">
                <a href="index.php">Home</a>
             </li>
             <li class="mainNavigationListItem">
                <a href="#products">Products</a>
             </li>
             <li class="mainNavigationListItem">
                <a href="">what we do</a>
             </li>
             <li class="mainNavigationListItem">
                <a href="#contact">contact</a>
             </li>  
        </ul>
    </nav>
    <main>
        <figure class="bigFigure">
            <img src="img/spot.jpg" alt="verschillende Shinto gates achter elkaar bij de Fox Shrine in Kyoto, Japan.">
            <h2 class="logo"><?php echo $product['titel']; ?></h2>
            <h2 class="logo"><?php echo $product['beschrijving']; ?></h2>
            <button class="learnmore">$<?php echo $product['prijs']; ?></button>
            <h4></h4>
        </figure>
       
    
    
</body>
</html>