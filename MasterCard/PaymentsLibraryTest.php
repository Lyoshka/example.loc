<?php

	//THIS EXAMPLE POINTS TO THE PRODUCTION SANDBOX
	//I'm only using the xmp tags as a quick and dirty way to spit out the response xml.  This is obviously a depricated tag, but it works for this example.

	require_once("MasterCardPaymentsLibrary.php");

	//Fill in these variables with the appropriate values
	$p12filename = '';
	$password = '';
	$sandboxClientId = '';

	echo '<html><head></head><body>';

	//Purchase

	echo 'PURCHASE<br /><br />';

	$purchaseBody = '<?xml version="1.0" encoding="utf-8"?><PurchaseRequest><MerchantIdentity><CompanyId>47586</CompanyId><CompanyPassword>YtNDA1NS05YmJjLWZmMzc1NjJkZmViZg</CompanyPassword></MerchantIdentity><Reference><MessageId>12TG65H987BBQJ56742</MessageId><SettlementId>12345WXYZ6789</SettlementId></Reference><Amount><Currency>USD</Currency><Value>55555</Value></Amount><FundingCard><CardholderName>LEE M CARDHOLDER</CardholderName><AccountNumber>5466160123456789</AccountNumber><ExpiryMonth>10</ExpiryMonth><ExpiryYear>13</ExpiryYear><SecurityCode>699</SecurityCode></FundingCard><Authentication><EcommerceIndicator>05</EcommerceIndicator><TransactionId>12345678</TransactionId><Enrolled>Y</Enrolled><Status>Y</Status><Verification><Status>Y</Status><SecurityLevel>05</SecurityLevel><Token>8skd828s</Token></Verification></Authentication></PurchaseRequest>';

	$purchase = new MCPurchase($p12filename, $password, $sandboxClientId, $purchaseBody);

	echo '<xmp>' . $purchase->getPurchaseXML() . '</xmp>';

	//Authorization

	echo '<br /><br />AUTHORIZATION<br /><br />';

	$authorizationBody = '<?xml version="1.0" encoding="utf-8"?><AuthorizationRequest><MerchantIdentity><CompanyId>47586</CompanyId><CompanyPassword>YtNDA1NS05YmJjLWZmMzc1NjJkZmViZg</CompanyPassword></MerchantIdentity><Reference><MessageId>12TG65H987BBQJ56742</MessageId><SettlementId>12345WXYZ6789</SettlementId></Reference><Amount><Currency>USD</Currency><Value>44444</Value></Amount><FundingCard><CardholderName>LEE M CARDHOLDER</CardholderName><AccountNumber>5466160123456789</AccountNumber><ExpiryMonth>10</ExpiryMonth><ExpiryYear>13</ExpiryYear><SecurityCode>699</SecurityCode></FundingCard><Authentication><EcommerceIndicator>05</EcommerceIndicator><TransactionId>12345678</TransactionId><Enrolled>Y</Enrolled><Status>Y</Status><Verification><Status>Y</Status>			<SecurityLevel>05</SecurityLevel><Token>8skd828s</Token></Verification></Authentication></AuthorizationRequest>';

	$authorization = new MCAuthorization($p12filename, $password, $sandboxClientId, $authorizationBody);

	echo '<xmp>' . $authorization->getAuthorizationXML() . '</xmp>';

	//Capture

	echo '<br /><br />CAPTURE<br /><br />';

	$captureBody = '<?xml version="1.0" encoding="utf-8"?><CaptureRequest><MerchantIdentity><CompanyId>47586</CompanyId><CompanyPassword>YtNDA1NS05YmJjLWZmMzc1NjJkZmViZg</CompanyPassword></MerchantIdentity><Amount><Currency>USD</Currency><Value>33333</Value>  </Amount><Reference><MessageId>12TG65H987BBQJ56742</MessageId><SettlementId>12345WXYZ6789</SettlementId><OrderId>12345WXYZ67892321</OrderId></Reference></CaptureRequest>';

	$capture = new MCCapture($p12filename, $password, $sandboxClientId, $captureBody);

	echo '<xmp>' . $capture->getCaptureXML() . '</xmp>';

	//Refund

	echo '<br /><br />REFUND<br /><br />';

	$refundBody = '<?xml version="1.0" encoding="utf-8"?><RefundRequest><MerchantIdentity><CompanyId>47586</CompanyId><CompanyPassword>YtNDA1NS05YmJjLWZmMzc1NjJkZmViZg</CompanyPassword></MerchantIdentity><Amount><Currency>USD</Currency><Value>22222</Value>    </Amount><Reference><MessageId>12TG65H987BBQJ56742</MessageId><SettlementId>12345WXYZ6789</SettlementId><OrderId>12345WXYZ67892321</OrderId></Reference></RefundRequest>';

	$refund = new MCRefund($p12filename, $password, $sandboxClientId, $refundBody);

	echo '<xmp>' . $refund->getRefundXML() . '</xmp>';

	//Void

	echo '<br /><br />VOID<br /><br />';

	$voidBody = '<?xml version="1.0" encoding="utf-8"?><VoidRequest><MerchantIdentity><CompanyId>685123</CompanyId><CompanyPassword>vRWoQu7Cw8sN3KbbLbEajQ==</CompanyPassword></MerchantIdentity><Reference><MessageId>12TG65H987BBQJ56742</MessageId>		<SettlementId>12345WXYZ6789</SettlementId><OrderId>12345WXYZ67892321</OrderId></Reference></VoidRequest>';

	$void = new MCVoid($p12filename, $password, $sandboxClientId, $voidBody);

	echo '<xmp>' . $void->getVoidXML() . '</xmp>';



	echo '</body></html>';

?>
