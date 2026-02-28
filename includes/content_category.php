<?php 

$categories = new blogcategories($db);
$categories->id = $_GET['id'];
$categories->read();

$blogs = new blogs($db);
$blogs->id_category = $_GET['id'];
$page_start = isset($_GET['pg'])?$_GET['pg']:0;
$blogs->page_start = (8*$page_start);
$blogs->page_record = 8;

$num_blogs = $blogs->showAllCategories()->rowCount();
$num_pages = ceil($num_blogs/8);

$stmt_blogs = $blogs->showAllCategories();

$users = new users($db);
?>
<section class="s-content">


        <!-- page header
        ================================================== -->
        <div class="s-pageheader">
            <div class="row">
                <div class="column large-12">
                    <h1 class="page-title">
                        <span class="page-title__small-type">Category</span>
                        <?php echo $categories->title ?>
                    </h1>
                </div>
            </div>
        </div> <!-- end s-pageheader-->
        

        <!-- masonry
        ================================================== -->
        <div class="s-bricks s-bricks--half-top-padding">

            <div class="masonry">
                <div class="bricks-wrapper h-group">

                    <div class="grid-sizer"></div>

                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <?php 
                    while($rows = $stmt_blogs->fetch()){
                    ?>
                    <article class="brick entry" data-aos="fade-up">
    
                        <div class="entry__thumb">
                            <a href="single-standard.html" class="thumb-link">
                                <img src="images/blogs/<?php echo $rows['image'] ?>" alt="">
                            </a>
                        </div> <!-- end entry__thumb -->
    
                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title"><a href="details.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['title']; ?></a></h1>
                                
                                <div class="entry__meta">
                                    <span class="byline"">By:
                                        <span class='author'>
                                            <a href="#">
                                                <?php 
                                                    $users->id= $rows['id_user'];
                                                    $users->read();
                                                    echo $users->name;
                                                ?>
                                            </a>
                                    </span>
                                </span>
                                    
                                </div>
                            </div>
                            <div class="entry__excerpt">
                                <?php echo shortText($rows['title'],150) ?>
                            </div>
                            <a class="entry__more-link" href="details.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['title']; ?>">Learn More</a>
                        </div> <!-- end entry__text -->
                    
                    </article> <!-- end article -->
                    <?php 
                    }
                    ?>

                    

                </div> <!-- end brick-wrapper -->

            </div> <!-- end masonry -->

            <div class="row">
                <div class="column large-12">
                    <nav class="pgn">
                        <ul>
                            <li>
                                <span class="pgn__prev">
                                    <a href="category.php?pg=<?php echo (previousPage($page_start, $num_pages)-1) ?>$id=<?php echo $_GET['id'] ?>">
                                        <?php echo previousPage($page_start, $num_pages)==false?'':'Prev'; ?>
                                    </a>
                                </span>
                            </li>
                            <?php 
                            for($i = 0;$i<$num_pages;$i++){
                            ?>

                            <li><a class="pgn__num <?php echo $page_start==$i?'current':'' ?>" href="category.php?pg=<?php echo $i ?>&id=<?php echo $_GET['id'] ?>"><?php echo ($i+1) ?></a></li>
                            
                            <?php 
                            }
                            ?>
                            <li>

                                <span class="pgn__next">
                                    <a href="category.php?pg=<?php echo nextPage($page_start, $num_pages) ?>$id=<?php echo $_GET['id'] ?>">
                                        <?php echo nextPage($page_start, $num_pages)==false?'':'Next'; ?>
                                    </a>
                                </span>
                            </li>
                        </ul>
                    </nav> <!-- end pgn -->
                </div> <!-- end column -->
            </div> <!-- end row -->

        </div> <!-- end s-bricks -->

    </section> <!-- end s-content -->