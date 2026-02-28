<?php  
$blogcategories = new blogcategories($db);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $blogcategories->title = $_POST['title'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $blogcategories->created_at = date("Y-m-d h:i:s",time());
    $blogcategories->updated_at = date("Y-m-d h:i:s",time());

    if($blogcategories->create()){
        $message = "New blog category added successfully!";
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Add New Blog Category
            </h1>
        </div>
    </div> <!-- /.row -->

    <?php if (!empty($message)) { ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success">
                    <?php echo $message; ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form role="form" method="post" action="index.php?page=blogcategories_add">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- /.row -->
</div> <!-- /.container -->
