<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="/public/css/bootstrap.css" rel="stylesheet">
    <link href="/public/css/font-awesome.css" rel="stylesheet">
    <link href="/public/css/sb-admin-2.css" rel="stylesheet"> 
    <link href="/public/css/style.css" rel="stylesheet"> 
    <link href="/public/css/bootstrap-select.css" rel="stylesheet"> 
    <script type="text/javascript"  src="/public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/public/js/bootstrap.js"></script>
    <script type="text/javascript" src="/public/js/sb-admin-2.js"></script> 
    <script type="text/javascript" src="/public/js/jquery.maskMoney.min.js"></script>
    <script type="text/javascript" src="/public/js/bootstrap-select.js"></script>
  </head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <ul class="nav navbar-top-links navbar-right">
                <li><a href="/home/index"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                <li class="auth"><a href="/auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
            </ul>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="/admin/index"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Cadastros<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/category/index">Categorias</a>
                                </li>
                                <li>
                                    <a href="/product/index">Produtos</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="page-wrapper">
            <?php include_once $this->view ?>
        </div>
    </div>
</body>
</html>

