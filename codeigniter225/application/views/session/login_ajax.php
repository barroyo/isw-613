<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $title ?> </title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}

	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}

	img#spinner {
		display: none;
	}
	</style>
</head>
<script src="https://code.jquery.com/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">

function login() {
	//disable button
	$('#submit_button')[0].setAttribute('disabled', true);
	///show spinner
	$('#spinner').show();

	var request = $.ajax({
	  url: "<?php echo base_url('session/authenticate')?>",
	  method: "POST",
	  data: { "username" : $('#username').val(), "password" : $('#password').val() }
	});

	request.done(function( response ) {
	  if (response.status === "valid") {
	  	$('div#login').hide();
			$('div#dashboard').show();
			$('div#dashboard').html(`<h1>Hi ${response.firstname}</h1>`)
	  } else {
	  	alert('Invalid user');
	  }
		$('#submit_button')[0].removeAttribute('disabled');
		$('#spinner').hide();
	});

	request.fail(function( jqXHR, textStatus ) {
	  alert( "Request failed: " + textStatus );
	  $('#submit_button')[0].removeAttribute('disabled');
	  $('#spinner').hide();
	});
}
</script>
<body>

<div id="container">
	<h1>Login Ajax</h1>
	<div id="login">
		<input type="text" name="username" value="" placeholder="" id="username">
		<input type="password" name="password" value="" placeholder="" id="password">
		<input type="button" name="" value="Login" id="submit_button" onclick="login();">
		<img width="100" src="https://cdn.dribbble.com/users/108390/screenshots/2882839/spinner-loop.gif" alt="" id="spinner">
		<br/>
	</div>

	<div id="dashboard" style="display: none;"></div>
</div>

</body>
</html>