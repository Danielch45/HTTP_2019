<!DOCTYPE html>
<html>
<head>
	<title>REGISTER</title>
	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>
	<?php
		// define variables and set to empty values
		$name = $nameErr = "";
		$email = $emailErr = "";
		$nim = $nimErr = "";
		$phone = $phoneErr = "";
		$line = $lineErr = "";
		$jurusan = $jurusanErr = "";
		$batch = $batchErr = "";
		$region = $regionErr = "";
		$transport = $transportErr = "";
		$vege = $vegeErr = "";
		$baju = $bajuErr = "";
		$pembayaran = $pembayaranErr = "";
		$tiket = $tiketErr = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			if (empty($_POST["name"])) {
			  $nameErr = "Name is required";
			} else {
			  $name = test_input($_POST["name"]);
			}

			if (empty($_POST["email"])) {
			  $emailErr = "Email is required";
			} else {
			  $email = test_input($_POST["email"]);
			  // check if e-mail address is well-formed
			  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			    $emailErr = "Invalid email format"; 
			  }
			}

			if (empty($_POST["nim"])) {
			  $nimErr = "Nim is required";
			} else {
			  $nim = test_input($_POST["nim"]);
			  if (!preg_match("/^[0-9]*$/",$nim) || strlen($nim) != 10) {
			    $nimErr = "Only numbers and length max 10 digits"; 
			  }
			}

			if (empty($_POST["phone"])) {
			  $phoneErr = "Phone is required";
			} else {
			  $phone = test_input($_POST["phone"]);
			  if (!preg_match("/^[0-9]*$/",$phone) || strlen($phone) < 10 || strlen($phone) > 13) {
			    $phoneErr = "Only numbers and length between 10-13 digits"; 
			  }
			}

			if (empty($_POST["line"])) {
			  $lineErr = "Line is required";
			} else {
			  $line = test_input($_POST["line"]);
			}

			if (empty($_POST["jurusan"])) {
			  $jurusanErr = "Jurusan is required";
			} else {
			  $jurusan = test_input($_POST["jurusan"]);
			  if($jurusan == "-----"){
			  	$jurusanErr = "Jurusan is required";
			  }
			}

			if (empty($_POST["batch"])) {
			  $batchErr = "Batch is required";
			} else {
			  $batch = test_input($_POST["batch"]);
			  if ($batch < 1 || $batch > 5) {
			    $batchErr = "Must between 1-5"; 
			  }
			}

			if (empty($_POST["region"])) {
			  $regionErr = "Region is required";
			} else {
			  $region = test_input($_POST["region"]);
			  $region = strtolower($region);
			  if($region != "alsut" && $region != "kemanggisan" && $region != "ppti"){
			  	$regionErr = "Should between Alsut, Kemanggisan or PPTI";
			  }
			  if($region == "alsut" || $region == "kemanggisan"){
			  	$region = ucfirst($region);
			  }elseif ($region == "ppti") {
			  	$region = strtoupper($region);
			  }
			}

			if (empty($_POST["transport"])) {
			  $transportErr = "Transport is required";
			} else {
			  $transport = test_input($_POST["transport"]);
			}

			if (empty($_POST["vege"])) {
			  $vegeErr = "Vege is required";
			} else {
			  $vege = test_input($_POST["vege"]);
			}

			if (empty($_POST["baju"])) {
			  $bajuErr = "Baju is required";
			} else {
			  $baju = test_input($_POST["baju"]);
			  if($baju == "-----"){
			  	$bajuErr = "Baju is required";
			  }
			}

			if (empty($_POST["pembayaran"])) {
			  $pembayaranErr = "Pembayaran is required";
			} else {
			  $pembayaran = test_input($_POST["pembayaran"]);
			  if($pembayaran == "-----"){
			  	$pembayaranErr = "Pembayaran is required";
			  }
			}

			if (empty($_POST["tiket"])) {
			  $tiketErr = "Tiket is required";
			} else {
			  $tiket = test_input($_POST["tiket"]);
			  if (!preg_match("/^[0-9]*$/",$tiket)) {
			    $tiketErr = "Only numbers"; 
			  }
			}

		}

		function test_input($data) {
	  		$data = trim($data);
	  		$data = stripslashes($data);
	  		$data = htmlspecialchars($data);
	  		return $data;
		}
	?>

	<h3>Side Note: Selagi nunggu desain, gunakan form ini untuk validasi</h3>
	<p><span class="error">* required</span></p>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

		name : 
		<input type="text" name="name" placeholder="name" value="<?php echo $name;?>">
		<span class="error">
			* <?php echo $nameErr;?>
		</span><br><br>

		email : 
		<input type="text" name="email" placeholder="email" value="<?php echo $email;?>">
		<span class="error">
			* <?php echo $emailErr;?>
		</span><br><br>

		nim : 
		<input type="text" name="nim" placeholder="nim" value="<?php echo $nim;?>">
		<span class="error">
			* <?php echo $nimErr;?>
		</span><br><br>

		phone : 
		<input type="text" name="phone" placeholder="phone" value="<?php echo $phone;?>">
		<span class="error">
			* <?php echo $phoneErr;?>
		</span><br><br>

		line : 
		<input type="text" name="line" placeholder="line" value="<?php echo $line;?>">
		<span class="error">
			* <?php echo $lineErr;?>
		</span><br><br>


		jurusan : 
		<select name="jurusan">
	    <option <?php if (isset($jurusan) && $jurusan=="-----") echo "selected";?> value="-----">-----</option>
		<option <?php if (isset($jurusan) && $jurusan=="compSci") echo "selected";?> value="compSci">Computer Science</option>
		<option <?php if (isset($jurusan) && $jurusan=="masterTrackCompSci") echo "selected";?> value="masterTrackCompSci">Master Track Computer Science</option>
		<option <?php if (isset($jurusan) && $jurusan=="gameAppTech") echo "selected";?> value="gameAppTech">Game Application Technology</option>
		<option <?php if (isset($jurusan) && $jurusan=="mobileAppTech") echo "selected";?> value="mobileAppTech">Mobile Application Technology</option>
		<option <?php if (isset($jurusan) && $jurusan=="cyberSec") echo "selected";?> value="cyberSec">Cyber Security</option>
		<option <?php if (isset($jurusan) && $jurusan=="itMat") echo "selected";?> value="itMat">IT MAT</option>
		<option <?php if (isset($jurusan) && $jurusan=="itStat") echo "selected";?> value="itStat">IT STAT</option>
		<option <?php if (isset($jurusan) && $jurusan=="ppti") echo "selected";?> value="ppti">PPTI</option>
		</select>
		<span class="error">
			* <?php echo $jurusanErr;?>
		</span><br><br>

		batch : 
		<input type="text" name="batch" placeholder="batch" value="<?php echo $batch;?>">
		<span class="error">
			* <?php echo $batchErr;?>
		</span><br><br>

		region : 
		<input type="text" name="region" placeholder="region" value="<?php echo $region;?>">
		<span class="error">
			* <?php echo $regionErr;?>
		</span><br><br>

		transport : 
		<input type="text" name="transport" placeholder="transport" value="<?php echo $transport;?>">
		<span class="error">
			* <?php echo $transportErr;?>
		</span><br><br>

		vege : 
		<input type="radio" name="vege" <?php if (isset($vege) && $vege=="vege") echo "checked";?> value="vege">Vege
		<input type="radio" name="vege" <?php if (isset($vege) && $vege=="non-vege") echo "checked";?> value="non-vege">Non-Vege 
		<span class="error">
			* <?php echo $vegeErr;?>
		</span><br><br>

		baju : 
		<select name="baju" style="width: 170px;">
			<option <?php if (isset($baju) && $baju=="-----") echo "selected";?> value="-----">-----</option>
			<option <?php if (isset($baju) && $baju=="small") echo "selected";?> value="small">S</option>
			<option <?php if (isset($baju) && $baju=="medium") echo "selected";?> value="medium">M</option>
			<option <?php if (isset($baju) && $baju=="large") echo "selected";?> value="large">L</option>
		</select>
		<span class="error">
			* <?php echo $bajuErr;?>
		</span><br><br>

		pembayaran : 
		<select name="pembayaran" style="width: 170px">
			<option <?php if (isset($pembayaran) && $pembayaran=="-----") echo "selected";?> value="-----">-----</option>
			<option <?php if (isset($pembayaran) && $pembayaran=="transfer") echo "selected";?> value="transfer">Transfer</option>
			<option <?php if (isset($pembayaran) && $pembayaran=="tunai") echo "selected";?> value="tunai">Tunai</option>
		</select>
		<span class="error">
			* <?php echo $pembayaranErr;?>
		</span><br><br>

		tiket : 
		<input type="text" name="tiket" placeholder="no tiket" value="<?php echo $tiket;?>">
		<span class="error">
			* <?php echo $tiketErr;?>
		</span><br><br>

		<button type="submit" name="submit">Submit</button>

	</form>
</body>
</html>