<?php 
	session_start();
	if (!empty($_SESSION['username']) && !empty($_SESSION['password']) && !empty($_SESSION['role'])){
		date_default_timezone_set('Asia/Jakarta');
		include "lib/koneksi.php";
?>
<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Administrator</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/demo.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<div id="wrapper">
		<?php
			include "service.php";
			include "header.php"; 
			include "sidebar.php";
		?>
		
		<div class="main">
			<div class="main-content">
				<div class="container-fluid">
					<?= reminderChangePassword($role, $_SESSION['username']) ?>
					<?php include "content.php"; ?>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2019 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="assets/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script>
		$(function () {
			$('.example').DataTable()
		});
	</script>
	<script>
		$(document).ready(function(){
			$('#btnListSurat').addClass('disabled');
			$('#listMhs,.editpassword').hide();

			$(".kapital").keyup(function(){
				$(this).val($(this).val().toUpperCase());
			});
			$("#btnListMhs").click(function(){
				$('#btnListSurat').removeClass('disabled');
				$('#btnListMhs').addClass('disabled');
				$('#listMhs').fadeIn();
				$('#listSurat').hide();
			});
			$("#btnListSurat").click(function(){
				$('#btnListMhs').removeClass('disabled');
				$('#btnListSurat').addClass('disabled');
				$('#listMhs').hide();
				$('#listSurat').fadeIn();
			});
			$("#btneditpassword").click(function(){
				$('.editpassword').fadeIn(500);
				$('.informasiumum').hide();
			});

		});
	</script>
	<script>
		$(function () {
			var counter = $('#counter').val();
			$('#counter').val(counter);

			$("#tambah").click(function(){
				console.log('tambah');
				if(counter>9){
					alert("Maksimal 10 Textbox");
					return false;
				}   
			
				var newTextBoxDiv1 = $(document.createElement('div')).attr("id", 'nimall' + counter);
				newTextBoxDiv1.after().html('<input type="text" style="margin-top:10px;" autocomplete="off" class="form-control" placeholder="inputkan NIM ..." name="nim'+counter+'" required>');
				newTextBoxDiv1.appendTo("#rowNim");	
				counter++;
				$('#counter').val(counter);
			});

			$("#hapus").click(function () {
				console.log('hapus');
				if(counter==0){
					return false;
				}
				counter--;
				$('#counter').val(counter);
				$("#nimall" + counter).remove();
			});
		});
	</script>
</body>
</html>
<?php 
}
else { ?>
<div class="col-md-12" align="center">
  <button type="button" name="button" class="btn btn-primary">Login Terlebih dahulu</button>
</div>

<?php echo"<meta http-equiv='refresh' content='1;
url=login.php'>";
} ?>