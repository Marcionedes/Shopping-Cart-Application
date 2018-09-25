<!DOCTYPE html> 
<html>
<head>
<title>addtocartPage</title>
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
            margin-top: 20px;
            padding: 5px;
        }
    </style>    
    <body>
         <div  class= "header" data-role="header"> B.F.F. Solutions App </div>
    <?php
        session_start();
        $id = $_GET['id'] ;    
        $_SESSION['cart'] = $_SESSION['cart'] .  ' ' .$id;
    ?>
    <script> window.location="productsPage.php"; </script>     
</body>
</html>
        