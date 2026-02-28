<?php  
$sliders = new sliders($db);

if($_GET['id']){
    $sliders->id = $_GET['id'];
    $sliders->read();
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $sliders->title = $_POST['title'];

    if(!empty($_FILES['image']['name'])){
        if($sliders->image){
            $sliders->image = updateImage($_FILES['image'],$sliders->image,"../images/sliders/");
        }else{
            $sliders->image = uploadImage($_FILES['image'],"../images/sliders/");
        }
    }
    
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $sliders->updated_at = date("Y-m-d h:i:s",time());

    if($sliders->update()){
        $message = "Slider updated successfully!";
    }
}

?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Edit Slider
        </h1>
    </div>
</div> 
<!-- /. ROW  -->
<?php  
if(!empty($message)){
?>
<div class="alert alert-success">
    <?php echo $message ?>
</div>
<?php  
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" method="Post" action="index.php?page=sliders_edit&id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" value="<?php echo $sliders->title ?>">
                                
                            </div>
                            <?php  
                            if($sliders->image){
                            ?>
                            <div class="form-group">
                                <img src="<?php echo "../images/sliders/".$sliders->image; ?>" width="250px" alt="">
                            </div>
                            <?php  
                            }
                            ?>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>