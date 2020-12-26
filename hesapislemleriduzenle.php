<?php 
include("baglanti.php");
session_start();
if(!isset($_SESSION['oturum'])){
	header("location:login.php");
}





if($_GET["id"]){
	$detay = $db->prepare("SELECT * FROM hesaplarim WHERE hesap_id=:id");
	$detay->execute(["id" => $_GET["id"]]);
    $row = $detay->fetch(PDO::FETCH_ASSOC);
    $hesapid= $row["hesap_id"];
    $hesapturu = $row["hesap_tipi"];
    
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Yeg</title>
	<link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-xtra-blog.css" rel="stylesheet">
    


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
    <style>
        .hesaplabel{
            padding:5px 0px !important;
        }
    </style>
   
</head>
<body>

	<header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
                <div class="mb-3 mx-auto tm-site-logo"><img src="img/adminlogo.jpg" alt="" class="haeder-logo"></div>            
                <h3 class="text-center">Yeg</h3>
            </div>
            
            <nav class="tm-nav" id="tm-nav">            
                <ul>
                    <li class="tm-nav-item "><a href="index.php" class="tm-nav-link">
                        <i class="fas fa-home"></i>
                        Genel Bakış
                    </a></li>
                    
                    <li class="tm-nav-item"><a href="hareketler.php" class="tm-nav-link">
                        <i class="fas fa-chart-line"></i>
                        Hareketler
                    </a></li>
                    <li class="tm-nav-item active"><a href="hesapislemleri.php" class="tm-nav-link">
                        <i class="fas fa-edit"></i>
                        Hesap İşlemleri
                    </a></li>
                    <li class="tm-nav-item"><a href="kategoriler.php" class="tm-nav-link">
                        <i class="fas fa-pen"></i>
                        Kategoriler
                    </a></li>
                    <li class="tm-nav-item"><a href="kullaniciislemleri.php" class="tm-nav-link">
                        <i class="far fa-user"></i>
                        Kullanıcı İşlemleri
                    </a></li>
                    <li class="tm-nav-item"><a href="cikisyap.php" class="tm-nav-link">
                        <i class="fas fa-power-off"></i>
                        Çıkış Yap
                    </a></li>
                </ul>
            </nav>
            <div>
                <a rel="nofollow" href="https://fb.com/templatemo" class="tm-social-link">
                    <i class="fab fa-facebook tm-social-icon"></i>
                </a>
                <a href="https://twitter.com" class="tm-social-link">
                    <i class="fab fa-twitter tm-social-icon"></i>
                </a>
                <a href="https://instagram.com" class="tm-social-link">
                    <i class="fab fa-instagram tm-social-icon"></i>
                </a>
                
            </div>
            
        </div>
    </header>
    <div class="container-fluid">
        <main class="tm-main">
            <div class="row">
                <div class="col-lg-12">
                        <script>
                            function hesapguncelle(){
                                var formg = $("#hesapbilgileriguncelleform").serialize();
                                $.ajax({
                                    type : "POST",
                                    data : formg,
                                    url : "hesapbilgileriguncelle.php?id=<?php echo $row["hesap_id"]; ?>",
                                    success : function(deger){
                                        if($.trim(deger) == "bos"){
                                            sweetAlert('hata','Lütfen boş alan bırakmayınız','error');
                                        }
                                        else if($.trim(deger) == "dogru"){
                                            sweetAlert('Başarılı','Güncelleme İşlemi Başarılı Başarılı','success')
                                            .then((value) => {
                                                window.location.href = "hesapislemleriduzenle.php?id=<?php echo $row["hesap_id"]; ?>";
                                            })  
                                        } 
                                        else if($.trim(deger) == "hata"){
                                            sweetAlert('hata','HATA','error');
                                        }     
                                    }
                                });
                            }
                        </script>
  
                    <form id="hesapbilgileriguncelleform" onsubmit="return false" style="width:100%;">
                        <h2 style="margin-top:30px;margin-bottom:20px;">Hesap Güncelleme</h2>
                        <input type="hidden" name="hesapid" value="<?php echo $row["hesap_id"]; ?>">
                        <div class="input-group">
                        <label class="hesaplabel" for="">Hesap Adı</label>
                            <div class="input-box hesapinputbox">
                                <input type="text" placeholder="Hesap Adı" class="name" name="hesapadi" value="<?php echo $row["hesap_ad"]; ?>">
                                <i class="fas fa-ad icon" aria-hidden="true"></i>
                            </div>
                        </div>
                        
                        <div class="input-group">
                        <label class="hesaplabel" for="">Hesap Türü</label>
                            <div class="input-box hesapinputbox radiobtn">
                                <?php 
                                    if($row["hesap_tipi"] == "nakit"){
                                        ?>
                                        <input type="radio" id="b1" name="hesapturu" checked class="radio" value="nakit">
                                        <label for="b1"><i class="far fa-money-bill-alt"></i> Nakit</label>
                                        <input type="radio" id="b2" name="hesapturu" class="radio" value="kart">
                                        <label for="b2"><i class="fab fa-cc-visa"></i> Kart</label>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <input type="radio" id="b1" name="hesapturu" class="radio" value="nakit">
                                        <label for="b1"><i class="far fa-money-bill-alt"></i> Nakit</label>
                                        <input type="radio" id="b2" name="hesapturu"  checked class="radio" value="kart">
                                        <label for="b2"><i class="fab fa-cc-visa"></i> Kart</label>
                                        <?php
                                    }
                                ?>
                                
                            </div>
                        </div>
                        <div class="input-group">
                        <label class="hesaplabel" for="">Para Birimi</label>
                            <div class="input-box hesapinputbox">
                                <select name="parabirimi" id="" class="fa selectbx">
                                    <?php 
                                        if($row["hesap_paratipi"] == "Lira"){
                                            ?>
                                            <option value="Lira">&#xf195;<p class="selectbxp">Lira</p></option>
                                            <option value="Dolar">&#xf155;<p class="selectbxp">Dolar</p></option>
                                            <option value="Euro">&#xf153;<p class="selectbxp">Euro</p></option>
                                            <?php
                                        }
                                        else if($row["hesap_paratipi"] == "Dolar"){
                                            ?>
                                            <option value="Dolar">&#xf155;<p class="selectbxp">Dolar</p></option>
                                            <option value="Lira">&#xf195;<p class="selectbxp">Lira</p></option>
                                            <option value="Euro">&#xf153;<p class="selectbxp">Euro</p></option>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <option value="Euro">&#xf153;<p class="selectbxp">Euro</p></option>
                                            <option value="Lira">&#xf195;<p class="selectbxp">Lira</p></option>
                                            <option value="Dolar">&#xf155;<p class="selectbxp">Dolar</p></option>
                                            <?php
                                        }
                                    ?>
                                    
                                    
                                </select>
                            </div>
                        </div>
                        <div class="input-group">
                        <label class="hesaplabel" for="">Para Miktarı</label>
                            <div class="input-box hesapinputbox">  
                                <input type="text" placeholder="Para Miktarı" class="name" name="paramiktari" value="<?php echo $row["hesap_miktari"]; ?>">
                                <i class="fas fa-coins icon"></i>
                            </div>
                        </div>
                        
                        
                        <button class="btn btn-primary" style="width:100%;background:#27a097;padding:10px 20px;margin-top:20px;" onclick="hesapguncelle();">Hesabı Güncelle</button>
                    </form>   
                </div>        
            </div>

            <div class="row" style="margin-top:50px;">
                <div class="col-lg-12">
                    <H2 style="margin-bottom:20px;">Para Transferi</H2>
                    <?php
                        if($hesapturu == "nakit"){
                            ?>
                            <form id="aktarform" onsubmit="return false" style="width:100%;">
                                <div class="input-group">
                                    
                                        <label class="hesaplabel" for="" style="width:30%;">Aktarılacak Hesap Seç</label>
                                        <div class="input-box hesapinputbox" style="width:70% !important;margin-right:0;">
                                            <select name="aktarid" id="aktarid" class="fa selectbx" style="font-family:sans-serif;border-radius:0;border:1px solid #27a097;">
                                            <?php
                                            $aktark = $db->prepare("SELECT * FROM hesaplarim WHERE hesap_tipi=:tip");
                                            $aktark->execute([":tip" => "kart"]);
                                            $aktk = $aktark -> fetchAll(PDO::FETCH_ASSOC);
                                            foreach($aktk as $akk){
                                            ?>
                                            <option value="<?php echo $akk["hesap_id"]; ?>"><p><?php echo $akk["hesap_ad"]," ",$akk["hesap_id"]; ?></p></option>
                                            <?php 
                                            }
                                            ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="input-group">
                                        <label class="hesaplabel" for="" style="width:30%;">Aktarılacak Miktar</label>
                                        <div class="input-box hesapinputbox" style="width:70% !important;margin-right:0;">
                                            <input type="text" name="transferpara" style="width:100%;height:50px;border:1px solid #27a097;padding:0px 10px;" placeholder="Aktarmak istediğiniz miktarı giriniz">
                                        </div>   
                                </div>
                                <button class="btn btn-primary" type="submit" style="width:100%;background:#27a097;padding:10px 20px;margin-top:20px;" name="sec" onclick="aktarsec()">Aktar</button>
                            </form>    
                            <?php
                        }
                        else if($hesapturu == "kart"){
                            ?>
                            <form id="aktarform" onsubmit="return false" style="width:100%;">
                                <div class="input-group">
                                    
                                        <label class="hesaplabel" for="" style="width:30%;">Aktarılacak Hesap Seç</label>
                                        <div class="input-box hesapinputbox" style="width:70% !important;margin-right:0;">
                                            <select name="aktarid" id="aktarid" class="fa selectbx" style="font-family:sans-serif;border-radius:0;border:1px solid #27a097;">
                                            <?php
                                            $aktarh = $db->prepare("SELECT * FROM hesaplarim WHERE hesap_tipi=:tip");
                                            $aktarh->execute([":tip" => "nakit"]);
                                            $akth = $aktarh -> fetchAll(PDO::FETCH_ASSOC);
                                            foreach($akth as $akh){
                                            ?>
                                            <option value="<?php echo $akh["hesap_id"]; ?>"><p><?php echo $akh["hesap_ad"]," ",$akh["hesap_id"]; ?></p></option>
                                            <?php 
                                            }
                                            ?>
                                            </select>
                                        
                                        </div>
                                </div>
                                <div class="input-group">
                                        <label class="hesaplabel" for="" style="width:30%;">Aktarılacak Miktar</label>
                                        <div class="input-box hesapinputbox" style="width:70% !important;margin-right:0;">
                                            <input type="text" name="transferpara" style="width:100%;height:50px;border:1px solid #27a097;padding:0px 10px;" placeholder="Aktarmak istediğiniz miktarı giriniz">
                                        </div>
                                        
                                </div>  
                                
                                <button class="btn btn-primary" type="submit" style="width:100%;background:#27a097;padding:10px 20px;margin-top:20px;" name="sec" onclick="aktarsec()">Aktar</button>
                            </form>    
                            <?php
                        }
                    ?>

                </div>  
                <div class="col-lg-12">
                    <script>
                        function aktarsec(){
                            var aktarid = $("#aktarform").serialize();
                            $.ajax({
                                type : "POST",
                                data : aktarid,
                                url : "hesapislemleriparaaktar.php?id=<?php echo $hesapid ?>",
                                success : function(deger){
                                    if($.trim(deger) == "fazla"){
                                        sweetAlert('hata','Girdiğiniz miktar hesabınızdaki miktardan fazla','error');
                                    }
                                    else if($.trim(deger) == "dogru"){
                                        sweetAlert('Başarılı','Düzenleme İşlemi Başarılı Başarılı','success')
                                        .then((value) => {
                                            window.location.href = "hesapislemleri.php#w";
                                        })
                                        
                                    } 
                                    else if($.trim(deger) == "hata"){
                                        sweetAlert('hata','HATA','error');
                                    } 
                                }
                            });
                        }
                    </script>
                </div>                  
            </div>

            <footer class="row tm-row" >
                <hr class="col-12">
                <div class="col-md-6 col-12 tm-color-gray">
                    Design: <a rel="nofollow" target="_parent" href="https://templatemo.com" class="tm-external-link">Yunus Emre Gözen</a>
                </div>
                <div class="col-md-6 col-12 tm-color-gray tm-copyright">
                    Copyright 2020 Yeg Blog Company Co. Ltd.
                </div>
            </footer>
        </main>
    </div>
  
    <script src="js/templatemo-script.js"></script>
    
</body>
</html>