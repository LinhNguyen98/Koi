
<?php 
    require_once  "C:/xampp/htdocs/koi/autoload/autoload.php";
    unset($_SESSION['cart']);
    unset($_SESSION['total']);
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

                    <div class="col-md-9 bor">
                        
                        <section class="box-main1">
                            <h3 style="font-family: Arial" class="title-main"><a href=""> Thông báo thanh toán</a> </h3>
                            <?php if (isset($_SESSION['success'])): ?>
                                <div class="alert alert-success">
                                    <strong>Success!</strong> <?php echo $_SESSION['success'] ; unset($_SESSION['success'])?>
                                </div>
                            <?php endif ?>
                            <a href="index.php" class="btn btn-success">Trở về trang chủ</a>
                        </section>
                    </div> 
            </div>
        </div>
    
    <!-- Checkout Section End -->
   <?php require_once  "C:/xampp/htdocs/koi/layouts/footer.php"; ?> 

               
               