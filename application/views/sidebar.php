<div class="col-md-5 user">
	<div class="user-section">
		<img src="<?php echo base_url("assets/img/avatar.jpg") ?>" class="img-responsive img-circle avatar" />
		<p>Welcome home!</p>
		<p>You logged as <strong>Admin</strong></p>
		<p><a href="<?php echo site_url("logout") ?>" class="btn btn-primary logout"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp; LOGOUT</a></p>

		<div class="copyright">
			<p><a data-toggle="modal" data-target="#aboutdevel">About Developer</a></p>
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
		
		<li{is_narasumber}><a href="<?php echo site_url ( "narasumber" ) ?>">+ NARASUMBER</a></li>
		
		<li{is_tot}><a href="<?php echo site_url ( "tot" ) ?>">+ TOT</a></li>
		
		<li{is_mengajar}><a href="<?php echo site_url ( "mengajar" ) ?>">+ MENGAJAR</a></li>
		
		<!-- <li class="panel">
			<a href="#narasumber" data-toggle="collapse" data-parent="#pagemenu">+ NARASUMBER</a>
			<ul id="narasumber" class="collapse">
				<li><a href="" title="">Daftar Narasumber</a></li>
				<li><a href="" title="">Tambah Narasumber</a></li>
			</ul>
		</li>

		<li class="panel">
			<a href="#mengajar" data-toggle="collapse" data-parent="#pagemenu">+ MENGAJAR</a>
			<ul id="mengajar" class="collapse">
				<li><a href="" title="">Daftar Mengajar</a></li>
				<li><a href="" title="">Tambah Mengajar</a></li>
				<li><a href="" title="">Unggah Surat Penugasan</a></li>
			</ul>
		</li>

		<li class="panel">
			<a href="#tot" data-toggle="collapse" data-parent="#pagemenu">+ TOT</a>
			<ul id="tot" class="collapse">
				<li><a href="" title="">Daftar TOT</a></li>
				<li><a href="" title="">Tambah TOT</a></li>
				<li><a href="" title="">Data Sertifikat TOT</a></li>
			</ul>
		</li> -->

		<li{is_help}><a href="<?php echo site_url ( "help" ) ?>">+ HELP</a></li>
		
	</ul>

		<!-- <div class="panel-group" id="accordion">
		  
		  <div class="panel panel-default">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
		          NARASUMBER
		        </a>
		      </h4>
		    </div>
		    <div id="collapseOne" class="panel-collapse collapse in">
		      <div class="panel-body">
		        Anim pariatur cliche reprehenderit
		      </div>
		    </div>
		  </div>

		  <div class="panel panel-default">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
		          Collapsible Group Item #2
		        </a>
		      </h4>
		    </div>
		    <div id="collapseTwo" class="panel-collapse collapse">
		      <div class="panel-body">
		        Anim pariatur cliche reprehenderit
		      </div>
		    </div>
		  </div>
		  <div class="panel panel-default">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
		          Collapsible Group Item #3
		        </a>
		      </h4>
		    </div>
		    <div id="collapseThree" class="panel-collapse collapse">
		      <div class="panel-body">
		        Anim pariatur cliche reprehenderit
		      </div>
		    </div>
		  </div>
		</div> -->

	</div>
</div>