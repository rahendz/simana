<div class="col-md-5 user">
	<div class="user-section">
		<img src="<?php echo base_url("assets/img/avatar.jpg") ?>" class="img-responsive img-circle avatar" />
		<p>Welcome home!</p>
		<p>You logged as <strong>Admin</strong></p>
		<p><a href="<?php echo site_url("logout") ?>" class="btn btn-primary logout"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp; LOGOUT</a></p>

		<div class="copyright">
			<p><button data-toggle="modal" data-target="#aboutdevel" class="btn btn-link">About Developer</button></p>
			<p>Copyright 2013 <a href="">SIMANA&trade;</a></p>
			<p>All Rights Reserved.</p>
		</div>

		<div id="aboutdevel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="aboutdevel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">oke</div>
					<div class="modal-body">oke</div>
					<div class="modal-footer">oke</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-md-7 menu">
	<div class="menu-section">

	<ul id="pagemenu">

		<li{is_home}><a href="<?php echo base_url() ?>">+ HOME</a></li>
		
		<!-- <li{is_narasumber}><a href="<?php //echo site_url ( "narasumber" ) ?>">+ NARASUMBER</a></li>
		
		<li{is_tot}><a href="<?php //echo site_url ( "tot" ) ?>">+ TOT</a></li>
		
		<li{is_mengajar}><a href="<?php //echo site_url ( "mengajar" ) ?>">+ MENGAJAR</a></li> -->
		
		<li class="panel{is_narasumber}">
			<a href="#narasumber" data-toggle="collapse" data-parent="#pagemenu">+ NARASUMBER</a>
			<ul id="narasumber" class="{is_narasumber_collapsed}">
				<li><a href="<?php echo site_url ( "narasumber" ) ?>">Daftar Narasumber</a></li>
				<li><a href="<?php echo site_url ( "narasumber/add" ) ?>">Tambah Narasumber</a></li>
			</ul>
		</li>

		<li class="panel{is_mengajar}">
			<a href="#mengajar" data-toggle="collapse" data-parent="#pagemenu">+ MENGAJAR</a>
			<ul id="mengajar" class="{is_mengajar_collapsed}">
				<li><a href="<?php echo site_url ( "mengajar" ) ?>">Daftar Mengajar</a></li>
				<li><a href="<?php echo site_url ( "mengajar/add" ) ?>">Tambah Mengajar</a></li>
				<li><a href="">Unggah Surat Penugasan</a></li>
			</ul>
		</li>

		<li class="panel{is_tot}">
			<a href="#tot" data-toggle="collapse" data-parent="#pagemenu">+ TOT</a>
			<ul id="tot" class="{is_tot_collapsed}">
				<li><a href="<?php echo site_url ( "tot" ) ?>">Daftar TOT</a></li>
				<li><a href="<?php echo site_url ( "tot/add" ) ?>">Tambah TOT</a></li>
				<li><a href="<?php echo site_url ( "tot/sertifikat" ) ?>">Data Sertifikat TOT</a></li>
				<li><a href="<?php echo site_url ( "tot/sertifikat/add" ) ?>">Tambah Sertifikat TOT</a></li>
			</ul>
		</li>

		<li{is_rekap}><a href="<?php echo site_url ( "rekap" ) ?>">+ REKAP</a></li>

		<li{is_help}><a href="<?php echo site_url ( "help" ) ?>">+ HELP</a></li>
		
	</ul>

	</div>
</div>