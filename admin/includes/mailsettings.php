<?php  
$mailsettings = new mailsettings($db);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $mailsettings->email = $_POST['email'];
    $mailsettings->mail_server = $_POST['mail_server'];
    $mailsettings->mail_username = $_POST['mail_username'];
    $mailsettings->mail_password = $_POST['mail_password'];
    $mailsettings->mail_port = $_POST['mail_port'];
    
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $mailsettings->created_at = date("Y-m-d h:i:s",time());
    $mailsettings->updated_at = date("Y-m-d h:i:s",time());

    if($mailsettings->readAll()->rowCount()>0){
        $mailsettings->id = 1;        
        $mailsettings->update();
    }else{
        $mailsettings->create();
    }
    $message = "Mail settings page updated successfully!";
}
$mailsettings->id = 1;
$mailsettings->read();
?>

<!DOCTYPE html>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Mail Settings Page</h1>
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
                    <form role="form" method="POST" action="index.php?page=mailsettings">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="<?php echo $mailsettings->email; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="mail_server">Mail Server</label>
                            <input type="text" name="mail_server" class="form-control" id="mail_server" value="<?php echo $mailsettings->mail_server; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="mail_username">Mail Username</label>
                            <input type="text" name="mail_username" class="form-control" id="mail_username" value="<?php echo $mailsettings->mail_username; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="mail_password">Mail Password</label>
                            <input type="password" name="mail_password" class="form-control" id="mail_password" value="<?php echo $mailsettings->mail_password; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="mail_port">Mail Port</label>
                            <input type="text" name="mail_port" class="form-control" id="mail_port" value="<?php echo $mailsettings->mail_port; ?>" required>
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
