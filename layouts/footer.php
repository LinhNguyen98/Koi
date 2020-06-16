
    </section>
<footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a ><img src="/koi/ogani/img/pngflow.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: Lô E1, Phân khu đào tạo E1, Khu Công Nghệ cao TP.HCM, Phường Hiệp Phú, Quận 9, TP.HCM. </li>
                            <li>Phone: 000000000</li>
                            <li>Email: abc@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
<!--                         <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul> -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62700.39093586778!2d106.71487534375997!3d10.828566615476976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527c3debb5aad%3A0x5fb58956eb4194d0!2zxJDhuqFpIEjhu41jIEh1dGVjaCBLaHUgRQ!5e0!3m2!1svi!2s!4v1592285949046!5m2!1svi!2s" width="450" height="300" frameborder="0" style="border:0;" ></iframe>
                </div>
            </div>
            
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="/koi/ogani/js/jquery-3.3.1.min.js"></script>
<script src="/koi/ogani/js/bootstrap.min.js"></script>
<script src="/koi/ogani/js/jquery.nice-select.min.js"></script>
<script src="/koi/ogani/js/jquery-ui.min.js"></script>
<script src="/koi/ogani/js/jquery.slicknav.js"></script>
<script src="/koi/ogani/js/mixitup.min.js"></script>
<script src="/koi/ogani/js/owl.carousel.min.js"></script>
<script src="/koi/ogani/js/main.js"></script>
<script type="text/javascript">
    $(function() {
        $hidenitem = $(".hidenitem");
        $itemproduct = $(".item-product");
        $itemproduct.hover(function(){
            $(this).children(".hidenitem").show(100);
        },  function(){
            $hidenitem.hide(500);
        })
    })
    $(function(){
        $updatecart = $(".updatecart");
        $updatecart.click(function(e){
            e.preventDefault();
            $qty = $(this).parents("tr").find("#qty").val();
            console.log($qty);
            $key = $(this).attr("data-key");

            $.ajax({
                url: '/koi/update-cart.php',
                type: 'GET',
                data: {'qty':$qty,'key':$key},
                success:function(data)
                {
                    if(data == 1)
                    {
                        alert("Cập nhật giỏ hàng thành công");
                        location.href='cart.php';
                    }
                    else(data == 0)
                    {

                    }
                }  
            })
        })
    

    })
</script>
