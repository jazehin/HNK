<?php

$cim = "Városok";

switch ($_GET["p"]) {
    case 'kozseg':
      $cim = "Községek";
      Kozseg();
      break;
    case 'nagykozseg':
      $cim = "Nagyközségek";
      Nagykozseg();
      break;
    case 'varos':
      $cim = "Városok";
      Varos();
      break; 
}

Query();




?>

<div class="container text-center">
    <h1 class="display-5 my-5"><?php echo $cim; ?></h1>
    
    <table class="table mt-3">
        <tr>
            <th>
                Helység
            </th>
            <th>
                Jogállás
            </th>
            <th>
                Megye
            </th>
            <th>
                Járás
            </th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td>
                <a href="./?p=adatlap&id=<?php echo $row["ID"]; ?>"><?php echo $row["helyseg"]; ?></a>
                </td>
                <td>
                    <?php echo $row["jogallas"]; ?>
                </td>
                <td>
                    <?php echo $row["megye"]; ?>
                </td>
                <td>
                    <?php echo $row["jaras"]; ?>
                </td>
            </tr>
        <?php } ?>
    </table>

</div>