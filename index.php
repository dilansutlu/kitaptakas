<!--
Adı Soyadı:DİLAN SUTLU
Öğrenci Numarası:262484028
-->

<?php
session_start();

if (isset($_SESSION["kullanici_id"])) {
  header("Location: anasayfa.php");
  exit();
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>KİTAKS</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="icon" href="img/logo.svg">

</head>

<body>
  <div class="banner">
    <div class="navbar">
      <h1 class="logo">KİTAKS</h1>

    </div>

    <div class="content">
      <h2>Şimdi Keşfet</h2>
      <p>Kitaplar el değiştirir, değer kazanmaya devam eder.</p>
      <div>
        <button> <a href="php/giris_yap.php">Giriş Yap</a></button>
        <button> <a href="php/kayit_ol.php">Üye Ol</a></button>

      </div>
    </div>
  </div>
</body>

</html>