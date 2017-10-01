    <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Data Mahasiswa</h1>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                   
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Mahasiswa
                        </div>
                        <div class="panel-body">
                      
                            <div class="table-responsive">
                            <?php 

                            $no = 1;

                            $sqlget = "SELECT * FROM datasets ";
                            $query  = mysqli_query($conn,$sqlget) or die(mysqli_error($conn));
                             
                            

                            ?>
                     <div class="panel panel-default">
                        <div class="panel-body">
                             <div class="row">
                                <table class="table table-striped table-bordered table-hover table-responsive" id="list">
                                    <thead>
                                        <tr class="odd gradeX">
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                      while($row = mysqli_fetch_array($query)){

                                        if($no%2==1) { $warna=""; } else {$warna="#ebebe0";} 
                                    ?>
                                        <tr class="odd gradeX" bgcolor="<?php echo $warna; ?>">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['nim']; ?></td>
                                            <td><?php echo $row['nama']; ?></td>
                                            <td class="text-center"><a href="?page=getDetail&nim=<?php echo $row['nim']; ?>" class="btn btn-primary btn-xs btn-flat">
                                                      <i class="fa fa-pencil"></i>
                                                    </a></td>
                                        </tr>

                                     <?php } ?>   
                                        
                                    </tbody>
                                  </table>
                               </div>
                              </div>
                            </div>
                        </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>