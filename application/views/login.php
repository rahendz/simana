{get_header}

<div class="login-wrapper">

<div class="login">

<form action="<?php echo site_url("login") ?>" method="post" accept-charset="utf-8" role="form" class="col-md-3 row">

	{userpass_error}
	
	<div class="form-group{is_username_error}">
		<input type="text" name="username" placeholder="Username" class="form-control" value="{username_value}" />
		{username_error}
	</div>

	<div class="form-group{is_password_error}">
		<input type="password" name="password" placeholder="Password" class="form-control" value="{password_value}" />
		{password_error}
	</div>

	<button type="submit" class="btn btn-primary pull-right">LOGIN <span class="glyphicon glyphicon-chevron-right"></span></button>

</form>

</div>

</div>

{get_footer}