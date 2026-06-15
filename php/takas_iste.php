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

if (isset($_GET["id"])) {
    $kitap_id = intval($_GET["id"]);
    $istek_gonderen = $_SESSION["kullanici_id"];

    $kitap_bul = mysqli_query($baglanti, "select kullanici_id from kitaplar where id = '$kitap_id'");

    if (mysqli_num_rows($kitap_bul) > 0) {
        $kitap_veri = mysqli_fetch_assoc($kitap_bul);
        $kitap_sahibi = $kitap_veri["kullanici_id"];

        $kontrol_sorgu = "select * from takas_istekleri where istek_gonderen_id = '$istek_gonderen' and kitap_id = '$kitap_id'";
        $kontrol = mysqli_query($baglanti, $kontrol_sorgu);

        if (mysqli_num_rows($kontrol) == 0) {
            $istek_ekle = "insert into takas_istekleri (istek_gonderen_id, kitap_sahibi_id, kitap_id) values ('$istek_gonderen', '$kitap_sahibi', '$kitap_id')";
            mysqli_query($baglanti, $istek_ekle);
        }
    }
}

header("Location: anasayfa.php");
exit();
?>