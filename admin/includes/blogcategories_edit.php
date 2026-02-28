<?php  
$blogcategories = new blogcategories($db);

if($_GET['id']){
    $blogcategories->id = $_GET['id'];
    $blogcategories->read();

}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $blogcategories->title = $_POST['title'];
    $blogcategories->status = isset($_POST['status'])=='on'?1:0;
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $blogcategories->updated_at = date("Y-m-d h:i:s",time());

    if($blogcategories->update()){
        $message = "Blog category updated successfully!";
    }
}

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Edit Blog Category
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
                    <form role="form" method="post" action="index.php?page=blogcategories_edit&id=<?php echo $_GET['id']; ?>">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($blogcategories->title); ?>">
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="status" <?php echo $blogcategories->status == 1 ? 'checked' : ''; ?>>
                                    Status
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- /.row -->
</div> <!-- /.container -->
