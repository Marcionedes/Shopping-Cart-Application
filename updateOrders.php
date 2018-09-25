<html>
<head>
<title>updateOrdersPage</title>
<link rel="stylesheet" href="http://demos.jquerymobile.com/1.4.5/css/themes/default/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />    
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="http://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.js  data-ajax=false"></script>    
</head>
   <style>
    .header {
            text-align: center;
            padding: 10px;
            background-color: lightgrey;
        }
        .footer {
            text-align: center;
            margin-top: 120px;
            padding: 5px;
            font-size: 16px;
        }
    </style>    
<body> 
    <div id="updateOdersPage" data-role="page">
        <div  class= "header" data-role="header"> B.F.F. Solutions App </div> 
            <?php
            session_start();
            $id = $_GET['id'];
            if($_POST) {
            $status = $_POST['status'];

            try {
                $host = 'localhost';
                $dbname = 'webproject';
                $username = 'root';
                $password = '';
                            # MySQL with PDO_MYSQL    
            $connStr = "mysql:host=".$host.";port=3307;dbname=".$dbname; 
            $DBH = new PDO($connStr,$username,$password);
            $sql = "UPDATE `webproject`.`orders` SET `status`=? WHERE  `id` =?;";
            $sth = $DBH->prepare($sql);             
            $sth->bindParam(1, $status, PDO::PARAM_INT);
            $sth->bindParam(2, $id, PDO::PARAM_INT);
            $sth->execute();
                        
            } catch(PDOException $e) {echo $e;}								
                
                
            } 

            ?>

            <?php

            try {
                
                $host = 'localhost';
                $dbname = 'webproject';
                $username = 'root';
                $password = '';
                # MySQL with PDO_MYSQL
                    
                $connStr = "mysql:host=".$host.";port=3307;dbname=".$dbname; 
                $DBH = new PDO($connStr,$username,$password);
                $sql = "SELECT * FROM `webproject`.`orders` WHERE id=$id";
                $sth = $DBH->prepare($sql);
                $sth->execute();
                echo '<table border= "2px" solid  align="center" style="padding: 30px">';
                echo '<tr bgcolor= "#e6e6e6"  >';   
                echo'<td style="padding: 8px"> Order ID </td>';
                echo'<td> UserID </td>'; 
                echo'<td> Buying</td>';
                echo'<td> Date</td>';
                echo'<td> Status </td>'; 
                echo'<td> Action</td>'; 
                while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['id'];
                $userid = $row['userid'];
                $buying = $row['buying'];
                $status = $row['status'];
                $date = $row['date'];  
                echo '<form action="updateOrders.php?id='.$id.' "data-ajax="false" method="post">';
                echo '<tr bgcolor= "lightblue"  style="padding: 8px">';
                echo '<td style="padding: 5px" >'  . $id . '</td>'; 
                echo '<td>'  . $userid. '</td>';
                echo '<td>'  . $buying .  '</td>';
                echo '<td>'  . $date .  '</td>';     
                echo '<td><input name="status" type="text" value="' . $status . '"/></td>';
                echo '<td>  <button type="submit" >UPDATE</button></td>';
                echo '</tr>';			
                echo '</form>';  
                }
            } catch(PDOException $e) {echo $e;}	                                    
            ?>	
                <a class= "ui-btn ui-btn-inline" data-ajax=false href="ordersPage.php">Back </a>
                    <div class="footer" data-ajax=false  data-role="footer" >Copyright 2016</div>
        </div>
</body>
</html>	
