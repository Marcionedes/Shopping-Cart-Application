<html>
<head>
<title>staffPage</title>  
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
            margin-top: 150px;
            padding: 5px;
            font-size: 16px;
        }
    </style>   
 <body>
    <div id="staffPage" data-role="page">  
        <div  class= "header" data-role="header"> B.F.F. Solutions App </div>
            <?php    
                session_start();
                echo '<h3> Hello, </h3>';
                echo  '<h2>' . @$_SESSION ['fname'] .'<h2>';
            ?> 
            <a href="addProducts.php"       data-ajax=false class="ui-btn" > Add new Product </a>
            <a href="staffProductsPage.php" data-ajax=false class="ui-btn" > Edit Product </a>      
            <a href="logoutPage.php"        data-ajax=false class="ui-btn" > Log Out</a> <br>     
                <div class="footer" data-ajax=false  data-role="footer" >Copyright 2016</div>
    </div>
 </body>
</html>