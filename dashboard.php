<?php
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard - Secured Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/small_screen_styles.css" rel="stylesheet" type="text/css" media="screen and (min-width:320px) and (max-width:667px)">

</head>
<body>
<div class="form">
<p>Dashboard</p>
<p>This is another secured page.</p>
<p><a href="index.php">Home</a></p>
<a href="logout.php">Logout</a>
</div>
</body>
</html>