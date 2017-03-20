<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/small_screen_styles.css" rel="stylesheet" type="text/css" media="screen and (min-width:320px) and (max-width:667px)">

</head>
<body>
<div class="form">
<p>Welcome <?php echo $_SESSION['username']; ?>!</p>
<p>This is secure area.</p>
<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a>
</div>
</body>
</html>