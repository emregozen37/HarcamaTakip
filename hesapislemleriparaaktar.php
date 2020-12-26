<?php
    include("baglanti.php");

    if($_GET["id"]){
        $detay = $db->prepare("SELECT * FROM hesaplarim WHERE hesap_id=:id");
        $detay->execute(["id" => $_GET["id"]]);
        $row = $detay->fetch(PDO::FETCH_ASSOC);
        $hesapid= $row["hesap_id"];
        $hesapturu = $row["hesap_tipi"];
        $hesapmiktar = $row["hesap_miktari"];
        $hesapparatipi = $row["hesap_paratipi"];
        
    }
    
    if($_POST){
        $aktarid = $_POST["aktarid"];
        $tranferpara = $_POST["transferpara"];

        if($tranferpara > $hesapmiktar){
            echo "fazla";
        }
        else{
            $sorgu = $db->prepare("SELECT * FROM hesaplarim WHERE hesap_id=:id");
            $sorgu->execute(["id" => $aktarid]);
            $akt = $sorgu->fetch(PDO::FETCH_ASSOC);
            $aktarturu = $akt["hesap_tipi"];
            $aktarmiktar = $akt["hesap_miktari"];
            $aktarparatipi = $akt["hesap_paratipi"];

            if($aktarparatipi == "Lira"){
                if($hesapparatipi == "Lira"){
                    $hesapmiktar = $hesapmiktar - $tranferpara;
                    $aktarmiktar = $aktarmiktar + $tranferpara;
                    $guncelle1 = $db -> prepare("UPDATE hesaplarim SET hesap_miktari=:miktar WHERE hesap_id=:id");
                    $guncelle1 -> execute(array(":id" => $aktarid, ":miktar" => $aktarmiktar));
                    
                    if($guncelle1){
                        $guncelle2 = $db -> prepare("UPDATE hesaplarim SET hesap_miktari=:miktar WHERE hesap_id=:id");
                        $guncelle2 -> execute(array(":id" => $hesapid, ":miktar" => $hesapmiktar));

                        if($guncelle2){
                            echo "dogru";
                        }
                        else{
                            echo "hata";
                        }
                    }
                }
                else if($hesapparatipi == "Euro"){
                    $hesapmiktar = $hesapmiktar - $tranferpara;
                    $dovizlipara = ($tranferpara * 9.4);
                    $aktarmiktar = $aktarmiktar + $dovizlipara;
                    $guncelle1 = $db -> prepare("UPDATE hesaplarim SET hesap_miktari=:miktar WHERE hesap_id=:id");
                    $guncelle1 -> execute(array(":id" => $aktarid, ":miktar" => $aktarmiktar));
                    
                    if($guncelle1){
                        $guncelle2 = $db -> prepare("UPDATE hesaplarim SET hesap_miktari=:miktar WHERE hesap_id=:id");
                        $guncelle2 -> execute(array(":id" => $hesapid, ":miktar" => $hesapmiktar));

                        if($guncelle2){
                            echo "dogru";
                        }
                        else{
                            echo "hata";
                        }
                    }
                }
                else if($hesapparatipi == "Dolar"){
                    $hesapmiktar = $hesapmiktar - $tranferpara;
                    $dovizlipara = ($tranferpara * 7.6);
                    $aktarmiktar = $aktarmiktar + $dovizlipara;
                    $guncelle1 = $db -> prepare("UPDATE hesaplarim SET hesap_miktari=:miktar WHERE hesap_id=:id");
                    $guncelle1 -> execute(array(":id" => $aktarid, ":miktar" => $aktarmiktar));
                    
                    if($guncelle1){
                        $guncelle2 = $db -> prepare("UPDATE hesaplarim SET hesap_miktari=:miktar WHERE hesap_id=:id");
                        $guncelle2 -> execute(array(":id" => $hesapid, ":miktar" => $hesapmiktar));

                        if($guncelle2){
                            echo "dogru";
                        }
                        else{
                            echo "hata";
                        }
                    }
                }
            }
            else if($aktarparatipi == "Dolar"){
                if($hesapparatipi == "Lira"){
                    $hesapmiktar = $hesapmiktar - $tranferpara;
                    $dovizlipara = ($tranferpara / 7.6);
                    $aktarmiktar = $aktarmiktar + $dovizlipara;
                    $guncelle1 = $db -> prepare("UPDATE hesaplarim SET hesap_miktari=:miktar WHERE hesap_id=:id");
                    $guncelle1 -> execute(array(":id" => $aktarid, ":miktar" => $aktarmiktar));
                    
                    if($guncelle1){
                        $guncelle2 = $db -> prepare("UPDATE hesaplarim SET hesap_miktari=:miktar WHERE hesap_id=:id");
                        $guncelle2 -> execute(array(":id" => $hesapid, ":miktar" => $hesapmiktar));

                        if($guncelle2){
                            echo "dogru";
                        }
                        else{
                            echo "hata";
                        }
                    }
                }
                else if($hesapparatipi == "Euro"){
                    $hesapmiktar = $hesapmiktar - $tranferpara;
                    $dovizlipara = ($tranferpara * 1.23);
                    $aktarmiktar = $aktarmiktar + $dovizlipara;
                    $guncelle1 = $db -> prepare("UPDATE hesaplarim SET hesap_miktari=:miktar WHERE hesap_id=:id");
                    $guncelle1 -> execute(array(":id" => $aktarid, ":miktar" => $aktarmiktar));
                    
                    if($guncelle1){
                        $guncelle2 = $db -> prepare("UPDATE hesaplarim SET hesap_miktari=:miktar WHERE hesap_id=:id");
                        $guncelle2 -> execute(array(":id" => $hesapid, ":miktar" => $hesapmiktar));

                        if($guncelle2){
                            echo "dogru";
                        }
                        else{
                            echo "hata";
                        }
                    }
                }
                else if($hesapparatipi == "Dolar"){
                    $hesapmiktar = $hesapmiktar - $tranferpara;
                    $aktarmiktar = $aktarmiktar + $tranferpara;
                    $guncelle1 = $db -> prepare("UPDATE hesaplarim SET hesap_miktari=:miktar WHERE hesap_id=:id");
                    $guncelle1 -> execute(array(":id" => $aktarid, ":miktar" => $aktarmiktar));
                    
                    if($guncelle1){
                        $guncelle2 = $db -> prepare("UPDATE hesaplarim SET hesap_miktari=:miktar WHERE hesap_id=:id");
                        $guncelle2 -> execute(array(":id" => $hesapid, ":miktar" => $hesapmiktar));

                        if($guncelle2){
                            echo "dogru";
                        }
                        else{
                            echo "hata";
                        }
                    }
                }
            }
            else if($aktarparatipi == "Euro"){
                if($hesapparatipi == "Lira"){
                    $hesapmiktar = $hesapmiktar - $tranferpara;
                    $dovizlipara = $tranferpara / 9.4;
                    $aktarmiktar = $aktarmiktar + $dovizlipara;
                    $guncelle1 = $db -> prepare("UPDATE hesaplarim SET hesap_miktari=:miktar WHERE hesap_id=:id");
                    $guncelle1 -> execute(array(":id" => $aktarid, ":miktar" => $aktarmiktar));
                    
                    if($guncelle1){
                        $guncelle2 = $db -> prepare("UPDATE hesaplarim SET hesap_miktari=:miktar WHERE hesap_id=:id");
                        $guncelle2 -> execute(array(":id" => $hesapid, ":miktar" => $hesapmiktar));

                        if($guncelle2){
                            echo "dogru";
                        }
                        else{
                            echo "hata";
                        }
                    }
                }
                else if($hesapparatipi == "Euro"){
                    $hesapmiktar = $hesapmiktar - $tranferpara;
                    $aktarmiktar = $aktarmiktar + $tranferpara;
                    $guncelle1 = $db -> prepare("UPDATE hesaplarim SET hesap_miktari=:miktar WHERE hesap_id=:id");
                    $guncelle1 -> execute(array(":id" => $aktarid, ":miktar" => $aktarmiktar));
                    
                    if($guncelle1){
                        $guncelle2 = $db -> prepare("UPDATE hesaplarim SET hesap_miktari=:miktar WHERE hesap_id=:id");
                        $guncelle2 -> execute(array(":id" => $hesapid, ":miktar" => $hesapmiktar));

                        if($guncelle2){
                            echo "dogru";
                        }
                        else{
                            echo "hata";
                        }
                    }
                }
                else if($hesapparatipi == "Dolar"){
                    $hesapmiktar = $hesapmiktar - $tranferpara;
                    $dovizlipara = $tranferpara / 1.23;
                    $aktarmiktar = $aktarmiktar + $dovizlipara;
                    $guncelle1 = $db -> prepare("UPDATE hesaplarim SET hesap_miktari=:miktar WHERE hesap_id=:id");
                    $guncelle1 -> execute(array(":id" => $aktarid, ":miktar" => $aktarmiktar));
                    
                    if($guncelle1){
                        $guncelle2 = $db -> prepare("UPDATE hesaplarim SET hesap_miktari=:miktar WHERE hesap_id=:id");
                        $guncelle2 -> execute(array(":id" => $hesapid, ":miktar" => $hesapmiktar));

                        if($guncelle2){
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