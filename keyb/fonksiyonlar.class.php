<?php 

	function custom_number_format($n, $precision = 3) {
		if ($n < 1000000) {
			// Anything less than a million
			$n_format = number_format($n).'K';
		} else if ($n < 1000000000) {
			// Anything less than a billion
			$n_format = number_format($n / 1000000, $precision) . 'M';
		} else {
			// At least a billion
			$n_format = number_format($n / 1000000000, $precision) . 'B';
		}

		return $n_format;
	}
	
	function proxies(){
		
		$proxies = [
			'https://elifproxy.herokuapp.com/',  
			'https://elifproxy2.herokuapp.com/', 
			'https://elifproxy3.herokuapp.com/', 
			'https://elifproxy4.herokuapp.com/', 
			'https://elifproxy5.herokuapp.com/', 
			'https://aydaproxy.herokuapp.com/',   
			'https://aydaproxy2.herokuapp.com/',  
			'https://aydaproxy3.herokuapp.com/',  
			'https://aydaproxy4.herokuapp.com/',  
			'https://aydaproxy5.herokuapp.com/',  
			'https://mustafaproxy.herokuapp.com/',   
			'https://mustafaproxy2.herokuapp.com/',  
			'https://mustafaproxy3.herokuapp.com/',  
			'https://mustafaproxy4.herokuapp.com/',  
			'https://mustafaproxy5.herokuapp.com/',  
		   //'https://ahmetproxy.herokuapp.com/',   
		   //'https://ahmetproxy2.herokuapp.com/',  
		   //'https://ahmetproxy3.herokuapp.com/',  
		   //'https://ahmetproxy4.herokuapp.com/',  
		   //'https://ahmetproxy5.herokuapp.com/',  
			'https://bensuproxy.herokuapp.com/',   
			'https://bensuproxy2.herokuapp.com',   
			'https://bensuproxy3.herokuapp.com/',  
			'https://bensuproxy4.herokuapp.com/',  
			'https://bensuproxy5.herokuapp.com/',  
			//'https://ismailproxy.herokuapp.com/',  
			//'https://ismailproxy2.herokuapp.com/', 
			//'https://ismailproxy3.herokuapp.com/', 
			//'https://ismailproxy4.herokuapp.com/', 
			//'https://ismailproxy5.herokuapp.com/', 
			//'https://serapproxy.herokuapp.com/',   
			//'https://serapproxy2.herokuapp.com/',  
			//'https://serapproxy3.herokuapp.com/',  
			//'https://serapproxy4.herokuapp.com/',  
			//'https://serapproxy5.herokuapp.com/',  
			//'https://huseyinproxy.herokuapp.com/',   
			//'https://huseyinproxy2.herokuapp.com/',  
			//'https://huseyinproxy3.herokuapp.com/',  
			//'https://huseyinproxy4.herokuapp.com/',  
			//'https://huseyinproxy5.herokuapp.com/',  
			//'https://sergenproxy.herokuapp.com/',   
			//'https://sergenproxy2.herokuapp.com/',  
			//'https://sergenproxy3.herokuapp.com/',  
			//'https://sergenproxy4.herokuapp.com/',  
			//'https://sergenproxy5.herokuapp.com/',  
			//'https://arifproxy.herokuapp.com/',   
			//'https://arifproxy2.herokuapp.com/',  
			//'https://arifproxy3.herokuapp.com/',  
			//'https://arifproxy4.herokuapp.com/',  
			//'https://arifproxy5.herokuapp.com/',  
			'https://boranproxy.herokuapp.com/',   
			'https://boranproxy2.herokuapp.com/',  
			'https://boranproxy3.herokuapp.com/',  
			'https://boranproxy4.herokuapp.com/',  
			'https://boranproxy5.herokuapp.com/',  
			'https://sirabulucu-av.herokuapp.com/',  
			'https://sirabulucu-am.herokuapp.com/',
			'https://aydemir1.herokuapp.com/',
			'https://aydemir2.herokuapp.com/',    
			'https://aydemir3.herokuapp.com/',
			'https://aydemir4.herokuapp.com/',
			'https://aydemir5.herokuapp.com/',
			'https://harun-proxy-av1.herokuapp.com/', #avrupa
			'https://harun-proxy-av2.herokuapp.com/', #avrupa
			'https://harun-proxy-av3.herokuapp.com/', #avrupa
			'https://murat-proxy-av1.herokuapp.com/', #avrupa
			'https://murat-proxy-av2.herokuapp.com/', #avrupa
			'https://harun-proxy2-am1.herokuapp.com/', #avrupa
			'https://harun-proxy-am1.herokuapp.com/', #amerika
			'https://harun-proxy-am2.herokuapp.com/', #amerika
			'https://murat-proxy-am1.herokuapp.com/', #amerika
			'https://murat-proxy-am2.herokuapp.com/', #amerika
			'https://murat-proxy-am3.herokuapp.com/', #amerika
		];
		
		return $proxies[rand(0,(count($proxies)-1))];
		
	}