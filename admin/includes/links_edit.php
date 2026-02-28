<?php  
$links = new links($db);

if($_GET['id']){
    $links->id = $_GET['id'];
    $links->read();
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $links->title = $_POST['title'];
    $links->url = $_POST['url'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $links->updated_at = date("Y-m-d h:i:s",time());

    if($links->update()){
        $message = "Menu link updated successfully!";
    }
}

?>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Edit Link Menu</h1>
        </div>
    </div>
    <!-- /. ROW -->

    <?php if (!empty($message)) { ?>
    <div class="alert alert-success">
        <?php echo $message; ?>
    </div>
    <?php } ?>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form role="form" method="POST" action="index.php?page=links_edit&id=<?php echo $_GET['id']; ?>">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $links->title; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="url" class="form-control" id="url" name="url" value="<?php echo $links->url; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /. ROW -->
</div>


</body>
</html>
