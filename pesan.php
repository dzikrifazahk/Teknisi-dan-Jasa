<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form Teknisi</title>

	<!-- Google font -->
	<link href="http://fonts.googleapis.com/css?family=Playfair+Display:900" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Alice:400,700" rel="stylesheet" type="text/css" />

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>
<body>
	
<?php
	include 'koneksi.php';
    session_start();
    if($_SESSION["id_level"]==""){
      header("location:login.php?pesan=");
    }
	
	$sql ="select username from users WHERE username='$_SESSION[username]'";
	$form = "SELECT teknisi.nama_teknisi, kategori.id_kategori FROM teknisi INNER JOIN kategori ON teknisi.nama_teknisi = kategori.id_kategori";
	// $form ="SELECT teknisi.nama_teknisi, kategori.nama_kategori FROM teknisi INNER JOIN kategori ON teknisi.nama_teknisi = kategori.nama_kategori;";
	$hasil=mysqli_query($koneksi,$sql);
	$peg  =mysqli_fetch_array($hasil);
	$hasil2=mysqli_query($koneksi,$form);
?>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="booking-bg">
							<div class="form-header">
								<h2>Booking Teknisi Sekarang</h2>
								<p>Dapatkan berbagai keuntungan mulai dari full service dan berbagai bonus menarik lainya.</p>
							</div>
						</div>
						<form>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Username</span>
										<input class="form-control" value="<?=$peg['username'];?>" disabled type="text" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									<span class="form-label">Nama Teknisi</span>
										<select class="form-control">
											<option></option>
											
											<!-- <option>1</option>
											<option>2</option> -->
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Tanggal Booking</span>
										<input class="form-control" type="date" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Children</span>
										<select class="form-control">
											<option>0</option>
											<option>1</option>
											<option>2</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<span class="form-label">Room Type</span>
								<select class="form-control" required>
									<option value="" selected hidden>Select room type</option>
									<option>Private Room (1 to 2 People)</option>
									<option>Family Room (1 to 4 People)</option>
								</select>
								<span class="select-arrow"></span>
							</div>
							<div class="form-btn">
								<button class="submit-btn">Check availability</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>