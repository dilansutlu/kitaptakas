<!--
Adı Soyadı:DİLAN SUTLU
Öğrenci Numarası:262484028
-->

<?php
include("../db/baglanti.php");
$sehirler = [
    "Adana",
    "Adıyaman",
    "Afyonkarahisar",
    "Ağrı",
    "Amasya",
    "Ankara",
    "Antalya",
    "Artvin",
    "Aydın",
    "Balıkesir",
    "Bilecik",
    "Bingöl",
    "Bitlis",
    "Bolu",
    "Burdur",
    "Bursa",
    "Çanakkale",
    "Çankırı",
    "Çorum",
    "Denizli",
    "Diyarbakır",
    "Edirne",
    "Elazığ",
    "Erzincan",
    "Erzurum",
    "Eskişehir",
    "Gaziantep",
    "Giresun",
    "Gümüşhane",
    "Hakkari",
    "Hatay",
    "Isparta",
    "Mersin",
    "İstanbul",
    "İzmir",
    "Kars",
    "Kastamonu",
    "Kayseri",
    "Kırklareli",
    "Kırşehir",
    "Kocaeli",
    "Konya",
    "Kütahya",
    "Malatya",
    "Manisa",
    "Kahramanmaraş",
    "Mardin",
    "Muğla",
    "Muş",
    "Nevşehir",
    "Niğde",
    "Ordu",
    "Rize",
    "Sakarya",
    "Samsun",
    "Siirt",
    "Sinop",
    "Sivas",
    "Tekirdağ",
    "Tokat",
    "Trabzon",
    "Tunceli",
    "Şanlıurfa",
    "Uşak",
    "Van",
    "Yozgat",
    "Zonguldak",
    "Aksaray",
    "Bayburt",
    "Karaman",
    "Kırıkkale",
    "Batman",
    "Şırnak",
    "Bartın",
    "Ardahan",
    "Iğdır",
    "Yalova",
    "Karabük",
    "Kilis",
    "Osmaniye",
    "Düzce"
];

sort($sehirler);

if (isset($_POST["kayit_ol"])) {
    $ad = trim($_POST["ad"]);
    $soyad = trim($_POST["soyad"]);
    $email = trim($_POST["email"]);
    $sehir = trim($_POST["sehir"]);

    $sifre = password_hash($_POST["sifre"], PASSWORD_DEFAULT);

    $kullanici_ekle = "insert into kullanicilar (ad, soyad, email, sehir, sifre) values ('$ad', '$soyad', '$email', '$sehir', '$sifre')";

    $db_ekle = mysqli_query($baglanti, $kullanici_ekle);

    if ($db_ekle) {
        header("Location: anasayfa.php");
        exit();
    } else {
        echo '<div class="alert alert-danger" role="alert">Kayıt eklenemedi: ' . mysqli_error($baglanti) . '</div>';
    }

    mysqli_close($baglanti);
}

?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="../css/kayit_ol.css" />
    <link rel="icon" href="../img/logo.svg">

    <title>KİTAKS KAYIT OL</title>
</head>

<body>
    <div class="form-wrapper">
        <h2>KİTAKS KAYIT OL</h2>
        <form method="POST">

            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" name="ad" placeholder="Adınız" required>
            </div>

            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" name="soyad" placeholder="Soyadınız" required>
            </div>

            <div class="input-group">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-group">
                <i class="fa fa-city"></i>
                <select name="sehir" id="sehir" required>
                    <option value="" disabled selected>Şehir seçiniz</option>
                    <?php
                    foreach ($sehirler as $sehir) {
                        echo "<option value='$sehir'>$sehir</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="sifre" placeholder="Şifre" required>
            </div>

            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="sifre_tekrar" placeholder="Şifre Tekrar" required>
            </div>

            <div class="terms">
                <input type="checkbox" required>
                <label>Kullanım Koşullarını Kabul Ediyorum</label>
            </div>

            <button type="submit" name="kayit_ol">Kayıt Ol</button>

            <p class="login-link">
                Zaten hesabınız var mı? <a href="giris_yap.php">Giriş Yap</a>
            </p>

        </form>
    </div>
</body>

</html>