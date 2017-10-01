 <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Input Mahasiswa</h1>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <?php
                    if(isset($_GET['act'])){
                    
                    ?>
                    <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="#"></i><b>&nbsp;Data Berhasil Ditambah</b>
                    </div>
                    <?php } ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Form Input Mahasiswa
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                    <form role="form" action="doInputMhs.php" method="POST">
                                        <div class="form-group">
                                            <label>NIM</label>
                                            <input type="text" name="nim" class="form-control" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Mahasiswa</label>
                                            <input type="text" name="nama" class="form-control" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat" class="form-control" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Semester</label>
                                            <select name="semester" class="form-control" required="required">
                                            <option value="">--Pilih Semester--</option>
                                                <?php
                                                for($i = 1; $i <= 15; $i++) {
                                                echo "<option value = $i >$i</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    
                                </div>
                                <div class="col-lg-6">
                                   <div class="form-group">
                                        <label>IPK Terakhir</label>
                                        <input type="text" name="ipk" class="form-control" required="required">
                                    </div>
                                    <?php
                                    //query penghasilan

                                    $sql = "SELECT * FROM chort_penghasilan";
                                    $query = mysqli_query($conn,$sql);

                                    ?>
                                    <div class="form-group">
                                        <label>Penghasilan Orang Tua</label>
                                        <select name="penghasilan" class="form-control" required="required">
                                        <option value="">--Pilih Penghasilan--</option>
                                            <?php
                                            while($row = mysqli_fetch_array($query)){
                                                echo "<option value = $row[id_penghasilan]>$row[jumlah_penghasilan]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kel" class="form-control" required="required">
                                            <option value="">--Pilih Jenis Kelamin--</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                            <label>Beasiswa</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="beasiswa" id="optionsRadios1" value="1" checked>Dapat Beasiswa
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="beasiswa" id="optionsRadios2" value="0">Tidak Dapat Beasiswa
                                                </label>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                <button type="submit" name="submit" class="btn btn-lg btn-primary btn-block">Simpan</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->