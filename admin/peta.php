<!DOCTYPE html>
<html lang="en">
<head>
	<base target="_top">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../assets/css/admin.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/peta.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	
	<title>Tampilan Peta</title>

	<link rel="stylesheet" href="../assets/libs/leaflet/leaflet.css"/>
	<script src="../assets/libs/leaflet/leaflet.js"></script>
</head>
<body>
	<header class="navbar navbar-dark sticky-top"style="background: #002100;">
		<button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand px-3" href="dashboard.php">GIS</a>
		<div class="navbar-nav">
			<div class="navbar-item">
				<a class="nav-link px-4" href="">
					<i class="bi bi-box-arrow-right"></i>
					Sign Out
				</a>
			</div>
		</div>
	</header>
	<div id="map" style="width: 100%; height: 100%;"></div>
	<script src="../assets/js/peta.js"></script>
</body>
</html>