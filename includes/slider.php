<?php  
$sliders = new sliders($db);
$stmt_sliders = $sliders->readAll();
?>
<section id="hero" class="s-hero">

    <div class="s-hero__slider">
        <?php  
        while($rows = $stmt_sliders->fetch()){
        ?>
        <div class="s-hero__slide">

            <div class="s-hero__slide-bg" style="background-image: url('images/sliders/<?php echo $rows['image'] ?>'); width: 100%;"></div>

            <div class="row s-hero__slide-content animate-this" style="height:525px; min-height:525px;">
                <div class="column">
                    
                    <h1 class="s-hero__slide-text">
                        <a href="#0">
                            <?php echo $rows['title'] ?>
                        </a>
                    </h1>
                </div>
            </div>

        </div> <!-- end s-hero__slide -->
        <?php  
        }
        ?>
    </div> <!-- end s-hero__slider -->

    <div class="s-hero__social hide-on-mobile-small">
        <p>Follow</p>
        <span></span>
        <ul class="s-hero__social-icons">
            <?php  
            while($rows = $stmt_socials->fetch()){
            ?>
            <li><a href="<?php echo $rows['url'] ?>"><?php echo $rows['icon'] ?></a></li>
            <?php  
            }
            ?>
        </ul>
    </div> <!-- end s-hero__social -->

    <div class="nav-arrows s-hero__nav-arrows">
        <button class="s-hero__arrow-prev">
            <svg viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M1.5 7.5l4-4m-4 4l4 4m-4-4H14" stroke="currentColor"></path></svg>
        </button>
        <button class="s-hero__arrow-next">
           <svg viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M13.5 7.5l-4-4m4 4l-4 4m4-4H1" stroke="currentColor"></path></svg>
        </button>
    </div> <!-- end s-hero__arrows -->

</section>