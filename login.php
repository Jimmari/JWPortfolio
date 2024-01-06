<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: portfolio.html");
    }
?>
<?php
    $login = false;
    include('connection.php');
    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];
        echo $password;
        $sql = "select * from users where username = '$username'or email = '$username'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($row){  
            echo $count;

            if(password_verify($password, $row["password"])){
                $login=true;
                #session_start();

                $sql = "select username from signup where username = '$username'or email = '$username'";     
                #$r = mysqli_fetch_array(mysqli_query($conn, $sql), MYSQLI_ASSOC);  

                $_SESSION['username']= $r['username'];
                $_SESSION['loggedin'] = true;
                header("Location: portfolio.html");
            }
        }  
        else{  
            echo  '<script>
                        
                        alert("Login failed. Invalid username or password!!")
                        window.location.href = "login.php";
                    </script>';
        }     
    }
    ?>
    <?php 
    include("connection.php");
    include("navbar.php");

    ?>
    <!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body{
    background: url("https://images.pexels.com/photos/747964/pexels-photo-747964.jpeg?cs=srgb&dl=pexels-s-migaj-747964.jpg&fm=jpg");
    background-repeat: no-repeat;
    background-size: cover;   
    height: 100vh;
}
.wrapper{
    width:350px;
    margin:8% auto;
    padding:10px;
    border-radius: 20px;
    background-color: rgba(0,0,0,0.23);
	box-shadow: 0 0 17px rgb(25, 24, 24);
}
.heading {
	text-align: center;
	padding-top: 40px;
}
.heading h1 {
	color: rgb(255, 255, 255);
	font-size: 45px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
	margin-bottom: 90px;
}

form {
	text-align: center;
}
form input,button{
    width: 300px;
    height: 40px;
    margin-bottom: 30px;
    border: none;
    outline: none;
    padding-left: 5px;
    box-sizing: border-box;
	font-size: 15px;
	color: rgb(24, 23, 23);
    border-radius: 10px;
}
form input{
    padding-left: 40px;
}
form i {
	position: absolute;
	left: 15px;
	color: #333;
	font-size: 17px;
	top: 2px;
}
form span {
	position: relative;
}
form ::placeholder {
    color: rgb(119, 119, 165);
    font-weight: bold;
  }
form button {
	padding-left: 0;
	background-color: #337af4;
	letter-spacing: 1px;
	font-weight: bold;
    border-radius: 15px;
}
form button:hover {
	box-shadow: 2px 2px 5px #555;
	background-color: #b511f6;
    color:white;
}
    </style>
</head>
<body>
<div class="wrapper">
 	<div class="heading">
 		<h1>Login Form</h1>
 	</div>
	<div class="form">
  
 		<form name="form" action="login.php" method="POST" required>
 			<span>
 				<i class="fa fa-user"></i>
                <label>Enter Username/Email: </label>
                <input type="text" id="user" name="user"></br></br>
 			</span><br>
 			<span>
                <i class="fa-solid fa-lock"></i>
                <label>Password: </label>
                <input type="password" id="pass" name="pass" required></br></br>
 			</span><br>
             <input type="submit" id="btn" value="Login" name = "submit"/>
		</form>
	</div>
 
        <script>
            function isvalid(){
                var user = document.form.user.value;
                if(user.length==""){
                    alert(" Enter username or email id!");
                    return false;
                }
                
            }
        </script>
    </body>
</html>