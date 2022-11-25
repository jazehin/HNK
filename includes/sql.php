<?php

$conn = Connect();

$sql = "SELECT * FROM hnk;";
$defaultSql = "SELECT * FROM hnk;";

$defaultResult; $result; $rowPerPage; $pageNum;

function Pagination() {
    global $sql, $magyarabc, $nagyobbkarakterek;

    if (isset($_GET["char"]) && strlen($_GET["char"]) <= 3) {
        $likes = 'LIKE "' . $_GET["char"] . '%" ';
        foreach ($nagyobbkarakterek as $rovidbetu => $hosszubetuk) {
            if ($rovidbetu != $_GET["char"]) continue;

            foreach ($hosszubetuk as $i => $betu) {
                $likes = $likes . 'AND helyseg NOT LIKE "' . $betu . '%" ';
            }
        }
        $sql = 'SELECT * FROM hnk WHERE helyseg ' . $likes . 'ORDER BY helyseg ASC;';
    }
    else {
        $sql = "SELECT * FROM hnk WHERE helyseg LIKE '" . $magyarabc[0] . "%' ORDER BY helyseg ASC;";
    }
}

function All() {
    global $sql;

    if (isset($_GET["page"]) && intval($_GET["page"]) >= 1 && intval($_GET["page"]) <= 32) {
        $sql = 'SELECT * FROM hnk WHERE ID >= ' . intval($_GET["page"]) * 100 - 99 . ' AND ID <= ' . intval($_GET["page"]) * 100 . ';';
    }
    else {
        $sql = "SELECT * FROM hnk WHERE ID > 0 AND ID < 101;";
    }
}

function Adatlap() {
    global $sql;

    if (isset($_GET["id"])) {
        $sql = 'SELECT * FROM hnk WHERE ID = ' . intval($_GET["id"]). ';';
    }
    else {
        die("Nincs ilyen város");
    }
}

function Kozseg() {
    global $sql;
    $sql = 'SELECT * FROM hnk WHERE jogallas LIKE "község";';
}

function Nagykozseg() {
    global $sql;
    $sql = 'SELECT * FROM hnk WHERE jogallas LIKE "nagyközség";';
}

function Varos() {
    global $sql;
    $sql = 'SELECT * FROM hnk WHERE (jogallas LIKE "%város%" OR jogallas LIKE "megyeszékhely") AND (jogallas NOT LIKE "fővárosi kerület");';
}

function Query() {
    global $defaultResult, $result, $rowPerPage, $pageNum, $conn, $defaultSql, $sql;
    $defaultResult = mysqli_query($conn, $defaultSql);
    $result = mysqli_query($conn, $sql);

    $rowPerPage = 100;
    $pageNum = ceil(mysqli_num_rows($defaultResult) / $rowPerPage);

    mysqli_close($conn);
}

function startsWith ($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

function TrimABC() {
    global $magyarabc, $nagyobbkarakterek, $defaultResult;
    /* csak a lényeg nem működik :)
    $tmpabc = array();

    foreach ($magyarabc as $index => $betu) {
        $tartalmaz = false;

        while($sor = mysqli_fetch_assoc($defaultResult)) {
            if (startsWith($sor["helyseg"], $betu)){
                $tartalmaz = true;
            }
            if ($tartalmaz) break;
        }

        if ($tartalmaz) {
            array_push($tmpabc, $betu);
        }
    }


    foreach ($magyarabc as $index => $betu) {
        $stayin = true;
        while (($sor = mysqli_fetch_assoc($defaultResult)) && !$stayin) {
            if (startsWith($sor["helyseg"], $betu) && !in_array($betu, $tmpabc, true)) {
                array_push($tmpabc, $betu);
                $stayin = false;
            }
        }
    }

    $magyarabc = $tmpabc;*/

    for ($i = 0; $i < count($magyarabc); $i++) {
        $limit = (count($magyarabc) < $i + 3 ? count($magyarabc) : $i + 3);
        for ($j = $i + 1; $j < $limit; $j++) { 
            if ( str_contains($magyarabc[$j], $magyarabc[$i]) ) {
                if (!array_key_exists($magyarabc[$i], $nagyobbkarakterek)) {
                    $nagyobbkarakterek[$magyarabc[$i]] = array($magyarabc[$j]);
                }
                else {
                    array_push($nagyobbkarakterek[$magyarabc[$i]], $magyarabc[$j]);
                }
            }
        }
    }
}

$magyarabc = ['A', 'Á', 'B', 'C', 'Cs', 'D', 'Dz', 'Dzs', 'E', 'É', 'F', 'G', 'Gy', 'H', 'I', 'Í', 'J', 'K', 'L', 'Ly', 'M', 'N', 'Ny', 'O', 'Ó', 'Ö', 'Ő', 'P', 'Q', 'R', 'S', 'Sz', 'T', 'Ty', 'U', 'Ú', 'Ü', 'Ű', 'V', 'W', 'X', 'Y', 'Z', 'Zs'];
$nagyobbkarakterek = array();



?>