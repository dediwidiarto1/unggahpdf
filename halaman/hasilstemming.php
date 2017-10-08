<div class="">
  <div class="clearfix"></div>
        <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><h2 style="color: green">Stemming</h2></a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse">
            <div class="panel-body">Proses untuk menemukan kata dasar dari sebuah kata. Dengan cara menghilangkan semua imbuhan (affixes) baik yang terdiri dari awalan (prefixes), sisipan (infixes), akhiran
(suffixes) dan confixes (kombinasi dari awalan dan akhiran) pada kata turunan.
<p>Metode TF(Term frequency) adalah merupakan suatu metode pembobotan.</p>
 </div>
          </div>
        </div>
      </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Hasil Stemming</h2>
          <div class="clearfix"></div>
        </div>
        <?php
        include 'koneksi.php';  
        $result = mysqli_query($koneksi,"SELECT * FROM tb_proses");
        $warna = "#DFE3FF";
        ?>
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Term</th>
                <th>TermStem</th>
                <th>Doc-ID</th>
                <th>TF(Term Frequency)</th>
              </tr>
            </thead>
                  <tbody>
              <?php
              while($row = mysqli_fetch_array($result)) {
              if($warna=="#DFE3FF"){$warna="#DFF0D8";}else{$warna="#DFE3FF";}
              print("<tr bgcolor='$warna'>");
                print("<td>" . $row['Id'] . "</td><td>" . $row['Term'] . "</td><td>" . $row['TermStem'] . "</td><td>" . $row['DocId'] .
                "</td><td>" . $row['Count'] . "</td>");
              print("</tr>");
              }
              ?>
            </tbody>
          </table>
        </div>
        <?php
        $akhir = microtime(true);
?>
      </div>
      <center><?php $lama = $akhir-$awal; echo "Lama Proses Stemming : $lama detik"; ?></center>
    </div>
  </div>
</div>