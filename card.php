


<?php 
session_start();
?>
<div class="card">
    <img class="house1" src="<?php echo $card['image']; ?>" alt="">
        <a href="/ad/favorite.php?id=<?= $card['id'] ?>">
            <?php if (!empty($_SESSION['isLoggedIn'])) : ?>
                <?php if ($card['favorie']) : ?>
                    <img id="add-favori" src="/images/favorie_added.png" alt="">
    
                <?php else : ?>            
                    <img id="add-favori" src="/images/add-favoris.png" alt="">
                <?php endif; ?>
            <?php endif; ?>
        </a>
        <h4><?php echo $card['title']; ?></h4>
        <button class="price"><?php echo $card['price']; ?></button>
        <div class="position">
        <img class="locate" src="./images/loc.jpg" alt="">
            <div class="title-first"><?php echo $card['location']; ?></div>
        </div>
        <img class="pic-sale2" src="./images/rent_annoc.png" alt="">
        <section class="details1">
            <img class="picture1" src="./images/guests.png" alt="">
            <div> <?php echo $card['details']; ?></div>
            <img class="picture1" src="./images/beddrom.png" alt="" srcset="">
            <div><?php echo $card['details1']; ?></div>
            <img class="picture1" src="./images/surface.png" alt="">
            <div><?php echo $card['details2']; ?></div>
        </section>

        <p><?php echo $card['descriptions']; ?></p>
        <div class="buttons1">
            <button class="bt">More</button>
            <button class="bt">Contact</button>
            <?php if (!empty($_SESSION['isLoggedIn'] && $_SESSION['id']==$card['id_user'])) : ?>
            <button class="bt" onclick="window.location.href='/ad/modifie_card.php?id=<?php echo $annonce_id ?>'">Edit</button>
            <button class="bt" onclick="window.location.href='/ad/delete_card.php?id=<?php echo $annonce_id ?>'">Delete</button>
        <?php endif; ?>
            </div>
            



        </div>
</div>
</div>