<?php include("baglanti.php");
session_start();

if($_POST){
	$ads = $_POST["uyeadsoyad"];
	$eposta = $_POST["uyeeposta"];
	$sifre = $_POST["uyesifre"];

	if(!$ads || !$sifre ||!$eposta){
		echo "bos";
	}
	else{
		$sorgu = $db->prepare("SELECT uye_ads FROM uyeler WHERE uye_ads=:ads AND uye_eposta=:posta");
		$sorgu->execute(array(':ads' => $ads , ':posta' => $eposta));

		if($sorgu->rowCount()){
			echo "aynikayit";
		}
		else{
			$kayit = $db->prepare("INSERT INTO uyeler SET 
				uye_ads=:uyeads,
				uye_eposta=:uyeposta,
				uye_sifre=:uyesifre");
			$kayit->execute([':uyeads' => $ads,':uyeposta' => $eposta,':uyesifre' => $sifre ]);

			if($kayit){
				echo "basarili";
			}
		}
	}
}
?>