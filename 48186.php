<?php 
    
    setlocale(LC_ALL, 'turkish'); 
	
	//ISTANBUL SAATİNE GÖRE ZAMANI AYARLAR
	date_default_timezone_set('Asia/Baghdad');
	ini_set( 'date.timezone', 'Asia/Baghdad' );
		
	//PHP HATALARINI EKRANDA GÖSTERİR
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
    
    global $mysqli;
	$mysqli = new mysqli('localhost','insta4li_iuser','48186hasokeyk','insta4li_db');
	
	if($mysqli->connect_error){
		exit;
	}else{
		$mysqli->set_charset("utf8");
	}
    
    //GEREKLİ DEĞİŞKENLER
    define('ROOT',(__DIR__));
    define('TEMAADI','default/');
    define('TEMAKLASORU',ROOT.'/themes/'.TEMAADI);
    define('KEYB',ROOT.'/keyb/');
    define('SAYFALAR',ROOT.'/sayfalar/');
    define('ONKLASOR',null);
    define('SITEADRESI','seomail.com'.ONKLASOR);
    define('TEMAYOLU','//'.SITEADRESI.'/themes/'.TEMAADI);
    //GEREKLİ DEĞİŞKENLER
    
    //ANA CLASS
    require KEYB."fonksiyonlar.class.php";
    $ksession = 'seomail';
	if(class_exists('keybmin')){
		$keybmin = new keybmin($ksession);
	}