<?php  
$sliders = new sliders($db);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $sliders->title = $_POST['title'];
    $sliders->image = uploadImage($_FILES['image'],"../images/sliders/");
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $sliders->created_at = date("Y-m-d h:i:s",time());
    $sliders->updated_at = date("Y-m-d h:i:s",time());

    if($sliders->create()){
        $message = "New slider added successfully!";
    }
}

?>


<div class="container-fluid px-4">
    <h1 class="mt-4">Add New Slider</h1>
    <?php if (!empty($message)) { ?>
    <div class="alert alert-success">
        <?php echo $message; ?>
    </div>
    <?php } ?>
    <div class="card mb-4">
        <div class="card-header">
            Add New Slider
        </div>
        <div class="card-body">
            <form role="form" method="post" action="index.php?page=sliders_add" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control-file" name="image">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
