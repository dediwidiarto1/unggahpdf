<div class="">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Data Kata Kunci</h2>
          <ul class="nav navbar-right panel_toolbox">
                      <a type="button" class="btn btn-primary btn-sm" href="index.php?link=tambahkatakunci">Tambah Kata Kunci</a>
                    </ul>
          <div class="clearfix"></div>
        </div>
        <?php
        include 'koneksi.php';
        $result = mysqli_query($koneksi,"SELECT * FROM tb_katakunci");
        $warna = "#DFE3FF";
        ?>
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Kata Kunci</th>
                <th>Operasi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while($row = mysqli_fetch_array($result)) {
              if($warna=="#DFE3FF"){$warna="#DFF0D8";}else{$warna="#DFE3FF";}
              print("<tr bgcolor='$warna'>");
                print("<td>" . $row['Id'] . "</td><td>" . $row['TermStem'] . "</td>");
                ?>
               <td> <a class="btn btn-danger btn-xs" href="halaman/hapus_katakunci.php?Id=<?php echo $row['Id']; ?>" title="Hapus" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus?')"><span class="glyphicon glyphicon-remove-circle"></span> Hapus</a></td>
                <?php
              print("</tr>");
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>