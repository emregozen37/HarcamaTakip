<?php 
    include("baglanti.php");


    if($_POST){
        $gideradi = $_POST["gideradi"];
        $gideryeri = $_POST["gideryer"];
        $giderkategori = $_POST["giderkategori"];
        $giderzaman = $_POST["giderzaman"];
        $gidermiktari = $_POST["gidermiktari"];

        if(!$gideradi || !$gideryeri || !$giderkategori || !$giderzaman || !$gidermiktari){
            echo "bos";
        }
        else{
            $sorgu = $db->prepare("INSERT INTO harcamalar SET harcama_ad=:ad, harcama_yer=:yer, harcama_kategori=:kategori, harcama_zaman=:zaman, harcama_fiyat=:miktari");
            $sorgu->execute([
                ":ad" => $gideradi,
                ":yer" => $gideryeri,
                ":kategori" => $giderkategori,
                ":zaman" => $giderzaman,
                ":miktari" => $gidermiktari
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