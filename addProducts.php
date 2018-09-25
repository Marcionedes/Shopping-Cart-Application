<html>
<head>
<title>addProductsPage</title>
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
            margin-top: 120px;
            padding: 5px;
            font-size: 16px;
        }
    </style>    
<body> 
    <div  class= "header" data-role="header"> B.F.F. Solutions App </div>   
    <?php
        if($_POST) {
            $title = $_POST['title'];
            $desc = $_POST['desc'];
            $price = $_POST['price'];
            try {
                $host = '127.0.0.1:3307';
                $dbname = 'webproject';
                $user = 'root';
                $pass = '';
                # MySQL with PDO_MYSQL
                $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

                $sql = "INSERT INTO `products` ( `title`, `desc`, `price`) VALUES ( ?, ?, ?);";
                $sth = $DBH->prepare($sql);
                $sth->bindParam(1, $title, PDO::PARAM_INT);
                $sth->bindParam(2, $desc, PDO::PARAM_INT);
                $sth->bindParam(3, $price, PDO::PARAM_INT);
                $sth->execute();
                echo '<script>alert("A new product was added")</script>';
            } catch (PDOException $e) {echo 'Error' . $e;}  
        }
    ?>
    <form action="addProducts.php" method="post">
        Title <input type="text" name="title"/> 
        Description <input type="text" name="desc"/>
        Price <input type="text" name="price"/>
        <input type="submit" value ="ADD"/>
    </form>
    <a class="ui-btn ui-btn-inline"  data-ajax=false href="staffPage.php">Back </a>
    <div class="footer" data-role= "footer" >Copyright 2016</div>
</body>
</html>	
