   <?php 

   session_start();
   
   if(isset($_SESSION['id'])){

        include 'config/connection.php';
        include 'config/funcGoogleApi.php';

        //page header
        include 'navigation/header.php';


    ?>
 <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              
                    <img src="assets/img/da.png" alt="" class="img img-responsive"  width="370px" height="370px" style="padding: 7px; margin-top: 5px; margin-left:7px;"/>
               	
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
               
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        
                      
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div><?php echo $_SESSION['nama_dosen']; ?></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!--end search section-->
                    </li>
                    <li class="selected">
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <?php 
                    if($_SESSION['level']=='kajur'){
                    	?>
                     <li>
                        <a href="?page=formInput"><i class="fa fa-table fa-fw"></i> Input Mahasiswa( data baru )</a>
                    </li>
                     <li>
                        <a href="?page=listMhs"><i class="fa fa-list-alt fa-fw"></i> Data Mahasiswa</a>
                    </li>
                    <?php } ?>
                    
                    <li>
                        <a href="?page=predict"><i class="fa fa-flask fa-fw"></i> Prediksi</a>
                    </li>
                    <li>
                        <a href="?page=chart"><i class="fa fa-signal fa-fw"></i> Grafik </a>
                    </li>
                    
                        <!--<a href="?page=accuracy"><i class="fa fa-credit-card fa-fw"></i> Akurasi Prediksi </a>-->
                    
                    
                     
                   
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->

        <!--  page-wrapper -->
        <div id="page-wrapper">

            <?php
            //generate get page

                if(isset($_GET['page'])){
                    $page=htmlentities($_GET['page']);
                }else{
                    $page="dashboard";
                }

                $file="$page.php";
                $cek=strlen($page);

                if($cek>30 || !file_exists($file) || empty($page)){
                    include ("dashboard.php");
                }else{
                    include ($file);
                }
             ?>

        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->
    
    <?php
    //page footer
    include 'navigation/footer.php';

     }else{
        header('location:login.php');
     }

    ?>
   
