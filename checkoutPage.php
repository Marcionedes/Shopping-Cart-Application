<html>
<head>
<title>checkoutPage</title>  
<link rel="stylesheet" href="http://demos.jquerymobile.com/1.4.5/css/themes/default/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.js"></script> 
</head>
    <style>
      .header {
        text-align: center;
        padding: 10px;
      }
      .footer { 
        text-align: center;
        margin-top: 180px;
        padding: 5px;
      }
    </style>   
    <body>
      <div  class= "header" data-role="header"  data-ajax="false" > B.F.F. Solutions App </div>   
    <?php
        session_start(); 
        try { 
          $id= $_SESSION ['id'];
          $items =  $_SESSION['cart'];
          echo '<table border= "2px" solid align="center"  style="padding: 30px">';
          echo '<tr bgcolor= "#e6e6e6"  >';   
          echo'<td style="padding: 8px"> User ID </td>'; 
          echo'<td> Buying </td>';
          echo '</tr>';
          echo '<tr bgcolor= "lightblue"  style="padding: 8px">';
          echo '<td style="padding: 5px" >'  . $id . '</td>';  
          echo '<td>'  . $items .  '</td>'; 
          echo '</tr>';
          echo '</table>';
          //   $id= $_SESSION ['id'];
          // echo $items = $_SESSION['cart']; 
          $DB_TYPE = 'mysql'; //Type of database<br>         
          $DB_HOST = 'localhost'; //Host name<br>         
          $DB_USER = 'root'; //Host Username<br>         
          $DB_PASS = ''; //Host Password<br>         
          $DB_NAME = 'webproject'; //Database name<br><br> 
          $connStr = "mysql:host=".$DB_HOST.";port=3307;dbname=".$DB_NAME;          
          $DBH = new PDO($connStr,$DB_USER,$DB_PASS); 

          $sql = "INSERT INTO `webproject`.`orders` (`userid`, `buying`) VALUES ($id,'$items');"; 
          $sth = $DBH->prepare($sql);
          $sth->execute(); 
        
      } catch (PDOException $e) {echo $e;} 
      echo '<script>alert("Your order has been placed")</script>';
    ?>
    <a href="customerPage.php"   data-ajax="false"   class="ui-btn ui-btn-inline" >Back </a> <br>
      <div class="footer" data-ajax=false  data-role="footer" >Copyright 2016</div>    
</body>
</html>
