<div class="">
  <div class="clearfix"></div>
           <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><h2 style="color: green">Pencarian Similarity</h2></a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse">
            <div class="panel-body">W = (TF * IDF)
 </div>
          </div>
        </div>
      </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Hasil Pencarian Similarity</h2>
          <div class="clearfix"></div>
        </div>
        <form class="form-inline" action="" method="post">Cari Bobot :
    <input type="text" class="form-control" size="50" name="input_cari" placeholder="Masukkan TermStem . . ." required>
    <input type="submit" name="cari" value="Cari" class="btn btn-success" />
  </form>
<?php
     

       $input_cari = @$_POST['input_cari']; 
   $cari = @$_POST['cari'];
  // jika tombol cari di klik
   if($cari) {
    ?>
 <h4>Pencarian dengan TermStem: <b>"<?php echo @$_POST['input_cari']; ?>"</b></h4>
  <hr>
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>DocId</th>
                <th>UNION</th>
                <th>INTERSECT</th>
                <th>SIMILARITY</th>
              </tr>
            </thead>
            <tbody>
              <?php
    // jika kotak pencarian tidak sama dengan kosong
    if($input_cari != "") {
      $keyword = $_POST["input_cari"]; // ambil keyword

   $search_exploded = explode(" ",$keyword); // hilangkan keyword dari spasi

   // 
   $x=0;
   $construct="";   
   foreach($search_exploded as $search_each)
   {
   // membuat query utk pencarian
   $x++;
    if ($x==1){
     $construct .= " TermStem LIKE '%$search_each%'";
   //echo "$construct";
   //echo '<br/>';
   }
    else
     {
   $construct .= " OR TermStem LIKE '%$search_each%'"; // query jika kata lebih dari 1
   //echo "$construct";
   }
   
   }

      $result = mysqli_query($koneksi,"
        SELECT a.docId AS DOC, b.UNION AS UNI, a.INTERSECT AS INTS, a.INTERSECT/(b.UNION - a.INTERSECT) AS SIMILARITY FROM
  (SELECT TermStem, docId ,Count(DISTINCT TermStem) AS 'INTERSECT' FROM tb_proses WHERE $construct GROUP BY DocId) a
LEFT JOIN
  (SELECT TermStem, docId,(SELECT Count(DISTINCT TermStem)  FROM tb_proses LEFT JOIN (SELECT TermStem FROM tb_proses WHERE $construct GROUP BY DocId) aa USING (TermStem)) AS 'UNION' FROM tb_proses GROUP BY id) b
ON b.TermStem = a.TermStem GROUP BY a.docid ORDER BY SIMILARITY desc");

      $warna = "#DFE3FF";
$no=1;
      while($row = mysqli_fetch_array($result)) {
           if($warna=="#DFE3FF"){$warna="#DFF0D8";}else{$warna="#DFE3FF";}
            print("<tr bgcolor='$warna'>");
            print("<td>" . $no++ . 
                      "</td><td>" . $row['DOC'] . 
                      "</td><td>" . $row['UNI'] .
                      "</td><td>" . $row['INTS'] .
                      "</td><td>" . $row['SIMILARITY'] .
                      "</td>");
            print("</tr>");
      }          
    
    }
    else{
             
      }
   
      }
      // jika tombol cari tidak di klik
    else{
            
    }
  print("</tbody></table></div><hr />");
      ?>