<?php 
    include("baglanti.php");


    if($_POST){
        $hesapadi = $_POST["hesapadi"];
        $hesapturu = $_POST["hesapturu"];
        $parabirimi = $_POST["parabirimi"];
        $paramiktari = $_POST["paramiktari"];

        if(!$hesapadi || !$hesapturu || !$parabirimi || !$paramiktari){
            echo "bos";
        }
        else{
            $sorgu = $db->prepare("INSERT INTO hesaplarim SET hesap_ad=:hesapad, hesap_tipi=:hesaptipi, hesap_paratipi=:hesapparatipi, hesap_miktari=:hesapmiktari");
            $sorgu->execute([
                ":hesapad" => $hesapadi,
                ":hesaptipi" => $hesapturu,
                ":hesapparatipi" => $parabirimi,
                ":hesapmiktari" => $paramiktari
            ]);

            if($sorgu){
                echo "dogru";
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