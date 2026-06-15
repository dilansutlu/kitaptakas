<!--
Adı Soyadı:DİLAN SUTLU
Öğrenci Numarası:262484028
-->

<?php
session_start();
session_unset();
session_destroy();

header("Location: index.php");
exit();
?>