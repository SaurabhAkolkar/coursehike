<!DOCTYPE html>
<html>
    <head>
        <title>Lila - Learner</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
       
        <style>
            *{box-sizing: border-box;}
            html,body{font-family:'Roboto',Verdana,'Open Sans',sans-serif; font-weight:400;background:#ffffff; color:#010101;font-size:16px;line-height:1.2;width:100%;margin:0;padding:0;overflow:auto;}
            table{
                border-collapse: collapse;
                border-spacing: 0;
            }
            @media only screen and (max-width:600px){
                table{
                    width:100% !important;
                }
            }              
        </style>
    </head>

    <body>
        <table width="600" cellspacing="0" cellpadding="0" style="width:600px; margin:0 auto;border:0;background-color:#F5F4F0" >
            <tr>
                <td align="center" width="100%" colspan="2" style="padding:40px 0 10px 0">
                    <a href="" target="_blank" >
                        <img src="https://lila.art/images/emailers/logo.png" alt="logo" style="display:block;margin:0" />
                    </a> 
                </td>
            </tr>

            <tr>
                <td align="center" width="600" colspan="2" style="padding:0 40px;">
                    <span style="color:#FAC216;font-family:Verdana;font-size:46px;font-weight:900;text-transform:uppercase;">Subscribed</span>
                </td>
            </tr>

            <tr>
                <td width="600" style="padding:20px 0 40px 40px">
                    <table>
                        <tr>
                            <td colspan="2" style="padding-bottom:10px;">
                                <span style="font-size:16px;color:#010101;font-weight:500;">Subscription Successful!</span>
                            </td> 
                        </tr>
                        
                        {{-- <tr>
                            <td colspan="2" style="padding-bottom:15px;">
                                <img src="https://lila.art/images/emailers/creator.png" alt="Profile Photo" style="width:50px"/>
                            </td>
                        </tr> --}}
            
                        <!-- <tr>
                            <td width="150" style="padding:4px 0">
                                <span style="font-size:12px;color:#8B8B8B;">Learner ID</span>
                            </td>
                            <td  style="padding:4px 0">
                                 <span style="font-size:14px;color:#010101;font-weight:500;">#L3245</span>
                            </td>
                        </tr> -->

                        <tr>
                            <td width="150" style="padding:4px 0">
                                <span style="font-size:12px;color:#8B8B8B;">Name</span>
                            </td>
                            <td  style="padding:4px 0">
                                 <span style="font-size:14px;color:#010101;font-weight:500;">{{ $data['name'] }}</span>
                            </td>
                        </tr>

                        <tr>
                            <td width="150" style="padding:4px 0">
                                <span style="font-size:12px;color:#8B8B8B;">Email ID</span>
                            </td>
                            <td  style="padding:4px 0">
                                 <span style="font-size:14px;color:#010101;font-weight:500;">{{ $data['email'] }}</span>
                            </td>
                        </tr>

                        <tr>
                            <td width="150" style="padding:4px 0">
                                <span style="font-size:12px;color:#8B8B8B;">Subscription Type</span>
                            </td>
                            <td  style="padding:4px 0">
                                 <span style="font-size:14px;color:#010101;font-weight:500;">{{ $data['type'] }}</span>
                            </td>
                        </tr>

                        <tr>
                            <td width="150" style="padding:4px 0">
                                <span style="font-size:12px;color:#8B8B8B;">Total Amount Paid</span>
                            </td>
                            <td  style="padding:4px 0">
                                 <span style="font-size:14px;color:#010101;font-weight:500;">{{ $data['currency']=='INR'? '₹' : '$' }}{{ $data['amount'] }}</span>
                            </td>
                        </tr>

                        <tr>
                            <td width="150" style="padding:4px 0">
                                <span style="font-size:12px;color:#8B8B8B;">Payment Mode</span>
                            </td>
                            <td  style="padding:4px 0">
                                 <span style="font-size:14px;color:#010101;font-weight:500;">Stripe</span>
                            </td>
                        </tr>

                        <tr>
                            <td width="150" style="padding:4px 0">
                                <span style="font-size:12px;color:#8B8B8B;">Payment Status</span>
                            </td>
                            <td  style="padding:4px 0">
                                 <span style="font-size:14px;color:#010101;font-weight:500;">Successful</span>
                            </td>
                        </tr>

                        {{-- <tr>
                            <td width="150" colspan="1"  style="padding:40px 0">
                                <button style="background:#7600DA; font-size:12px;font-weight:300; color:#fff;padding:11px 16px;border:none;border-radius:5px;">Check Details</button>
                            </td>
                            <td colspan="1"  style="padding:40px 0">
                                <a href="" role="button" style="font-size:14px;color:#7600DA;font-weight:500;">Invoice</a>
                            </td>
                        </tr> --}}
                    </table>
                </td>
            </tr>

            
            <!-- Footer: Start -->
            <tr>
                <td>
                   <table width="600" style="background-color:#262625; color:#fff;">
                       <tr>
                           <td width="300"  colspan="1" align="left" style="padding:15px 0 15px 20px;">
                              <span>
                                  <a href=""><img src="https://lila.art/images/emailers/facebook.png"/></a>
                                  <a href="" style="padding:0 5px"><img src="https://lila.art/images/emailers/insta.png"/></a>
                                  <a href=""><img src="https://lila.art/images/emailers/youtube.png"/></a>
                              </span>
                           </td>
          
                           <td width="300" colspan="1" align="right" style="padding:15px 20px 15px 0">
                                <a href="mailto:lila@learnitlikealiens.com" style="color:#fff;font-size:12px;font-weight:300;text-decoration: none;">lila@learnitlikealiens.com</a> <br/>
                                <a href="https://lila.art" target="_blank" style="color:#fff;font-size:12px;font-weight:300;text-decoration: none;">lila.art</a>
                           </td>
                       </tr>
                   </table>
                </td>                
           </tr>
           <!-- Footer: End -->
        </table> 
    </body>
</html>