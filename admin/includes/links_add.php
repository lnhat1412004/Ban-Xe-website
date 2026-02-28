<?php  
$links = new links($db);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $links->title = $_POST['title'];
    $links->url = $_POST['url'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $links->created_at = date("Y-m-d h:i:s",time());
    $links->updated_at = date("Y-m-d h:i:s",time());

    if($links->create()){
        $message = "New link menu added successfully!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Link Menu</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">Add New Link Menu</h1>
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
                    <form role="form" method="POST" action="index.php?page=links_add">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="url" class="form-control" id="url" name="url" required>
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
