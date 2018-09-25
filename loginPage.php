<!DOCTYPE html> 
<html>
<head>
<title>loginPage</title>
<link rel="stylesheet" href="http://demos.jquerymobile.com/1.4.5/css/themes/default/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>  
</head>
    <style>
        .header {
            text-align: center;
            padding: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 154px;
            padding: 5px;
        }
    </style>   
<body>   
    <div  class= "header" data-role="header"> B.F.F. Solutions App </div>      
        <?php
            // This will only run if a post happens!!!
            if($_POST){
                session_start();
                require_once "recaptchalib.php";
                $secret = '6Lf_zA8UAAAAACYQCDDCXy6BWYIJK3bjsnMHjlU8';
                $response = null;
                $reCaptcha = new ReCaptcha($secret);
                if($_POST['g-recaptcha-response']){
                $response = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $collected);
            }
            $uname = $_POST['uname'];
            $password = $_POST['password'];
            $_SESSION['cart'] = '';

            try {
                
                $DB_TYPE = 'mysql'; //Type of database<br>
                $DB_HOST = '127.0.0.1'; //Host name<br>
                $DB_USER = 'root'; //Host Username<br>
                $DB_PASS = ''; //Host Password<br>
                $DB_NAME = 'webproject'; //Database name<br><br>
                $connStr = "mysql:host=".$DB_HOST.";port=3307;dbname=".$DB_NAME; 
                $DBH = new PDO($connStr,$DB_USER,$DB_PASS);
                $sql = "select * from users where uname = ? and password = ?";
                $sth = $DBH->prepare($sql);
                $sth->bindParam(1,$uname, PDO::PARAM_INT);
                $sth->bindParam(2,md5 ($password.'12345'), PDO::PARAM_INT);
                $sth->execute();
                if ($sth->rowCount() > 0) {
                echo 'Code ran.....<br>';
                // Getting row from the db
                $rec = $sth->fetch(PDO::FETCH_ASSOC);
                // getting values from the row  
                $id = $rec['id'];
                $fname1= $rec['fname'];
                $type = $rec['type'];
                $_SESSION['id'] = $id; 
                $_SESSION['fname']= $fname1;
                $_SESSION['cart']= '';
                    if($type == 'customer') {
                    echo '<script>window.location="customerPage.php" </script>';
                    die;
                    }
                    if($type == 'admin') { 
                    echo '<script>window.location="adminPage.php" </script>';
                    die;
                    }
                    if($type == 'delivery') { 
                    echo '<script>window.location="deliveryPage.php" </script>';
                    die;
                    }
                    if($type == 'staff') {
                    echo '<script>window.location="staffPage.php" </script>';
                    die;
                    }
                }
                if($uname||$password == '') {
                echo '<script>alert("Sorry username or password incorrect")</script>';        
                }   
            } catch(PDOException $e) {echo $e;}
        }  
    ?>
    <form action="loginPage.php" method="post">
        Username: <input type="text" name="uname" id="uname"/><br>
        Password: <input type="password" name="password" id="password"/><br>
            <div class="g-recaptcha" data-sitekey="6Lf_zA8UAAAAADZ-u-8cE6lXVLmRU_A8O5fdx6k5"></div> 
        <input type="submit" value = "Login"/> <br>                             
    </form>
        <div class="footer" data-role= "footer" >Copyright 2016</div>
</body>
</html>
	
    