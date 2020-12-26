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
    <style>
        
       
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
                    <li class="tm-nav-item  active"><a href="kullaniciislemleri.php" class="tm-nav-link">
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
            <!-- Search form -->
                        
           <div class="row">
               <div class="col-lg-12">
                   <div class="wrapper">
                       <h3>Kullanici Bilgileri</h3>

                        <script>
                            function guncelle(){
                                var form = $("#kullanicibilgileri").serialize();
                                $.ajax({
                                    type : "POST",
                                    data : form,
                                    url : "kullanicibilgileriguncelle.php",
                                    success : function(deger){
                                        if($.trim(deger) == "bos"){
                                            sweetAlert('hata','Lütfen boş alan bırakmayınız','error');
                                        }
                                        else if($.trim(deger) == "dogru"){
                                            sweetAlert('Başarılı','Düzenleme İşlemi Başarılı Başarılı','success')
                                            .then((value) => {
                                                window.location.href = "kullaniciislemleri.php";
                                            })
                                            
                                        } 
                                        else if($.trim(deger) == "hata"){
                                            sweetAlert('hata','HATA','error');
                                        }     
                                    }
                                });
                            }
                        </script>

<?php 
    $kullanici = $db->prepare("SELECT * FROM kullanicilar WHERE kul_id=:id");
	$kullanici->execute(["id" => $_SESSION["oturum_id"]]);
	$rows = $kullanici->fetchAll(PDO::FETCH_ASSOC);
?>
<?php 
foreach($rows as $row){

?>
                        <form action="" id="kullanicibilgileri" onsubmit="return false">
                            <input type="hidden" name="id" value="<?php echo $_SESSION['oturum_id']; ?>">
                            <div class="input-group">
                                <div class="input-box">
                                    <input type="text" placeholder="kullanıcı adı" class="name" name="ad" value="<?php echo $row['kul_ad']; ?>">
                                    <i class="fas fa-user icon" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-box"> 
                                    <input type="text" placeholder="kullanıcı soyadı" class="name" name="soyad" value="<?php echo $row['kul_soyad']; ?>">
                                    <i class="fas fa-user icon" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-box">
                                    <input type="email" placeholder="kullanıcı eposta" class="name" name="eposta" value="<?php echo $row['kul_eposta']; ?>">
                                    <i class="fas fa-envelope icon" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-box">
                                    <input type="text" placeholder="kullanıcı şifre" class="name" name="sifre" value="<?php echo $row['kul_sifre']; ?>">
                                    <i class="fas fa-lock icon" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-box">
                                    <input type="text" placeholder="Son giriş tarihi" class="name" readonly value="<?php echo $_SESSION['oturum_girisz']; ?>">
                                    <i class="fas fa-clock icon" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-box">
                                    <input type="text" placeholder="Son çıkış tarihi" class="name" readonly value="<?php echo $_SESSION['oturum_cikisz']; ?>">
                                    <i class="fas fa-clock icon" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="input-box">
                                    <input type="text" placeholder="İp Adresi" class="name" readonly value="<?php echo $_SESSION['oturum_ip']; ?>">
                                    <i class="fas fa-id-card icon" aria-hidden="true"></i>
                                </div>
                            </div>
                            <button class="btn btn-primary" style="width:100%;background:#27a097;padding:10px 20px" onclick="guncelle()">Bilgileri Güncelle</button>
                        </form>
                   <?php
                    }
?>                        
                   </div>
                   
               </div>
           </div>
           
           
        </main>
    </div>
  
    <script src="js/templatemo-script.js"></script>
    
   
</body>
</html>