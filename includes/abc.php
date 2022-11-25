<?php
Pagination();
Query();
TrimABC();
?>

<div class="container text-center">
    <h1 class="display-5 my-5">Összes település betűrendben</h1>
    <?php for ($i=0; $i < count($magyarabc); $i++) { ?>
        <a href="./?p=abc&char=<?php echo $magyarabc[$i];?>"><?php echo $magyarabc[$i];?></a> 
    <?php } ?>
    
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