<!DOCTYPE html>
<html>
<head>
    <title>User Invoice</title>
</head>
<body>
    <section class="la-section">
        <div class="la-section__inner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="la-admin__invoice d-flex justify-content-between">
                            <div class="la-admin__invoice-logo position-relative">
                                <img src="../images/learners/logo.svg" alt="logo"  class="img-fluid d-block " />
                            </div>
              
                            <div class="la-admin__invoice-address text-right">
                                <p>K2, Old Sonal Industrial Est, Kanchpada, <br/> Malad Link Road, Malad West, Mumbai <br/> 400064. MH, India </p> 
                                <a  href="tel: +91 9999999999" class="d-flex justify-content-end align-items-center"><span class="la-icon--xl icon-contact-number"></span> <span class="pl-2">+91 9999999999 </span></a>
                                <a href="mailto: ask@learnitlikealiens.com" class="d-flex justify-content-end align-items-center"><span class="la-icon--xl icon-mail-id"></span> <span class="pl-2">ask@learnitlikealiens.com </span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="la-admin__invoice-details d-flex justify-content-between py-5">
                            <div class="la-admin__cust-info">
                                <h6>SOLD TO</h6> 
                                <div class="la-admin__cust-name"> Joseph Phill </div>
                                <div class="la-admin__cust-address">Address: 7-23, Hyderabad<br></div>
                                <a class="la-admin__cust-mobile d-flex align-items-center" href="tel:9999912345"><span class="la-icon--xl icon-contact-number"></span> <span class="pl-2"> 9999912345</span></a> 
                                <a class="la-admin__cust-mail d-flex align-items-center" href="mailto: mail@example.com"><span class="la-icon--xl icon-mail-id"></span> <span class="pl-2"> mail@example.com</span></a>
                            </div>
              
                            <div class="la-admin__cust-invoice text-right">
                              <div>
                                <span class="la-admin__invoice-date">DATE</span> <br/>
                                <span class="la-admin__date-format">20.12.2020</span>
                              </div>
                                
                              <div>
                                <span class="la-admin__invoice-order">ORDER ID </span><br/>
                                <span class="la-admin__invoice-id">52ghkyiysskj55</span>
                              </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="la-admin__invoice-solditems">
                            <h6>Items</h6>
                            @php
                                $invoice1 = new stdClass;
                                $invoice1->img = "https://picsum.photos/100/100";
                                $invoice1->course="Photography";
                                $invoice1->profile="Joseph Phill";
                                $invoice1->price= "40";

                                $invoices = array($invoice1);
                            @endphp
                            <ul class="la-admin__invoice-list">
                                @foreach ($invoices as $invoice)
                                    <x-learner-invoice
                                        :img="$invoice->img"
                                        :course="$invoice->course"
                                        :profile="$invoice->profile"
                                        :price="$invoice->price"
                                    /> 
                                @endforeach
                            </ul>
              
                            <div class="la-admin__invoice-total d-flex justify-content-end">
                                <p class="la-admin__total-title mr-5"> Total </p>
                                <p class="la-admin__total-price" > $ <span>40</span> </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="la-admin__invoice-payment">
                            <div class="la-admin__payment-title">PAYMENT DETAILS</div>
                            <div class="la-admin__payment-status d-flex flex-row no-gutters">
                                <span class="col mr-auto">Payment Status</span>
                                <span class="col">Successful</span>
                            </div>
              
                            <div class="la-admin__payment-method d-flex flex-row no-gutters">
                              <span class="col mr-auto">Payment Method</span>
                              <span class="col">PayTM</span>
                            </div>
              
                            <div class="la-admin__payment-id  d-flex flex-row no-gutters">
                              <span class="col mr-auto">Transaction Id</span>
                              <span class="col">dssxjshaldjkdhuhf</span>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </section>

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