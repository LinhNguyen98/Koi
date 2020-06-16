<?php 
    
    require_once  "C:/xampp/htdocs/koi/autoload/autoload.php";

    $id = intval(getInput('id'));
    $EditCategory = $db ->fetchID("category",$id);
    if(isset($_GET['p']))
    {
        $p =$_GET['p'];

    }
    else
    {
        $p = 1;
    }
    $sql = "SELECT * FROM product WHERE category_id = $id";
    $total = count($db->fetchsql($sql));
    $product = $db ->fetchJones("product",$sql,$total,$p,6,true);
    $sotrang = $product['page'];
    unset($product['page']);
    $path = $_SERVER['SCRIPT_NAME'];    
 ?>
 <?php require_once  "C:/xampp/htdocs/koi/layouts/header.php";  ?>



                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
     <section class="breadcrumb-section set-bg" data-setbg="/koi/ogani/img/hero/Koi.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?php echo $EditCategory['name'] ?></h2>
                        <div class="breadcrumb__option">
                            <a href="/koi/index.php">Home</a>
                            <!-- <a href="./index.html">Vegetables</a> -->
                            <span>KOI</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Breadcrumb Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                
                                <?php foreach($category as $item) :?>
                                    <li><a href="/koi/shop-grid.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="row">
                        <?php foreach ($product as $item): ?>
                            <div  class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    
                                      <div href="/koi/product-details.php?id=<?php echo $item['id'] ?>" class="featured__item__pic set-bg"   data-setbg="/koi/public/uploads/product/<?php echo $item['thunbar'] ?>">
                                            
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                        <div class="product__discount__item__text">
                                            
                                            <h5><a style="font-family: Arial" href="/koi/product-details.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']?></a></h5>
                                            <div class="product__item__price"><?php echo formatprice($item['price']) ?></div>
                                        </div>
                                 </div>

                            </div>

                        <?php endforeach ?>
                    </div>
                    <div  class="product__pagination">
                        <?php for ($i=1; $i <= $sotrang; $i++):?>
                                <a href="<?php echo $path ?> ?id=<?php echo $id ?> &&p=<?php echo $i ?>"><?php echo $i; ?> 
                                </a>
                        <?php endfor ; ?>    
                    </div>
                </div>
            </div>
        </div>

    </section>
            <?php require_once  "C:/xampp/htdocs/koi/layouts/footer.php"; ?>
