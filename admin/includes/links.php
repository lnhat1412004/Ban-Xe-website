<?php  
$links = new links($db);

/*Delete link menu*/
if(!empty($_GET['id'])){
    $links->id = $_GET['id'];
    if($links->delete()){
        $message = "Deleted successfully!";
    }
}

/*Read all links menu*/
$stmt_links = $links->readAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Links Menu</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Links Menu
            </h1>
        </div>
    </div>
    <!-- /. ROW -->

    <?php if (!empty($message)) { ?>
    <div class="alert alert-success">
        <?php echo $message; ?>
    </div>
    <?php } ?>
   
    <div class="row">
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary btn-sm" href="index.php?page=links_add">Add</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>                                
                                    <th>URL</th>
                                    <th style="text-align: center;">Created Date</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($rows = $stmt_links->fetch()) { ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $rows['id']; ?></td>
                                    <td><?php echo $rows['title']; ?></td>                                
                                    <td><?php echo $rows['url']; ?></td>
                                    <td class="text-center"><?php echo $rows['created_at']; ?></td>
                                    <td class="text-center">
                                        <a href="index.php?page=links_edit&id=<?php echo $rows['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="index.php?page=links&id=<?php echo $rows['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--End Advanced Tables -->
        </div>
    </div>
    <!-- /. ROW -->
</div>




</body>
</html>
