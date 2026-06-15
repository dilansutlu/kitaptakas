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

// Aktif kitaplarım
$kitaplarim_sorgu = "select * from kitaplar 
                     where kullanici_id = '$mevcut_kullanici' 
                     and id not in (select kitap_id from takas_istekleri where durum = 'Onaylandı') 
                     order by id desc";
$kitaplarim_sonuc = mysqli_query($baglanti, $kitaplarim_sorgu);

// Geçmiş takaslarım
$takaslarim_sorgu = "select * from takas_istekleri 
                     inner join kitaplar on takas_istekleri.kitap_id = kitaplar.id 
                     where (takas_istekleri.istek_gonderen_id = '$mevcut_kullanici' or takas_istekleri.kitap_sahibi_id = '$mevcut_kullanici') 
                     and takas_istekleri.durum = 'Onaylandı' order by takas_istekleri.id desc";
$takaslarim_sonuc = mysqli_query($baglanti, $takaslarim_sorgu);

// Takas istekleri
$gelen_istekler_sorgu = "select takas_istekleri.id as istek_id, kitaplar.kitap_adi, kitaplar.yayinevi 
                         from takas_istekleri 
                         inner join kitaplar on takas_istekleri.kitap_id = kitaplar.id 
                         where takas_istekleri.kitap_sahibi_id = '$mevcut_kullanici' 
                         and takas_istekleri.durum = 'Beklemede' order by takas_istekleri.id desc";

$gelen_istekler_sonuc = mysqli_query($baglanti, $gelen_istekler_sorgu);
?>

<!doctype html>
<html lang="tr">

<head>
    <meta charset="UTF-8" />
    <title>Profilim - KİTAKS</title>
    <link rel="stylesheet" href="../css/profil.css" />
    <link rel="icon" href="../img/logo.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body>

    <div class="banner">
        <div class="navbar">
            <h1 class="logo">KİTAKS</h1>
            <ul>
                <li><a href="anasayfa.php" class="nav-link">Anasayfa</a></li>
                <li><a href="cikis_yap.php" class="btn-logout">Çıkış Yap</a></li>
            </ul>
        </div>
    </div>

    <div class="profil-konteyner">

        <div class="ust-alan">
            <h2>Profil Sayfam</h2>
            <a href="kitap_ekle.php" class="btn-ekle">Yeni Kitap Ekle</a>
        </div>

        <div class="tablo-kutusu" style="margin-bottom: 30px; width: 100%;">
            <h3 style="color: #f1c40f;"><i class="fa-solid fa-bell"></i> Onayımı Bekleyen Takas İstekleri</h3>
            <table>
                <tr>
                    <th>İstenen Kitap</th>
                    <th>Yayınevi</th>
                    <th style="text-align: center;">İşlem</th>
                </tr>

                <?php if (mysqli_num_rows($gelen_istekler_sonuc) > 0) { ?>
                    <?php while ($istek = mysqli_fetch_assoc($gelen_istekler_sonuc)) { ?>
                        <tr>
                            <td><?php echo $istek['kitap_adi']; ?></td>
                            <td><?php echo $istek['yayinevi']; ?></td>
                            <td style="text-align: center;">
                                <a href="istek_guncelle.php?id=<?php echo $istek['istek_id']; ?>&islem=onay" class="btn-onay"
                                    style="background-color: #2ecc71; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; margin-right: 10px; font-weight: bold;">Kabul
                                    Et</a>
                                <a href="istek_guncelle.php?id=<?php echo $istek['istek_id']; ?>&islem=red" class="btn-red"
                                    style="background-color: #e74c3c; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-weight: bold;">Reddet</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="3">Şu an size gelen bir takas isteği bulunmuyor.</td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="tablo-bloklari">

            <div class="tablo-kutusu">
                <h3>Kitaplarım (Aktif İlanlarım)</h3>
                <table>
                    <tr>
                        <th>Resim</th>
                        <th>Kitap Adı</th>
                        <th>Yayınevi</th>
                        <th>Sayfa</th>
                    </tr>

                    <?php if (mysqli_num_rows($kitaplarim_sonuc) > 0) { ?>
                        <?php while ($kitap = mysqli_fetch_assoc($kitaplarim_sonuc)) { ?>
                            <tr>
                                <td><img src="<?php echo $kitap['resim']; ?>" width="40" style="border-radius: 4px;"></td>
                                <td><?php echo $kitap['kitap_adi']; ?></td>
                                <td><?php echo $kitap['yayinevi']; ?></td>
                                <td><?php echo $kitap['sayfa_sayisi']; ?></td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="4">Henüz kitap eklemediniz.</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="tablo-kutusu">
                <h3>Takaslarım (Geçmiş Takaslar)</h3>
                <table>
                    <tr>
                        <th>Kitap Adı</th>
                        <th>Yayınevi</th>
                        <th>Durum</th>
                    </tr>

                    <?php if (mysqli_num_rows($takaslarim_sonuc) > 0) { ?>
                        <?php while ($takas = mysqli_fetch_assoc($takaslarim_sonuc)) { ?>
                            <tr>
                                <td><?php echo $takas['kitap_adi']; ?></td>
                                <td><?php echo $takas['yayinevi']; ?></td>
                                <td><span class="onay-rozet"><?php echo $takas['durum']; ?></span></td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="3">Henüz gerçekleşen takasınız yok.</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

        </div>
    </div>

</body>

</html>