<?php
require 'functions.php';
$connection = dbConnect();

$result = $connection->query('SELECT * FROM `products`');

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
                <a href="">Home</a>
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
            <h2 class="logo">improving life with <br> robotics</h2>
            <button class="learnmore">learn more</button>
            <h4></h4>
        </figure>
        <section class="info">
            <div class="block">
                <h2 class="infoTitle">What we do</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> Reprehenderit cumque quaerat eligendi nulla quos. Excepturi totam error <br> obcaecati voluptatum ratione asperiores quisquam voluptate, <br> et non quod eligendi. Laudantium, consectetur neque.
            Atque voluptatum perferendis sunt animi? <br>  Facere nisi amet saepe quam. Voluptatem iusto, praesentium ipsa, iste atque <br> voluptatibus architecto magnam aperiam molestias eligendi ipsum iure. A fuga architecto iure quam fugit!</p>
            <button class="buy">learn more</button>

            


            </div>
           
           
        </section>
        <section id="products" class="collections">
            <h2 class="collectionsTitle">products</h2>
            <ul class="collectionsList">


            <?php foreach($result as $row):?>
                <li class="collectionsListItem">
                    <img style="background-image: url(img/<?php echo $row['foto']; ?>)">
                    <h2 class="item"><?php echo $row['titel']; ?></h2>
                    <p class="desc"> <?php echo $row['beschrijving']; ?></p>
                    <p class="desc"><?php echo $row['prijs']; ?></p>
                </li>
            <?php endforeach; ?>



              
            </ul>
        </section>
        <section class="section section--third">
            
            <ul class="reviews">
                <li class="review">
                    <p>1. Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi dolor impedit facere, laboriosam beatae esse eos iure suscipit ducimus a praesentium officia vitae saepe itaque aperiam odio reiciendis assumenda sit?</p>
                </li>
                <li class="review">
                    <p>2. Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi dolor impedit facere, laboriosam beatae esse eos iure suscipit ducimus a praesentium officia vitae saepe itaque aperiam odio reiciendis assumenda sit?</p>
                </li>
                <li class="review">
                    <p>2. Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi dolor impedit facere, laboriosam beatae esse eos iure suscipit ducimus a praesentium officia vitae saepe itaque aperiam odio reiciendis assumenda sit?</p>
                </li>
               
               
               
    </main>
    <footer id="contact" class="footer">
        
       
    </footer>
    
    
</body>
</html>