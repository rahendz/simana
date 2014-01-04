
<div class="content-section">

	<h1><span>SERTIFIKAT TOT - Tambah Data</span></h1>

	<form action="{action_url}" method="post" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
		
		<div class="form-group bmargin30">
			<label class="control-label col-md-2 lalign">Narasumber</label>
			<div class="col-md-5">
				<select name="idnarasumber" id="e1" data-placeholder="Pilih Narasumber" style="width:100%;">
					<option value=""></option>
					{narasumber}
						<option value="{idnarasumber_biodata}">{nama}</option>
					{/narasumber}
				</select>
			</div>
		</div>

		<div class="form-group bmargin30">
			<label class="control-label col-md-2 lalign">Nomor Sertifikat</label>
			<div class="col-md-5">
				<input class="form-control" type="text" name="nomor" placeholder="Nomor Sertifikat" />
			</div>
		</div>

		<div class="form-group bmargin30">
			<label class="control-label col-md-2 lalign">Nilai</label>
			<div class="col-md-2">
				<input class="form-control" type="text" name="nilai" placeholder="Nilai"/>
			</div>
		</div>

		<div class="form-group bmargin30">
			<label class="control-label col-md-2 lalign">Jenis TOT</label>
			<div class="col-md-5">
				<select name="idtot" style="width:100%;" data-placeholder="Jumlah Penugasan">
					<option value=""></option>
					{tot}
						<option value="{idtot}">{nama}</option>
					{/tot}
				</select>
			</div>
		</div>

		<div class="form-group bmargin30">
			<div class="col-md-offset-2 col-md-3">
				<button type="submit" name="add" class="btn btn-primary">+ TAMBAH DATA</button>
			</div>
		</div>

	</form>

</div>