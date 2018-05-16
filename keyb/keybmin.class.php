<?php
	
	/*
		Hasan Yüksektepe
		hasanhasokeyk@hotmail.com
		www.hayatikodla.net
		İlk yazılma - 01.10.2015
		Güncelleme  - 31.08.2016
		
		Admin panel yazmak için basit framework
	*/
	
	//print_r($_SESSION);
	
	//if(!isset($_SESSION)){
	//	echo 'Boş';
	//}
	
	//$_SESSION['webtures']['token'] = '7446b33dafd829d37daedf24234c564d';
	
	//session_destroy();
	
	class keybmin{
		
		public $session = null;
		public $page = 'login';
		
		function __construct($session){
			global $mysqli;
            
			$this->session = $session;
			
			$get = $this->getGuvenlik();
			extract($get);
			$post = $this->postGuvenlik();
			extract($post);
			
			//KURULUMUŞ MU?
			$settings = $mysqli->query("SELECT * FROM settings WHERE var = 'install'")->num_rows;
			if($settings == 0){
				header('Location: '.SITEURL.'install/');
			}
			//KURULUMUŞ MU?
			
			//ÜYE GİRİŞ YAPMIŞ MI?
			if($this->girisKontrol()){
				
				if(isset($rpage) and !empty($rpage)){
					$this->page = $rpage;
				}else{
					$this->page = 'home';
				}
				
			}else{
				$this->page = 'login';
			}
			//ÜYE GİRİŞ YAPMIŞ MI?
			
			//SAYFA VAR MI?
			if(!file_exists(TEMAKLASORU.$this->page.'.php')){
				$this->page = '404';
			}
			//SAYFA VAR MI?
						
			require TEMAKLASORU.$this->page.'.php';
		}
		
		function girisKontrol(){
			global $mysqli;
			
			
			if(isset($_SESSION[$this->session]['session']) and !empty($_SESSION[$this->session]['session'])){
				
				$sessionsor = $mysqli->query("SELECT * FROM uyeler WHERE session='".$_SESSION[$this->session]['session']."'");
				if($sessionsor->num_rows > 0){
					return true;
				}else{
					//session_destroy();
					//return false;
					return false; //GEÇİÇİ OLARAK TRUE YAPTIM
				}
				
			}else{
				return false;
			}
			
			//return true;
			
		}
		
		function getGuvenlik(){
			global $mysqli;
			$degerler = array();
			foreach($_GET as $p => $d){
				if(is_string($_GET[$p]) === true){
					$degerler[$p] = trim(strip_tags($mysqli->escape_string($d)));
				}
			}
			return $degerler;
		}
		
		function postGuvenlik(){
			global $mysqli;
			$degerler = array();
			foreach($_POST as $p => $d){
				if(is_string($_POST[$p]) === true){
					$degerler[$p] = trim(strip_tags($mysqli->escape_string($d)));
				}
			}
			return $degerler;
		}
		
		public function postKontrol($post){
		
			$kontrol = 0;
			foreach($post as $parametre){
				if(isset($_POST[$parametre]) and !empty($_POST[$parametre])){
					$kontrol++;
				}else{
					return $parametre;
					break;
				}
			}
			
			if(count($post)==$kontrol){
				return true;
			}else{
				return false;
			}
			
		}
		
		function getKontrol($get){
		
			$kontrol = 0;
			foreach($get as $parametre){
				if(isset($_GET[$parametre]) and !empty($_GET[$parametre])){
					$kontrol ++;
				}else{
					return false;
					break;
				}
			}
			
			if(count($get)==$kontrol){
				return true;
			}else{
				return false;
			}
			
		}
		
		function bilgiTut($bilgi=null){
			
			$postlar = array();
			if(count($bilgi)>0){
				foreach($bilgi as $parametre => $deger){
					$postlar[] = !empty($deger)?$deger:null;
				}
			}
			
			return $postlar;
		}
        
        function arrayClean($array = []){
            if(isset($array) and !empty($array)){
                return $array;
            }else{
                return null;
            }
        }
		
		public function seoConvert($d){
			global $mysqli;
			if($d['template']=='profile'){
				$info = $mysqli->query("SELECT * FROM uyeler WHERE username='".$d['link']."'")->fetch_assoc();
				
				$p = [
					'%%username%%',
					'%%fullname%%',
					'%%bio%%',
				];
				
				$b = [
					$info['username'],
					$info['fullname'],
					$info['bio'],
				];
				
				return str_replace($p,$b,$d['text']);
			}else if($d['template']=='post-detail'){
				
				$userInfo = $mysqli->query("SELECT * FROM uyeler WHERE username='".$d['parentLink']."'")->fetch_assoc();
				$postInfo = $mysqli->query("SELECT * FROM uyepaylasimlari WHERE shortcode='".$d['link']."'")->fetch_assoc();
				
				print_r($userInfo);
				
				$p = [
					'%%username%%',
					'%%fullname%%',
					'%%bio%%',
					'%%likes%%',
					'%%comments%%',
					'%%date%%',
					'%%desc%%',
					'%%shortcode%%',
				];
				
				$b = [
					$userInfo['username'],
					$userInfo['fullname'],
					$userInfo['bio'],
					$postInfo['likes'],
					$postInfo['comments'],
					date('d.m.Y',$postInfo['postTime']),
					$postInfo['postDesc'],
					$postInfo['shortcode'],
				];
				
				return str_replace($p,$b,$d['text']);
				
			}else{
				return 'Sayfa Başlığı Yok ki';
			}
			
			
		}
		
		public function getSetting($parameter){
			global $mysqli;
			
			$info = $mysqli->query("SELECT value FROM settings WHERE parameter = '".$parameter."' LIMIT 1")->fetch_assoc();
			return $info['value'];
		}
        
        public function findParenUrl($id,$type='id',$control=false,$loop=false){
            global $mysqli;
            
            $url = $mysqli->query("SELECT * FROM seolink WHERE ".$type." = '".$id."' AND status='1'");
            if($url->num_rows > 0){
                
                $urlInfo = $url->fetch_assoc();
                if($control == false){
                    $parenUrl = $this->findParenUrl($urlInfo['parentID']);
                    $this->linker[] = $urlInfo;
                    if($urlInfo['parentID'] == 0){
                        return $this->linker;
                    }
                }else{
                    $url = $mysqli->query("SELECT link,parentID FROM seolink WHERE id = '".$urlInfo['parentID']."' AND status='1'");
                    $urlInfo = $url->fetch_assoc();
                    return $urlInfo;
                }
                
            }else{
                return false;
            }
        }
        
        function breadcrumb(){
            echo '<ol itemscope itemtype="http://schema.org/BreadcrumbList">';
            $i = 1;
            $link = null;
            foreach($this->linkEx as $l){
                $link .= $l.'/';
            ?>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemscope itemtype="http://schema.org/Thing" itemprop="item" href="https://<?=SITEADRESI?>/<?=$link?>">
                    <span itemprop="name"><?=$l?></span>
                </a>
                <meta itemprop="position" content="<?=$i?>" />
            </li>
            <?php
                $i++;
            }
            echo '</ol>';
        }
        
	}