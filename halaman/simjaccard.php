<div class="">
  <div class="clearfix"></div>
      <div class="panel-GROUP" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><h2 style="color: green">Similarity Jaccard</h2></a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse">
            <div class="panel-body">Similarity=Intersect/(Union-Intersect)
 </div>
          </div>
        </div>
      </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Hasil Similarity Jaccard</h2>
          <div class="clearfix"></div>
        </div>
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bORDERed table-hover">
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
                  $result = mysqli_query($koneksi,"SELECT a.docId AS DOC, b.UNION AS UNI, a.INTERSECT AS INTS, a.INTERSECT/(b.UNION - a.INTERSECT) AS SIMILARITY FROM
  (SELECT TermStem, docId ,Count(Distinct TermStem) AS 'INTERSECT' FROM tb_proses INNER JOIN tb_katakunci
USING (TermStem) GROUP BY docid) a
LEFT JOIN
  (SELECT TermStem, docId,(SELECT Count(Distinct TermStem)  FROM tb_proses LEFT JOIN tb_katakunci
USING (TermStem)) AS 'UNION' FROM tb_proses GROUP BY id) b
ON b.TermStem = a.TermStem GROUP BY a.docid ORDER BY SIMILARITY DESC");
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
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>