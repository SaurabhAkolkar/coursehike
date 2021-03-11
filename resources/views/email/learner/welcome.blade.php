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
                        <img src="http://lila-fe.thestudiohash.com/email-images/logo.png" alt="logo" style="display:block;margin:0" />
                    </a> 
                </td>
            </tr>

            <tr>
                <td align="center" width="600" colspan="2" >
                    <span style="color:#FAC216;font-family:Verdana;font-size:56px;font-weight:900;text-transform:uppercase;">Welcome</span>
                </td>
            </tr>

            <tr>
                <td width="600" align="center">
                    <table width="500" align="center">
                        <tr>
                            <td align="center" style="padding:25px 0 15px 0">
                                <span style="font-size:24px;color:#010101;font-weight:500;">Start learning now!</span>
                            </td> 
                        </tr>
                        
                        <tr>
                            <td align="center" style="padding:10px 0">
                                <img src="http://lila-fe.thestudiohash.com/email-images/learner-welcome.png" alt="Welcome" style="width:300px"/>
                            </td>
                        </tr>
            
                        <tr>
                            <td align="center" style="padding:25px 20px 5px 20px">
                                 <span style="font-size:14px;color:#010101;font-weight:400;">Please click on the button below to verify your email id</span>
                            </td>
                        </tr>
            
                        <tr>
                            <td  align="center" style="padding:10px 0 60px 0">
                                <a href="{{route('useremail.verify',['id'=>$user->id, 'hash' => $user->token])}}?expiry={{Carbon\Carbon::now()->addDays('14')->timestamp}}" style="background:#7600DA; font-size:10px;font-weight:300;color:#fff;padding:11px 32px;border:none;border-radius:5px;">Verify Email</a>
                            </td>
                        </tr>
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