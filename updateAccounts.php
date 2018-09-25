<html>
<head>
<title>updateAccountsPage</title>
<link rel="stylesheet" href="http://demos.jquerymobile.com/1.4.5/css/themes/default/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
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
    <div  class= "header" data-role="header"> B.F.F. Solutions App </div> 
    <?php

        $id = $_GET['id'];


        if($_POST){
            
        $type = $_POST['type'];  

        try {
            
            $host = 'localhost';
            $dbname = 'webproject';
            $username = 'root';
        $password = '';
                        # MySQL with PDO_MYSQL
                
        $connStr = "mysql:host=".$host.";port=3307;dbname=".$dbname; 
        $DBH = new PDO($connStr,$username,$password);

        $sql = "UPDATE `webproject`.`users` SET `type`=? WHERE  `id` =?;";
        $sth = $DBH->prepare($sql);
                        
        $sth->bindParam(1, $type, PDO::PARAM_INT);
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
            $sql = "SELECT * FROM `webproject`.`users` WHERE id=$id";
            $sth = $DBH->prepare($sql);
            $sth->execute();
            echo '<table border= "2px" solid  align="center" style="padding: 30px">';
            echo '<tr bgcolor= "#e6e6e6"  >';   
            echo'<td style="padding: 8px"> ID </td>';
            echo'<td> FirstName </td>'; 
            echo'<td> LastName </td>';
            echo'<td> UserName</td>';
            echo'<td> Account </td>'; 
            echo'<td> Address </td>';
            echo'<td> Email </td>';
            echo'<td> Password </td>';
            echo'<td> Action</td>'; 
            while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $uname = $row['uname'];
            $type = $row['type'];  
            $address = $row['address']; 
            $email = $row['email'];
            $password = $row['password'];
            echo '<form action="updateAccounts.php?id='.$id.'" method="post">';
            echo '<tr bgcolor= "lightblue"  style="padding: 8px">';
            echo '<td style="padding: 5px" >'  .$id. '</td>'; 
            echo '<td>'  .$fname. '</td>';
            echo '<td>'  .$lname.  '</td>';
            echo '<td>'  .$uname.  '</td>';     
            echo '<td><input name="type" type="text" value="' .$type. '"/></td>'; 
            echo '<td>'  .$address.  '</td>';  
            echo '<td>'  .$email.  '</td>';
            echo '<td>' .$password. '</td>';                               
            echo '<td>  <button type="submit" data-ajax=false >UPDATE</button></td>';
            echo '</tr>';			
            echo '</form>';  
            }

        } catch(PDOException $e) {echo $e;}	                                   
        ?>	
            <a class="ui-btn ui-btn-inline"  data-ajax=false href="accountsPage.php">Back </a>
</body>
</html>	
