<?php  
$settings = new settings($db);

if($_SERVER['REQUEST_METHOD']=='POST'){    

    if($settings->readAll()->rowCount()>0){
        $settings->id = 1;
        $settings->read();
        if(!empty($_FILES['site_logo']['name'])){
            $settings->site_logo = updateImage($_FILES['site_logo'],$settings->site_logo,"../images/");
        }
        if(!empty($_FILES['site_favicon']['name'])){
            $settings->site_favicon = updateImage($_FILES['site_favicon'],$settings->site_favicon,"../images/");
        }
        $settings->site_name = $_POST['site_name'];
        $settings->site_timezone = $_POST['site_timezone'];
        $settings->site_map = $_POST['site_map'];
        $settings->site_footer = $_POST['site_footer'];
        $settings->contact_email = $_POST['contact_email'];
        $settings->contact_phone = $_POST['contact_phone'];
        $settings->contact_address = $_POST['contact_address'];
        
        if($_POST['site_timezone']){
            date_default_timezone_set($_POST['site_timezone']);
        }
        $settings->created_at = date("Y-m-d h:i:s",time());
        $settings->updated_at = date("Y-m-d h:i:s",time());
            $settings->update();
    }else{
        if(!empty($_FILES['site_logo']['name'])){
            $settings->site_logo = uploadImage($_FILES['site_logo'],"../images/");
        }
        if(!empty($_FILES['site_favicon']['name'])){
            $settings->site_favicon = uploadImage($_FILES['site_favicon'],"../images/");
        }
        $settings->site_name = $_POST['site_name'];
        $settings->site_timezone = $_POST['site_timezone'];
        $settings->site_map = $_POST['site_map'];
        $settings->site_footer = $_POST['site_footer'];
        $settings->contact_email = $_POST['contact_email'];
        $settings->contact_phone = $_POST['contact_phone'];
        $settings->contact_address = $_POST['contact_address'];
        
        if($_POST['site_timezone']){
            date_default_timezone_set($_POST['site_timezone']);
        }
        $settings->created_at = date("Y-m-d h:i:s",time());
        $settings->updated_at = date("Y-m-d h:i:s",time());
        $settings->create();
    }
    $message = "Settings page updated successfully!";
}
$settings->id = 1;
$settings->read();
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Settings Page</h1>
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
                    <form role="form" method="POST" action="index.php?page=settings" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="site_name">Site Name</label>
                            <input type="text" class="form-control" id="site_name" name="site_name" value="<?php echo $settings->site_name; ?>" required>
                        </div>
                        <?php if ($settings->site_logo) { ?>
                        <div class="form-group">
                            <img src="<?php echo "../images/" . $settings->site_logo; ?>" width="150px" alt="Site Logo">
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <label for="site_logo">Site Logo</label>
                            <input type="file" class="form-control-file" id="site_logo" name="site_logo">
                        </div>
                        <?php if ($settings->site_favicon) { ?>
                        <div class="form-group">
                            <img src="<?php echo "../images/" . $settings->site_favicon; ?>" width="150px" alt="Site Favicon">
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <label for="site_favicon">Site Favicon</label>
                            <input type="file" class="form-control-file" id="site_favicon" name="site_favicon">
                        </div>
                        <div class="form-group">
                            <label for="site_map">Site Map</label>
                            <input type="text" class="form-control" id="site_map" name="site_map" value="<?php echo htmlspecialchars($settings->site_map); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="site_timezone">Site Timezone</label>
                            <select name="site_timezone" id="site_timezone" class="form-control" required>
                                <option value="">Select Timezone</option>
                                <?php foreach (setTimezone() as $key => $value) { ?>
                                <option value="<?php echo $key; ?>" <?php echo $key == $settings->site_timezone ? "selected" : ""; ?>><?php echo $value; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="site_footer">Site Footer</label>
                            <input type="text" class="form-control" id="site_footer" name="site_footer" value="<?php echo $settings->site_footer; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="contact_email">Email</label>
                            <input type="email" class="form-control" id="contact_email" name="contact_email" value="<?php echo $settings->contact_email; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="contact_phone">Phone</label>
                            <input type="tel" class="form-control" id="contact_phone" name="contact_phone" value="<?php echo $settings->contact_phone; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="contact_address">Address</label>
                            <input type="text" class="form-control" id="contact_address" name="contact_address" value="<?php echo $settings->contact_address; ?>" required>
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
