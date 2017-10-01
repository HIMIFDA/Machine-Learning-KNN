<?php

$query   = mysqli_query($conn,"SELECT * FROM datasets WHERE d_o = '1' ") or die(mysqli_error($conn));
$set1    = mysqli_num_rows($query);

$query1  = mysqli_query($conn,"SELECT * FROM datasets WHERE d_o = '0' ") or die(mysqli_error($conn));
$set2    = mysqli_num_rows($query1);

$query2  = mysqli_query($conn,"SELECT * FROM datasets WHERE ipk < '3.0' AND id_penghasilan <= '3' ") or die(mysqli_error($conn));
$set3    = mysqli_num_rows($query2);


?>
<div class="row">
    <!-- Page Header -->
      <div class="col-lg-12">
         <h1 class="page-header">Grafik Prediksi Pengunduran Diri</h1>
           </div>
    <!--End Page Header -->
        </div>

       <div class="row">
         <!-- Welcome -->
           <div class="col-lg-12">
             <div class="panel panel-primary">
                        <div class="panel-heading">
                             Grafik Prediksi Pengunduran Diri
                        </div>
                        <div class="panel-body">

                          
                          <center>
                          <h4><b>Mengundurkan Diri : <?php echo $set1; ?> </b></h4><h4><b>Peluang Mengundurkan Diri : <?php echo $set3; ?> </b></h4><h4><b>Tidak Mengundurkan Diri : <?php 
                          $cal = $set2 - $set3;
                          echo $cal; ?> </b></h4>
                          <canvas id="piechart" width="400" height="400"></canvas>
                          </center>
                          <table align="right">
                            <tr>
                                 <th>Keterangan : </th>
                             </tr>
                             <tr>
                                <td><button class="btn btn-danger btn-sm"></button></td><td>:</td><td>&nbsp;Jumlah Mengundurkan Diri</td>
                             </tr>
                              <tr>
                                <td><button class="btn btn-warning btn-sm"></button></td><td>:</td><td>&nbsp;Jumlah Peluang Mengundurkan Diri</td>
                             </tr>    
                              <tr> 
                               <td><button class="btn btn-primary btn-sm"></button></td><td>:</td><td>&nbsp;Jumlah Tidak Mengundurkan Diri</td>
                             </tr>
                          </table>     

                       </div>

            </div>
         </div>
    <!--end  Welcome -->
 </div>
 <script type="text/javascript" src="node_modules/chart.js/dist/Chart.js"></script>
 <script type="text/javascript" src="node_modules/chart.js/dist/Chart.min.js"></script>
 <script type="text/javascript" src="node_modules/chart.js/dist/Chart.bundle.js"></script>
 <script type="text/javascript" src="node_modules/chart.js/src/core/core.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
 
 
 <script type="text/javascript">
    var ctx = document.getElementById("piechart").getContext("2d");
    var pieData = [
      {
          value: <?php echo $set1; ?>,
          color: "#d43f3a",
          highlight: "#d9534f",
          label: "DO"
      },
      {
          value : <?php echo $cal; ?>,
          color: "#46b8da",
          highlight:"#5bc0de", 
          label: "NOT DO"
      },
      {
          value : <?php echo $set3; ?>,
          color: "#eea236",
          highlight:"#f0ad4e", 
          label: "proba"
      }
      
    ];
    var options = {
      animateScale: true
    };

    var myNewChart = new Chart(ctx).Pie(pieData,options);

 </script>
 