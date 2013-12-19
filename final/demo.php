<?php include 'dependency.php';?>
<DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<?php 
			$dbdata = new DBData();
			$userID = $dbdata->getUserID();
			$currentUser = $dbdata->getDBDataFrom($userID);
		?>

		<link rel="stylesheet" type="text/css" href="css/<?php echo $currentUser['theme']?>.css"/>
	</head>

	<body>
		<div id="mainWrapper">

			<div id="header">
				<h1>Welcome to <?php echo $_GET['website'];?>'s website</h1>
			</div>

			<div id="sidebar">
				<a href="index.php">Home</a>
				<a href="admin.php">Admin</a>
				<!-- I know this isn't the proper way to do it, but whatever it's such a small website
					 and I am kind of running out of time here.-->
				<a href="admin.php?logout=1">Log Out</a>
			</div>

			<div id="contentLeft">
				<h1><?php echo $currentUser['title'];?></h1>
				Contact me at: <?php echo $currentUser['email'];?><br/>
				Write me at: <?php echo $currentUser['address'];?><br/>
				Call me at: <?php echo $currentUser['phone'];?><br/>
				<?php echo $currentUser['about'];?>

			</div>

		</div>
	</body>


</html>