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
                    <h2 style="margin-bottom:30px;">Hesap Ekleme Formu</h2>
                    <script type="text/javascript">
                        function hesapekle(){
                        var hesapveriler = $("#hesapbilgiform").serialize();
                        $.ajax({
                            type : "POST",
                            data : hesapveriler,
                            url : "hesapekle.php",
                            success : function(oturumdegerleri){
                                
                                    if($.trim(oturumdegerleri) == "bos"){
                                        sweetAlert('hata','Lütfen boş alan bırakmayınız','error');
                                    } 
                                    else if($.trim(oturumdegerleri) == "dogru"){
                                        sweetAlert('Başarılı','Hesap Başarıyla Eklendi','success')
                                        .then((value) => {
                                            window.location.href = "hesapislemleri.php";
                                        })
                                    }
                                    else if($.trim(oturumdegerleri) == "yanlis"){
                                        sweetAlert('hata','Bir sorun oluştu','error');
                                    }
                                }
                            });
                        }
                    </script>
                    <form id="hesapbilgiform" onsubmit="return false">
                        <div class="input-group">
                        <label class="hesaplabel" for="">Hesap Adı</label>
                            <div class="input-box hesapinputbox">
                                <input type="text" placeholder="Hesap Adı" class="name" name="hesapadi" >
                                <i class="fas fa-user icon" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="input-group">
                        <label class="hesaplabel" for="">Hesap Türü</label>
                            <div class="input-box hesapinputbox radiobtn">
                                <input type="radio" id="b1" name="hesapturu" checked class="radio" value="nakit">
                                <label for="b1"><i class="far fa-money-bill-alt"></i> Nakit</label>
                                <input type="radio" id="b2" name="hesapturu" class="radio" value="kart">
                                <label for="b2"><i class="fab fa-cc-visa"></i> Kart</label>
                            </div>
                        </div>
                        <div class="input-group">
                        <label class="hesaplabel" for="">Para Birimi</label>
                            <div class="input-box hesapinputbox">
                                <select name="parabirimi" id="" class="fa selectbx">
                                    <option value="Dolar">&#xf155;<p class="selectbxp">Dolar</p></option>
                                    <option value="Euro">&#xf153;<p class="selectbxp">Euro</p></option>
                                    <option value="Lira">&#xf195;<p class="selectbxp">Lira</p></option>
                                </select>
                            </div>
                        </div>
                        <div class="input-group">
                        <label class="hesaplabel" for="">Para Miktarı</label>
                            <div class="input-box hesapinputbox">  
                                <input type="text" placeholder="Para Miktarı" class="name" name="paramiktari" >
                                <i class="fas fa-coins icon"></i>
                            </div>
                        </div>
                        
                        
                        <button class="btn btn-primary" style="width:100%;background:#27a097;padding:10px 20px;margin-top:20px;" onclick="hesapekle()">Hesap Ekle</button>
                    </form>
                </div>
            </div>
           
            <div class="row" style="margin-top:30px;">
                <div class="col-lg-12">
                <h3>Para transferi & hesaba para eklemek için aktarım yapacağınız hesabın düzenle butonuna basınız.</h3>
                </div>
            </div>
            <div class="row" style="margin-top:50px;" id="w">
                <div class="col-lg-6">
                    <h3 style="margin-bottom:20px;">Nakit Hesaplarım</h3>
                    
                    
                        <?php 
                            $nakit = "nakit";
                            $nakithesap = $db->prepare("SELECT * FROM hesaplarim WHERE hesap_tipi=:tip");
                            $nakithesap->execute([":tip" => $nakit]);
                            $nkth = $nakithesap -> fetchAll(PDO::FETCH_ASSOC);
                                
                            foreach($nkth as $nkt){
                            ?>
                                <div class="card text-white bg-warning mb-3">
                                    <div class="card-header"><?php echo "Hesap Adı :",$nkt["hesap_ad"] ?></div>
                                    <div class="card-body">
                                        <h5 class="card-title" style="margin-bottom:40px;"><?php echo "Hesap Numarası :",$nkt["hesap_id"]; ?></h5>
                                        <div class="hesapparacard">
                                        <p class="card-text" style="font-size:40px;"><?php echo $numberformat = number_format($nkt["hesap_miktari"], 2, '.', ''),$nkt["hesap_paratipi"]; ?></p>
                                        </div>
                                        <div style="position:relative;">
                                            <table class="table" style="position:absolute;position: absolute;right: 93px;bottom: -66px;">
                                                <thead style="display:none;">
                                                </thead>
                                                <tbody style="text-align: center;">
                                                    <tr>
                                                        <td style="display:none;" scope="row"><?php echo $nkt["hesap_id"]; ?></td>
                                                        <td style="border:none;"><button style="float:right;float: right;height: 38px;padding: 6px 15px;"  type="button" class="btn btn-danger deletebtn" >Sil</button></td>
                                                    </tr>
                                                </tbody> 
                                            </table> 
                                        <a href="hesapislemleriduzenle.php?id=<?php echo $nkt["hesap_id"]; ?>" style="float:right;margin-right:10px;" class="btn btn-primary">Düzenle</a>
                                        </div>  
                                    </div>
                                </div>
                                        
                                    
                                
                            <?php
                            }
                            
                        ?>
                    
                </div>
                <div class="col-lg-6" style="text-align:right;">
                    <h3 style="margin-bottom:20px;">Kart Hesaplarım</h3>
                    <form onsubmit="return false" id="karthesapform">
                    <?php 
                        $kart = "kart";
                        $Karthesap = $db->prepare("SELECT * FROM hesaplarim WHERE hesap_tipi=:tip");
                        $Karthesap->execute([":tip" => $kart]);
                        $krth = $Karthesap -> fetchAll(PDO::FETCH_ASSOC);
                            
                        foreach($krth as $krt){
                            ?>
                                <div class="card text-white bg-info mb-3">
                                    <div class="card-header"><?php echo "Hesap Adı :",$krt["hesap_ad"]; ?></div>
                                    <div class="card-body">
                                        <h5 class="card-title" style="margin-bottom:40px;"><?php echo "Hesap Numarası :",$krt["hesap_id"]; ?></h5>
                                        <div class="hesapparacard">
                                        <p class="card-text" style="font-size:40px;float:right;"><?php echo $numberformat = number_format($krt["hesap_miktari"], 2, '.', ''),$krt["hesap_paratipi"]; ?></p>
                                        </div>
                                        <div style="position:relative;">
                                            <table class="table" style="position:absolute;position: absolute;right: 93px;bottom: -66px;">
                                                <thead style="display:none;">
                                                </thead>
                                                <tbody style="text-align: center;">
                                                    <tr>
                                                        <td style="display:none;" scope="row"><?php echo $krt["hesap_id"]; ?></td>
                                                        <td style="border:none;"><button style="float:right;float: right;height: 38px;padding: 6px 15px;"  type="button" class="btn btn-danger deletebtn" >Sil</button></td>
                                                    </tr>
                                                </tbody> 
                                            </table> 
                                        <a href="hesapislemleriduzenle.php?id=<?php echo $krt["hesap_id"]; ?>" style="float:right;margin-right:10px;" class="btn btn-primary">Düzenle</a>
                                        </div>  
                                    </div>
                                </div>
                                        
                                    
                                
                            <?php
                        }
                        
                    ?>
                    </form>
                </div>  
            </div>            
            
            <div class="col-lg-12">


