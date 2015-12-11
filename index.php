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

	require("ongkir.php");

	if(!empty($_GET['service'])&&!empty($_GET['dari'])&&!empty($_GET['ke'])&&!empty($_GET['berat'])){
		$service = $_GET['service'];
		$dari = $_GET['dari'];
		$ke = $_GET['ke'];
		$kg = $_GET['berat'];
		$user_agent = "Googlebot/2.1 (http://www.googlebot.com/bot.html)";
		if($service == 'tiki'){
			echo "<p>Dari: $dari<br>Ke: $ke<br>Berat (Kg): $kg</p>".tiki($dari,$ke,$kg,$user_agent);
		}else if($service == 'jne'){
			echo kota($dari,$ke,$kg,$user_agent);
		}
	}

?>
