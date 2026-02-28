<?php
$blogcategories = new blogcategories($db);
$blogs = new blogs($db);

/*Delete blog post*/
if(!empty($_GET['id'])){
    $blogs->id = $_GET['id'];
    $blogs->read();

    /*Delete image*/
    if($blogs->image){
        deleteImage($blogs->image,"../images/blogs/");
    }

    /*Delete blog*/
    if($blogs->delete()){
        $message = "Deleted successfully!";
    }
}
    /*Read all blog posts*/
    $stmt_categories = $blogs->readAll();

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                Blogs
            </h1>
        </div>
    </div> <!-- /.row -->

    <?php if (!empty($message)) { ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <?php echo $message; ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="index.php?page=blogs_add" class="btn btn-primary btn-sm">Add</a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th style="text-align: center;">Image</th>
                                    <th>Blog Category</th>
                                    <th>Title</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">Created Date</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($rows = $stmt_categories->fetch()) { ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $rows['id']; ?></td>
                                        <td style="text-align: center;">
                                            <img src="<?php echo "../images/blogs/".$rows['image']; ?>" alt="" style="width: 80px;">
                                        </td>
                                        <td>
                                            <?php 
                                            $blogcategories->id = $rows['id_category']; 
                                            $blogcategories->read();
                                            echo $blogcategories->title;
                                            ?>
                                        </td>
                                        <td><?php echo $rows['title']; ?></td>
                                        <td style="text-align: center;">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" <?php echo $rows['status'] ? 'checked' : ''; ?>>
                                                </label>
                                            </div>
                                        </td>
                                        <td style="text-align: center;"><?php echo $rows['created_at']; ?></td>
                                        <td style="text-align: center;">
                                            <a href="index.php?page=blogs_edit&id=<?php echo $rows['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="index.php?page=blogs&id=<?php echo $rows['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /.row -->
</div> <!-- /.container-fluid -->
