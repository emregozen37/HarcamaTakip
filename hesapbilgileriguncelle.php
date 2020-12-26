<?php
include("baglanti.php");


if($_GET["id"]){
	$detay = $db->prepare("SELECT * FROM hesaplarim WHERE hesap_id=:id");
	$detay->execute(["id" => $_GET["id"]]);
    $row = $detay->fetch(PDO::FETCH_ASSOC);
	$id= $row["hesap_id"];
	$getparatipi = $row["hesap_paratipi"];
	$getpara = $row["hesap_miktari"];
    
}
  
if($_POST){
  $hesapid= $_POST['hesapid'];
  $hesapadi = $_POST['hesapadi'];
  $hesapturu = $_POST['hesapturu'];
  $parabirimi = $_POST['parabirimi'];
  $paramiktari = $_POST['paramiktari'];


if(!$hesapid){
	echo "id boş";
}
else{
	if(!$hesapadi || !$hesapturu || !$parabirimi || !$paramiktari){
  		echo "bos";
	}
	else{

		if($parabirimi == "Lira"){
			if($getparatipi == "Lira"){
				$guncelle = $db -> prepare("UPDATE hesaplarim SET hesap_id=:id, hesap_ad=:ad, hesap_tipi=:turu, hesap_paratipi=:parabirimi, hesap_miktari=:miktar WHERE hesap_id=:id");
				$guncelle -> execute(array(":id" => $hesapid, ":ad" => $hesapadi, ":turu" => $hesapturu, ":parabirimi" => $parabirimi, ":miktar" => $paramiktari));
				if($guncelle){
					echo "dogru";
				}
				else{
					echo "hata";
				}
			}
			else if($getparatipi == "Euro"){
				$dovizlipara = ($paramiktari * 9.4);
				$guncelle = $db -> prepare("UPDATE hesaplarim SET hesap_id=:id, hesap_ad=:ad, hesap_tipi=:turu, hesap_paratipi=:parabirimi, hesap_miktari=:miktar WHERE hesap_id=:id");
				$guncelle -> execute(array(":id" => $hesapid, ":ad" => $hesapadi, ":turu" => $hesapturu, ":parabirimi" => $parabirimi, ":miktar" => $dovizlipara));
				if($guncelle){
					echo "dogru";
				}
				else{
					echo "hata";
				}
			}
			else if($getparatipi == "Dolar"){
				$dovizlipara = ($paramiktari * 7.63);
				$guncelle = $db -> prepare("UPDATE hesaplarim SET hesap_id=:id, hesap_ad=:ad, hesap_tipi=:turu, hesap_paratipi=:parabirimi, hesap_miktari=:miktar WHERE hesap_id=:id");
				$guncelle -> execute(array(":id" => $hesapid, ":ad" => $hesapadi, ":turu" => $hesapturu, ":parabirimi" => $parabirimi, ":miktar" => $dovizlipara));
				if($guncelle){
					echo "dogru";
				}
				else{
					echo "hata";
				}
			}
		}
		else if($parabirimi == "Dolar"){
			if($getparatipi == "Lira"){
				$dovizlipara = ($paramiktari / 7.63);
				$guncelle = $db -> prepare("UPDATE hesaplarim SET hesap_id=:id, hesap_ad=:ad, hesap_tipi=:turu, hesap_paratipi=:parabirimi, hesap_miktari=:miktar WHERE hesap_id=:id");
				$guncelle -> execute(array(":id" => $hesapid, ":ad" => $hesapadi, ":turu" => $hesapturu, ":parabirimi" => $parabirimi, ":miktar" => $dovizlipara));
				if($guncelle){
					echo "dogru";
				}
				else{
					echo "hata";
				}
			}
			else if($getparatipi == "Dolar"){
				$guncelle = $db -> prepare("UPDATE hesaplarim SET hesap_id=:id, hesap_ad=:ad, hesap_tipi=:turu, hesap_paratipi=:parabirimi, hesap_miktari=:miktar WHERE hesap_id=:id");
				$guncelle -> execute(array(":id" => $hesapid, ":ad" => $hesapadi, ":turu" => $hesapturu, ":parabirimi" => $parabirimi, ":miktar" => $paramiktari));
				if($guncelle){
					echo "dogru";
				}
				else{
					echo "hata";
				}
			}
			else if($getparatipi == "Euro"){
				$dovizlipara = ($paramiktari * 1.23);
				$guncelle = $db -> prepare("UPDATE hesaplarim SET hesap_id=:id, hesap_ad=:ad, hesap_tipi=:turu, hesap_paratipi=:parabirimi, hesap_miktari=:miktar WHERE hesap_id=:id");
				$guncelle -> execute(array(":id" => $hesapid, ":ad" => $hesapadi, ":turu" => $hesapturu, ":parabirimi" => $parabirimi, ":miktar" => $dovizlipara));
				if($guncelle){
					echo "dogru";
				}
				else{
					echo "hata";
				}
			}
		}
		else if($parabirimi == "Euro"){
			if($getparatipi == "Lira"){
				$dovizlipara = ($paramiktari / 9.4);
				$guncelle = $db -> prepare("UPDATE hesaplarim SET hesap_id=:id, hesap_ad=:ad, hesap_tipi=:turu, hesap_paratipi=:parabirimi, hesap_miktari=:miktar WHERE hesap_id=:id");
				$guncelle -> execute(array(":id" => $hesapid, ":ad" => $hesapadi, ":turu" => $hesapturu, ":parabirimi" => $parabirimi, ":miktar" => $dovizlipara));
				if($guncelle){
					echo "dogru";
				}
				else{
					echo "hata";
				}
			}
			else if($getparatipi == "Euro"){
				$guncelle = $db -> prepare("UPDATE hesaplarim SET hesap_id=:id, hesap_ad=:ad, hesap_tipi=:turu, hesap_paratipi=:parabirimi, hesap_miktari=:miktar WHERE hesap_id=:id");
				$guncelle -> execute(array(":id" => $hesapid, ":ad" => $hesapadi, ":turu" => $hesapturu, ":parabirimi" => $parabirimi, ":miktar" => $paramiktari));
				if($guncelle){
					echo "dogru";
				}
				else{
					echo "hata";
				}
			}
			else if($getparatipi == "Dolar"){
				$dovizlipara = ($paramiktari * 0.82);
				$guncelle = $db -> prepare("UPDATE hesaplarim SET hesap_id=:id, hesap_ad=:ad, hesap_tipi=:turu, hesap_paratipi=:parabirimi, hesap_miktari=:miktar WHERE hesap_id=:id");
				$guncelle -> execute(array(":id" => $hesapid, ":ad" => $hesapadi, ":turu" => $hesapturu, ":parabirimi" => $parabirimi, ":miktar" => $dovizlipara));
				if($guncelle){
					echo "dogru";
				}
				else{
					echo "hata";
				}
			}
		}
  		
	}	
}
          
} 




?>