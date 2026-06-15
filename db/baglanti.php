<!--
Adı Soyadı:DİLAN SUTLU
Öğrenci Numarası:262484028
-->

<?php
$host = "localhost";
$kullanici = "root";
$parola = "";
$vt = "kitaptakas";

$baglanti = mysqli_connect($host, $kullanici, $parola, $vt);
mysqli_set_charset($baglanti, "UTF8");

?>