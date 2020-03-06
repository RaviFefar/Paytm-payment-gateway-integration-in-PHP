<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	// following files need to be included
	require_once("./lib/config_paytm.php");
	require_once("./lib/encdec_paytm.php");

	$ORDER_ID = "";
	$requestParamList = array();
	$responseParamList = array();

	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_POST["ORDER_ID"];

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Paytm payment gateway integration in PHP : Transaction status query</title>
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
	<h2 class="text-center">Transaction status query</h2>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form method="post" action="" id="paytm_forms" class="form-horizontal text-center">
					<div class="form-group">
				      	<label class="control-label col-sm-4" for="ORDER_ID">Order Id :</label>
				      	<div class="col-sm-8">
							<input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" class="form-control" autocomplete="off" value="<?php echo $ORDER_ID ?>">
				      	</div>
				    </div>

				    <button type="submit" class="btn btn-success">Check Status</button>
				    <a class="btn btn-link" href="http://localhost/paytmkit">Return Home </a>

				    <?php if (isset($responseParamList) && count($responseParamList)>0 ) {  ?>
						<h2>Response of status query:</h2>
						<table class="table">
							<tbody>
								<?php foreach($responseParamList as $paramName => $paramValue) { ?>
								<tr>
									<td><label><?php echo $paramName?></label></td>
									<td><?php echo $paramValue?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
						<?php } ?>
				</form>
			</div>
		</div>
	</div>
<br><br>

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