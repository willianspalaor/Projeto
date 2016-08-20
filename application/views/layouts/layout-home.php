<!DOCTYPE html>
<html lang="en">

<head>

    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <link href="/public/css/bootstrap.css" rel="stylesheet">
    <link href="/public/css/font-awesome.css" rel="stylesheet"> 
    <link href="/public/css/shop-homepage.css" rel="stylesheet">
    <link href="/public/css/home.css" rel="stylesheet">
    <script type="text/javascript" src="/public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/public/js/bootstrap.js"></script>
    <script type="text/javascript" src="/application/views/scripts/home/home.js"></script>  
    
</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="/home/index"><i class="glyphicon glyphicon-home"></i> Home</a></li>    
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="/home/basket"><i class="glyphicon glyphicon-shopping-cart"></i> Carrinho 
                                <span class="items">(<?php echo $this->getBasketQuantity();?>)</span>
                            </a>
                        </li>
                        <li class="auth"><a href="/auth/login"><i class="fa fa-sign-in fa-fw"></i> Login</a></li>    
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="btn-group-vertical" role="group" style="width: 100%;"> 
            
                        <?php foreach($this->getMainCategories() as $mainCategory) : ?>

                            <div class="btn-group" role="group"> 
                                <ul class="menu">
                                    <li class="menu"><a class="active" href="#"><?php echo $mainCategory->getTittle();?></a></li>
                                </ul>
                                <ul class="menu">

                                    <?php foreach($this->getSubCategories($mainCategory) as $subCategory) : ?>

                                        <li data-id-main="<?php echo $mainCategory->getId();?>" data-id-sub="<?php echo $subCategory->getId();?>" class="menu"><a href="#"><?php echo $subCategory->getTittle(); ?></a></li> 

                                    <?php endforeach; ?>

                                </ul>
                            </div>

                        <?php endforeach; ?>

                    </div>
                </div>
                <div class="col-md-8">
                    <?php include_once $this->view ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


























