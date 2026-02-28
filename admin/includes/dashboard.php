<?php  
$blogs = new blogs($db);
$users = new users($db);
$comments = new comments($db);
$subscribers = new subscribers($db);
?>

    <style>
      .card {
            transition: transform 0.3s ease;
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: translateY(-20px);
        }
        .bg-color-green {
            background-color: #5cb85c;
            color: #fff;
        }
        .bg-color-blue {
            background-color: #007bff;
            color: #fff;
        }
        .bg-color-red {
            background-color: #d9534f;
            color: #fff;
        }
        .bg-color-brown {
            background-color: #8b4513;
            color: #fff;
        }
        .card-footer {
            font-size: 1.25rem;
        }


    </style>

</head>
<body>
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-header">
                This is Dashboard <small>We are Summary of your App</small>
            </h1>
        </div>
    </div>
    <!-- /. ROW -->

    <div class="row">
        <div class="col-md-3 col-sm-12">
            <div class="card text-center bg-color-green">
                <div class="card-body">
                    <i class="fa fa-bar-chart-o"></i>
                    <h3><?php echo $blogs->readAll()->rowCount(); ?></h3>
                </div>
                <div class="card-footer">
                    Blogs
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="card text-center bg-color-blue">
                <div class="card-body">
                    <i class="fa fa-shopping-cart"></i>
                    <h3><?php echo $users->readAll()->rowCount(); ?></h3>
                </div>
                <div class="card-footer">
                    Users
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="card text-center bg-color-red">
                <div class="card-body">
                    <i class="fa fa-comments"></i>
                    <h3><?php echo $comments->readAll()->rowCount(); ?></h3>
                </div>
                <div class="card-footer">
                    Comments
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="card text-center bg-color-brown">
                <div class="card-body">
                    <i class="fa fa-users"></i>
                    <h3><?php echo $subscribers->readAll()->rowCount(); ?></h3>
                </div>
                <div class="card-footer">
                    Subscribers
                </div>
            </div>
        </div>
    </div>
</div>




</body>
</html>
