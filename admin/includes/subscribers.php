<?php  
$subscribers = new subscribers($db);

/*Delete subscriber*/
if(!empty($_GET['id'])){
    $subscribers->id = $_GET['id'];
    if($subscribers->delete()){
        $message = "Deleted successfully!";
    }
}

/*Read all subscribers*/
$stmt_categories = $subscribers->readAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribers</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Subscribers
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
        <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="card">
                <div class="card-header">
                    <a href="index.php?page=subscribers_add" class="btn btn-primary btn-sm">Send Email to All Subscribers</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Email</th>
                                    <th>Verified Token</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">Created Date</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($rows = $stmt_categories->fetch()) { ?>
                                <tr>
                                    <td><?php echo $rows['id'] ?></td>
                                    <td><?php echo $rows['email'] ?></td>
                                    <td><?php echo $rows['verified_token'] ?></td>
                                    <td style="text-align: center;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" <?php echo $rows['status'] ? 'checked' : '' ?> disabled>
                                            <label class="form-check-label" for="statusCheck">Active</label>
                                        </div>
                                    </td>
                                    <td style="text-align: center;"><?php echo $rows['created_at'] ?></td>
                                    <td style="text-align: center;">
                                        <a href="index.php?page=subscribers&id=<?php echo $rows['id'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
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
    <!-- /. ROW  -->
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<!-- Initialize DataTables -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable();
    });
</script>

</body>
</html>
