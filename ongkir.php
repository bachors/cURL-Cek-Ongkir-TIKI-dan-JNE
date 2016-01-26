<?php
/*********************************************************************
Script untuk mengambil ongkir Tiki dan JNE
langsung melalui web tiki-online.com dan jne.co.id
dengan menggunakan cURL dan simple html dom.

* Coded by Ican Bachors 2015.
* http://ibacor.com/labs/curl-cek-ongkir-tiki-dan-jne/
* Updates will be posted to this site.
*********************************************************************/

	/******************* TIKI *****************/
	function tiki($dari,$ke,$kg,$user_agent){
		$ch = curl_init();
		$url="http://www.tiki-online.com/?cat=KgfdshfF7788KHfskF";
		$post = "&get_ori=$dari&get_des=$ke&get_wgdom=$kg&submit=Check";
		curl_setopt( $ch, CURLOPT_USERAGENT, $user_agent);
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_URL, $url);
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $post );
		$site = curl_exec( $ch );
		return ongkos_tiki($site); 
	}

	function ongkos_tiki($site){
		require("lib/simple_html_dom.php");
		$html = str_get_html($site);
		$table = $html->find('table[cellpadding=4]',0);
		if(empty($table)){
			return errorcoy();
		}else{
			return $table;
		}
	}
	/**************** END TIKI *****************/

	
	/******************* JNE *******************/
	function jne($dari,$ke,$kg,$user_agent){
		$json_dari = "http://www.jne.co.id/server/server_city_from.php?term=$dari";
		$json_daric = file_get_contents($json_dari);
		$hasil_dari = json_decode($json_daric);
			
		$json_ke = "http://www.jne.co.id/server/server_city.php?term=$ke";
		$json_kec = file_get_contents($json_ke);
		$hasil_ke = json_decode($json_kec);
		
		if($hasil_dari == null || $hasil_ke == null){
			return errorcoy();
		}else{
			$daric = $hasil_dari[0]->code;
			$darib = $hasil_dari[0]->label;
			$kec = $hasil_ke[0]->code;
			$keb = $hasil_ke[0]->label;

			$ch = curl_init();
			$url="http://www.jne.co.id/getDetailFare.php";
			$post = "origin=$daric&dest=$kec&weight=$kg&originlabel=$darib&destlabel=$keb";
			curl_setopt( $ch, CURLOPT_USERAGENT, $user_agent);
			curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 0 );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $ch, CURLOPT_URL, $url);
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $post );
			$site = curl_exec( $ch );
			return $site;
		}
	}
	/**************** END JNE *****************/

	
	/**************** ERROR *****************/
	function errorcoy(){	
		return '<h2>Error Masbro.. mungkin nama kota nya tidak sesuai ^^</h2>';
	}
	/**************** END ERROR *****************/

?>
