<?php  
$users = new users($db);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $users->name = $_POST['name'];
    $users->username = $_POST['username'];
    $users->password = sha1($_POST['password']);
    $users->phone = $_POST['phone'];
    $users->email = $_POST['email'];
    $users->role = $_POST['role'];
    $users->status = 1;
    $users->email_verified = "verified";

    if(!empty($_FILES['image']['name'])){
        $upload_file_name = uploadImage($_FILES['image'],"../images/users/");
        $users->image = $upload_file_name;
    }

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $users->created_at = date("Y-m-d h:i:s",time());
    $users->updated_at = date("Y-m-d h:i:s",time());

    if($users->create()){
        $message = "New user added successfully!";
    }
}

?>
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Add New User
            </h1>
        </div>
    </div>
    <!-- /. ROW  -->

    <?php if (!empty($message)) { ?>
    <div class="alert alert-success">
        <?php echo $message; ?>
    </div>
    <?php } ?>
   
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form role="form" method="post" action="index.php?page=users_add" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" type="password" required>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input class="form-control" name="phone">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" type="email" required>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control" required>
                                <option value="0">User</option>
                                <option value="1">Mod</option>
                                <option value="2">Admin</option>
                            </select>
                        </div>
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
    <!-- /. ROW  -->
</div>