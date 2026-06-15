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

$mevcut_kullanici = $_SESSION["kullanici_id"];

if (isset($_POST["kitap_ekle_buton"])) {

    $kitap_adi = mysqli_real_escape_string($baglanti, $_POST["form_kitap_adi"]);
    $yayinevi = $_POST["form_yayinevi"];
    $sayfa_sayisi = $_POST["form_sayfa"];
    $resim_linki = $_POST["form_resim"];

    if ($kitap_adi != "" && $yayinevi != "" && $sayfa_sayisi != "" && $resim_linki != "") {

        $ekle_sorgu = "insert into kitaplar (kullanici_id, kitap_adi, yayinevi, sayfa_sayisi, resim) 
                       values ('$mevcut_kullanici', '$kitap_adi', '$yayinevi', '$sayfa_sayisi', '$resim_linki')";

        $sonuc = mysqli_query($baglanti, $ekle_sorgu);

        if ($sonuc) {
            header("Location: profil.php");
            exit();
        } else {
            $mesaj = "Veritabanına eklenirken bir hata oluştu!";
        }

    } else {
        $mesaj = "Lütfen tüm alanları doldurun!";
    }
}
?>

<!doctype html>
<html lang="tr">

<head>
    <meta charset="UTF-8" />
    <title>Yeni Kitap Ekle - KİTAKS</title>
    <link rel="stylesheet" href="../css/profil.css" />
    <link rel="stylesheet" href="../css/kayit_ol.css" />
    <link rel="icon" href="../img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body>
    <div class="form-wrapper">
        <h2>YENİ KİTAP EKLE</h2>
        <?php if (isset($mesaj)) {
            echo "<p class='hata-mesaj'>$mesaj</p>";
        } ?>
        <form action="kitap_ekle.php" method="POST">
            <div class="input-group">
                <i class="fa fa-book"></i>
                <input type="text" name="form_kitap_adi" placeholder="Kitap Adı" required>
            </div>
            <div class="input-group">
                <i class="fa fa-building"></i>
                <input type="text" name="form_yayinevi" placeholder="Yayınevi" required>
            </div>
            <div class="input-group">
                <i class="fa fa-file"></i>
                <input type="number" name="form_sayfa" placeholder="Sayfa Sayısı" required>
            </div>
            <div class="input-group">
                <i class="fa fa-image"></i>
                <input type="text" name="form_resim" placeholder="https://... Resim Linki" required>
            </div>
            <button type="submit" name="kitap_ekle_buton">Sisteme Kaydet</button>
            <p class="login-link">
                Vazgeçtiniz mi? <a href="profil.php">Profile Dön</a>
            </p>
        </form>
    </div>
</body>

</html>