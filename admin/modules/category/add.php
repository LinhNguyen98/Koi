
<?php
    $open = "category";

    require_once __DIR__. "/../../autoload/autoload.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {     
        $data = 
        [
            "name" => postInput('name'),
            "slug" => to_slug(postInput("name"))
        ];

        $error  =[];

        if(postInput('name')== '')
        {
            $error['name']= "Mời bạn nhập đầy đủ tên danh mục";
        }
        if (!isset($_FILES['thunbar']))
        {
            $error['thunbar']="Mời bạn chọn hình ảnh";
        }

        if (empty($error))
        {
            if (isset($_FILES['thunbar']))
            {
                // $file_name = bin2hex(random_bytes(32)).'-'.pathinfo($_FILES['thunbar']['name'], PATHINFO_BASENAME);
                $file_name = $_FILES['thunbar']['name'];
                $file_tmp = $_FILES['thunbar']['tmp_name'];
                $file_type = $_FILES['thunbar']['type'];
                $file_error = $_FILES['thunbar']['error'];

                if($file_error == 0)
                {
                    $part = ROOT ."category/";
                    $data['thunbar'] = $file_name;         
                }
            }

            $isset = $db -> fetchOne("category","name ='".$data['name']."'");
            if(count($isset) > 0)
            {
                $_SESSION['error'] = "Tên danh mục đã tồn tại !";

            }
            else 
            {


                $id_insert = $db->insert("category",$data);
                if($id_insert > 0)
                {
                    move_uploaded_file($file_tmp, $part.$file_name);
                    $_SESSION['success'] = "Thêm mới thành công";
                    redirectAdmin("category");
                }
                else
                {
                    $_SESSION['error'] = "Thêm mới thất bại";
                }
            }          
        }    
    }
?>


<?php require_once __DIR__. "/../../layouts/header.php"; ?>
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                               Thêm mới danh mục
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                                </li>
                                <li>
                                    <i ></i>  <a href="">Danh mục</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Thêm mới
                                </li>   
                            </ol>
                            <div class="clearfix"></div>
                            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" >Tên danh mục:</label>
                                    <div class="col-sm-8">
                                        <input type="text " class="form-control"id="email"placeholder="Tên danh mục" name="name">
                                        <?php if (isset($error['name'])): ?>
                                            <p class="text-danger">
                                                <?php echo $error['name'] ?>
                                            </p>
                                        <?php endif ?>
                                        
                                    </div>
                                </div>         
                                <div class="form-group">

                                    <label for="inputEmail3" class="control-label col-sm-2  " >Hình ảnh</label>
                                    <div class="col-sm-3">
                                        <input type="file" class="form-control"id="inputEmail3" name="thunbar">      
                                        <?php if (isset($error['thunbar'])): ?>
                                            <p class="text-danger">
                                                <?php echo $error['thunbar'] ?>
                                            </p>
                                        <?php endif ?>   
                                    </div>
                                </div>                       
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Lưu</button>
                                    </div>
                                </div>
                            </form>   
                        </div>                       
                    </div>
                    <!-- /.row -->
  <?php require_once __DIR__. "/../../layouts/footer.php"; ?>

