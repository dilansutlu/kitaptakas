<!--
Adı Soyadı:DİLAN SUTLU
Öğrenci Numarası:262484028
-->

<?php
session_start();
include("../db/baglanti.php");

if (!isset($_SESSION["kullanici_id"])) {
    header("Location: index.php");
    exit();
}

if (isset($_GET["id"]) && isset($_GET["islem"])) {

    $istek_id = $_GET["id"];
    $islem = $_GET["islem"];

    if ($islem == "onay") {
        $guncelle_sorgu = "update takas_istekleri set durum = 'Onaylandı' where id = '$istek_id'";
        mysqli_query($baglanti, $guncelle_sorgu);
    }

    if ($islem == "red") {
        $guncelle_sorgu = "update takas_istekleri set durum = 'Reddedildi' where id = '$istek_id'";
        mysqli_query($baglanti, $guncelle_sorgu);
    }
}

header("Location: profil.php");
exit();
?>