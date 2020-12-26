<?php 
ob_start();
session_start();
include("baglanti.php");

if($_POST){
    $kuleposta = $_POST['kuleposta'];
	$kulsifre = $_POST['kulsifre'];

	if(!$kuleposta || !$kulsifre){
		echo "bos";
	}
	else{
		$sorgu = $db->prepare("SELECT * FROM kullanicilar WHERE kul_eposta=:eposta AND kul_sifre=:sifre");
		$sorgu->execute([':eposta' => $kuleposta, ':sifre' => $kulsifre]);

		if($sorgu->rowCount()){
			$row = $sorgu->fetch(PDO::FETCH_OBJ);
			$_SESSION['oturum'] = true;
			$_SESSION['oturum_id'] = $row->kul_id;
			$sesid=$_SESSION['oturum_id'];
			$_SESSION['oturum_ad'] = $row->kul_ad;
			$_SESSION['oturum_soyad'] = $row->kul_soyad;
			$_SESSION['oturum_eposta'] = $row->kul_eposta;
			$_SESSION['oturum_sifre'] = $row->kul_sifre;
			$_SESSION['oturum_girisz'] = $row->kul_giris_zaman;
			$_SESSION['oturum_cikisz'] = $row->kul_cikis_zaman;
			$_SESSION['oturum_ip'] = $_SERVER['SERVER_ADDR'];
			$sesip=$_SESSION['oturum_ip'];

			$ipguncelle=$db->prepare("UPDATE kullanicilar SET kul_ip_adres=:ip WHERE kul_id = $sesid");
			$ipguncelle->execute([':ip' => $sesip]);
			$guncelle = $db->query("UPDATE kullanicilar SET kul_giris_zaman = NOW() WHERE kul_id = $sesid");
			if($guncelle){
				echo "dogru";
			}
			else{
				echo "yanlis";
			}
		}
		else{
			echo "yanlis";
		}
	}
}	
else{
    echo "yanlis";
}    

?>