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
		public $sayfa = 'home';
		public $title = 'Sayfa Başlığı Yok';
		public $description = 'Sayfa Açıklaması Yok';
		public $canonical = 'https://'.SITEADRESI;
		public $exInfo = [];
		public $dilOlustur = [];
		public $linkEx = [];
		public $linker = [];
		
		function __construct($session){
			global $mysqli;
            
			$fullLink = parse_url($_SERVER['SCRIPT_URI']);
            $linkEx = ($fullLink['path'] == '/')?null:explode('/',$fullLink['path']);
            
            if($linkEx != null){
                $linkEx = array_filter($linkEx, create_function('$value', 'return $value !== "";'));
                $linkEx = array_values($linkEx);
            }
            $this->linkEx = $linkEx;
            
            //print_r($linkEx);
            if($linkEx == null){
				$this->title = $this->getSetting('homeTitle');
                $this->description = $this->getSetting('homeDesc');
                $this->sayfa = 'home';
            }else{
                
                $linkExLast  = end($linkEx);
                $url = $this->findParenUrl($linkExLast,'link');
                if($url !== false){
                    
                    $first = current($this->linker);
                    $last  = end($this->linker);
                    
                    $link = null;
                    foreach($this->linker as $l){
                        $link .= $l['link'].'/';
                    }
                    
                    $linkControl = null;
                    foreach($this->linker as $l){
                        $linkControl[] = $l['link'];
                    }
                    
                    $fark = array_diff($linkControl,$linkEx);
                    if($fark != null){
                        
                        header("HTTP/1.1 301 Moved Permanently");
                        header("Location: https://".SITEADRESI.'/'.$link); 
                        exit();
                        
                    }else{
                        $this->sayfa = $last['template'];
                        
                        $t = [
                            'template' => $last['template'],
                            'text' => $last['title'],
                            'link' => $last['link'],
                            'parentLink' => $linkControl[1],
                        ];
                        $d = [
                            'template' => $last['template'],
                            'text' => $last['description'],
                            'link' => $last['link'],
                            'parentLink' => $linkControl[1],
                        ];
                        $this->title = $this->seoConvert($t);
                        $this->description = $this->seoConvert($d);
                        $this->canonical = "https://".SITEADRESI.'/'.$link;
                    }
                    
                }else{
					$this->linkEx = $linkEx;
                    $this->sayfa = '404';
                }
                
            }
			
			//SAYFANIN YOK İSE 404 DÜŞSÜN
			if(!file_exists(TEMAKLASORU.$this->sayfa.'.php')){
				$this->sayfa = '404';
			}
			//SAYFANIN YOK İSE 404 DÜŞSÜN
			
			require TEMAKLASORU.$this->sayfa.'.php';
			space:
		}
		
		function girisKontrol(){
			global $mysqli;
			
			
			if(isset($_SESSION[$this->session]['session']) and !empty($_SESSION[$this->session]['session'])){
				
				$sessionsor = $mysqli->query("SELECT * FROM personel WHERE session='".$_SESSION[$this->session]['session']."'");
				if($sessionsor->num_rows > 0){
					return true;
				}else{
					//session_destroy();
					//return false;
					return false; //GEÇİÇİ OLARAK TRUE YAPTIM
				}
				
			}
			
			//return true;
			
		}
		
		function getGuvenlik($get){
			global $mysqli;
			$degerler = array();
			foreach($get as $p => $d){
				if(is_string($_GET[$p]) === true){
					$degerler[$p] = trim(strip_tags($mysqli->escape_string($d)));
				}
			}
			return $degerler;
		}
		
		function postGuvenlik($post){
			global $mysqli;
			$degerler = array();
			foreach($post as $p => $d){
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