<!DOCTYPE html>
<html>
<head>
	<title>User Invoice</title>
</head>
<body>
	<h1>LILA Course Invoice</h1>
	<table style="width:100%">
        <tr>
            <td>Sub Total</td>
            <td>$ {{$invoiceData->sub_total}}</td>
        </tr>
        <tr>
            <td>Taxes</td>
            <td>{{$invoiceData->taxes}}%</td>
        </tr>
        <tr>
            <td>Total</td>
            <td>$ {{$invoiceData->total}}</td>
        </tr>
    </table>
</body>
</html>