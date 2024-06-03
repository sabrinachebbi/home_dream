<div class="card">
      <img class="house1" src="<?php echo $cards['image']; ?>" alt="">
      
      <<a href="/ad/favorite.php?id=<?= $cards['id'] ?>">
            <?php if (!empty($_SESSION['isLoggedIn'])) : ?>
                <?php if ($cards['favorie']) : ?>
                    <img id="add-favori1" src="/images/favorie_added.png" alt="">
        
                <?php else : ?>            
                    <img id="add-favori1" src="/images/add-favoris.png" alt="">
                <?php endif; ?>
            <?php endif; ?>
    </a>
  
      <h4 class="h4_sale"><?php echo $cards['title']; ?></h4>
      <button class="price"><?php echo $cards['price']; ?></button>
      <div class="position1">
        <img class="locate" src="./images/loc.jpg" alt="">
        <div><?php echo $cards['location']; ?></div>

      </div>
      <img class="pic-sale22" src="./images/sale-annoc.png" alt="">
      <section class="details2">

        <img class="picture1" src="./images/beddrom.png" alt="" srcset="">
        <div><?php echo $cards['details']; ?></div>
        <img class="picture1" src="./images/bathroom.png" alt="">
        <div> <?php echo $cards['details1']; ?></div>
        <img class="picture1" src="./images/surface.png" alt="">
        <div><?php echo $cards['details2']; ?></div>
      </section>

      <p class="parag-sale"><?php echo $cards['descriptions']; ?>
      </p>
      <div class="buttons1">
        <button class="btt ">More</button>
        <button class="btt">Contact</button>
        <?php if (!empty($_SESSION['isLoggedIn'] && $_SESSION['id']==$cards['id_user'])) : ?>
            <button class="btt" onclick="window.location.href='/ad/modifie_card.php?id=<?php echo $annonce_id ?>'">Edit</button>
            <button class="btt" onclick="window.location.href='/ad/delete_card.php?id=<?php echo $annonce_id ?>'">Delete</button>
        <?php endif; ?>
      </div>
    </div>
    </div>
