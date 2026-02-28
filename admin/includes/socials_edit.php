<?php  
$socials = new socials($db);

if($_GET['id']){
    $socials->id = $_GET['id'];
    $socials->read();
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $socials->title = $_POST['title'];
    $socials->icon = $_POST['icon'];
    $socials->url = $_POST['url'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $socials->updated_at = date("Y-m-d h:i:s",time());

    if($socials->update()){
        $message = "Social link updated successfully!";
    }
}

?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Edit Social Link
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
                        <form role="form" method="Post" action="index.php?page=socials_edit&id=<?php echo $_GET['id'] ?>">
                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" value="<?php echo $socials->title ?>">                                
                            </div>
                            <div class="form-group">
                                <label>Icon</label>
                                <input class="form-control" name="icon" value="<?php echo htmlspecialchars($socials->icon) ?>">                                
                            </div>
                            <div class="form-group">
                                <label>URL</label>
                                <input class="form-control" name="url" value="<?php echo $socials->url ?>">                                
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>