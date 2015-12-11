<a href="https://github.com/bachors/cURL-Cek-Ongkir-TIKI-dan-JNE" target="_BLANK"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>

<form method="GET">
	<select name="dari">
		<option value="bandung">Bandung</option>
		<option value="medan">Medan</option>
	</select>
	<select name="ke">
		<option value="jakarta">Jakarta</option>
		<option value="surabaya">surabaya</option>
	</select>
	<select name="berat">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
	</select>
	<select name="service">
		<option value="tiki">TIKI</option>
		<option value="jne">JNE</option>
	</select>
	<button>CEK</button>
</form>

<?php

	// Memanggil fungsi
	require("ongkir.php");

	if(!empty($_GET['service'])&&!empty($_GET['dari'])&&!empty($_GET['ke'])&&!empty($_GET['berat'])){
		$service = $_GET['service'];
		$dari = $_GET['dari'];
		$ke = $_GET['ke'];
		$kg = $_GET['berat'];
		$user_agent = "Googlebot/2.1 (http://www.googlebot.com/bot.html)";
		if($service == 'tiki'){
			// menampilkan ongkir TIKI
			echo "<p>Dari: $dari<br>Ke: $ke<br>Berat (Kg): $kg</p>".tiki($dari,$ke,$kg,$user_agent);
		}else if($service == 'jne'){
			// menampilkan ongkir JNE
			echo jne($dari,$ke,$kg,$user_agent);
		}
	}

?>
