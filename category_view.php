<?php
	session_start();
	require('database.php');
	$category = $_GET['category'];
	$q = $db->prepare("SELECT categoryName FROM categories c WHERE c.categoryID=?");
	$data=array($category);
	$q->execute($data);
	$categoryName = $q->fetchColumn();
	echo $categoryName;
?>
<!DOCTYPE html>
<html>
	<head>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BuyTech | Electronics</title>
	<link rel="stylesheet" href="style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="header">
			<div class="container">
				<div id="header"></div><br />
				<script>
				$("#header").load("header.php");
				</script>
				
			</div>
		</div>
		<h1><?php echo $categoryName ?></h1>
		<div class="row">
				<?php
					$userID = $_SESSION['username'];
					$sql = "SELECT p.*
							FROM products p WHERE categoryID = ('$category');
							GROUP BY productID";
					foreach($db->query($sql) as $key => $item ) :
					?>
						<div class="col-4">
						<a href="apple-watch.html">
							<img src="<?php echo $item['productImage']?>">
							<h4><?php echo $item['productName']?></h4>
							<div class="rating">
								<i class="fa fa-star fa-fw"></i>
								<i class="fa fa-star fa-fw"></i>
								<i class="fa fa-star fa-fw"></i>
								<i class="fa fa-star fa-fw"></i>
								<i class="fa fa-star-o fa-fw"></i>
							</div>
							<p><?php echo $item['listPrice']?></p>
							<form action="." method="post"); >
								<input type="hidden" name="action" value="add"></input>
								<input type="hidden" name="productkey" id="<?php echo $item['productID']?>" value="<?php echo $item['productID']?>">
								<input type="hidden" name="itemqty" id="1" value="1">
								<input type="Submit" value="Add to Cart"/>
							</form>
						</div>
				<?php endforeach; ?>
	</body>
</html>