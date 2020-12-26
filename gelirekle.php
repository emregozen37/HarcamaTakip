<?php 
    include("baglanti.php");


    if($_POST){
        $geliradi = $_POST["geliradi"];
        $gelirkategori = $_POST["gelirkategori"];
        $zaman = $_POST["trip-start"];
        $gelirmiktari = $_POST["gelirmiktari"];

        if(!$geliradi || !$gelirkategori || !$zaman || !$gelirmiktari){
            echo "bos";
        }
        else{
            $sorgu = $db->prepare("INSERT INTO gelirler SET gelir_ad=:geliradi, gelir_kategori=:gelirkategori, gelir_zaman=:zaman, gelir_fiyat=:gelirmiktari");
            $sorgu->execute([
                ":geliradi" => $geliradi,
                ":gelirkategori" => $gelirkategori,
                ":zaman" => $zaman,
                ":gelirmiktari" => $gelirmiktari
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