<?php  
$sliders = new sliders($db);
if(!empty($_GET['id'])){
    $sliders->id = $_GET['id'];
    $sliders->read();

    if($sliders->image){
        deleteImage($sliders->image,"../images/sliders/");
    }

    if($sliders->delete()){
        $message = "Deleted successfully!";
    }
}


$stmt_sliders = $sliders->readAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sliders</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Datatables CSS -->
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid px-4">
    <h1 class="mt-4">Sliders</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Sliders</li>
    </ol>
    <?php if (!empty($message)) { ?>
    <div class="alert alert-success">
        <?php echo $message; ?>
    </div>
    <?php } ?>
    <div class="card mb-4">
        <div class="card-header">
            <a href="index.php?page=sliders_add" class="btn btn-primary btn-sm">Create</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Created Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($rows = $stmt_sliders->fetch()) { ?>
                    <tr>
                        <td><?php echo $rows['id']; ?></td>
                        <td>
                            <img src="<?php echo "../images/sliders/" . $rows['image']; ?>" width="80px" alt="Slider Image">
                        </td>
                        <td class="text-center"><?php echo $rows['title']; ?></td>
                        <td class="text-center"><?php echo $rows['created_at']; ?></td>
                        <td class="text-center">
                            <a href="index.php?page=sliders_edit&id=<?php echo $rows['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="index.php?page=sliders&id=<?php echo $rows['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Datatables JS -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatablesSimple').DataTable();
    });
</script>

</body>
</html>
