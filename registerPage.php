<!DOCTYPE html> 
<html>
<head>
<title> registerPage </title>
<link rel="stylesheet" href="http://demos.jquerymobile.com/1.4.5/css/themes/default/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.js"></script>
</head>
    <style>
      .header {
          text-align: center;
          background-color: black;
          padding: 10px;
      }
      .footer {
          text-align: center;
          margin-top: 20px;
          padding: 5px;
      }
    </style>   
<body>
  <div id="registerPage" data-role="page">     
    <div  class= "header" data-role="header"> B.F.F. Solutions App </div>
      <?php
        if($_POST) {
          $fname = $_POST['fname']; 
          $lname = $_POST['lname'];
          $uname = $_POST['uname'];
          $type = $_POST['type'];
          $address =  $_POST['address'];
          $email=  $_POST['email']; 
          $phone= $_POST['phone'];
          $password=$_POST['password'];  
          $password2 =$_POST['password2'];
          $error = 'false';
  
          if($fname== '') {
            echo '<script>alert("oops do not leave blank spaces")</script>';  
            $error= 'true'; 
          }
          if($lname== '') {
            echo '<script>alert("oops do not leave blank spaces")</script>' ;   
            $error= 'true';   
          }  
          if($uname== '') {
            echo '<script>alert("oops do not leave blank spaces")</script>';   
            $error= 'true';
          }
          if($type== '') {
            echo '<script>alert("oops do not leave blank spaces")</script>' ;  
            $error= 'true';
          }
          if($address== '') {
            echo '<script>alert("oops do not leave blank spaces")</script>' ;  
            $error= 'true';    
          }
          if($email== '') {
            echo '<script>alert("oops do not leave blank spaces")</script>' ;  
            $error= 'true';  
          }
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
            echo '<script>alert("sorry enter a valid email")</script>' ;
            $error = 'true'; 
          } 
          if($password== '') {
            echo '<script>alert("oops do not leave blank spaces")</script>';   
            $error= 'true';   
          }
          if (strlen($password) < 8) {
            echo '<script>alert("sorry password too short")</script>'; 
            $error = 'true'; 
          }  
          if($password2== '') {
            echo '<script>alert("oops do not leave blank spaces")</script>';  
            $error= 'true';     
          }
          if($password!=$password2) {
            echo '<script>alert("Sorry passwords do not match")</script>';   
            $error='true';  
          }
          if($error == 'false') {
            $error='false'; 
            echo '<script>window.location="loginPage.php" </script>';
            echo '<script>alert("Registration completed")</script>';
            try {
                $host = '127.0.0.1:3307';
                $dbname = 'webproject';
                $user = 'root';
                $pass = '';
                # MySQL with PDO_MYSQL
                $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            
                $sql = "INSERT INTO `webproject`.`users` (`fname`, `lname`, `uname`, `type`, `address`, `email`, `phone`, `password`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
                $sth = $DBH->prepare($sql);
                $sth->bindParam(1, $fname, PDO::PARAM_INT);
                $sth->bindParam(2, $lname, PDO::PARAM_INT);
                $sth->bindParam(3, $uname, PDO::PARAM_INT);     
                $sth->bindParam(4, $type, PDO::PARAM_INT);
                $sth->bindParam(5, $address, PDO::PARAM_INT);    
                $sth->bindParam(6, $email, PDO::PARAM_INT);
                $sth->bindParam(7, $phone, PDO::PARAM_INT);
                $sth->bindParam(8, md5 ($password.'12345'), PDO::PARAM_INT); 
                $sth->execute();
            } catch(PDOException $e) {echo 'Error' . $e;} 
         }
      }   
    ?>
    <form action="registerPage.php" method="post" ><br>
      First Name<input type="text" name="fname"  id = "fname"/><br>
      Last Name<input type="text" name="lname"   id = "lname"/><br>
      User Name<input type="text" name="uname"    id = "uname"/><br>
          <select name="type"  id= "type">
              <option value = customer name ="type"> Account > select > </option>
              <option value = customer  name ="type"> customer</option>    
          </select>   
      Address <input type="text" name="address" id= "address"/><br>
      Email <input type="email" name="email"    id= "email"/><br>
      Phone Number<input type="text" name="phone" id="phone"/><br>
      Password <input type="password" name="password" id="password"/><br>
      Confirm password <input type="password" name="password2" id=password2/> <br>   
      <input type="submit"  value= "Register"/>
    </form>
      <div class="footer" data-role= "footer" >Copyright 2016</div>
    </div>
</body>
</html>  