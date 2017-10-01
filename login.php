<!DOCTYPE html>
<html class="login-page">

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universitas Darma Persada</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/img/logo.png" rel="icon" type="image/x-icon" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />

</head>

<body class="body-Login-back">

    <div class="container">
       
        <div class="row">

            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">

              <img src="assets/img/logo.png" alt=""/>

            </div>
            <div class="col-md-4 col-md-offset-4">
                

                <div class="login-panel panel panel-default">  
                <?php 
                    if(isset($_GET['role'])){
                        $role=htmlentities($_GET['role']);
                    }else{
                        $role="";
                    }
                    
                    $file="$role.php";
                    $cek=strlen($role);
                    
                    if($cek>30 || !file_exists($file) || empty($role)){
                
                    }else{
                        include ($file);
                    }
                  ?>                
                    <div class="panel-heading">
                        <h3 class="panel-title">Silahkan isi username dan password</h3>
                    </div>
                    <div class="panel-body">
                        <form action="?role=actLogin" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="user" type="text" autofocus required="required">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required="required">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Login">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
          

        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>
