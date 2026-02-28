<?php  
$socials = new socials($db);
$stmt_socials = $socials->readAll();
?>
<footer class="s-footer">

        <div class="s-footer__main">

            <div class="row">

                <div class="column large-3 medium-6 tab-12 s-footer__info">

                    <h5>About Our Site</h5>

                    <p>
                    <?php echo $about->footer ?>
                    </p>

                </div> <!-- end s-footer__info -->

                <div class="column large-2 medium-3 tab-6 s-footer__site-links">

                    <h5>Site Links</h5>

                    <ul>
                        <?php  
                        while($rows = $stmt_links->fetch()){
                        ?>
                        <li><a href="<?php echo $rows['url'] ?>"><?php echo $rows['title'] ?></a></li>
                        <?php  
                        }
                        ?>
                    </ul>

                </div> <!-- end s-footer__site-links -->  

                <div class="column large-2 medium-3 tab-6 s-footer__social-links">

                    <h5>Follow Us</h5>

                    <ul>
                        <?php
                        while($rows = $stmt_socials->fetch()){
                        ?>
                        <li><a href="<?php echo $rows['url'] ?>" target="_blank"><?php echo $rows['title'] ?></a></li>
                        <?php  
                        }
                        ?>
                        
                    </ul>

                </div> <!-- end s-footer__social links --> 

                <div class="column large-3 medium-6 tab-12 s-footer__subscribe">

                    <h5>Sign Up for Newsletter</h5>

                    <p>Signup to get updates on articles, interviews and events.</p>

                    <div class="subscribe-form">
                
                        <form id="mc-form" class="group" novalidate="true">

                            <input type="email" name="email" class="email" id="email" placeholder="Your Email Address" required=""> 
                
                            <input type="button" style="--btn-height: calc(var(--vspace-btn) - .8rem); margin-right: 0; width: 100%;
    color: white;" name="subscribe" value="subscribe" onclick="btn_subscribe()" >
                
                            <label for="mc-email" class="subscribe-message"></label>
                
                        </form>

                    </div>
                    <div id="msg" style="font-weight:bold; text-align:center"></div>

                </div> <!-- end s-footer__subscribe -->

            </div> <!-- end row -->

        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">
                <div class="column">
                    <div class="ss-copyright">
                        <span><?php echo $settings->site_footer ?></span>                        
                    </div> <!-- end ss-copyright -->
                </div>
            </div> 

            <div class="ss-go-top">
                <a class="smoothscroll" title="Back to Top" href="#top">
                    <svg viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M7.5 1.5l.354-.354L7.5.793l-.354.353.354.354zm-.354.354l4 4 .708-.708-4-4-.708.708zm0-.708l-4 4 .708.708 4-4-.708-.708zM7 1.5V14h1V1.5H7z" fill="currentColor"></path></svg>
                </a>
            </div> <!-- end ss-go-top -->
        </div> <!-- end s-footer__bottom -->

    </footer>

    <script>
    function btn_subscribe(){
        var email = document.getElementById("email").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText == 'success'){
                    document.getElementById('email').value = "";
                    document.getElementById('msg').innerHTML = "Please check your email to verify account.";
                }else if(this.responseText == 'resend_mail'){
                    document.getElementById('email').value = "";
                    document.getElementById('msg').innerHTML = "Verification link has been sent to your email.";
                }else if(this.responseText == 'already_subscriber'){
                    document.getElementById('email').value = "";
                    document.getElementById('msg').innerHTML = "You has already been subscribed with this email";
                }else{
                    document.getElementById('msg').innerHTML = "Your account has been actived.";
                }
                //console.log(this.responseText);
            }
        }
        xhttp.open("Post","subscriber.php",true);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhttp.send('email='+email);
    }

    </script>