    
<?php 
        require_once  "C:/xampp/htdocs/koi/autoload/autoload.php";


        $sqlHomecate = "SELECT name, id FROM category WHERE home =1 ORDER BY updated_at ";
        $CategoryHome = $db -> fetchsql($sqlHomecate);

        $data =[];

        foreach ($CategoryHome  as $item) 
        {

            $cateId = intval($item['id']);
            $sql = "SELECT * FROM product WHERE category_id = $cateId LIMIT 4";
            $ProductHome = $db->fetchsql($sql);
            $data[$item['name']]= $ProductHome;
        
        }
          
    ?>


    <?php require_once  "C:/xampp/htdocs/koi/layouts/header.php";  ?>
    
                    <div class="hero__item set-bg" data-setbg="/koi/ogani/img/hero/Koi.jpg" >
                        <div style="font-family: Arial" class="hero__text">
                            <span style="color: green">HUTECH</span>
                            <h2 style=" font-family: Arial; color: green  ">CÁ KOI XỊN <br />100% CÁ NHẬP</h2>
                            <p style="font-family: Arial; color: green">FREESHIP KHU VỰC Q9</p>
                            <a href="/koi/shop-grid.php?id=26" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <section class="categories">

        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">

                    <?php foreach($category as $item) :?>
                        
                        <div class="col- lg-3" >
                            <div   class="categories__item set-bg" data-setbg="/koi/public/uploads/category/<?php echo $item['thunbar'] ?>" style=" width: 90%">
                                
                                <h5 style="font-family: Arial"><a href="/koi/shop-grid.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></a></h5>
                            </div>
                        </div>
                    <?php endforeach; ?> 

                </div>
            </div>
        </div>
    </section>
    <section  class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">               
                <?php foreach ($productNew as $item):  ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div  class="featured__item">
                            <a href="/koi/product-details.php?id=<?php echo $item['id'] ?>">
                                <img src="/koi/public/uploads/product/<?php echo $item['thunbar'] ?>" class="featured__item__pic set-bg" >
                                     <div class="featured__item__text"> 
                                        <h6 style="font-family: Arial" ><a  href="/koi/product-details.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></h6>
                                        <h5><?php echo formatprice($item['price']) ?></h5>
                                    </div> 
                            </a>
                        </div>
                    </div>
                <?php endforeach ?>    
            </div>
        </div>
    </section>
    <?php foreach ($data as $key => $value): ?>
        <section class="featured spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div  class="section-title">
                            <h2 style="font-family: Arial" > <a style=" color:black" href="/koi/shop-grid.php?id=<?php echo $item['category_id'] ?>"><?php echo $key ?></a></h2>
                        </div>
                    </div>
                </div>
                <div class="row featured__filter">
                   
                    <?php foreach ($value as $item): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                            <div class="featured__item">
                                <a href="/koi/product-details.php?id=<?php echo $item['id'] ?>">
                                    <img src="/koi/public/uploads/product/<?php echo $item['thunbar'] ?>" class="featured__item__pic set-bg" >
                                         <div class="featured__item__text"> 
                                            <h6><a href="/koi/product-details.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']?></a></h6>
                                            <h5><?php echo formatprice($item['price']) ?></h5>
                                        </div>

                                </a>
                            </div>
                        </div>
                    <?php endforeach ?>    
                </div>
            </div>
        </section>
    <?php endforeach ?> 

   
   <!--  <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                           
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                          
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <?php require_once  "C:/xampp/htdocs/koi/layouts/footer.php"; ?>
