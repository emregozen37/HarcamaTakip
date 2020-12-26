<?php 
include("baglanti.php");
session_start();
if(!isset($_SESSION['oturum'])){
	header("location:login.php");
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <style>
        .selectbx{
            font-weight:400;
            font-family:'raleway';
        }
        .dateinput{
            width: 100%;
            padding: 0px 10px;
            height: 50px;
        }
        .giderekle{
            padding:10px;
            border:1px solid #322E2E;
            border-radius:5px;
            margin-left: 10px;
            max-width: 49%;
        }
        .gelirekle{
            padding:10px;
            height:fit-content;
            border:1px solid #322E2E;
            border-radius:5px;
            margin-right: 10px;
            max-width: 49%;
        }
        .hesaplabel{
            padding:5px 0px !important;
            width:30%;
        }
        .hesapinputbox{
            width:70% !important;
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
                    <li class="tm-nav-item"><a href="index.php" class="tm-nav-link">
                        <i class="fas fa-home"></i>
                        Genel Bakış
                    </a></li>
                    
                    <li class="tm-nav-item  active"><a href="hareketler.php" class="tm-nav-link">
                        <i class="fas fa-chart-line"></i>
                        Hareketler
                    </a></li>
                    <li class="tm-nav-item"><a href="hesapislemleri.php" class="tm-nav-link">
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
        <main class="tm-main" style="padding:20px;">  
            <div class="row mt-3 p-3">
                <div class="col-lg-6 gelirekle">
                    <h3>Yeni Gelir Ekle</h3>

                    <script>
                    function gelirekle(){
                        var gelirekleveriler = $("#gelirekleform").serialize();
                        $.ajax({
                            type : "POST",
                            data : gelirekleveriler,
                            url : "gelirekle.php",
                            success : function(oturumdegerleri){                                    
                                if($.trim(oturumdegerleri) == "dogru"){
                                    sweetAlert('Başarılı','Gelir Başarıyla Eklendi','success')
                                    .then((value) => {
                                        window.location.href = "hareketler.php";
                                    })
                                }
                                else if($.trim(oturumdegerleri) == "bos"){
                                    sweetAlert('hata','Lütfen tüm alanları doldurunuz','error');
                                }
                                else if($.trim(oturumdegerleri) == "yanlis"){
                                    sweetAlert('hata','Bir sorun oluştu','error');
                                }
                            }
                        });

                    }
                    </script>
                    <form id="gelirekleform" onsubmit="return false">
                        
                        <div class="input-group">
                        <label class="hesaplabel" for="">Gelir Adı</label>
                            <div class="input-box hesapinputbox">
                                <input type="text" placeholder="Gelir Adı" class="name" name="geliradi" >
                                <i class="fas fa-ad icon" aria-hidden="true"></i>
                            </div>
                        </div>
                        
                        <div class="input-group">
                        <label class="hesaplabel" for="">Gelir Kategorisi</label>
                            <div class="input-box hesapinputbox">
                                <select name="gelirkategori" id="" class="fa selectbx">
                                    <option value="kira">Kira</option>
                                    <option value="maaş">Maaş</option>
                                    <option value="ek iş">Ek İş</option>
                                    <option value="kyk bursu">KYK Kredi</option>
                                    <option value="satış">Satış</option>
                                </select>
                            </div>
                        </div>

                        <div class="input-group">
                        <label class="hesaplabel" for="">Tarihi</label>
                            <div class="input-box hesapinputbox">  
                                <input type="date" id="start" name="trip-start" class="dateinput" value="" min="2020-01-01" max="2021-12-31">
                            </div>
                        </div>

                        <div class="input-group">
                        <label class="hesaplabel" for="">Gelir Miktarı</label>
                            <div class="input-box hesapinputbox">  
                                <input type="text" placeholder="Gelir Miktarı" class="name" name="gelirmiktari" >
                                <i class="fas fa-coins icon"></i>
                            </div>
                        </div>
                        
                        
                        <button class="btn btn-primary" style="width:100%;padding:10px 20px;" onclick="gelirekle()">Ekle</button>
                    </form>
                </div>
                <div class="col-lg-6 giderekle">
                    <h3>Yeni Gider Ekle</h3>

                    <script>
                    function giderekle(){
                        var giderekleveriler = $("#giderekleform").serialize();
                        $.ajax({
                            type : "POST",
                            data : giderekleveriler,
                            url : "giderekle.php",
                            success : function(oturumdegerleri){                                    
                                if($.trim(oturumdegerleri) == "dogru"){
                                    sweetAlert('Başarılı','Gider Başarıyla Eklendi','success')
                                    .then((value) => {
                                        window.location.href = "hareketler.php";
                                    })
                                }
                                else if($.trim(oturumdegerleri) == "bos"){
                                    sweetAlert('hata','Lütfen tüm alanları doldurunuz','error');
                                }
                                else if($.trim(oturumdegerleri) == "yanlis"){
                                    sweetAlert('hata','Bir sorun oluştu','error');
                                }
                            }
                        });

                    }
                    </script>
                    <form id="giderekleform" onsubmit="return false">
                        
                        <div class="input-group">
                        <label class="hesaplabel" for="">Gider Adı</label>
                            <div class="input-box hesapinputbox">
                                <input type="text" placeholder="Gider Adı" class="name" name="gideradi" >
                                <i class="fas fa-ad icon" aria-hidden="true"></i>
                            </div>
                        </div>
                        
                        <div class="input-group">
                        <label class="hesaplabel" for="">Harcama Yeri</label>
                            <div class="input-box hesapinputbox">  
                                <input type="text" placeholder="Harcama Yeri" class="name" name="gideryer" >
                                <i class="fas fa-map-marked-alt icon"></i>
                            </div>
                        </div>

                        <div class="input-group">
                        <label class="hesaplabel" for="">Gider Kategorisi</label>
                            <div class="input-box hesapinputbox">
                                <select name="giderkategori" id="" class="fa selectbx">
                                    <option value="akaryakit">Akaryakıt</option>
                                    <option value="hediyeler">Hediyeler</option>
                                    <option value="market">Market</option>
                                    <option value="restorant">Restorant</option>
                                    <option value="saglik">Sağlık</option>
                                    <option value="ulasim">Ulaşım</option>
                                </select>
                            </div>
                        </div>

                        <div class="input-group">
                        <label class="hesaplabel" for="">Zaman</label>
                            <div class="input-box hesapinputbox">  
                                <input type="date" id="start" name="giderzaman" class="dateinput" value="" min="2020-01-01" max="2021-12-31">
                            </div>
                        </div>

                        <div class="input-group">
                        <label class="hesaplabel" for="">Gider Miktarı</label>
                            <div class="input-box hesapinputbox">  
                                <input type="text" placeholder="Gider Miktarı" class="name" name="gidermiktari" >
                                <i class="fas fa-coins icon"></i>
                            </div>
                        </div>
                        
                        
                        <button class="btn btn-danger" style="width:100%;padding:10px 20px;" onclick="giderekle()">Ekle</button>
                    </form>
                </div>
            </div>   
            <!-- GELİR - GİDER EKLE FORM -->

            <div class="row mt-5">
                <div class="col-lg-12">
                <!-- /Harcama -->
                    <div class="accordion" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button style="width:100%;border:none;background:#27a097;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Tüm Giderler
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">Gider Adı</th>
                                        <th scope="col">Gider Yeri</th>
                                        <th scope="col">Gider Alanı</th>
                                        <th scope="col">Gider Zamanı</th>
                                        <th scope="col">Gider Fiyatı</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        $sorgu = $db->query("SELECT * FROM harcamalar order by harcama_zaman");
                                        $rows = $sorgu -> fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($rows as $row) {     
                                        ?>
                                        <tbody>
                                            <tr>
                                            <td><?php echo $row["harcama_ad"]; ?></td>
                                            <td><?php echo $row["harcama_yer"];?></td>
                                            <td><?php echo $row["harcama_kategori"]; ?></td>
                                            <td><?php echo $row["harcama_zaman"]; ?></td>
                                            <td><?php echo $row["harcama_fiyat"]; ?></td>
                                            </tr>
                                        </tbody>                   
                                        <?php 
                                        } 
                                    ?>       
                                </table>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item" id="1">
                            <h2 class="accordion-header" id="flush-headingTwo">
                                <button style="width:100%;border:none;background:#27a097;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Belirli Tarihdeki Giderler
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div style="width:100%;height:50px;margin-bottom:35px;">
                                    <h4 style="float:left;">Tarih Seç</h4>
                                    <form style="float:right;" action="hareketler.php" method="POST">
                                        <input type="date" id="start" name="trip-start" value="<?php echo $zaman ?>" min="2020-01-01" max="2021-12-31">
                                        <button type="submit" name="tarihsec">Seç</button>
                                    </form>
                                </div>  
                                <?php  
                                    if(isset($_POST['tarihsec'])){
                                        $zaman = $_POST['trip-start'];
                                        ?>
                                        <h2 style="text-align:center;"><?php echo $zaman; ?> Tarihindeki Giderler</h2> 
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                <th scope="col">Gider Adı</th>
                                                <th scope="col">Gider Yeri</th>
                                                <th scope="col">Gider Alanı</th>
                                                <th scope="col">Gider Fiyatı</th>
                                                </tr>
                                            </thead>
                                            <?php 
                                                $harcamatoplam = 0;
                                                $sorgu = $db->prepare("SELECT * FROM harcamalar WHERE harcama_zaman=:zaman");
                                                $sorgu->execute([":zaman" => $zaman]);
                                                $rows = $sorgu -> fetchAll(PDO::FETCH_ASSOC); 
                                                if($sorgu->rowCount()){
                                                    foreach ($rows as $row) { 
                                                        $harcamatoplam = $harcamatoplam + $row['harcama_fiyat'];
                                                    ?>
                                                    <tbody>
                                                        <tr>
                                                        <td><?php echo $row["harcama_ad"]; ?></td>
                                                        <td><?php echo $row["harcama_yer"];?></td>
                                                        <td><?php echo $row["harcama_kategori"]; ?></td>
                                                        <td><?php echo $row["harcama_fiyat"]; ?></td>
                                                        </tr>
                                                        
                                                    </tbody>               
                                                    <?php 
                                                    }
                                                }
                                                else{
                                                    echo "Bu tarihte bir harcama bulunmamakta";
                                                }         
                                            ?>
                                                
                                        </table> 
                                        <div class="toplamharcama">
                                            <p>Toplam Harcama</p>
                                            <p style="text-align:right;float:right;padding-right:90px"><?php echo $harcamatoplam ?> TL</p>
                                        </div>
                                        <?php
                                    }
                                    else{
                                        echo "Zaman Seç";
                                    }
                                ?>
                                                
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item" id="2">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button style="width:100%;border:none;background:#27a097;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    Tüm Gelirler
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">Gelir Adı</th>
                                        <th scope="col">Gelir Alanı</th>
                                        <th scope="col">Gelir Zamanı</th>
                                        <th scope="col">Gelir Fiyatı</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        $sorgu = $db->query("SELECT * FROM gelirler order by gelir_zaman");
                                        $rows = $sorgu -> fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($rows as $row) {     
                                        ?>
                                        <tbody>
                                            <tr>
                                            <td><?php echo $row["gelir_ad"]; ?></td>
                                            <td><?php echo $row["gelir_kategori"]; ?></td>
                                            <td><?php echo $row["gelir_zaman"]; ?></td>
                                            <td><?php echo $row["gelir_fiyat"]; ?></td>
                                            </tr>
                                        </tbody>                   
                                        <?php 
                                        } 
                                    ?>       
                                </table>
                            </div>
                            </div>
                        </div>
                        <div class="accordion-item" id="3">
                            <h2 class="accordion-header" id="flush-headingFour">
                                <button style="width:100%;border:none;background:#27a097;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                    Belirli Tarihdeki Gelirler
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div style="width:100%;height:50px;margin-bottom:35px;">
                                    <h4 style="float:left;">Tarih Seç</h4>
                                    <form style="float:right;" action="hareketler.php" method="POST">
                                        <input type="date" id="start" name="trip-start" value="<?php echo $zaman ?>" min="2020-01-01" max="2021-12-31">
                                        <button type="submit" name="tarihsecgelirler">Seç</button>
                                    </form>
                                </div>  
                                <?php  
                                    if(isset($_POST['tarihsecgelirler'])){
                                        $zaman = $_POST['trip-start'];
                                        ?>
                                        <h2 style="text-align:center;"><?php echo $zaman; ?> Tarihindeki Gelirler</h2> 
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                <th scope="col">Gelir Adı</th>
                                                <th scope="col">Gelir Alanı</th>
                                                <th scope="col">Gelir Fiyatı</th>
                                                </tr>
                                            </thead>
                                            <?php 
                                                $gelirtoplam = 0;
                                                $sorgu = $db->prepare("SELECT * FROM gelirler WHERE gelir_zaman=:zaman");
                                                $sorgu->execute([":zaman" => $zaman]);
                                                $rows = $sorgu -> fetchAll(PDO::FETCH_ASSOC); 
                                                if($sorgu->rowCount()){
                                                    foreach ($rows as $row) { 
                                                        $gelirtoplam = $gelirtoplam + $row['gelir_fiyat'];
                                                    ?>
                                                    <tbody>
                                                        <tr>
                                                        <td><?php echo $row["gelir_ad"]; ?></td>
                                                        <td><?php echo $row["gelir_kategori"]; ?></td>
                                                        <td><?php echo $row["gelir_fiyat"]; ?></td>
                                                        </tr>
                                                        
                                                    </tbody>               
                                                    <?php 
                                                    }
                                                }
                                                else{
                                                    echo "Bu tarihte bir gelir bulunmamakta";
                                                }         
                                            ?>
                                                
                                        </table> 
                                        <div class="toplamharcama">
                                            <p>Toplam Gelir</p>
                                            <p style="text-align:right;float:right;padding-right:90px"><?php echo $gelirtoplam ?> TL</p>
                                        </div>
                                        <?php
                                    }
                                    else{
                                        echo "Zaman Seç";
                                    }
                                ?>
                                                
                            </div>
                            </div>
                        </div>        
                    </div>    
                </div>
            </div>
           <!-- GELİR GİDER AKORDİYON -->
            
        </main>
    </div>
  
    <script src="js/templatemo-script.js"></script>
    
   
</body>
</html>