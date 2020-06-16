<?php 
	require_once  "C:/xampp/htdocs/koi/autoload/autoload.php";
	if(!isset($_SESSION['name_id']))
	{
		echo "<script> alert('Bạn phải đăng nhập mới thực hiện được chức năng này'); location.href='index.php'</script>";	
	}
	else{
	$id = intval(getInput('id'));

	///chi tiet san pham
	$product = $db ->fetchID("product",$id);


	if(!isset($_SESSION['cart'][$id]))
		{
			$_SESSION['cart'][$id]['name'] = $product['name'];
			$_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];
			$_SESSION['cart'][$id]['price'] =((100 - $product['sale']) * $product['price']) /100;
			$_SESSION['cart'][$id]['qty'] = 1;
		}
	else
		{
			$_SESSION['cart'][$id]['qty'] +=1;
		}
	echo "<script> location.href='/koi/cart.php'</script>";
	}
?> 