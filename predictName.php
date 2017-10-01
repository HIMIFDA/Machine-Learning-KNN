    <div class="row">
                 <!--  page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Prediksi</h1>
                </div>
                 <!-- end  page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                   
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Prediksi Pengunduran Diri Mahasiswa
                        </div>
                        <div class="panel-body">
                        <br><br>
                        <?php
                        if(isset($_POST['search'])){

                         $name = $_POST['name']

                         ?>
                            <script type="text/javascript">
                                window.location='index.php?page=predictName&&name=<?php echo $name; ?>';
                            </script>
                        
                        <?php }

                        ?>    

                        <!-- Form Mahasiswa -->
                        <form id="mahasiswa" action="" method="POST">
                            
                          <div class="col-lg-4">
                            
                              <input type='text' name='name' id='auto' class="form-control" placeholder="--Cari Nama Mahasiswa--">
                            
                          </div>
                             <button class="btn btn-primary" type="submit" name="search">
                                <i class="fa fa-search"></i> Cari
                             </button>

                          </form>


                          <div class="col-lg-4">
                              <a href="?page=predict">Cari Nim</a>
                           </div>   
                          

                          <br><br><br>



                           <?php
                           if(isset($_GET['name'])){

                           ?> 

                            <div class="table-responsive">
                            <?php 

                            $name = $_GET['name'];

                            $sqlget = "SELECT * FROM datasets WHERE nama = '$name' ";
                            $query  = mysqli_query($conn,$sqlget) or die(mysqli_error($conn));
                            $row    = mysqli_fetch_array($query); 

                            ?>

                                <table>
                                    <tr>
                                        <td>NIM</td><td>:</td><td>&nbsp;&nbsp;<?php echo $row['nim']; ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Nama Mahasiswa</td><td>:</td><td>&nbsp;&nbsp;<?php echo $row['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b><?php if($row['beasiswa']==1){ 
                                                    echo "Mendapat Beasiswa";
                                                    }else{
                                                      echo "Tidak Mendapat Beasiswa";
                                                      } ?></b></td>
                                    </tr>
                                </table>
                                <br>
                     <div class="panel panel-default">
                        <div class="panel-body">
                             <div class="row">
                                <form id="form-predict">
                                <table class="table table-striped table-bordered table-hover table-responsive" id="predict">
                                    <thead>
                                        <tr class="odd gradeX">
                                            <th>IPK Terakhir</th>
                                            <th>Semester</th>
                                            <th>Penghasilan Orang Tua</th>
                                            <th>Jarak Menuju Kampus</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Prediksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td><input type="text" id="ipk" name="ipk" class="form-control" size="10" value="<?php echo $row['ipk']; ?>"></td>
                                            <input type="hidden" name="nim" value="<?php echo $row['nim'] ?>">
                                            <input type="hidden" name="beasiswa" value="<?php echo $row['beasiswa'] ?>">
                                            <td><input type="text" id="semester" name="semester" class="form-control" size="10" value="<?php echo $row['semester']; ?>"></td>
                                            <td><input type="text" id="penghasilan" name="id_penghasilan" class="form-control" size="10" value="<?php echo $row['id_penghasilan']; ?>"></td>
                                            <td><input type="text" id="jarak" name="jarak" class="form-control" size="10" value="<?php echo $row['jarak']; ?>"></td>
                                            <td><input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control" size="10" value="<?php 
                                                if($row['jenis_kelamin']=='L'){
                                              echo "1";
                                              }else{
                                                echo "0";
                                              } ?>"></td>
                                               <input type="hidden" name="fakta" value="<?php echo $row['fakta']; ?>">
                                              <input type="hidden" name="lulus" value="<?php echo $row['lulus']; ?>">
                                              
                                            <td><input type="submit"  class="btn btn-primary" value="Predict"></td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                  </table>
                                 </form>
                               </div>
                              </div>
                            </div>
                        </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                    <?php } ?>
                </div>
            </div>

            <div class="row">
                <!-- Modal -->
                  <div class="modal fade" id="modal-hasil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                        <center><h4><strong>Prediksi Pengunduran Diri</strong></h4></center>
                          <h4 class="form-wording" id="myModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                            <center><h5><b>Status: <span class="status"></span></b></h5></center>
                            <br>
                            <h5>Persentase Mengundurkan Diri: <b><span class="percentage_do"></span> %</b></h5>
                            <h5>Persentase Tidak Mengundurkan Diri: <b><span class="percentage_not_do"></span> %</b></h5>
                            <h5><b><span class="alasan"></span></b></h5>
                            <h5><b><span class="solusi"></span></b></h5>
                            <h5><b><span class="dampak"></span></b></h5>

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <!-- End Modals-->
       
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script> 
          <script type="text/javascript">
          $(function() {
            
            //autocomplete
            $('#auto').autocomplete({
                source: "searchName.php",
                minLength: 1
            });             

          });

          
          $("#form-predict").submit(function(e) {
            var url = "http://0.0.0.0:5000/api/v1.0/predict"; 
            var data = $("#form-predict").serialize()
            console.log("data", data)
            $.ajax({
                      type: "POST",
                      url: url,
                      data: data, // serializes the form's elements.
                      success: function(data)
                      {

                          $('#modal-hasil').modal('show');
                          $('.percentage_do').html((data.response.percentage_do)*100);   
                          $('.percentage_not_do').html((data.response.percentage_not_do)*100);
                          if (data.response.status == 1) {
                            var nim = data.response.nim;
                            var ipk = data.response.ipk;
                            var semester = data.response.semester;
                            var penghasilan = data.response.penghasilan;
                            var jarak = data.response.jarak;
                            var beasiswa = data.response.beasiswa;
                            var angkatan = nim.substring(0, 4);

                            if (angkatan == '2010') {
                                var pembagiSMT = 14;
                            } else if (angkatan == '2011') {
                                var pembagiSMT = 12;
                            } else if (angkatan == '2012') {
                                var pembagiSMT = 10;
                            } else if (angkatan == '2013') {
                                var pembagiSMT = 8;
                            } else if (angkatan == '2014') {
                                var pembagiSMT = 6;
                            } else if (angkatan == '2015') {
                                var pembagiSMT = 4;
                            }
                            
                            normalizedIPK = ipk / 4;
                            normalizedPenghasilan = penghasilan / 8;
                            normalizedJarak = 1 - (jarak / 42);
                            normalizedSMT = semester / pembagiSMT;

                            if (normalizedIPK < normalizedSMT && normalizedIPK < normalizedPenghasilan && normalizedIPK < normalizedJarak) {
                              if(beasiswa == 1){
                                var alasan = 'IPK rendah';
                                var dampak = 'Beasiswa yang didapat akan dicabut';
                                $('.status').html("<font color=red>Mengundurkan Diri</font>"); 
                                $('.alasan').html("Alasan: " + alasan);
                                $('.dampak').html("Dampak: " + dampak);
                              }else{
                                var alasan = 'IPK rendah';
                                var solusi = 'Untuk diberikan binaan agar IPK naik';
                                $('.status').html("<font color=red>Mengundurkan Diri</font>"); 
                                $('.alasan').html("Alasan: " + alasan);
                                $('.solusi').html("Solusi: " + solusi);
                              }
                            } else if (normalizedPenghasilan < normalizedIPK && normalizedPenghasilan < normalizedJarak && normalizedPenghasilan < normalizedSMT) {
                               if(beasiswa == 1){
                                 $('.status').html("Tidak Mengundurkan Diri");
                                }else{ 
                                var alasan = 'Penghasilan Orang Tua Rendah';
                                var solusi = 'Disarankan mengajukan beasiswa';
                                $('.status').html("<font color=red>Mengundurkan Diri</font>"); 
                                $('.alasan').html("Alasan: " + alasan);
                                $('.solusi').html("Solusi: " + solusi);
                              }
                            } else if (normalizedJarak < normalizedIPK && normalizedJarak < normalizedPenghasilan && normalizedJarak < normalizedSMT) {
                              var alasan = 'Jarak menuju kampus jauh';
                              var solusi = 'Disarankan untuk sewa kos didekat kampus';
                              $('.status').html("<font color=red>Mengundurkan Diri</font>"); 
                              $('.alasan').html("Alasan: " + alasan);
                              $('.solusi').html("Solusi: " + solusi);
                            }else if(normalizedSMT < normalizedIPK && normalizedSMT < normalizedPenghasilan && normalizedSMT < normalizedJarak){
                              if(beasiswa == 1){
                                var alasan = 'Semester yang ditempuh kurang';
                                var dampak = 'Beasiswa yang didapat akan dicabut';
                                $('.status').html("<font color=red>Mengundurkan Diri</font>"); 
                                $('.alasan').html("Alasan: " + alasan);
                                $('.dampak').html("Dampak: " + dampak);
                              }else{
                                var alasan = 'Semester yang ditempuh kurang';
                                var solusi = 'Disarankan agar tidak mengajukan cuti akademik';
                                $('.status').html("<font color=red>Mengundurkan Diri</font>"); 
                                $('.alasan').html("Alasan: " + alasan);
                                $('.solusi').html("Solusi: " + solusi);
                              }
                            }else{
                              if(beasiswa == 1){
                                var alasan = 'Semester yang ditempuh kurang';
                                var dampak = 'Beasiswa yang didapat akan dicabut';
                                $('.status').html("<font color=red>Mengundurkan Diri</font>"); 
                                $('.alasan').html("Alasan: " + alasan);
                                $('.dampak').html("Dampak: " + dampak);
                              }else{
                                var alasan = 'Semester yang ditempuh kurang';
                                var solusi = 'Disarankan agar tidak mengajukan cuti akademik';
                                $('.status').html("<font color=red>Mengundurkan Diri</font>"); 
                                $('.alasan').html("Alasan: " + alasan);
                                $('.solusi').html("Solusi: " + solusi);
                              }
                            }

                            console.log("normalized ipk", normalizedIPK);
                            console.log("normalized semester", normalizedSMT);
                            console.log("normalized penghasilan", normalizedPenghasilan);
                            console.log("normalized jarak", normalizedJarak);
                            console.log("alasan", alasan);
                              

                          }else{
                            $('.status').html("Tidak Mengundurkan Diri");
                          }  
                      },
                      error: function (request, status, error) {
                          alert(request.responseText);
                      }
                     });

          
            e.preventDefault(); // avoid to execute the actual submit of the form.
          });
          </script>    
       

