<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <link href="/public/css/bootstrap.css" rel="stylesheet">
    <link href="/public/css/font-awesome.css" rel="stylesheet"> 
    <script type="text/javascript" src="/public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/public/js/bootstrap.js"></script>  
</head>
<body>
  <div id="top">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/home/index"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                <li class="auth"><a href="/auth/login"><i class="fa fa-sign-in fa-fw"></i> Login</a></li>
            </ul>
          </div>
      </div>
    </nav>
  </div>
  <div id="main"> 
    <div>
      <?php include_once $this->view ?>
    </div>
  </div>
</body>
</html>

