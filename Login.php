<!doctype html>
<html>

<head>
<?php
$mysqli = mysql_connect('at-web2.comp.glam.ac.uk', 'user_13017802', 'Database099','db_13017802');
if (!$mysqli) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($link);


session_start();
    $_SESSION['message'] = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //two passwords are equal to each other
    if ($_POST['password'] == $_POST['confirmpassword']) {
        
        //define other variables with submitted values from $_POST
        $username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);

        //md5 hash password for security
        $password = md5($_POST['password']);

        //path were our avatar image will be stored
        $avatar_path = $mysqli->real_escape_string('images/'.$_FILES['avatar']['name']);
        
        //make sure the file type is image
        if (preg_match("!image!",$_FILES['avatar']['type'])) {
            
            //copy image to images/ folder 
            if (copy($_FILES['avatar']['tmp_name'], $avatar_path)){
                
                //set session variables to display on welcome page
                $_SESSION['username'] = $username;
                $_SESSION['avatar'] = $avatar_path;

                //insert user data into database
                $sql = 
                "INSERT INTO users (username, email, password, avatar) "
                . "VALUES ('$username', '$email', '$password', '$avatar_path')";
                
                //check if mysql query is successful
                if ($mysqli->query($sql) === true){
                    $_SESSION['message'] = "Registration successful!"
                    . "Added $username to the database!";
                    //redirect the user to welcome.php
                    header("location: welcome.php");
                }
            }
        }
    }
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/small_screen_styles.css" rel="stylesheet" type="text/css" media="screen and (min-width:320px) and (max-width:667px)">

	<title>Login</title>
</head>
<body>
	<div id="login">
	<p>Login</p>
	

<div class="body-content">
  <div class="module">
    <h1>Create an account</h1>
	

	
    <form class="form" action="login.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <ul><li><input type="text" placeholder="User Name" name="username" required /></li>
      <li><input type="email" placeholder="Email" name="email" required /></li>
      <li><input type="password" placeholder="Password" name="password" autocomplete="new-password" required /></li>
      <li><input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required /></li>
	  
      <div class="avatar"><label>Select your avatar: </label><input type="file" name="avatar" accept="image/*" required /></div>
      <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
  </div>
</div>
	
	<ul><li><a href="Register.html">Register Here</a></li>
	<li><a href="Reset.html">forgot Password</a></li>
	</ul>
	
	
	
	
	</div>
</body>
</html>
