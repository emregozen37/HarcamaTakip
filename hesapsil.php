<?php 
include("baglanti.php");


if($_POST){

  $hesapid=$_POST['id'];

  $detay = $db->prepare("SELECT * FROM hesaplarim WHERE hesap_id=:id");
  $detay->execute(["id" => $hesapid]);
  $row = $detay->fetch(PDO::FETCH_ASSOC);
  $hesapmiktar = $row["hesap_miktari"];

  
  if($hesapmiktar>0){
    echo "para";
  }
  else{
    $delete = $db->prepare("DELETE FROM hesaplarim WHERE hesap_id=:id");
    $delete->execute(array(":id" => $hesapid));

    if($delete){
      echo "dogru";
    }
    else{
      echo "hata";
    }
  }
}

?>