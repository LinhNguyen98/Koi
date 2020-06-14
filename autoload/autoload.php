

<?php
	session_start();
	require_once __DIR__. "/../libraries/Database.php";
	require_once __DIR__. "/../libraries/Function.php";
    $db = new Database ;
 	
    
    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/koi/Public/uploads/");
    $category = $db->fetchAll("category");
    $sqlNew = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 4";
    $productNew = $db ->fetchsql($sqlNew);
    $sqlPay = "SELECT * FROM product WHERE 1 ORDER BY PAY DESC LIMIT 4";
    $productPay = $db -> fetchsql($sqlPay);
?>