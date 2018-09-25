<html>
<head>
<title>ordersPage</title>   
<link rel="stylesheet" href="http://demos.jquerymobile.com/1.4.5/css/themes/default/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.js"></script>   
</head>
    <style>
        .header {
            text-align: center;
            border-bottom: 20px;
            padding: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 115px;
            padding: 5px;
        }
    </style>    
 <body>  
    <div  class= "header" data-role="header"> B.F.F. Solutions App </div>  

        <?php 
            session_start();  
        try {
            $DB_TYPE = 'mysql'; //Type of database<br>        
            $DB_HOST = '127.0.0.1'; //Host name<br>         
            $DB_USER = 'root'; //Host Username<br>         
            $DB_PASS = ''; //Host Password<br>         
            $DB_NAME = 'webproject'; //Database name<br><br> 
            $connStr = "mysql:host=".$DB_HOST.";port=3307;dbname=".$DB_NAME;          
            $DBH = new PDO($connStr,$DB_USER,$DB_PASS); 
            $sql = "select * from orders";  
            $sth = $DBH->prepare($sql);           
            $sth->execute();   
        
            echo '<table border= "2px" solid  align="center" style="padding: 30px">';
            echo '<tr bgcolor= "#e6e6e6"  >';   
            echo'<td style="padding: 8px"> Order ID </td>';
            echo'<td> UserID </td>'; 
            echo'<td> Buying</td>';
            echo'<td> Date</td>';
            echo'<td> Status </td>'; 
            echo'<td> Dispatch Order </td>'; 
            echo'</tr>';
                while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {              
                $id = $row['id'] ;         
                $userid = $row['userid']; 
                $buying= $row['buying'];
                $date = $row['date'];   
                $status= $row['status'];
                echo '<tr bgcolor= "lightblue"  style="padding: 8px">';
                echo '<td style="padding: 5px" >'  . $id . '</td>';  
                echo '<td>'  . $userid. '</td>';
                echo '<td>'  . $buying .  '</td>';
                echo '<td>'  . $date .  '</td>';     
                echo '<td>'  . $status. '</td>';   
                echo '<td> <a href="updateOrders.php? id=' . $id . '" data-ajax="false"> Dispatch </a> </td>'; 
                echo '</tr>';
                } echo '</table>';
        } catch (PDOException $e) {echo $e;}        
    ?> 
        <a class="ui-btn ui-btn-inline" href="deliveryPage.php">Back </a>
            <div class="footer" data-ajax=false  data-role="footer" >Copyright 2016</div>
</body>
</html>