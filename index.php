<?php
require "ad/PDO.php";
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link href='https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap' rel='stylesheet' type='text/css'>
    <title>Document</title>
</head>

<body>
    <!-- start of navbar -->
    <?php
    include "navbar.php";
    ?>

    <!-- principal picture -->
    <img id="principal" src="./images/photo-principal.jpg" alt="">
    <div class="title">FIND OUT A PLACE <br> YOU'LL LOVE TO LIVE</div>
    <!-- end of principal picture -->
    <section>
        <button class="bt-S">Sales</button>
        <div class="trait"></div>
        <button class="bt-S">Rentals</button>
        <form>
            <div>
                <input type="search" id="maRecherche" name="q" placeholder="all types…" />
                <img class="search" src="./images/search.webp" alt="">
                <button class="bt-S">Search</button>
            </div>
        </form>
    </section>
    <!-- end of navbar -->

    <!-- START of contained -->

    <div class="Rent">
        <img class="pic1" src="./images/rent.png" alt="">
        <h2>Best villa rentals</h2>
    </div>
    <button class="see-more">Show all >> </button>

    <!-- start of first card-rental -->
    <?php
 
    $sql = ("SELECT * FROM listings");
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll();

    echo '<main>';
    foreach ($result as  $card) {
        if($card['transaction_type']=='rent' ) {
            include "card.php";
        }}
     
    

    echo '</main>';
    ?>
    </div>



    <div id="title2">Are you looking for a rental home?</div>
    <article>
        <div class="part1">
            <img class="pic3" src="./images/houses.png" alt="">
            <div class="title-pic1">All properties in one place</div>
            <p class="parag-pic3">We are a rental home search engine. In addition to <br> the many landlords who upload their ads on our <br> platform, we
                scour the web in search of available <br> properties, and gather them in one place.</p>
        </div>
        <div class="part1">
            <img class="pic2" src="./images/save-money.jpg" alt="">
            <div class="title-pic3">Compare and save money</div>
            <p class="parag-pic3">Filter your search by city, rent, home type etc. in <br> order to display a list of homes fitting accurately <br> with your research criteria. You can also create a <br> Search Agent, which will send you an email when <br> a new property that corresponds to your criteria is <br> uploaded on our site.</p>
        </div>
        <div class="part1">
            <img class="pic3" src="./images/contact.jpg" alt="">
            <div class="title-pic2">Quick contact</div>
            <p class="parag-pic3">When you find the rental of your dreams, you will <br> be able to get in touch with the landlord in order to <br> set up a visit, and then get the keys to your new <br> home. Should you need any help, feel free to get <br> in touch with our customer service.</p>
        </div>
    </article>

    <!-- end of transition2 -->

    <div class="sale">
        <img class="pic-sale" src="./images/sale-annoc.png" alt="">
        <h2>Recommended Property</h2>
    </div>
    <button class="see-more">Show all >> </button>
    <?php
    echo '<main>';
    foreach ($result as $cards) {
        if($cards['transaction_type']=='sale' ) {
        include "card_sale.php";
    }};
    echo '</main>';
    ?>

    <?php
    include "footer.php";
    ?>
</body>

</html>