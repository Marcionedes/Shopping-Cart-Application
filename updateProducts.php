<html>
<head>
<title>updateProductsPage</title> 
<link rel="stylesheet" href="http://demos.jquerymobile.com/1.4.5/css/themes/default/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>        
 </head>
    <style>
        .header {
            text-align: center;
            background-color: lightgrey;
            padding: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 175px;
            padding: 5px;
            font-size: 16px;
        }
    </style>
<body> 
    <div  class= "header" data-role="header"> B.F.F. Solutions App </div>
        <?php
        session_start();
        $id = $_GET['id'];
        if($_POST) {
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];  

        try {
            $host = 'localhost';
            $dbname = 'webproject';
            $username = 'root';
            $password = '';
                        # MySQL with PDO_MYSQL
        $connStr = "mysql:host=".$host.";port=3307;dbname=".$dbname; 
        $DBH = new PDO($connStr,$username,$password);
        $sql = "UPDATE `webproject`.`products` SET `title`=?,  `desc`=? ,`price`=?  WHERE  `id` =?;";
        $sth = $DBH->prepare($sql); 
        $sth->bindParam(1, $title, PDO::PARAM_INT);			
        $sth->bindParam(2, $desc, PDO::PARAM_INT);
        $sth->bindParam(3, $price, PDO::PARAM_INT);
        $sth->bindParam(4, $id, PDO::PARAM_INT);
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
            $sql = "SELECT * FROM `webproject`.`products` WHERE id=$id";
            $sth = $DBH->prepare($sql);
            $sth->execute();
            echo '<table border= "2px" solid  align="center" style="padding: 30px">';
            echo '<tr bgcolor= "#e6e6e6"  >';   
            echo'<td style="padding: 8px"> ID </td>';
            echo'<td> Title </td>'; 
            echo'<td> Description</td>';
            echo'<td> Price</td>';
            echo'<td> Action</td>'; 
            while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $title = $row['title'];
            $desc = $row['desc'];
            $price = $row['price'];
            echo '<form action="updateProducts.php?id='.$id.'" method="post">';
            echo '<tr bgcolor= "lightblue"  style="padding: 8px">';
            echo '<td style="padding: 5px"><input name="status" type="text" value="' . $id . '"/></td>';
            echo '<td><input name="title" type="text" value="' . $title. '"/></td>';
            echo '<td><input name="desc" type="text" value="' . $desc. '"/></td>';
            echo '<td><input name="price" type="text" value="' . $price. '"/></td>';
            echo '<td>  <button type="submit" data-ajax=false >UPDATE</button></td>';
            echo '</tr>';			
            echo '</form>'; 
            }
        } catch(PDOException $e) {echo $e;}	
								
    ?>
        <a class="ui-btn ui-btn-inline" href="staffPage.php">Back </a>    
</body>
</html>