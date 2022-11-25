<?php
Adatlap();
Query();

$adatok;
while($row = mysqli_fetch_assoc($result)) $adatok = $row;

?>


<div class="container">
    
    <h1 class="display-5 my-5"><?php echo $adatok["helyseg"] ?></h1>
    <p>Jogállás: <?php echo $adatok["jogallas"] ?></p>
    <p>Megye: <?php echo $adatok["megye"] ?> vármegye</p>
    <p>Járás: <?php echo $adatok["jaras"] ?></p>
    <p>Terület: <?php echo $adatok["terulet"] ?> km<sup>2</sup></p>
    <p>Népesség: <?php echo $adatok["nepesseg"] ?> fő</p>
    <p>Lakások száma: <?php echo $adatok["lakas"] ?></p>
</div>