
<?php
    require_once __DIR__. "/autoload/autoload.php";
    
    $category = $db ->fetchAll("category");
    
?>


<?php require_once __DIR__. "/../../layouts/header.phpp"; ?>
                    <!-- Page Heading -->
                    <div id="map">
                    	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7838.178555614836!2d106.70988223073527!3d10.804474043335563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528a459cb43ab%3A0x6c3d29d370b52a7e!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBIdXRlY2g!5e0!3m2!1svi!2s!4v1558868007137!5m2!1svi!2s" width="368" height="200" frameborder="0" style="border:0" allowfullscreen></iframe  >
                    </div>
                    <!-- /.row -->
  <?php require_once __DIR__. "/../../layouts/footer.php"; ?>

