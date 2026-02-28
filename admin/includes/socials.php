<?php  
$socials = new socials($db);

/*Delete social link*/
if(!empty($_GET['id'])){
    $socials->id = $_GET['id'];
    if($socials->delete()){
        $message = "Deleted successfully!";
    }
}

/*Read all social links*/
$stmt_socials = $socials->readAll();
?>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Socials Links
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
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                 <a class="btn btn-primary btn-sm" href="index.php?page=socials_add">Add</a>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th style="text-align: center;">Icon</th>
                                <th>URL</th>
                                <th style="text-align: center;">Created Date</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            while($rows = $stmt_socials->fetch()){
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $rows['id'] ?></td>
                                <td><?php echo $rows['title'] ?></td>
                                <td style="text-align: center;">                                    
                                    <?php echo $rows['icon'] ?>                                        
                                </td>
                                <td>                                    
                                    <?php echo $rows['url'] ?>                                        
                                </td>
                                <td class="center" style="text-align: center;"><?php echo $rows['created_at'] ?></td>
                                <td class="center" style="text-align: center;">
                                    <a href="index.php?page=socials_edit&id=<?php echo $rows['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="index.php?page=socials&id=<?php echo $rows['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            <?php  
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
<!-- /. ROW  -->