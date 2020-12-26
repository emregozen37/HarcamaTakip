<?php
include("baglanti.php");



  
if($_POST){
  $id= $_POST['id'];
  $ad = $_POST['ad'];
  $soyad = $_POST['soyad'];
  $posta = $_POST['eposta'];
  $sifre = $_POST['sifre'];


if(!$id){
	echo "id boş";
}
else{
	if(!$ad || !$soyad || !$posta || !$sifre){
  		echo "bos";
	}
	else{
  		$guncelle = $db -> prepare("UPDATE kullanicilar SET kul_id=:id, kul_ad=:ad, kul_soyad=:soyad, kul_eposta=:eposta, kul_sifre=:sifre WHERE kul_id=:id");
  		$guncelle -> execute(array(":id" => $id, ":ad" => $ad, ":soyad" => $soyad, ":eposta" => $posta, ":sifre" => $sifre));
  		if($guncelle){
  			echo "dogru";
  		}
  		else{
  			echo "hata";
  		}
	}	
}
          
} 




?>