<!-- Modal -->


<script>
    function sil(){
    var formid = $("#hesapsilform").serialize();
    $.ajax({
        type : "POST",
        data : formid,
        url : "hesapsil.php",
        success : function(silmek){
            if($.trim(silmek) == "hata"){
                sweetAlert('hata','Bu veri silinemedi','error');
            }
            else if($.trim(silmek) == "dogru"){
                sweetAlert('Başarılı','Veri silme işlemi başarıyla gerçekleşti','success')
                .then((value) => {
                    window.location.href = "hesapislemleri.php";
                })
                
            }
            else if($.trim(silmek) == "para"){
                sweetAlert('Bilgi','Hesabınızdaki parayı lütfen başka hesaplara aktarınız','info');        
            }
        }
    });

    }
</script>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hesap Silme</h5>
        <button type="button" style="border: none;font-size: 40px;background: none;" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <form id="hesapsilform" onsubmit="return false">
                <input type="hidden" name="id" id="delete_id">
				<h3 style="text-align: center;">Silmek istediğinize emin misiniz ?</h3>
                <p style="text-align: center;color:#000 !important;">Hesabı Silmeden önce paranızı aktarmayı unutmayın...</p> 	
	      		<p style="text-align: center;color:#000 !important;">Bu Hesap kalıcı olarak silinecektir</p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
        <button type="button" class="btn btn-danger" onclick="sil();">Evet, Sil</button>
      </div>
    </div>
  </div>
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
    <script>
		$(document).ready(function () {
			
			$('.deletebtn').on('click', function() {
				$('#exampleModal').modal('show');

				$tr = $(this).closest('tr');
				var data = $tr.children("td").map(function(){
					return $(this).text();
				}).get();

				console.log(data);
				var id = $('#delete_id').val(data[0]);
			});	
			
		});	
	</script>
</body>
</html>