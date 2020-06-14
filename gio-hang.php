
<?php 
    require_once  "C:/xampp/htdocs/koi/autoload/autoload.php";
    $sum =0;
    if(!isset($_SESSION['name_id']))
    {
        echo "<script> alert('Bạn phải đăng nhập mới thực hiện được chức năng này'); location.href='index.php'</script>";   
    }

     
    if(!isset ($_SESSION['cart']) || count($_SESSION['cart']) ==0)
    {
        echo "<script>alert(' Không có sản phẩm trong giỏ hàng');location.href='/koi/index.php'</script>";
    }
?>



<?php require_once  "C:/xampp/htdocs/koi/layouts/header.php";  ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1; foreach($_SESSION['cart'] as $key => $value): ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="<?php echo uploads() ?>product/<?php echo $value['thunbar'] ?>" width="80px" height="80px">
                                        <h5><?php echo $value['name'] ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <?php echo formatPrice($value['price']) ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input id="qty" type="number" readonly="" name="qty" value="<?php echo $value['qty'] ?>" min="0">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?php echo formatPrice($value['price'] *$value['qty']) ?>
                                    </td>
                                   
                                    <td>
                                        <a href="/koi/remove.php?key=<?php echo $key ?>" class="btn btn-xs btn-danger"><i class="icon_close"></i></a>
                                        <a href="#" class="btn btn-xs btn-info updatecart" data-key=<?php echo $key ?>> <i class="icon_loading"></i></a>
                                    </td>
                                </tr>
                                <?php $sum += $value['price'] * $value['qty']; $_SESSION['tongtien'] =$sum ; ?>
                                <?php $stt ++ ;endforeach ?>
                               <!--  <tr>
                                    <td class="shoping__cart__item">
                                        <img src="img/cart/cart-2.jpg" alt="">
                                        <h5>Fresh Garden Vegetable</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        $39.00
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        $39.99
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="img/cart/cart-3.jpg" alt="">
                                        <h5>Organic Bananas</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        $69.00
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        $69.99
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close"></span>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="/koi/index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <!-- <a href="#" class="primary-btn cart-btn cart-btn-right" data-key=<?php echo $key ?>><i class="icon_loading"></i>Update Cart</a> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span><?php echo formatPrice($_SESSION['tongtien']) ?></span></li>
                            <li>VAT<span>10%</span></li>
                            <li>Total <span><?php $_SESSION['total'] = $_SESSION['tongtien']* 110/100; echo formatPrice($_SESSION['total']) ?></span></li>
                        </ul>
                        <a href="/koi/thanh-toan.php" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

   <?php require_once  "C:/xampp/htdocs/koi/layouts/footer.php"; ?>