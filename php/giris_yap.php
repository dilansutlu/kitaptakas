<!--
Adı Soyadı:DİLAN SUTLU
Öğrenci Numarası:262484028
-->

<?php
session_start();
include("../db/baglanti.php");

if (isset($_SESSION["kullanici_id"])) {
    header("Location: anasayfa.php");
    exit();
}

$hata_mesaji = "";

if (isset($_POST["giris_yap"])) {
    $email = trim($_POST["email"]);
    $sifre = trim($_POST["sifre"]);

    $sorgu = "select * from kullanicilar where email = '$email'";
    $calistir = mysqli_query($baglanti, $sorgu);

    if (mysqli_num_rows($calistir) > 0) {
        $kullanici = mysqli_fetch_assoc($calistir);

        if (password_verify($sifre, $kullanici["sifre"])) {
            $_SESSION["kullanici_id"] = $kullanici["id"];
            $_SESSION["kullanici_ad"] = $kullanici["ad"];
            $_SESSION["kullanici_email"] = $kullanici["email"];

            header("Location: anasayfa.php");
            exit();
        } else {
            $hata_mesaji = "Hatalı şifre girdiniz!";
        }
    } else {
        $hata_mesaji = "Bu e-posta adresiyle kayıtlı bir kullanıcı bulunamadı!";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="../css/giris_yap.css" />
    <link rel="icon" href="../img/logo.svg">

    <title>KİTAKS GİRİŞ YAP</title>
</head>

<body>
    <div class="form-wrapper">
        <h2>KİTAKS GİRİŞ YAP</h2>
        <form method="POST">
            <div class="input-group">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="sifre" placeholder="Şifre" required>
            </div>

            <button type="submit" name="giris_yap">Giriş Yap</button>

            <p class="login-link">
                Hesabınız yok mu? <a href="kayit_ol.php">Kayıt Ol</a>
            </p>
        </form>
    </div>
</body>

</html>