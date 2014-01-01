
<div class="content-section">

	<h1><span>MENGAJAR</span></h1>

	<form action="{action_url}" method="post" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
		
		<div class="form-group col-md-6 pull-none">
			<label class="control-label">Narasumber</label>

			<select name="idnarasumber" id="e1">
				
				<?php foreach ($narasumber as $value) { ?>
					<option value="<?php echo $value['idnarasumber_biodata'];  ?>"><?php echo $value['nama'] ?></option>
				<?php } ?>

			</select>
		</div>

		<div class="form-group col-md-6 pull-none">
			<label class="control-label">Tempat</label>
			<input class="form-control" type="text" name="tempat" value="{tempat}" />
		</div>

		<div class="form-group col-md-6 pull-none">
			<label class="control-label" >Tanggal</label>
			<input class="form-control" type="text" name="tanggal" value="{tanggal}" id="datepicker"/>
		</div>

		<div class="form-group col-md-6 pull-none">
			<label class="control-label">Jumlah</label>
			<input class="form-control" type="text" name="jumlah" value="{jumlah}" />
		</div>

		<div class="form-group col-md-6 pull-none">
			<label class="control-label">Catatan</label>
			<textarea class="form-control" name="catatan" value="{catatan}"></textarea>
		</div>

		<div class="form-group col-md-6 pull-none">
			<label class="control-label">Surat Penugasan</label>
			<input type="file" name="surat" value="{surat}" />
		</div>

		<button type="submit" name="add" class="btn btn-primary">+ TAMBAH DATA</button>

	</form>

</div>