<?php 
include("baglanti.php");
session_start();

$sesid=$_SESSION['oturum_id'];
$guncelle = $db->query("UPDATE kullanicilar SET kul_cikis_zaman = NOW() WHERE kul_id = $sesid");
if($guncelle){
    session_destroy();
    header("location:index.php");
}






?>