<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <title>User Invoice</title>
       
    <style>
        *{
            box-sizing: border-box;
        }
        body,html{
            font-family:'Roboto',sans-serif;
            font-size:16px;
            font-weight:400;
            background-color:#ffffff;
            color:#010101;
            line-height:1.5;
        }
    </style>
</head>
<body>
    <section class="la-section">
        <h1 style="font-size:20px;color:#010101;text-align:center;padding-bottom:20px;">INVOICE</h1>

        <table width="100%">
            <tr>
                <td width="30%"> 
                    <img src="{{asset('/images/learners/logo.svg')}}" alt="Logo" />  
                </td>

                <td width="70%" colspan="2" style="text-align:right;">
                    <div>
                        <p style="font-size:15px;color:#252525">K2, Old Sonal Industrial Est, Kanchpada, <br/> Malad Link Road, Malad West, Mumbai <br/> 400064. MH, India </p> 
                        <div>
                            <a  href="tel: +91 8779056596"  style="color:#252525;text-decoration:none;">
                                <span>+91 8779056596 </span>
                            </a>
                        </div>
                        <div>
                            <a href="mailto:  lila@learnitlikealiens.com" style="color:#252525;text-decoration:none;">
							    <span> lila@learnitlikealiens.com</span>
                            </a>
                        </div>
                     </div>
                </td>
            </tr>

            <tr>
                <td width="50%" style="padding:50px 0;">
                    <div>
                        <h5 style="color:#959595;margin:0;">SOLD TO</h5> 
                        <div style="color:#252525;"> {{$user->fullName}} </div>
                        <div style="color:#252525;">{{$user->address}}{{$user->city}}{{$user->state}}{{$user->country}} - {{$user->pin_code}}</div>
                        <div>
                            <a href="tel:9999912345" style="color:#252525;text-decoration:none;">
                                <span>@if(getLocation() == 'India') +91 @endif {{$user->mobile}} </span>
                            </a> 
                        <div>
                        <div>
                            <a href="mailto: mail@example.com" style="color:#252525;text-decoration:none;">
                                <span>{{$user->email}}</span>
                            </a>
                        </div>
                    </div>
                </td>

                <td width="50%" colspan="2" style="text-align:right;padding:50px 0;">
                    <div>
                        <div style="padding-bottom:15px;">
                            <h5 style="color:#959595;margin:0;">DATE</h5> 
                            <p style="color:#252525;margin:0;font-size:14px;">{{$date}}</p>
                        </div>
                                
                        <div>
                            <h5 style="color:#959595;margin:0;">ORDER ID </h5>
                            <p style="color:#252525;margin:0;font-size:14px;">{{$invoice->invoice_id}}</p>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td width="40%" style="text-align:left;padding-bottom:20px;">
                    <div style="color:#929292;"> Items</div>   
                </td>
                <td width="30%"></td>
                <td  width="30%" style="text-align:right;padding-bottom:20px;">
                    <div style="color:#929292;"> Price</div> 
                </td>
            </tr>
            @foreach($invoiceDetailData as $idd)         
            <tr>
                <td width="40%" style="padding-bottom:10px;">
                    <img src="{{$idd->course->preview_image}}" alt="course name" style="width:140px;height:80px;border-radius:10px;background-color:#c3c3c3;"/>
                </td>

                <td width="30%" style="text-align:left;padding-bottom:10px;">
                    <div>
                        <strong>{{$idd->course->title}}</strong> <br/>
                        <span style="color:#252525">by {{$idd->course->user->fullName}} </span>
                    </div>
                </td>
                
                <td width="30%" style="text-align:right;padding-bottom:10px;">
                    <div style="color:#252525">@if($invoice->currency == 'INR') ₹ @else $ @endif <span>{{$idd->price}}</span></div>
                </td>
            </tr>
            @endforeach

            <tr>
                <td width="50%" colspan="2"></td>
                <td width="50%" style="text-align:right;padding-top:15px;">
                    <div>
                        <p style="color:#959595;font-weight:bold"> Sub Total </p>
                        <p style="color:#252525"> @if($invoice->currency =='INR') ₹ @else $ @endif <span>{{$invoice->sub_total}}</span> </p>
                    </div>
                </td>
            </tr>

            <tr>
                <td width="50%" colspan="2"></td>
                <td width="50%" style="text-align:right;padding-top:15px;">
                    <div>
                        <p style="color:#959595;font-weight:bold"> Taxes </p>
                        <p style="color:#252525"> @if($invoice->currency =='INR') ₹ @else $ @endif <span>{{$invoice->taxes}}</span> </p>
                    </div>
                </td>
            </tr>

            <tr>
                <td width="50%" colspan="2"></td>
                <td width="50%" style="text-align:right;padding-top:15px;">
                    <div>
                        <p style="color:#959595;font-weight:bold"> Total </p>
                        <p style="color:#252525"> @if($invoice->currency =='INR') ₹ @else $ @endif <span>{{$invoice->total}}</span> </p>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div style="padding:30px 0;">
                        <h5 style="color:#959595;font-weight:bold;font-size:16px;">PAYMENT DETAILS</h5>
                        <div>
                            <span style="color:#656565;padding-right:5px;">Payment Status:</span>
                            <span style="color:#252525">Successful</span>
                        </div>
              
                        <div>
                            <span  style="color:#656565;padding-right:5px;">Payment Method:</span>
                            <span  style="color:#252525">Stripe</span>
                        </div>
              
                        <div>
                            <span  style="color:#656565;padding-right:5px;">Transaction Id:</span>
                            <span  style="color:#252525">{{$invoice->invoice_id}}</span>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </section>

</body>
</html>