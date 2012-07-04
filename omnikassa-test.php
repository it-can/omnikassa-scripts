<?php
$test_mode = TRUE;
$Action = ($test_mode) ? 'https://payment-webinit.simu.omnikassa.rabobank.nl/paymentServlet' : 'https://payment-webinit.omnikassa.rabobank.nl/paymentServlet';


$bedrag 		= 100;  // 100 = 1,00 euro
$merchantId 	= '002020000000001';
$return_url 	= 'http://www.example.com/';
$omschrijving 	= '123456';
$key_version 	= '1';
$secretKey		= '002020000000001_KEY1';


$Data = utf8_encode('amount='.$bedrag.'|currencyCode=978|merchantId='.$merchantId.'|normalReturnUrl='.$return_url.'|transactionReference='.$omschrijving.'|keyVersion='.$key_version);
$secretKey = utf8_encode($secretKey);

$Seal = hash('sha256', $Data.$secretKey);

echo($Data);
echo('<br>');
echo($Seal);
?>
<html>
<body>
<form method="POST" action="<?php echo $Action ?>">
<input type="hidden" name="Data" value="<?php echo $Data ?>">
<input type="hidden" name="InterfaceVersion" value="HP_1.0">
<input type="hidden" name="Seal" value="<?php echo $Seal ?>">
<input type="submit" value="Proceed to payment">
</form>
</body>
</html>
