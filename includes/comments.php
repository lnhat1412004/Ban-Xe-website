<div class="comments-wrap">
    <?php if ($stmt_comments->rowCount() > 0): ?>
        <div id="comments" class="row">
            <div class="col-12">
                <h3><?php echo $stmt_comments->rowCount(); ?> Comments</h3>

                <ol class="commentlist">
                    <?php foreach ($arr_comments['parent'] as $rows): ?>
                        <li class="thread-alt depth-1 comment mb-4">
                            <div class="comment-header d-flex align-items-center">
                                <div class="comment__avatar">
                                    <img class="avatar" src="images/users/guest.jpg" alt="" width="60" height="60">
                                </div>

                                <div class="comment-info ml-3">
                                    <div class="comment__author">
                                        <strong><?php echo $rows['name']; ?></strong>: <?php echo $rows['comment']; ?>
                                    </div>
                                    <div class="comment__meta">
                                        <div class="comment-time"><?php echo date("d/m/Y", strtotime($rows['created_at'])); ?></div>
                                        <div class="comment-reply">
                                            <a href="#" onclick="replyFormComment('<?php echo $rows['id']; ?>')">Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Reply Comment -->
                            <div id="<?php echo "replyComment_" . $rows['id']; ?>" class="replyComment mt-3" style="display:none;">
                                <h3>Reply Comment
                                    <span>Your email address will not be published.</span>
                                </h3>

                                <form name="replyForm" id="replyForm_<?php echo $rows['id']; ?>" method="post" action="" autocomplete="off">
                                    <div class="form-group">
                                        <input name="re_name" id="<?php echo "re_name" . $rows['id']; ?>" class="form-control" placeholder="Your Name" value="" type="text">
                                    </div>

                                    <div class="form-group">
                                        <input name="re_email" id="<?php echo "re_email" . $rows['id']; ?>" class="form-control" placeholder="Your Email" value="" type="text">
                                    </div>

                                    <div class="form-group">
                                        <textarea name="re_message" id="<?php echo "re_message" . $rows['id']; ?>" class="form-control" placeholder="Your Message"></textarea>
                                    </div>

                                    <input type="hidden" name="re_id_blog" id="<?php echo "re_id_blog" . $rows['id']; ?>" value="<?php echo $rows['id_blog']; ?>">
                                    <input type="hidden" name="re_id_parent" id="<?php echo "re_id_parent" . $rows['id']; ?>" value="<?php echo $rows['id']; ?>">

                                    <button name="reply_comment" id="reply_comment" class="btn btn-primary btn-wide btn-large" type="button" onclick="replyComment('<?php echo $rows['id']; ?>')">Reply Comment</button>
                                </form>
                            </div>

                            <ul class="children mt-3">
                                <?php if (isset($arr_comments['child'])): ?>
                                    <?php foreach ($arr_comments['child'] as $rows_child): ?>
                                        <?php if ($rows_child['id_parent_comment'] == $rows['id']): ?>
                                            <li class="comment-header d-flex align-items-center">
                                                <div class="comment__avatar">
                                                    <img class="avatar" src="images/users/guest.jpg" alt="" width="60" height="60">
                                                </div>

                                                <div class="comment-info ml-3">
                                                    <div class="comment__info">
                                                        <div class="comment__author"> <strong><?php echo $rows_child['name']; ?></strong>: <?php echo $rows['comment']; ?></div>
                                                        <div class="comment_meta">
                                                            <div class="comment_time"><?php echo date('d/m/Y', strtotime($rows_child['created_at'])); ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    <?php endif; ?>

    <div class="row comment-respond">
        <div id="addComment" class="col-md-12 mt-3">
            <h3 style="text-align:center;">
                Add Comment Your Email address will not be published.
            </h3>

            <form name="addForm" id="addForm" method="post" action="" autocomplete="off">
                <div class="form-group">
                    <input name="name" id="name" class="form-control" placeholder="Your Name" value="" type="text">
                </div>

                <div class="form-group">
                    <input name="email" id="email" class="form-control" placeholder="Your Email" value="" type="text">
                </div>

                <div class="form-group">
                    <textarea name="message" id="message" class="form-control" placeholder="Your Message"></textarea>
                </div>

                <input type="hidden" name="id_blog" id="id_blog" value="<?php echo $comments->id_blog; ?>">

                <button name="add_comment" id="add_comment" class="btn btn-primary btn-wide col-12" type="button" onclick="addComment()">Add Comment</button>
            </form>
        </div>
    </div>
</div>

<script>
    function addComment() {
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var message = document.getElementById("message").value;
        var id_blog = document.getElementById("id_blog").value;
        var btn_addcomment = "addcomment";

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 'success') {
                    location.reload();
                }
            }
        };
        xhttp.open("POST", "sendcomments.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("name=" + name + "&email=" + email + "&message=" + message + "&id_blog=" + id_blog + "&btn=" + btn_addcomment);
    }

    function replyComment(id) {
        var name = document.getElementById("re_name" + id).value;
        var email = document.getElementById("re_email" + id).value;
        var message = document.getElementById("re_message" + id).value;
        var id_blog = document.getElementById("re_id_blog" + id).value;
        var id_parent = document.getElementById("re_id_parent" + id).value;
        var btn_replycomment = "replyComment";

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == 'success') {
                    location.reload();
                }
            }
        };
        xhttp.open("POST", "sendcomments.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("name=" + name + "&email=" + email + "&message=" + message + "&id_blog=" + id_blog + "&id_parent=" + id_parent + "&btn=" + btn_replycomment);
    }

    function replyFormComment(id) {
        var arr = document.getElementsByClassName("replyComment");

        for (var i = 0; i < arr.length; i++) {
            arr[i].style.display = "none";
        }

        document.getElementById('replyComment_' + id).style.display = "block";

        document.getElementById("addComment").style.display = "none";
    }
</script>
