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

    <?php 
        date_default_timezone_set('Europe/Istanbul');
        $bugun = date("Y-m-d");
        $akaryakittoplambugun = 0;
        $akaryakit = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $akaryakit -> execute(array(":kategori" => 'akaryakit', ":zaman" => $bugun));
        $arows = $akaryakit -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $akaryakittoplambugun = $akaryakittoplambugun + $arow['harcama_fiyat'];
        }
        $sagliktoplambugun = 0;
        $akaryakit = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $akaryakit -> execute(array(":kategori" => 'saglik', ":zaman" => $bugun));
        $arows = $akaryakit -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $sagliktoplambugun = $sagliktoplambugun + $arow['harcama_fiyat'];
        }
        $hediyelertoplambugun = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'hediyeler', ":zaman" => $bugun));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $hediyelertoplambugun = $hediyelertoplambugun + $arow['harcama_fiyat'];
        }
        $retoranttoplambugun = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'restorant', ":zaman" => $bugun));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $retoranttoplambugun = $retoranttoplambugun + $arow['harcama_fiyat'];
        }
        $ulasimtoplambugun = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'ulasim', ":zaman" => $bugun));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $ulasimtoplambugun = $ulasimtoplambugun + $arow['harcama_fiyat'];
        }
        $markettoplambugun = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'market', ":zaman" => $bugun));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $markettoplambugun = $markettoplambugun + $arow['harcama_fiyat'];
        }
        $ortalamabugun = ($markettoplambugun + $ulasimtoplambugun + $retoranttoplambugun + $hediyelertoplambugun + $sagliktoplambugun + $akaryakittoplambugun) / 6;

        // ////////////////////////////////////////////////////////////////////////////////////////////////
        $bugunc = strtotime('-1 day',strtotime($bugun));
        $bugun1 = date("Y-m-d",$bugunc);
        $akaryakittoplambugun1 = 0;
        $akaryakit = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $akaryakit -> execute(array(":kategori" => 'akaryakit', ":zaman" => $bugun1));
        $arows = $akaryakit -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $akaryakittoplambugun1 = $akaryakittoplambugun1 + $arow['harcama_fiyat'];
        }
        $sagliktoplambugun1 = 0;
        $akaryakit = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $akaryakit -> execute(array(":kategori" => 'saglik', ":zaman" => $bugun1));
        $arows = $akaryakit -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $sagliktoplambugun1 = $sagliktoplambugun1 + $arow['harcama_fiyat'];
        }
        $hediyelertoplambugun1 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'hediyeler', ":zaman" => $bugun1));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $hediyelertoplambugun1 = $hediyelertoplambugun1 + $arow['harcama_fiyat'];
        }
        $retoranttoplambugun1 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'restorant', ":zaman" => $bugun1));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $retoranttoplambugun1 = $retoranttoplambugun1 + $arow['harcama_fiyat'];
        }
        $ulasimtoplambugun1 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'ulasim', ":zaman" => $bugun1));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $ulasimtoplambugun1 = $ulasimtoplambugun1 + $arow['harcama_fiyat'];
        }
        $markettoplambugun1 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'market', ":zaman" => $bugun1));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $markettoplambugun1 = $markettoplambugun1 + $arow['harcama_fiyat'];
        }
        $ortalamabugun1 = ($markettoplambugun1 + $ulasimtoplambugun1 + $retoranttoplambugun1 + $hediyelertoplambugun1 + $sagliktoplambugun1 + $akaryakittoplambugun1) / 6;

        // //////////////////////////////////////////////////////////////////////////////////////////////////////


        $bugunc2 = strtotime('-2 day',strtotime($bugun));
        $bugun2 = date("Y-m-d",$bugunc2);
        $akaryakittoplambugun2 = 0;
        $akaryakit = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $akaryakit -> execute(array(":kategori" => 'akaryakit', ":zaman" => $bugun2));
        $arows = $akaryakit -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $akaryakittoplambugun2 = $akaryakittoplambugun2 + $arow['harcama_fiyat'];
        }
        $sagliktoplambugun2 = 0;
        $akaryakit = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $akaryakit -> execute(array(":kategori" => 'saglik', ":zaman" => $bugun2));
        $arows = $akaryakit -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $sagliktoplambugun2 = $sagliktoplambugun2 + $arow['harcama_fiyat'];
        }
        $hediyelertoplambugun2 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'hediyeler', ":zaman" => $bugun2));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $hediyelertoplambugun2 = $hediyelertoplambugun2 + $arow['harcama_fiyat'];
        }
        $retoranttoplambugun2 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'restorant', ":zaman" => $bugun2));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $retoranttoplambugun2 = $retoranttoplambugun2 + $arow['harcama_fiyat'];
        }
        $ulasimtoplambugun2 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'ulasim', ":zaman" => $bugun2));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $ulasimtoplambugun2 = $ulasimtoplambugun2 + $arow['harcama_fiyat'];
        }
        $markettoplambugun2 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'market', ":zaman" => $bugun2));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $markettoplambugun2 = $markettoplambugun2 + $arow['harcama_fiyat'];
        }
        $ortalamabugun2 = ($markettoplambugun2 + $ulasimtoplambugun2 + $retoranttoplambugun2 + $hediyelertoplambugun2 + $sagliktoplambugun2 + $akaryakittoplambugun2) / 6;

        // //////////////////////////////////////////////////////////////////////////////////////////////////        
        $bugunc3 = strtotime('-3 day',strtotime($bugun));
        $bugun3 = date("Y-m-d",$bugunc3);
        $akaryakittoplambugun3 = 0;
        $akaryakit = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $akaryakit -> execute(array(":kategori" => 'akaryakit', ":zaman" => $bugun3));
        $arows = $akaryakit -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $akaryakittoplambugun3 = $akaryakittoplambugun3 + $arow['harcama_fiyat'];
        }
        $sagliktoplambugun3 = 0;
        $akaryakit = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $akaryakit -> execute(array(":kategori" => 'saglik', ":zaman" => $bugun3));
        $arows = $akaryakit -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $sagliktoplambugun3 = $sagliktoplambugun3 + $arow['harcama_fiyat'];
        }
        $hediyelertoplambugun3 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'hediyeler', ":zaman" => $bugun3));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $hediyelertoplambugun3 = $hediyelertoplambugun3 + $arow['harcama_fiyat'];
        }
        $retoranttoplambugun3 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'restorant', ":zaman" => $bugun3));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $retoranttoplambugun3 = $retoranttoplambugun3 + $arow['harcama_fiyat'];
        }
        $ulasimtoplambugun3 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'ulasim', ":zaman" => $bugun3));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $ulasimtoplambugun3 = $ulasimtoplambugun3 + $arow['harcama_fiyat'];
        }
        $markettoplambugun3 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'market', ":zaman" => $bugun3));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $markettoplambugun3 = $markettoplambugun3 + $arow['harcama_fiyat'];
        }
        $ortalamabugun3 = ($markettoplambugun3 + $ulasimtoplambugun3 + $retoranttoplambugun3 + $hediyelertoplambugun3 + $sagliktoplambugun3 + $akaryakittoplambugun3) / 6;

        // //////////////////////////////////////////////////////////////////////////////////////////////////////////
        $bugunc4 = strtotime('-4 day',strtotime($bugun));
        $bugun4 = date("Y-m-d",$bugunc4);
        $akaryakittoplambugun4 = 0;
        $akaryakit = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $akaryakit -> execute(array(":kategori" => 'akaryakit', ":zaman" => $bugun4));
        $arows = $akaryakit -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $akaryakittoplambugun4 = $akaryakittoplambugun4 + $arow['harcama_fiyat'];
        }
        $sagliktoplambugun4 = 0;
        $akaryakit = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $akaryakit -> execute(array(":kategori" => 'saglik', ":zaman" => $bugun4));
        $arows = $akaryakit -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $sagliktoplambugun4 = $sagliktoplambugun4 + $arow['harcama_fiyat'];
        }
        $hediyelertoplambugun4 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'hediyeler', ":zaman" => $bugun4));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $hediyelertoplambugun4 = $hediyelertoplambugun4 + $arow['harcama_fiyat'];
        }
        $retoranttoplambugun4 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'restorant', ":zaman" => $bugun4));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $retoranttoplambugun4 = $retoranttoplambugun4 + $arow['harcama_fiyat'];
        }
        $ulasimtoplambugun4 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'ulasim', ":zaman" => $bugun4));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $ulasimtoplambugun4 = $ulasimtoplambugun4 + $arow['harcama_fiyat'];
        }
        $markettoplambugun4 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'market', ":zaman" => $bugun4));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $markettoplambugun4 = $markettoplambugun4 + $arow['harcama_fiyat'];
        }
        $ortalamabugun4 = ($markettoplambugun4 + $ulasimtoplambugun4 + $retoranttoplambugun4 + $hediyelertoplambugun4 + $sagliktoplambugun4 + $akaryakittoplambugun4) / 6;


        $bugunc5 = strtotime('-5 day',strtotime($bugun));
        $bugun5 = date("Y-m-d",$bugunc5);
        $akaryakittoplambugun5 = 0;
        $akaryakit = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $akaryakit -> execute(array(":kategori" => 'akaryakit', ":zaman" => $bugun5));
        $arows = $akaryakit -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $akaryakittoplambugun5 = $akaryakittoplambugun5 + $arow['harcama_fiyat'];
        }
        $sagliktoplambugun5 = 0;
        $akaryakit = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $akaryakit -> execute(array(":kategori" => 'saglik', ":zaman" => $bugun5));
        $arows = $akaryakit -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $sagliktoplambugun5 = $sagliktoplambugun5 + $arow['harcama_fiyat'];
        }
        $hediyelertoplambugun5 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'hediyeler', ":zaman" => $bugun5));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $hediyelertoplambugun5 = $hediyelertoplambugun5 + $arow['harcama_fiyat'];
        }
        $retoranttoplambugun5 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'restorant', ":zaman" => $bugun5));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $retoranttoplambugun5 = $retoranttoplambugun5 + $arow['harcama_fiyat'];
        }
        $ulasimtoplambugun5 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'ulasim', ":zaman" => $bugun5));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $ulasimtoplambugun5 = $ulasimtoplambugun5 + $arow['harcama_fiyat'];
        }
        $markettoplambugun5 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'market', ":zaman" => $bugun5));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $markettoplambugun5 = $markettoplambugun5 + $arow['harcama_fiyat'];
        }
        $ortalamabugun5 = ($markettoplambugun5 + $ulasimtoplambugun5 + $retoranttoplambugun5 + $hediyelertoplambugun5 + $sagliktoplambugun5 + $akaryakittoplambugun5) / 6;

        // //////////////////////////////////////////////////////////////////////////////////////////////////////
        $bugunc6 = strtotime('-6 day',strtotime($bugun));
        $bugun6 = date("Y-m-d",$bugunc6);
        $akaryakittoplambugun6 = 0;
        $akaryakit = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $akaryakit -> execute(array(":kategori" => 'akaryakit', ":zaman" => $bugun6));
        $arows = $akaryakit -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $akaryakittoplambugun6 = $akaryakittoplambugun6 + $arow['harcama_fiyat'];
        }
        $sagliktoplambugun6 = 0;
        $akaryakit = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $akaryakit -> execute(array(":kategori" => 'saglik', ":zaman" => $bugun6));
        $arows = $akaryakit -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $sagliktoplambugun6 = $sagliktoplambugun6 + $arow['harcama_fiyat'];
        }
        $hediyelertoplambugun6 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'hediyeler', ":zaman" => $bugun6));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $hediyelertoplambugun6 = $hediyelertoplambugun6 + $arow['harcama_fiyat'];
        }
        $retoranttoplambugun6 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'restorant', ":zaman" => $bugun6));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $retoranttoplambugun6 = $retoranttoplambugun6 + $arow['harcama_fiyat'];
        }
        $ulasimtoplambugun6 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'ulasim', ":zaman" => $bugun6));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $ulasimtoplambugun6 = $ulasimtoplambugun6 + $arow['harcama_fiyat'];
        }
        $markettoplambugun6 = 0;
        $hediyeler = $db->prepare("SELECT * FROM harcamalar WHERE harcama_kategori=:kategori AND harcama_zaman=:zaman");
        $hediyeler -> execute(array(":kategori" => 'market', ":zaman" => $bugun));
        $arows = $hediyeler -> fetchAll(PDO::FETCH_ASSOC);
        foreach($arows as $arow){
            $markettoplambugun6 = $markettoplambugun6 + $arow['harcama_fiyat'];
        }
        $ortalamabugun6 = ($markettoplambugun6 + $ulasimtoplambugun6 + $retoranttoplambugun6 + $hediyelertoplambugun6 + $sagliktoplambugun6 + $akaryakittoplambugun6) / 6;

    ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
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
                    <li class="tm-nav-item  active"><a href="kategoriler.php" class="tm-nav-link">
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
            <!-- Search form -->
            <div class="row tm-row">
                <div class="col-lg-12 header">
                <i class="fas fa-shopping-basket"></i>
                <p>Kategorilere Göre Genel Harcamalar</p>
                </div>
                               
            </div>  
            
            <?php 
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
               
            ?>
            <div class="row tm-row" style="margin-top:50px;">
                <div class="col-lg-3 hrc">
                    <p style="color:#000 !important;">Akaryakıt</p>
                    <div class="harcama akaryakit">
                        <i class="fas fa-oil-can"></i>
                        
                        <span><?php echo $akaryakittoplam ?> TL</span>
                    </div>
                    <p>Restourant</p>
                    <div class="harcama restourant">
                        <i class="fas fa-utensils"></i>
                        
                        <span><?php echo $restoranttoplam ?> TL</span>
                    </div>
                    <p>Hediyeler</p>
                    <div class="harcama hediye">
                        <i class="fas fa-gifts"></i>
                        
                        <span><?php echo $hediyetoplam ?> TL</span>
                    </div>
                </div>
                <div class="col-lg-6">
                <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Akaryakıt',     <?php echo $akaryakittoplam ?>],
          ['Hediyelik',      <?php echo $hediyetoplam ?>],
          ['Market',  <?php echo $markettoplam ?>],
          ['Sağlık', <?php echo $sagliktoplam ?>],
          ['Restorant',    <?php echo $restoranttoplam ?>],
          ['Ulaşım',    <?php echo $ulasimtoplam ?>]
        ]);

        var options = {
          title: 'Harcama Grafiği',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
                    <div id="donutchart" style="margin-top:70px; height: 500px;"></div>
                </div>
                <div class="col-lg-3 hrc">
                    <p>Market</p>
                    <div class="harcama market">
                        <i class="fas fa-store-alt"></i>
                        
                        <span><?php echo $markettoplam ?> TL</span>
                    </div>
                    <p>Ulaşım</p>
                    <div class="harcama ulasim">
                        <i class="fas fa-car"></i>
                        
                        <span><?php echo $ulasimtoplam ?> TL</span>
                    </div>
                    <p>Sağlık</p>
                    <div class="harcama saglik">
                        <i class="fas fa-hospital"></i>
                        
                        <span><?php echo $sagliktoplam ?> TL</span>
                    </div>
                </div>    
                   
                
            </div>
            
            <div class="row">
                <div class="col-lg-12 header mt-5">
                    <i class="fas fa-shopping-basket"></i>
                    <p>Kategorilere Göre Günlük Harcamalar</p>
                </div>
                <div class="col-lg-12">
        
                        <script type="text/javascript">
                        google.charts.load('current', {'packages':['corechart']});
                        google.charts.setOnLoadCallback(drawVisualization);

                        function drawVisualization() {
                            // Some raw data (not necessarily accurate)
                            var data = google.visualization.arrayToDataTable([
                            ['Günler', 'Sağlık', 'Akaryakıt', 'Hediyeler', 'Restorant', 'Ulaşım', 'Market', 'Ortalama'],
                            ['<?php echo $bugun6 ?>',  <?php echo $sagliktoplambugun6 ?>,      <?php echo $akaryakittoplambugun6 ?>,        <?php echo $hediyelertoplambugun6 ?>,         <?php echo $retoranttoplambugun6 ?>,           <?php echo $ulasimtoplambugun6 ?>, <?php echo $markettoplambugun6 ?>,     <?php echo $ortalamabugun6?>],
                            ['<?php echo $bugun5 ?>',  <?php echo $sagliktoplambugun5 ?>,      <?php echo $akaryakittoplambugun5 ?>,        <?php echo $hediyelertoplambugun5 ?>,         <?php echo $retoranttoplambugun5 ?>,           <?php echo $ulasimtoplambugun5 ?>, <?php echo $markettoplambugun5 ?>,     <?php echo $ortalamabugun5?>],
                            ['<?php echo $bugun4 ?>',  <?php echo $sagliktoplambugun4 ?>,      <?php echo $akaryakittoplambugun4 ?>,        <?php echo $hediyelertoplambugun4 ?>,         <?php echo $retoranttoplambugun4 ?>,           <?php echo $ulasimtoplambugun4 ?>, <?php echo $markettoplambugun4 ?>,     <?php echo $ortalamabugun4?>],
                            ['<?php echo $bugun3 ?>',  <?php echo $sagliktoplambugun3 ?>,      <?php echo $akaryakittoplambugun3 ?>,        <?php echo $hediyelertoplambugun3 ?>,         <?php echo $retoranttoplambugun3 ?>,           <?php echo $ulasimtoplambugun3 ?>, <?php echo $markettoplambugun3 ?>,     <?php echo $ortalamabugun3?>],
                            ['<?php echo $bugun2 ?>',  <?php echo $sagliktoplambugun2 ?>,      <?php echo $akaryakittoplambugun2 ?>,        <?php echo $hediyelertoplambugun2 ?>,         <?php echo $retoranttoplambugun2 ?>,           <?php echo $ulasimtoplambugun2 ?>, <?php echo $markettoplambugun2 ?>,     <?php echo $ortalamabugun2?>],
                            ['<?php echo $bugun1 ?>',  <?php echo $sagliktoplambugun1 ?>,      <?php echo $akaryakittoplambugun1 ?>,        <?php echo $hediyelertoplambugun1 ?>,         <?php echo $retoranttoplambugun1 ?>,           <?php echo $ulasimtoplambugun1 ?>, <?php echo $markettoplambugun1 ?>,     <?php echo $ortalamabugun1?>],
                            ['<?php echo $bugun ?>',  <?php echo $sagliktoplambugun ?>,      <?php echo $akaryakittoplambugun ?>,        <?php echo $hediyelertoplambugun ?>,         <?php echo $retoranttoplambugun ?>,           <?php echo $ulasimtoplambugun ?>, <?php echo $markettoplambugun ?>,     <?php echo $ortalamabugun?>]
                            ]);

                            var options = {
                            title : 'Kategorilere Göre Günlük Harcamalar',
                            vAxis: {title: 'Harcama'},
                            hAxis: {title: 'Günler'},
                            seriesType: 'bars',
                            series: {6: {type: 'line'}}
                            };

                            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                            chart.draw(data, options);
                        }
                        </script>


                    <div id="chart_div" style="width: 900px; height: 500px;"></div>
                    
                </div>
            </div>

            <footer class="row tm-row">
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