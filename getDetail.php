 <?php

$getId = $_GET['nim'];

$sql     = "SELECT * FROM master JOIN chort_penghasilan 
            ON chort_penghasilan.id_penghasilan = master.id_penghasilan 
            WHERE master.nim ='$getId' ";
$query   = mysqli_query($conn,$sql);
$fetch   = mysqli_fetch_array($query); 

?>



 <div class="row">
     <!--  page header -->
    <div class="col-lg-12">
        <h1 class="page-header">Detail Mahasiswa</h1>
    </div>
     <!-- end  page header -->
    <div class="col-md-6 col-md-offset-3 col-sm-6 col-xs-12">
    
   
            <div class="panel panel-default">
                            <div class="panel-heading">
                                 Detail
                            </div>
                            <div class="panel-body">
                <?php
                if(isset($_GET['succses'])){
                
                ?>
                <div class="alert alert-success alert-dismissable">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="#"></i><b>&nbsp;Data Berhasil Diubah</b>
                </div>
                <?php } ?>
           
                <form action="doEditMhs.php" class="form-horizontal form-label-left" method="post" enctype="multipart/form">
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-3">NIM</label>
                        <div class="col-md-9">
                            <input type="text" name="nim" class="form-control" value="<?php echo $fetch['nim']; ?>" readonly>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-3">Nama Mahasiswa</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" class="form-control" value="<?php echo $fetch['nama']; ?>" readonly>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-3">Alamat</label>

                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <textarea name="alamat"  class="form-control" rows="4" cols="80" readonly><?php echo $fetch['alamat_rumah']; ?></textarea>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-3">Jenis Kelamin</label>

                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="" class="form-control" value="<?php echo $fetch['jenis_kelamin']; ?>" readonly>
                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-3">Pendapatan Orang Tua</label>

                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <input type="text" name="email" class="form-control" value="<?php echo $fetch['jumlah_penghasilan']; ?>" readonly>
                           
                        </div>
                    </div>

                    <?php
                    $sqlData = mysqli_query($conn,"SELECT * FROM datasets WHERE nim = '$getId'");
                    $tmp     = mysqli_fetch_array($sqlData);

                    ?>
                
                    <div class="form-group">
                        <label class="col-md-3 col-sm-3 col-xs-3">Status Beasiswa</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <select name="status" class="form-control">
                                <?php
                                if($tmp['beasiswa']=='0'){
                                ?>
                                <option value="0">Tidak Mendapat Beasiswa</option>
                                <option value="1">Mendapat Beasiswa</option>

                                <?php }else{

                                ?>
                                 <option value="1">Mendapat Beasiswa</option>
                                 <option value="0">Tidak Mendapat Beasiswa</option>
                                 <?php } ?>
                                
                            
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                            <button class="btn btn-primary btn-block">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>

