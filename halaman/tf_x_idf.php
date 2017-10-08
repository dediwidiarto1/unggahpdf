<div class="">
  <div class="clearfix"></div>
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><h2 style="color: green">Weight(Proses pembobotan setiap term di dalam dokumen).</h2></a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse">
            <div class="panel-body">W = (TF * IDF)
			<P>TF melakukan pembobotan berdasarkan term yang sering muncul dalam dokumen.<P/> 
			<P>IDF melakukan pembobotan berdasarkan jumlah kemunculannya dalam koleksi dokumen.<P/> 
			<P>DF jumlah dokumen yang mengandung query<P/>.
 </div>
          </div>
        </div>
      </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Hasil Weighting</h2>
          <div class="clearfix"></div>
        </div>
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>TermStem</th>
                <th>Doc-ID</th>
                <th>TF(Term Frequency)</th>
                <th>DF(Document frequency)</th>
                <th>N</th>
                <th>IDF(Inverse Document Frequency)</th>
                <th>W=TF * IDF</th>
              </tr>
            </thead>
            <tbody>
              <?php
                 $result = mysqli_query($koneksi,"select b.Id as Id,b.TermStem,b.DocId AS DocId,b.TF AS TF,a.DF AS DF, a.N as N, log10(a.N/a.DF) AS IDF,b.TF *log10(a.N/a.DF) AS TFIDF from
  (select Id,TermStem,Count(Distinct Id) AS DF ,(SELECT Count(Distinct DocId)FROM tb_proses) AS N from tb_proses Group By TermStem) a
left join
  (select Id,TermStem,DocId, Count AS TF  from tb_proses Group By Id) b
on b.TermStem = a.TermStem Order by TFIDF Desc");
$warna = "#DFE3FF";
$no=1;
      while($row = mysqli_fetch_array($result)) {
           if($warna=="#DFE3FF"){$warna="#DFF0D8";}else{$warna="#DFE3FF";}
            print("<tr bgcolor='$warna'>");
            print("<td>" . $no++ . "</td><td>" . $row['TermStem'] . "</td><td>" . $row['DocId'] .
                      "</td><td>" . $row['TF'] .
                      "</td><td>" . $row['DF'] .
                      "</td><td>" . $row['N'] .
                      "</td><td>" . $row['IDF'] .
                      "</td><td>" . $row['TFIDF'] .
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