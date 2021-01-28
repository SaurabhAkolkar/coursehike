<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <title>User Invoice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
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
        <div class="la-section__inner">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12">
						<h1 class="text-center text-uppercase pb-5" style="font-size:20px;color:#010101;">Invoice</h1>
                        <div class="la-admin__invoice d-flex justify-content-between">
                            <div class="la-admin__invoice-logo position-relative">
                                <img src="../images/learners/logo.svg" alt="logo"  class="img-fluid d-block " />
                            </div>
              
                            <div class="la-admin__invoice-address text-right">
                                <p style="font-size:15px;color:#252525">K2, Old Sonal Industrial Est, Kanchpada, <br/> Malad Link Road, Malad West, Mumbai <br/> 400064. MH, India </p> 
                                <a  href="tel: +91 9999999999" class="d-flex justify-content-end align-items-center" style="color:#252525">
									<span class="fa fa-phone" style="color:#656565"></span> <span class="pl-2" >+91 9999999999 </span>
								</a>
                                <a href="mailto: ask@learnitlikealiens.com" class="d-flex justify-content-end align-items-center" style="color:#252525">
									<span class="fas fa-envelope" style="color:#656565"></span> <span class="pl-2" >ask@learnitlikealiens.com </span>
								</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="la-admin__invoice-details d-flex justify-content-between py-5">
                            <div class="la-admin__cust-info">
                                <h6 style="color:#959595;font-weight:500">SOLD TO</h6> 
                                <div class="la-admin__cust-name" style="color:#252525;"> Joseph Phill </div>
                                <div class="la-admin__cust-address" style="color:#252525;">Address: 7-23, Hyderabad<br></div>
                                <a class="la-admin__cust-mobile d-flex align-items-center" href="tel:9999912345" style="color:#252525">
									<span class="fa fa-phone" style="color:#656565"></span> <span class="pl-2" >+91 9999912345</span>
								</a> 
                                <a class="la-admin__cust-mail d-flex align-items-center" href="mailto: mail@example.com" style="color:#252525">
									<span class="fas fa-envelope" style="color:#656565"></span> <span class="pl-2" > mail@example.com</span>
								</a>
                            </div>
              
                            <div class="la-admin__cust-invoice text-right">
                              <div>
                                <span class="la-admin__invoice-date" style="color:#959595;font-weight:500">DATE</span> <br/>
                                <span class="la-admin__date-format" style="color:#252525;">20.12.2020</span>
                              </div>
                                
                              <div>
                                <span class="la-admin__invoice-order" style="color:#959595;font-weight:500">ORDER ID </span><br/>
                                <span class="la-admin__invoice-id" style="color:#252525;">52ghkyiysskj55</span>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="la-admin__invoice-solditems">
							<div class="d-flex justify-content-between align-items-center">
								 <h6 class="pb-3" style="color:#959595;font-weight:500">Items</h6>
								 <h6 class="pb-3" style="color:#959595;font-weight:500">Price</h6>
							</div>
                           
            
                            <ul class="la-admin__invoice-list p-0">
                                <li class="la-admin__invoice-items d-flex justify-content-between align-items-center">
                                    <div class="la-admin__item-info d-flex justify-content-between align-items-center"> 
                                        <div class="la-admin__item-img mr-3">
                                            <img src="https://picsum.photos/140/80" alt="course name" class="img-fluid d-block" style="width:140px;height:80px;border-radius:10px;"/>
                                        </div>
                                        <div class="la-admin__item-desc">
                                            <strong>Course Name</strong> <br/>
                                            <span style="color:#252525">by Creator Name </span>
                                        </div>
                                    </div>
                                    <div class="la-admin__item-price" style="color:#252525">$ <span>10</span></div>
                                </li>
                            </ul>
              
                            <div class="la-admin__invoice-total d-flex justify-content-end">
                                <p class="la-admin__total-title mr-5" style="color:#959595;font-weight:600"> Total </p>
                                <p class="la-admin__total-price" style="color:#252525"> $ <span>40</span> </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 py-5">
                        <div class="la-admin__invoice-payment">
                            <div class="la-admin__payment-title pb-3" style="color:#959595;font-weight:500">PAYMENT DETAILS</div>
                            <div class="la-admin__payment-status d-flex flex-row no-gutters">
                                <span class="col mr-auto" style="color:#454545">Payment Status</span>
                                <span class="col" style="color:#252525">Successful</span>
                            </div>
              
                            <div class="la-admin__payment-method d-flex flex-row no-gutters">
                              <span class="col mr-auto" style="color:#454545">Payment Method</span>
                              <span class="col" style="color:#252525">PayTM</span>
                            </div>
              
                            <div class="la-admin__payment-id  d-flex flex-row no-gutters">
                              <span class="col mr-auto" style="color:#454545">Transaction Id</span>
                              <span class="col" style="color:#252525">dssxjshaldjkdhuhf</span>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>