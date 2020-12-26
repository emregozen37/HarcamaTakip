<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Giriş Yap</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/login.css" rel="stylesheet">


	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">


			<script type="text/javascript">
             function oturumac(){
              var formveriler = $("#girisform").serialize();
              $.ajax({
                  type : "POST",
                  data : formveriler,
                  url : "oturumac.php",
                  success : function(oturumdegerleri){
                     
                        if($.trim(oturumdegerleri) == "bos"){
                            sweetAlert('hata','Lütfen boş alan bırakmayınız','error');
                        } 
                        else if($.trim(oturumdegerleri) == "dogru"){
                            sweetAlert('Başarılı','Giriş Başarılı','success')
                            .then((value) => {
                                window.location.href = "index.php";
                            })
                        }
                        else if($.trim(oturumdegerleri) == "onaysız"){
                            sweetAlert('hata','Kayıt işleminiz henüz admin tarafından onaylanmadı. Lütfen bekleyiniz.','error');
                        }
                        else if($.trim(oturumdegerleri) == "yanlis"){
                            sweetAlert('hata','Kullanıcı adınız ya da şifreniz yanlış. Lütfen tekrar deneyiniz.','error');
                        }
                    }
                });

            }
            </script>

				<form id="girisform" onsubmit="return false">
				<h3>Kullanıcı Girişi</h3>
					<div class="form-group">
						<label for="">Kullanıcı E-Posta</label>
						<input type="text" class="form-control" name="kuleposta">
					</div>
					<div class="form-group">
						<label for="">Kullanıcı Şifre</label>
						<input type="password" class="form-control" name="kulsifre">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary" onclick="oturumac()">Giriş Yap</button>
					</div>
					
					
				</form>
				
			</div>
		</div>
	</div>
	
	
</body>
</html>
