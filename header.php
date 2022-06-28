<?php
    include("const.php");
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Ray's Blog</title>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<nav id="nav" class="navbar navbar-light bg-light fixed-top" style="border-bottom: solid 1px rgba(0, 0, 0, 0.2);">
	<div class="container-fluid">
        <a class="navbar-brand " href="<?php echo $index_url;?>">RayWu</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
			<div class="offcanvas-header">
				<h5 class="offcanvas-title" id="offcanvasNavbarLabel">RayWu</h5>
				<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body">
				<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="<?php echo $index_url;?>">文章列表</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							文章分類
						</a>
						<ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
							<li><a class="dropdown-item" href="<?php echo $class_url;?>0">未分類文</a></li>
							<li><a class="dropdown-item" href="<?php echo $class_url;?>1">技術分享</a></li>
							<li><a class="dropdown-item" href="<?php echo $class_url;?>2">專案紀錄</a></li>
							<li><a class="dropdown-item" href="<?php echo $class_url;?>3">心情雜記</a></li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="<?php echo $about_url;?>">關於我</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="https://github.com/Hack-Ray">Github</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>
