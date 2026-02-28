<div class="row">
    <div class="col-md-12">
        <h1 class="page-header">
            Send Mail to All Subscribers
        </h1>
    </div>
</div> 
<!-- /. ROW  -->
<div id="msg">
    <!-- Show message -->
</div> 
<div class="row">
    <div class="col-lg-12">        
        <div class="panel panel-default"> 
                      
            <div class="panel-body">
                <div class="row">                    
                    <div class="col-lg-12">
                        <form role="form" method="Post" action="index.php?page=subscribers_add">
                            <div class="form-group">
                                <label>Subject</label>
                                <input class="form-control" name="title" id="title" placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="content" name="content" class="form-control"></textarea>
                            </div>
                            <button type="button" onclick="sendMail()" class="btn btn-primary btn-sm">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>