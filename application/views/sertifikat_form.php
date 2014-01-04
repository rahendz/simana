
<div class="content-section">

	<h1><span>SERTIFIKAT TOT - Tambah Data</span></h1>

	<form action="{action_url}" method="post" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
		
		<div class="form-group bmargin30">
			<label class="control-label col-md-2 lalign">Narasumber</label>
			<div class="col-md-5">
				<select name="idnarasumber" id="e1" data-placeholder="Pilih Narasumber" style="width:100%;"{disabled}>
					<option value=""></option>
					<?php foreach ( $narasumber as $n ) : ?>
						<option value="<?php echo $n['idnarasumber_biodata'] ?>"<?php 

							echo $n['idnarasumber_biodata'] === $narasumber_biodata_idnarasumber_biodata ? ' selected="selected"' : NULL 

							?>>
							<?php echo $n['nama'] ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="form-group bmargin30">
			<label class="control-label col-md-2 lalign">Nomor Sertifikat</label>
			<div class="col-md-5">
				<input class="form-control" type="text" name="nomor" value="{nomor}" placeholder="Nomor Sertifikat" />
			</div>
		</div>

		<div class="form-group bmargin30">
			<label class="control-label col-md-2 lalign">Nilai</label>
			<div class="col-md-2">
				<input class="form-control" type="text" name="nilai" value="{nilai}" placeholder="Nilai"/>
			</div>
		</div>

		<div class="form-group bmargin30">
			<label class="control-label col-md-2 lalign">Jenis TOT</label>
			<div class="col-md-5">
				<select name="idtot" style="width:100%;" data-placeholder="Jumlah Penugasan">
					<option value=""></option>
					<?php foreach ( $tot as $t ) : ?>
						<option value="<?php echo $t->idtot ?>"<?php 

							echo $t->idtot === $tot_idtot ? ' selected="selected"' : NULL 

							?>>
							<?php echo $t->nama ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="form-group bmargin30">
			<div class="col-md-offset-2 col-md-3">
				<button type="submit" name="add" class="btn btn-primary">+ {tipe} DATA</button>
			</div>
		</div>

	</form>

</div>