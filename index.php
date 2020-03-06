<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Paytm payment gateway integration in PHP : Step by Step</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		#paytm_forms {
			padding: 20px;
		}
		#footer {
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<h1 class="text-center">Paytm payment gateway integration in PHP</h1>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form method="post" action="pgRedirect.php" id="paytm_forms" class="form-horizontal text-center">
					<div class="form-group">
				      	<label class="control-label col-sm-4" for="ORDER_ID">Order Id :</label>
				      	<div class="col-sm-8">
							<input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" class="form-control" autocomplete="off" value="<?php echo  "ORDS" . rand(10000,99999999)?>">
				      	</div>
				    </div>

				    <div class="form-group">
				      	<label class="control-label col-sm-4" for="CUST_ID">Customer Id :</label>
				      	<div class="col-sm-8">
							<input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" class="form-control" autocomplete="off" value="<?php echo  "CUST" . rand(10000,99999999)?>">
				      	</div>
				    </div>

				    <div class="form-group">
				      	<label class="control-label col-sm-4" for="INDUSTRY_TYPE_ID">Industry Type Id :</label>
				      	<div class="col-sm-8">
							<input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" class="form-control" autocomplete="off" value="Retail">
				      	</div>
				    </div>

				    <div class="form-group">
				      	<label class="control-label col-sm-4" for="CHANNEL_ID">Channel :</label>
				      	<div class="col-sm-8">
							<input id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" class="form-control" value="WEB">
				      	</div>
				    </div>

				    <div class="form-group">
				      	<label class="control-label col-sm-4" for="CHANNEL_ID">Txn Amount :</label>
				      	<div class="col-sm-8">
							<input title="TXN_AMOUNT" tabindex="10" class="form-control" type="text" name="TXN_AMOUNT" value="1">
				      	</div>
				    </div>

				    <button type="submit" class="btn btn-success">Donate</button>
				</form>
				<div class="col-md-12">
					<div class="alert alert-danger text-center"> All fields are mandatory. </div>
				</div>
			</div>
		</div>
	</div>
	<section id="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<p>&copy; <?php echo date('Y');?> by <b><a href="https://devnote.in">Devnote.in</a></b>. All Rights Reserved.</p>
					</div>
				</div>
			</div>
		</section>
	</form>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>