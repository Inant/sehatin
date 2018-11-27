<?php session_start();
if (empty($_SESSION['username']) && empty($_SESSION['level'])) {
	echo "<script>
		alert('Anda harus login dahulu !');
		window.location.href='../login.php';
	</script>";
}
 ?>
<!doctype html>
<html lang="en">
<head>
	<title>Data Poli | Sehatin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="../assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="../assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<!--<link rel="stylesheet" href="assets/css/demo.css">-->
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<?php
			include '../dashboard/navbar.php';
			include '../dashboard/left_sidebar.php';
      $qpasien = mysqli_query($con, "SELECT * FROM pasien WHERE id_pasien = '$_GET[p]'");
      $valpasien = mysqli_fetch_assoc($qpasien);
      $tgl_lahir = date("d-m-Y", strtotime($valpasien['tgl_lahir']));
		 ?>
		 <div class="main">
		 	<div class="main-content">
		 		<div class="container-fluid">
          <div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="lnr lnr-calendar-full"></i>&ensp;History Pemeriksaan</h3>
						</div>
					</div>
		 			<div class="panel panel-profile">
            <div class="clearfix">
              <div class="profile-left">
                <div class="profile-header">
                  <div class="overlay"></div>
                  <div class="profile-stat">
                    <div class="row">
                      <div class="col-md-12 stat-item">
                        <?php echo mysqli_num_rows($qpasien) ?> <span>Kunjungan</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="profile-detail">
                  <div class="profile-info">
                    <h4 class="heading">Data Pasien</h4>
                    <ul class="list-unstyled list-justify">
                      <li>Nama <span><?php echo $valpasien['nama'] ?></span></li>
                      <li>Tempat, Tanggal Lahir <span><?php echo "$valpasien[tmpt_lahir], $tgl_lahir"  ?></span></li>
                      <li>Gender <span><?php echo $valpasien['gender'] ?></span></li>
                      <li>Alamat <span><?php echo $valpasien['alamat'] ?></span></li>
                      <li>No Hp <span><?php echo $valpasien['no_hp'] ?></span></li>
                      <li>Pendidikan <span><?php echo $valpasien['pendidikan'] ?></span></li>
                      <li>Status Perkawinan <span><?php echo $valpasien['status_perkawinan'] ?></span></li>
                      <li>Kategori <span><?php echo $valpasien['kategori'] ?></span></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="profile-right">
                <div class="custom-tabs-line tabs-line-bottom left-aligned">
                  <ul class="nav" role="tablist">
                    <li class="active"> <a href="#" role="tab" data-toggle="tab">History</a> </li>
                  </ul>
                </div>
                <div class="tab-content">
                  <div class="tab-pane fade in active" id="tab-bottom-left1">
                    <ul class="list-unstyled activity-timeline">
                      <li>
                        <i class="fa fa-medkit activity-icon"></i>
                        <p>Diare <span class="timestamp">25-08-2018</span> </p>
                      </li>
                      <li>
                        <i class="fa fa-medkit activity-icon"></i>
                        <p>Diare <span class="timestamp">25-08-2018</span> </p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

            </div>
          </div>
		 		</div>
		 	</div>
		 </div>
		 <div class="clearfix"></div>
		<?php include '../dashboard/footer.php'; ?>
	</div>
	<script src="../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../assets/scripts/klorofil-common.js"></script>
</body>
</html>
