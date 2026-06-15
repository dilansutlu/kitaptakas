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
$sorgu = "select * from kitaplar where kullanici_id != '$mevcut_kullanici' order by id desc";
$kitaplar_sonuc = mysqli_query($baglanti, $sorgu);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KİTAKS</title>
    <link rel="stylesheet" href="../css/anasayfa.css" />
    <link rel="icon" href="../img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body>
    <div class="banner">
        <div class="navbar">
            <h1 class="logo">KİTAKS</h1>
            <ul>
                <li>
                    <a href="profil.php" class="nav-link">
                        <i class="fa-solid fa-user"></i> Profil
                    </a>
                </li>

                <li>
                    <button class="btn-logout">
                        <a href="cikis_yap.php">
                            <i class="fa-solid fa-right-from-bracket"></i> Çıkış Yap
                        </a>
                    </button>
                </li>
            </ul>
        </div>
    </div>


    <div class="kitap-konteyner">
        <h2 class="baslik">Takas Edebileceğin Kitaplar</h2>

        <div class="kitap-listesi">
            <?php
            if (mysqli_num_rows($kitaplar_sonuc) > 0) {

                while ($kitap = mysqli_fetch_assoc($kitaplar_sonuc)) {

                    $kitap_id = $kitap['id'];
                    $istek_sorgu = "select * from takas_istekleri where istek_gonderen_id = '$mevcut_kullanici' and kitap_id = '$kitap_id'";
                    $istek_kontrol = mysqli_query($baglanti, $istek_sorgu);
                    ?>

                    <div class="kitap-kart">
                        <div class="kart-resim">
                            <img src="<?php echo $kitap['resim']; ?>" alt="<?php echo $kitap['kitap_adi']; ?>"
                                class="kitap-resim">
                        </div>
                        <div class="kart-detay">
                            <h3>
                                <?php echo $kitap['kitap_adi']; ?>
                            </h3>
                            <p>Yayınevi:
                                <?php echo $kitap['yayinevi']; ?>
                            </p>
                            <p>Sayfa:
                                <?php echo $kitap['sayfa_sayisi']; ?>
                            </p>

                            <?php if (mysqli_num_rows($istek_kontrol) > 0) { ?>
                                <button class="takas-buton durum-beklemede" disabled>Takas Durumunda</button>
                            <?php } else { ?>
                                <a href="takas_iste.php?id=<?php echo $kitap['id']; ?>" class="takas-buton">Takas İste</a>
                            <?php } ?>
                        </div>
                    </div>

                    <?php
                }

            } else {
                echo "<p class='bos-mesaj'>Henüz takaslık kitap yok.</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>