<?php

function hitungDeterminan($paramA, $paramB, $paramC, $paramD)
{
    $determinan = (($paramA * $paramD)-($paramB * $paramC));

    echo "<table style='border-left: solid; border-right: solid;' cellpadding='5' cellspacing='5' >
    <tr>
        <td>{$paramA}</td>
        <td>{$paramB}</td>
    </tr>
    <tr>
        <td>{$paramC}</td>
        <td>{$paramD}</td>
    </tr>
    </table>";

    echo "<p>Determinan dari matrix tersebut adalah: {$determinan}</p>";
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Pemrograman Web Lanjut</title>
</head>
<body>
    <p>Nama: Amalia Septianti</p>
    <p>NPM: 202143570010</p>
    <p>Kelas: Y6D Pemrograman Web Lanjut</p>
    <hr>
    <?php hitungDeterminan(1,2,3,4); ?>
</body>
</html>