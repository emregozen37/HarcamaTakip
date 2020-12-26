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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <?php
    date_default_timezone_set('Europe/Istanbul');

        $akaryakittoplam = 0;
        $akaryakit = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori");
        $akaryakit -> execute(array(":kategori" => 'akaryakit'));
        $arows = $akaryakit -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $akaryakittoplam = $akaryakittoplam + $arow['harcama_fiyat'];
        }
        $markettoplam = 0;
        $market = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori");
        $market -> execute(array(":kategori" => 'market'));
        $mrows = $market -> fetchAll(PDO::FETCH_ASSOC);
        foreach($mrows as $mrow){
            $markettoplam = $markettoplam + $mrow['harcama_fiyat'];
        }
        $restoranttoplam = 0;
        $restorant = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori");
        $restorant -> execute(array(":kategori" => 'restorant'));
        $rrows = $restorant -> fetchAll(PDO::FETCH_ASSOC);
        foreach($rrows as $rrow){
            $restoranttoplam = $restoranttoplam + $rrow['harcama_fiyat'];
        }
        $ulasimtoplam = 0;
        $ulasim = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori");
        $ulasim -> execute(array(":kategori" => 'ulasim'));
        $urows = $ulasim -> fetchAll(PDO::FETCH_ASSOC);
        foreach($urows as $urow){
            $ulasimtoplam = $ulasimtoplam + $urow['harcama_fiyat'];
        }
        $hediyetoplam = 0;
        $hediye = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori");
        $hediye -> execute(array(":kategori" => 'hediyeler'));
        $hrows = $hediye -> fetchAll(PDO::FETCH_ASSOC);
        foreach($hrows as $hrow){
            $hediyetoplam = $hediyetoplam + $hrow['harcama_fiyat'];
        }
        $sagliktoplam = 0;
        $saglik = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori");
        $saglik -> execute(array(":kategori" => 'saglik'));
        $srows = $saglik -> fetchAll(PDO::FETCH_ASSOC);
        foreach($srows as $srow){
            $sagliktoplam = $sagliktoplam + $srow['harcama_fiyat'];
        }
        $kiratoplam = 0;
        $kira = $db->prepare("SELECT * FROM gelirler WHERE gelir_kategori=:kategori");
        $kira -> execute(array(":kategori" => 'kira'));
        $kirows = $kira -> fetchAll(PDO::FETCH_ASSOC);
        foreach($kirows as $kirow){
            $kiratoplam = $kiratoplam + $kirow['gelir_fiyat'];
        }
        $maastoplam = 0;
        $maas = $db->prepare("SELECT * FROM gelirler WHERE gelir_kategori=:kategori");
        $maas -> execute(array(":kategori" => 'maaş'));
        $marows = $maas -> fetchAll(PDO::FETCH_ASSOC);
        foreach($marows as $marow){
            $maastoplam = $maastoplam + $marow['gelir_fiyat'];
        }
        $ekistoplam = 0;
        $ekis = $db->prepare("SELECT * FROM gelirler WHERE gelir_kategori=:kategori");
        $ekis -> execute(array(":kategori" => 'ek iş'));
        $ekrows = $ekis -> fetchAll(PDO::FETCH_ASSOC);
        foreach($ekrows as $ekrow){
            $ekistoplam = $ekistoplam + $ekrow['gelir_fiyat'];
        }
        $kyktoplam = 0;
        $kyk = $db->prepare("SELECT * FROM gelirler WHERE gelir_kategori=:kategori");
        $kyk -> execute(array(":kategori" => 'kyk bursu'));
        $kykrows = $kyk -> fetchAll(PDO::FETCH_ASSOC);
        foreach($kykrows as $kykrow){
            $kyktoplam = $kyktoplam + $kykrow['gelir_fiyat'];
        }
        $bugunharcamatoplam=0;
        $haftaharcamatoplam = 0;
        $bugungelirtoplam=0;
        $haftagelirtoplam = 0;
        $zaman = date("Y-m-d");

        $cevir = strtotime('-6 day',strtotime($zaman));
        $hafta = date("Y-m-d",$cevir);
    
    ?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Kategoriler', 'Harcamalar'],
          ['Akaryakıt',  <?php echo $akaryakittoplam ?>],
          ['Hediyeler',  <?php echo $hediyetoplam ?>],
          ['Market',  <?php echo $markettoplam ?>],
          ['Restorant',  <?php echo $restoranttoplam ?>],
          ['Sağlık',  <?php echo $sagliktoplam ?>],
          ['Ulaşım',  <?php echo $ulasimtoplam ?>]
        ]);

        var options = {
          title: 'Giderler',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Kategoriler', 'Gelirler'],
          ['Kira',  <?php echo $kiratoplam ?>],
          ['Maaş',  <?php echo $maastoplam ?>],
          ['Kyk Bursu',  <?php echo $kyktoplam ?>],
          ['Ek İş',  <?php echo $ekistoplam ?>]
        ]);

        var options = {
          title: 'Gelirler',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('gelirler'));

        chart.draw(data, options);
      }
    </script>
    <style>
    .harcamatablo{
        font-size:13px;
    }
    .harcamatablo th,td{
        padding:5px 10px !important;
    }
    .raportablosu th,td{
        padding:10px !important; 
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
                    <li class="tm-nav-item active"><a href="index.php" class="tm-nav-link">
                        <i class="fas fa-home"></i>
                        Genel Bakış 
                    </a></li>
                    
                    <li class="tm-nav-item"><a href="hareketler.php" class="tm-nav-link">
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
            <!-- /Nav -->
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
    <!-- Sol Taraf Bitiş --><!-- Sol Taraf Bitiş --><!-- Sol Taraf Bitiş --><!-- Sol Taraf Bitiş --><!-- Sol Taraf Bitiş -->
    <div class="container-fluid">
        <main class="tm-main" style="padding:20px;">
            
            <div class="row">
                <div class="col-lg-12 header">
                <?php 
                    $kullanici = $db->prepare("SELECT * FROM kullanicilar WHERE kul_id=:id");
                    $kullanici->execute(["id" => $_SESSION["oturum_id"]]);
                    $rows = $kullanici->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <p style="text-transform:uppercase;"><?php foreach($rows as $row){echo "Hoşgeldin : ","<i class='fas fa-user'></i>",$row["kul_ad"]," ",$row["kul_soyad"]; }?></p>
                </div>
                               
            </div>
            <!-- HOŞGELDİNİZ BİTİŞ -->
                  
            <div class="row" style="margin-top:30px;">
                <div class="col-lg-12 mb-4" style="border-bottom:1px solid #000;">
                    <h3 style="float:left;display:contents"><i class="fas fa-shopping-basket"></i> Giderler</h3>
                    <h3 style="text-align:right;float:right;color:red;">
                        <?php 
                            $harcamatoplam = 0;
                            $sorgu = $db->query("SELECT * FROM harcamalar order by harcama_id desc");
                            $rows = $sorgu -> fetchAll(PDO::FETCH_ASSOC);
                            
                            foreach ($rows as $row) { 
                                $harcamatoplam = $harcamatoplam + $row['harcama_fiyat'];
                            
                            }
                            echo "Tüm Giderler Toplamı -",$harcamatoplam;
                        ?>
                    </h3>
                </div>
                <!-- GİDERLER HARCAMA TOPLAM -->
                <div class="col-lg-9">
                        <div class="accordion-item mb-2">
                            <h4 class="accordion-header mb-0" id="bugunh">
                                <button style="border: none;width: 100%;background-color: #D62121;color:#fff;" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Bugünkü Giderler Tablosu
                                </button>
                            </h4>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="bugunh" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <table class="table table-striped harcamatablo">
                                    <thead>
                                        <tr>
                                        <th scope="col">Gider Adı</th>
                                        <th scope="col">Gider Yeri</th>
                                        <th scope="col">Gider Alanı</th>
                                        <th scope="col">Gider Zamanı</th>
                                        <th scope="col">Gider Miktarı</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                        $sorgu = $db->prepare("SELECT * FROM harcamalar WHERE harcama_zaman=:zaman order by harcama_zaman");
                                        $sorgu->execute([":zaman" => $zaman]);
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
                        <div class="accordion-item">
                            <h4 class="accordion-header mb-0" id="haftah">
                                <button style="border: none;width: 100%;background-color: #D62121;color:#fff;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Bu Haftaki Giderler Tablosu
                                </button>
                            </h4>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="haftah" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <table class="table table-striped harcamatablo">
                                    <thead>
                                        <tr>
                                        <th scope="col">Gider Adı</th>
                                        <th scope="col">Gider Yeri</th>
                                        <th scope="col">Gider Alanı</th>
                                        <th scope="col">Gider Zamanı</th>
                                        <th scope="col">Gider Miktarı</th>
                                        </tr>
                                    </thead>
                                    <?php    
                                        $sorgu = $db->prepare("SELECT * FROM harcamalar WHERE harcama_zaman>=:haftabas AND harcama_zaman<=:haftason order by harcama_zaman");
                                        $sorgu->execute([":haftason" => $zaman, ":haftabas" => $hafta]);
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
                </div>
                <!-- GİDERLER GÜNLÜK-HATALIK TABLOSU -->
                <?php  
                    $sorgu = $db->prepare("SELECT * FROM harcamalar WHERE harcama_zaman=:zaman");
                    $sorgu->execute([":zaman" => $zaman]);
                    $rows = $sorgu -> fetchAll(PDO::FETCH_ASSOC);
                    foreach($rows as $row){
                        $bugunharcamatoplam = $bugunharcamatoplam + $row['harcama_fiyat'];
                    }
                    $sorgu2 = $db->prepare("SELECT * FROM harcamalar WHERE harcama_zaman>:haftabas AND harcama_zaman<=:haftason");
                    $sorgu2->execute([":haftabas" => $hafta, ":haftason" => $zaman]);
                    $ekleme = $sorgu2 -> fetchAll(PDO::FETCH_ASSOC);
                    foreach($ekleme as $ekle){
                        $haftaharcamatoplam = $haftaharcamatoplam + $ekle['harcama_fiyat'];
                    }
                ?>
                <div class="col-lg-3">
                    <ul class="list-group">
                        <li class="list-group-item active" aria-disabled="true">Bugünkü Giderler</li>
                        <li class="list-group-item"><?php echo $zaman; ?></li>
                        <li class="list-group-item"><?php echo $bugunharcamatoplam," TL"; ?></li>
                    </ul>
                    <ul class="list-group" style="margin-top:10px;">
                        <li class="list-group-item active" aria-disabled="true">Bu Haftaki Giderler</li>
                        <li class="list-group-item"><?php echo $zaman,"<br>",$hafta; ?></li>
                        <li class="list-group-item"><?php echo $haftaharcamatoplam," TL"; ?></li>
                    </ul>
                </div>  
                <!-- GİDERLER GÜNLÜK-HAFTALIK RAPOR -->
                <div class="col-lg-12 mt-3" style="border-bottom:1px solid #000;">
                    <h3> <i class="fas fa-table"></i> Genel Giderler Kategori Grafiği</h3>
                </div>    
                <div class="col-lg-12">
                    <div id="curve_chart" style="width: 100%; height: 500px"></div>
                </div>
                <!-- GİDERLER GENEL GRAFİK TABLO -->    
            </div>
            <!-- /GİDERLER -->

            <div class="row" style="margin-top:30px;">
                <div class="col-lg-12 mb-4" style="border-bottom:1px solid #000;">   
                    <h3 style="float:left;display:contents"><i class="fas fa-shopping-basket"></i> Gelirler</h3>
                    <h3 style="text-align:right;float:right;color:green;">
                        <?php 
                            $gelirtoplam = 0;
                            $sorgu = $db->query("SELECT * FROM gelirler order by gelir_id desc");
                            $rows = $sorgu -> fetchAll(PDO::FETCH_ASSOC);
                            
                            foreach ($rows as $row) { 
                                $gelirtoplam = $gelirtoplam + $row['gelir_fiyat'];
                            
                            }
                            echo "Tüm Gelirler Toplamı +",$gelirtoplam;
                        ?>
                    </h3>
                </div>
                <!-- GELİRLER TOPLAM -->
                <div class="col-lg-9">
                    <div class="accordion-item mb-2">
                        <h4 class="accordion-header mb-0" id="bugung">
                            <button style="border: none;width: 100%;background-color: #19A230;color:#fff;" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Bugünkü Gelir Tablosu
                            </button>
                        </h4>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="bugung" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class="table table-striped harcamatablo">
                                <thead>
                                    <tr>
                                    <th scope="col">Harcama Adı</th>
                                    <th scope="col">Harcama Alanı</th>
                                    <th scope="col">Harcama Zamanı</th>
                                    <th scope="col">Harcama Fiyatı</th>
                                    </tr>
                                </thead>
                                <?php 
                                    $sorgu = $db->prepare("SELECT * FROM gelirler WHERE gelir_zaman=:zaman order by gelir_zaman");
                                    $sorgu->execute([":zaman" => $zaman]);
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
                    <div class="accordion-item">
                        <h4 class="accordion-header mb-0" id="haftag">
                            <button style="border: none;width: 100%;background-color: #19A230;color:#fff;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Bu Haftaki Gelirler Tablosu
                            </button>
                        </h4>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="haftag" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class="table table-striped harcamatablo">
                                <thead>
                                    <tr>
                                    <th scope="col">Gelir Adı</th>
                                    <th scope="col">Gelir Alanı</th>
                                    <th scope="col">Gelir Zamanı</th>
                                    <th scope="col">Gelir Fiyatı</th>
                                    </tr>
                                </thead>
                                <?php 
                                    $sorgu = $db->prepare("SELECT * FROM gelirler WHERE gelir_zaman>=:haftabas AND gelir_zaman<=:haftason order by gelir_zaman");
                                    $sorgu->execute([":haftason" => $zaman, ":haftabas" => $hafta]);
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
                </div>
                <!-- GELİRLER BUGÜN-HAFTALIK TABLO -->
                <?php 
                    $sorgu = $db->prepare("SELECT * FROM gelirler WHERE gelir_zaman=:zaman");
                    $sorgu->execute([":zaman" => $zaman]);
                    $rows = $sorgu -> fetchAll(PDO::FETCH_ASSOC);
                    foreach($rows as $row){
                        $bugungelirtoplam = $bugungelirtoplam + $row['gelir_fiyat'];
                    }
                    $sorgu2 = $db->prepare("SELECT * FROM gelirler WHERE gelir_zaman>:haftabas AND gelir_zaman<=:haftason");
                    $sorgu2->execute([":haftabas" => $hafta, ":haftason" => $zaman]);
                    $ekleme = $sorgu2 -> fetchAll(PDO::FETCH_ASSOC);
                    foreach($ekleme as $ekle){
                        $haftagelirtoplam = $haftagelirtoplam + $ekle['gelir_fiyat'];
                    }
                ?>
                <div class="col-lg-3">
                    <ul class="list-group">
                        <li class="list-group-item active" aria-disabled="true">Bugünkü Gelirler</li>
                        <li class="list-group-item"><?php echo $zaman; ?></li>
                        <li class="list-group-item"><?php echo $bugungelirtoplam," TL"; ?></li>
                    </ul>
                    <ul class="list-group" style="margin-top:10px;">
                        <li class="list-group-item active" aria-disabled="true">Bu Haftaki Gelirler</li>
                        <li class="list-group-item"><?php echo $zaman,"<br>",$hafta; ?></li>
                        <li class="list-group-item"><?php echo $haftagelirtoplam," TL"; ?></li>
                    </ul>
                </div>  
                <!-- GELİRLER GÜNLÜK-HAFTALIK RAPOR -->
                <div class="col-lg-12 mt-3" style="border-bottom:1px solid #000;">
                    <h3> <i class="fas fa-table"></i> Genel Gelirler Kategori Grafiği</h3>
                </div>    
                <div class="col-lg-12">
                    <div id="gelirler" style="width: 100%; height: 500px"></div>
                </div>
                <!-- GELİRLER GENEL GRAFİK TABLOSU -->
            </div>
            <!-- /GELİRLER -->           
            
            <div class="row">
                <div class="col-lg-12" style="border-bottom:1px solid #000;">
                    <H3><i class="fas fa-plus"></i>/<i class="fas fa-minus"></i> Gelir Gider Raporları</H3>
                </div>
                <div class="col-lg-12">
                    <table class="table raportablosu">
                        <thead>
                            <tr>
                            <th scope="col">///</th>
                            <th scope="col">Günlük</th>
                            <th scope="col">Haftalık</th>
                            <th scope="col">Genel</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">Giderler</th>
                            <td style="color:red;"><?php echo $bugunharcamatoplam ?></td>
                            <td style="color:red;"><?php echo $haftaharcamatoplam ?></td>
                            <td style="color:red;"><?php echo $harcamatoplam ?></td>
                            </tr>
                            <tr>
                            <th scope="row">Gelirler</th>
                            <td style="color:green;"><?php echo $bugungelirtoplam ?></td>
                            <td style="color:green;"><?php echo $haftagelirtoplam ?></td>
                            <td style="color:green;"><?php echo $gelirtoplam ?></td>
                            </tr>
                            <tr>
                            <th scope="row">Durum</th>
                            <td><?php 
                                if($bugungelirtoplam>$bugunharcamatoplam){
                                    $bugundurum = $bugungelirtoplam - $bugunharcamatoplam;
                                    ?>
                                    <p style="color:green !important;font-size:40px;"><?php echo "+",$bugundurum ?></p>
                                    <?php 
                                }
                                else if($bugungelirtoplam<$bugunharcamatoplam){
                                    $bugundurum = $bugunharcamatoplam - $bugungelirtoplam;
                                    ?>
                                    <p style="color:red !important;font-size:40px;"><?php echo "-",$bugundurum ?></p>
                                    <?php 
                                }
                                else{
                                    echo "0";
                                }
                            ?></td>
                            <td><?php 
                                if($haftagelirtoplam>$haftaharcamatoplam){
                                    $haftadurum = $haftagelirtoplam - $haftaharcamatoplam;
                                    ?>
                                    <p style="color:green !important;font-size:40px;"><?php echo "+",$haftadurum ?></p>
                                    <?php 
                                }
                                else if($haftagelirtoplam<$haftaharcamatoplam){
                                    $haftadurum = $haftaharcamatoplam - $haftagelirtoplam;
                                    ?>
                                    <p style="color:red !important;font-size:40px;"><?php echo "-",$haftadurum ?></p>
                                    <?php 
                                }
                                else{
                                    echo "0";
                                }
                            ?></td>
                            <td><?php 
                                if($gelirtoplam>$harcamatoplam){
                                    $geneldurum = $gelirtoplam - $harcamatoplam;
                                    ?>
                                    <p style="color:green !important;font-size:40px;"><?php echo "+",$geneldurum ?></p>
                                    <?php 
                                }
                                else{
                                    $geneldurum = $harcamatoplam - $gelirtoplam;
                                    ?>
                                    <p style="color:red !important;font-size:40px;"><?php echo "-",$geneldurum ?></p>
                                    <?php 
                                }
                            ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>  
            <footer class="row tm-row" >
                <hr class="col-12">
                <div class="col-md-6 col-12 tm-color-gray">
                    Design: <a rel="nofollow" href="#" class="tm-external-link">Yunus Emre Gözen</a>
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