<div class="">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Data Dokumen</h2>
					<ul class="nav navbar-right panel_toolbox">
                      <a type="button" class="btn btn-primary btn-sm" href="index.php?link=tambahdokumen">Tambah Dokumen</a>
                    </ul>
					<div class="clearfix"></div>

				</div>
				<?php
				include 'koneksi.php';
				$result = mysqli_query($koneksi,"SELECT * FROM tb_dokumen ORDER BY Id");
				?>
				<div class="table-responsive">
					<table id="datatable" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>No</th>
								<th>Dokumen</th>
								<th>Link</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no=1;
							while($row = mysqli_fetch_array($result)) {
							print("<tr>");
								print("<td>" . $no++ .  "</td>
									<td><font color =blue>" . $row['Judul'] . "</font></td>
									<td><font color =blue>" . $row['URL'] . "</font></td>
									");
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