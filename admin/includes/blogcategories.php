<?php  
$blogcategories = new blogcategories($db);


if(!empty($_GET['id'])){
    $blogcategories->id = $_GET['id'];
    if($blogcategories->delete()){
        $message = "Deleted successfully!";
    }
}

$stmt_blogcategories = $blogcategories->readAll();
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Blogs Categories</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Blogs Categories</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="m-0">Blog Categories List</h5>
                <a href="index.php?page=blogcategories_add" class="btn btn-primary btn-sm">Create</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th style="text-align: center;">Status</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($rows = $stmt_blogcategories->fetch()) { ?>
                            <tr>
                                <td><?php echo $rows['id'] ?></td>
                                <td><?php echo $rows['title'] ?></td>
                                <td style="text-align: center;">
                                    <input type="checkbox" disabled <?php echo $rows['status'] == 1 ? 'checked' : '' ?>>
                                </td>
                                <td><?php echo $rows['created_at'] ?></td>
                                <td>
                                    <a href="index.php?page=blogcategories_edit&id=<?php echo $rows['id']?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="index.php?page=blogcategories&id=<?php echo $rows['id']?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
