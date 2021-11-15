<?php
include'koneksi.php';
$tgl=date('Y-m-d');
if(isset($_SESSION['sesi'])){
?>
<!doctype html>
<html id="home">
<head>
	<title>Your Bookshelf</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="bstrp/css/bootstrap.min.css">

	<!-- mycss -->
	<link rel="stylesheet" type="text/css" href="bstrp/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

</head>
<body >
	<!-- navbar -->
	<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
		<a class="navbar-brand" href="#"><img src="book/logo.png" alt=""></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-link active" href="#home">Home <span class="sr-only">(current)</span></a>
				<a class="nav-link" href="#">About</a>
				<a class="nav-link" href="#">Catalog</a>
				<a href="logout.php" class="nav-link logout">Logout</a>
			</div>
		</div>
	</nav>
	<!-- end navbar -->

	<!-- jumbotron -->
	<div class="jumbotron jumbotron-fluid mt-4">
		<div class="container mt-4">
			<h1 class="display-4 text-center">Your Bookshelf</h1>
			<p class="lead text-white text-center">Visit and read in Your Bookshelf then be more smart and more wise for your future.</p>
		</div>
	</div>
	<!-- end jumbotron -->

	<!-- header -->
	<!-- <div id="header2">
			<div id="nama-user">Hai <?php echo$_SESSION['sesi']; ?>!</div>
	</div> -->
	<!-- end header -->

	<!-- main-content -->
	<section class="main">
		<div class="container">
			
		<div class="row">
				<!-- sidebar -->
				<div class="col-3">
					<ul style="list-style-type:none;">
						<li><a href="index.php?p=beranda">Home</a></li>
						<li>Data Master</li>
						<li><a href="index.php?p=anggota">Data Member</a></li>
						<li><a href="index.php?p=buku">Data Book</a></li>
						<li>Data Transaction</li>
						<li><a href="index.php?p=transaksi-peminjaman">Borrow</a></li>
						<li><a href="index.php?p=transaksi-pengembalian">Return</a></li>
						<li><a href="index.php?p=transaksi-peminjaman">Report</a></li>
					</ul>

					<div class="card text-white bg-dark mb-3 address" style="max-width: 13rem;">
						<div class="card-header">Address</div>
						<div class="card-body">
							<h5 class="card-title text-white">Your Bookshelf</h5>
							<p class="card-text">Jl. Jendral Sudirman No.2, Solo, Central Java</p>
						</div>
					</div>
				</div>

				<!-- main-page -->
				<div class="col-9">
					<div class="main-panel">
						<div class="panel panel-warning login-panel" style="position:relative;">
							<?php
								$pages_dir='pages';
								if(!empty($_GET['p'])){
									$pages=scandir($pages_dir,0);
									unset($pages[0],$pages[1]);
									$p=$_GET['p'];
									if(in_array($p.'.php',$pages)){
										include($pages_dir.'/'.$p.'.php');
									}else{
										echo'Halaman Tidak Ditemukan';
									}
								}else{
									include($pages_dir.'/beranda.php');
								}
							?>
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
	</section>
	<!-- end main-content -->

	<!-- footer -->
	<footer class="container">
		<h5 class="text-center mt-3">&copy;Your Bookshelf 2021 | Built by JWD-B </h5>
	</footer>
	<!-- end footer -->


<?php
}
else {
	echo "<script>
		alert('Anda Harus Login Dahulu!');
	</script>";
	header('location:login.php');
}
?>