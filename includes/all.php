<?php

All();
Query();

?>


<div class="container text-center">
    <h1 class="display-5 my-5">Összes település</h1>

    <?php for ($i = 1; $i <= $pageNum; $i++) { ?>
        <a href="./?p=all&page=<?php echo $i; ?>"><?php echo $i; ?></a>
    <?php } ?>

    <p class="my-3">Oldal: <?php 
        if (isset($_GET["page"]) && intval($_GET["page"]) >= 1 && intval($_GET["page"]) <= 32) {
            echo $_GET["page"];
        }
        else {
            echo "1";
        }
    ?>/<?php echo $pageNum; ?></p>

    <table class="table">
        <tr>
            <th>
                #
            </th>
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
                    <?php echo $row["ID"]; ?>
                </td>
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