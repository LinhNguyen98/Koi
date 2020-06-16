
<?php

    require_once  "C:/xampp/htdocs/koi/autoload/autoload.php";

    $id = intval(getInput('id'));

        ///chi tiet san pham
    $product = $db ->fetchID("product",$id);
    ////sản phẩm kèm theo
    $cateid = intval($product['category_id']);

    $sql = "SELECT * FROM product WHERE category_id =$cateid ORDER BY ID DESC LIMIT 4";
    $sanphamkemtheo = $db->fetchsql($sql);


?>
    <?php require_once  "C:/xampp/htdocs/koi/layouts/header.php";  ?>



                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/koi/ogani/img/hero/Koi.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Product Details</h2>
                        <div class="breadcrumb__option">
                            <a href="/koi/oganic/index.php">Home</a>
                            <!-- <a href="./index.html">Vegetables</a> -->
                            <span>KOI</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="/koi/public/uploads/product/<?php echo $product['thunbar'] ?>" alt="">
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3 style="font-family: Arial"><?php echo $product['name']  ?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price"><?php echo formatprice($product['price']) ?></div>

                        <p style="font-family: Arial"><?php echo $product['content'] ?></p>

                         
                        <a href="addcart.php?id=<?php echo $product['id'] ?>" class="primary-btn">ADD TO CARD</a>
                        <a href" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Availability</b> <span><?php echo $product['number'] ?></span></li>
                        
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->



    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">               
                <?php foreach ($sanphamkemtheo as $item):  ?>
                    <div style="font-family: Arial" class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div  class="featured__item">
                            <a href="/koi/product-details.php?id=<?php echo $item['id'] ?>">
                                <img src="/koi/public/uploads/product/<?php echo $item['thunbar'] ?>" class="featured__item__pic set-bg" >
                                     <div class="featured__item__text"> 
                                        <h6 style="font-family: Arial"><a href="/koi/product-details.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']?></a></h6>
                                        <h5><?php echo formatprice($item['price']) ?></h5>
                                    </div> 
                            </a>
                        </div>
                    </div>
                <?php endforeach ?>    
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

    <!-- Footer Section Begin -->
        <?php require_once  "C:/xampp/htdocs/koi/layouts/footer.php"; ?>
