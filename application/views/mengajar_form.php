
<div class="content-section">

	<h1><span>MENGAJAR - Tambah Data</span></h1>

	<form action="{action_url}" method="post" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
		
		<div class="form-group bmargin30">
			<label class="control-label col-md-2 lalign">Narasumber</label>
			<div class="col-md-5">
				<select name="idnarasumber" id="e1" data-placeholder="Pilih Narasumber" style="width:100%;">
					<option value=""></option>
					<?php foreach ($narasumber as $value) : ?>
						<option value="<?php echo $value['idnarasumber_biodata'];  ?>"><?php echo $value['nama'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="form-group bmargin30">
			<label class="control-label col-md-2 lalign">Tempat</label>
			<div class="col-md-7">
				<input class="form-control" type="text" name="tempat" value="{tempat}" placeholder="Tempat Penugasan" />
			</div>
		</div>

		<div class="form-group bmargin30">
			<label class="control-label col-md-2 lalign">Tanggal</label>
			<div class="col-md-3">
				<input class="form-control" type="text" name="tanggal" value="{tanggal}" id="datepicker" placeholder="Tanggal Penugasan"/>
			</div>
		</div>

		<div class="form-group bmargin30">
			<label class="control-label col-md-2 lalign">Jumlah</label>
			<div class="col-md-3">
				<select name="jumlah" style="width:100%;" data-placeholder="Jumlah Penugasan">
					<option value=""></option>
					<?php for($j=1;$j<11;$j++) : ?>
						<option value="<?php echo $j ?>"><?php echo $j ?></option>
					<?php endfor; ?>
				</select>
			</div>
		</div>

		<div class="form-group bmargin30">
			<label class="control-label col-md-2 lalign">Catatan</label>
			<div class="col-md-5">
				<textarea class="form-control" name="catatan" value="{catatan}" placeholder="Catatan Penugasan"></textarea>
			</div>
		</div>

		<div class="form-group bmargin30">
			<label class="control-label col-md-2 lalign">Surat Penugasan</label>
			<div class="col-md-6">
				<input type="file" name="userfile" value="{userfile}" class="form-control" />
			</div>
		</div>

		<div class="form-group bmargin30">
			<div class="col-md-offset-2 col-md-3">
				<button type="submit" name="add" class="btn btn-primary">+ TAMBAH DATA</button>
			</div>
		</div>

	</form>

</div>