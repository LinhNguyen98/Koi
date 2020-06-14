
<?php 
    require_once  "C:/xampp/htdocs/koi/autoload/autoload.php";
    if(!isset($_SESSION['name_id']))
    {
        echo "<script> alert('Bạn phải đăng nhập mới thực hiện được chức năng này'); location.href='/koi/sign-in.php'</script>";   
    }
    $user = $db -> fetchID("users",intval($_SESSION['name_id']));


    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data = 
        [
            'amount' => $_SESSION['total'],
            'users_id' => $_SESSION['name_id'],
            'note' => postInput("note")
        ];
        $idtran = $db -> insert("transaction",$data);
        if($idtran > 0)
        {
            foreach ($_SESSION['cart'] as $key => $value)
            {
                $data2 = 
                [
                    'transaction_id' => $idtran,
                    'product_id'     => $key,
                    'qty'            => $value['qty'],
                    'price'          => $value['price']
                ];
                $id_insert = $db -> insert ("orders",$data2);    
            }            
            

            $_SESSION['success']= "Lưu thông tin đơn hàng thành công ! Chúng tôi sẽ liên hệ với bạn sớm nhất !";
            header("location:noti.php");
        }       
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
    <section class="breadcrumb-section set-bg" data-setbg="./ogani/img/hero/Koi.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>

            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="" method="POST" >
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" value="<?php echo $user['name'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add" value="<?php echo $user['address'] ?>">
                                <!-- <input type="text" placeholder="Apartment, suite, unite ect (optinal)"> -->
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" value="<?php echo $user['phone'] ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" value="<?php echo $user['email'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="acc">
                                    Create an account?
                                    <input type="checkbox" id="acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Create an account by entering the information below. If you are a returning customer
                                please login at the top of the page</p>
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="text">
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Ship to a different address?
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                
                                <ul>
                                    <?php $stt = 1; foreach($_SESSION['cart'] as $key => $value): ?>
                                        <li><?php echo $value['name'] ?><span><?php echo formatPrice($value['price'] *$value['qty']) ?></span></li>
                                    <?php $stt ++ ;endforeach ?>
                                </ul>
                                

                                <div class="checkout__order__subtotal">Subtotal <span><?php echo formatPrice($_SESSION['tongtien']) ?></span></div>
                                <div class="checkout__order__subtotal">VAT <span>10%</span></div>
                                <div name="total" class="checkout__order__total">Total <span><?php echo formatprice($_SESSION['total']) ?></span></div>
                                <!-- <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> -->
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
   <?php require_once  "C:/xampp/htdocs/koi/layouts/footer.php"; ?>