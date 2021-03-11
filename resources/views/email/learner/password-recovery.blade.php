<!DOCTYPE html>
<html>
    <head>
        <title>Lila - Learner</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Lila - Learner">
        <meta name="keywords" content="Lila - Learner">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
       
        <style>
            *{box-sizing: border-box;}
            html,body{font-family:'Roboto', Verdana,'Open Sans',sans-serif; font-weight:400;background:#ffffff; color:#010101;font-size:16px;line-height:1.2;width:100%;margin:0;padding:0;overflow:auto;}
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
        <table width="600"  cellspacing="0" cellpadding="0" style="width:600px; margin:0 auto;border:0;background-color:#F5F4F0" >
            <tr>
                <td align="center" width="100%" colspan="2" style="padding:40px 0 10px 0">
                    <a href="" target="_blank" >
                        <img src="http://lila-fe.thestudiohash.com/email-images/logo.png" alt="Logo" style="display:block;margin:0" />
                    </a> 
                </td>
            </tr>

            <tr>
                <td align="center" width="600" colspan="2" style="padding-top:10px" >
                    <span style="color:#FAC216;font-family:Verdana;font-size:42px;font-weight:900;text-transform:uppercase;line-height:1;">Password Recovery</span>
                </td>
            </tr>

            <tr>
                <td style="padding:5px 0 60px 0">
                    <table width="500" align="center" >
                        <tr>
                            <td  align="center" style="padding:20px 10px 10px 10px;">
                                <span style="font-size:14px;color:#232323;font-weight:400;">Dear user, we see that you are trying to recover your password. Kindly click on the following button to reset password.</span>

                            </td>  
                        </tr>
            
                    
                        <tr>
                            <td align="center"  colspan="1"  >
                                <a href="{{ env('APP_URL') }}/password/reset/{{$token}}?email={{$email}}"  style="background:#7600DA; font-size:12px;color:#fff;padding:10px 50px;border:none;font-weight:300;border-radius:5px;">Click Here</a>
                            </td>
                        </tr>

                        {{-- <tr>
                            <td  align="center"  colspan="1" style="padding:10px 0" >
                                <span style="color:#010101;font-size:12px">It wasn't you?</span>
                                <a href="" role="button" style="color:#FF5C5C;font-size:12px">Report</a>
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
                                  <a href=""><img src="http://lila-fe.thestudiohash.com/email-images/facebook.png"/></a>
                                  <a href="" style="padding:0 5px"><img src="http://lila-fe.thestudiohash.com/email-images/insta.png"/></a>
                                  <a href=""><img src="http://lila-fe.thestudiohash.com/email-images/youtube.png"/></a>
                              </span>
                           </td>
          
                           <td width="300" colspan="1" align="right" style="padding:15px 20px 15px 0">
                               <a href="mailto:ask@learnitlikealiens.com" style="color:#fff;font-size:12px;font-weight:300;text-decoration: none;">ask@learnitlikealiens.com</a> <br/>
                               <a href="" target="_blank" style="color:#fff;font-size:12px;font-weight:300;text-decoration: none;">lila.art</a>
                           </td>
                       </tr>
                   </table>
                </td>                
           </tr>
           <!-- Footer: End -->
        </table> 
    </body>
</html>