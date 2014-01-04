<div class="content-section">
	<h1><span>REKAP Per BULAN</span></h1>

	<form action="{action_url}" method="post" accept-charset="utf-8" class="form-horizontal">
		
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
			<label class="control-label col-md-2 lalign">Tahun</label>
			<div class="col-md-3">
				<select name="tahun" style="width:100%;" data-placeholder="Tahun">
					<option value=""></option>
					<?php for($j=2011;$j<2017;$j++) : ?>
						<option value="<?php echo $j ?>"><?php echo $j ?></option>
					<?php endfor; ?>
				</select>
			</div>
		</div>

		<div class="form-group bmargin30">
			<label class="control-label col-md-2 lalign">Bulan</label>
			<div class="col-md-3">
				<select name="bulan" style="width:100%;" data-placeholder="Bulan">
					<option value=""></option>
					<?php foreach($bulan as $key => $value ) : ?>
						<option value="<?php echo $key ?>"><?php echo $value ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="form-group bmargin30">
			<div class="col-md-offset-2 col-md-3">
				<button type="submit" name="add" class="btn btn-primary">+ CEK REKAP</button>
			</div>
		</div>

	</form>
</div>

<?php if(isset($cekRekap)): ?>

<div class="content-section">

	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="datatable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Bulan</th>
				<th>Tahun</th>
				<th>Jumlah</th>
			</tr>
		</thead>
		<tbody>
			<?php if(!empty($cekRekap)): foreach ($cekRekap as $value) :?>

			<tr>
				<td></td>
				<td><?php echo $value->nama; ?></td>
				<td><?php echo $bulan[$this->input->post('bulan')] ?></td>
				<td><?php echo $this->input->post('tahun') ?></td>
				<td><?php echo $value->jumlah_ngajar ?></td>
			</tr>

			<?php endforeach; else: ?>
			<tr>
				<td colspan="5">empty</td>
			</tr>
			<?php endif; ?>
		</tbody>
	</table>

</div>

<?php endif; ?>