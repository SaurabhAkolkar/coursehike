@extends('learners.layouts.app')

@section('content')
<div class="la-profile">
    <div class="la-profile__wrap">

      <!-- Side Navbar: Start -->
      @include ('learners.pages.sidebar')
      <!-- Side Navbar: End -->

      <!-- SECTION PURCHASED: START -->
      <section class="la-purchase--history">
          <div class="container">
            <div class="la-purchaseh__main-title text-3xl head-font pb-5 pb-lg-10">Purchase History</div>
          </div>
            <!-- Purchased Desktop Version: Start -->
          <div class="container d-none d-lg-block"> 
                <div class="la-purchaseh__item row">          
                  <div class="col-lg-4">
                    <div class="la-purchaseh__item-label la-purchaseh__item-label2 text-2xl head-font">Purchased                            </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <div class="la-purchaseh__item-label text-sm">On  </div>
                  </div>
                  <div class="col-lg-1">                   </div>
                  <div class="col-lg-1 text-center">
                    <div class="la-purchaseh__item-label text-sm">Payment Mode </div>
                  </div>
                  <div class="col-lg-1 px-0 text-center">
                    <div class="la-purchaseh__item-label text-sm">Total Price </div>
                  </div>
                  <div class="col-lg-1 text-center">
                    <div class="la-purchaseh__item-label text-sm">Payment Status </div>
                  </div>
                  <div class="col-lg-1 p-0 text-center">
                    <div class="la-purchaseh__item-label text-sm">Invoice </div>
                  </div>
                </div>

                @php
                    $purchase1 = new stdClass;
                    $purchase1->img = "https://picsum.photos/200/100";
                    $purchase1->course = "Photography";
                    $purchase1->creator = "Charlotte Floyd";
                    $purchase1->date = "20.01.19";
                    $purchase1->paymode = "payTM";
                    $purchase1->total = 39;
                    $purchase1->paystatus = "Paid";
                    $purchase1->invoice = "Invoice";
                    $purchase1->invoiceUrl = "";

                    $purchase2 = new stdClass;
                    $purchase2->img = "https://picsum.photos/200/100";
                    $purchase2->course = "Photography";
                    $purchase2->creator = "Charlotte Floyd";
                    $purchase2->date = "20.01.19";
                    $purchase2->paymode = "payTM";
                    $purchase2->total = 39;
                    $purchase2->paystatus = "Paid";
                    $purchase2->invoice = "Invoice";
                    $purchase2->invoiceUrl = "";

                    $purchases = array($purchase1, $purchase2)
                @endphp

                @foreach ($purchases as $purchase)
                    <x-purchase 
                        :img="$purchase->img"
                        :course="$purchase->course"
                        :creator="$purchase->creator"
                        :date="$purchase->date"
                        :paymode="$purchase->paymode"
                        :total="$purchase->total"
                        :paystatus="$purchase->paystatus"
                        :invoice="$purchase->invoice"
                        :invoiceUrl="$purchase->invoiceUrl"
                    />
                @endforeach
          </div>
            <!-- Purchased Desktop Version: Start -->

            <!-- Purchased Mobile Version: Start -->
          <div class="container ">
            <div class="la-ph__mobile d-block d-lg-none">
              <div class="la-ph__mobile-inner d-flex justify-content-between my-5">
                <div class="la-ph__course text-md">Course</div>
                <div class="la-ph__status text-md">Status</div>
              </div>
              <div class="la-purchaseh__item-label la-purchaseh__item-label2 text-xl head-font">Purchased</div>
            </div>
                  
              @php
                $purchase1 = new stdClass;
                $purchase1->img = "https://picsum.photos/100/100";
                $purchase1->course = "Photography";
                $purchase1->creator = "Charlotte Floyd";
                $purchase1->date = "20.01.19";
                $purchase1->paymode = "payTM";
                $purchase1->total = 39;
                $purchase1->paystatus = "Paid";
                $purchase1->invoice = "Invoice";
                $purchase1->invoiceUrl = "";

                $purchases = array($purchase1);
              @endphp

              @foreach ($purchases as $purchase)
                <x-purchase-mobile 
                    :img="$purchase->img"
                    :course="$purchase->course"
                    :creator="$purchase->creator"
                    :date="$purchase->date"
                    :paymode="$purchase->paymode"
                    :total="$purchase->total"
                    :paystatus="$purchase->paystatus"
                    :invoice="$purchase->invoice"
                    :invoiceUrl="$purchase->invoiceUrl"
                />
              @endforeach           
          </div>
          <!-- Purchased Mobile Version: End -->
      </section>
      <!-- SECTION PURCHASED: END -->


      <!-- SECTION RENT: START -->
      <section class="la-rto--main ">
         <!-- Section Rent Desktop Version : Start -->
        <div class="container d-none d-lg-block">
          <div class="la-rto__item row">         
            <div class="col-lg-4">
              <div class="la-rto__item-label la-rto__item-label2 text-2xl head-font">Rented                            </div>
            </div>
            <div class="col-lg-2 text-center">
              <div class="la-rto__item-label text-sm">From </div>
            </div>
            <div class="col-lg-1 text-center">
              <div class="la-rto__item-label text-sm">Until </div>
            </div>
            <div class="col-lg-1 text-center">
              <div class="la-rto__item-label text-sm">Payment Mode </div>
            </div>
            <div class="col-lg-1 px-0 text-center">
              <div class="la-rto__item-label text-sm">Total Price </div>
            </div>
            <div class="col-lg-1 text-center">
              <div class="la-rto__item-label text-sm">Payment Status</div>
            </div>
            <div class="col-lg-1 p-0 text-center">
              <div class="la-rto__item-label text-sm">Invoice </div>
            </div>
            <div class="col-lg-1 p-0 text-center">
              <div class="la-rto__item-label text-sm">Actions   </div>
            </div>
          </div>

          @php
            $rent1 = new stdClass;
            $rent1->img = "https://picsum.photos/200/100";
            $rent1->classes= "Classes 1 & 2";
            $rent1->course = "Photography";
            $rent1->creator = "Charlotte Floyd";
            $rent1->fromdate = "20.01.19";
            $rent1->todate = "20.01.20";
            $rent1->paymode = "payTM";
            $rent1->total = 39;
            $rent1->paystatus = "Paid";
            $rent1->invoice = "Invoice";
            $rent1->invoiceUrl = "";
            $rent1->upgrade = "Upgrade";
            $rent1->upgradeUrl = "";

            $rent2 = new stdClass;
            $rent2->img = "https://picsum.photos/200/100";
            $rent2->classes = "Course";
            $rent2->course = "Photography";
            $rent2->creator = "Charlotte Floyd";
            $rent2->fromdate = "20.01.19";
            $rent2->todate = "20.01.20";
            $rent2->paymode = "payTM";
            $rent2->total = 39;
            $rent2->paystatus = "Paid";
            $rent2->invoice = "Invoice";
            $rent2->invoiceUrl = "";
            $rent2->upgrade = "Renew";
            $rent2->upgradeUrl = "";

            $rents = array($rent1, $rent2);
          @endphp

          @foreach ($rents as $rent)
              <x-rent 
                  :img="$rent->img"
                  :classes="$rent->classes"
                  :course="$rent->course"
                  :creator="$rent->creator"
                  :fromdate="$rent->fromdate"
                  :todate="$rent->todate"
                  :paymode="$rent->paymode"
                  :total="$rent->total"
                  :paystatus="$rent->paystatus"
                  :invoice="$rent->invoice"
                  :invoiceUrl="$rent->invoiceUrl"
                  :upgrade="$rent->upgrade"
                  :upgradeUrl="$rent->upgradeUrl"
              />
          @endforeach
        </div>
       <!-- Section Rent Desktop Version: End -->

        <!-- Section Rent Mobile Version: Start -->
        <div class="container">
          <div class="la-ph__mobile d-block d-lg-none">
            <div class="la-purchaseh__item-label la-purchaseh__item-label2 text-xl head-font">Rented</div>
          </div>
                    
          @php
            $rent1 = new stdClass;
            $rent1->img = "https://picsum.photos/100/100";
            $rent1->classes= "Classes 1 & 2";
            $rent1->course = "Photography";
            $rent1->creator = "Charlotte Floyd";
            $rent1->fromdate = "20.01.19";
            $rent1->todate = "20.01.20";
            $rent1->paymode = "payTM";
            $rent1->total = 39;
            $rent1->paystatus = "Paid";
            $rent1->invoice = "Invoice";
            $rent1->invoiceUrl = "";
            $rent1->upgrade = "Upgrade";
            $rent1->upgradeUrl = "";

            $rents = array($rent1);
          @endphp

          @foreach ($rents as $rent)
            <x-rent-mobile 
                :img="$rent->img"
                :classes="$rent->classes"
                :course="$rent->course"
                :creator="$rent->creator"
                :fromdate="$rent->fromdate"
                :todate="$rent->todate"
                :paymode="$rent->paymode"
                :total="$rent->total"
                :paystatus="$rent->paystatus"
                :invoice="$rent->invoice"
                :invoiceUrl="$rent->invoiceUrl"
                :upgrade="$rent->upgrade"
                :upgradeUrl="$rent->upgradeUrl"
            />
          @endforeach
        </div>
        <!-- Section Rent Mobile Version: End-->
      </section>
       <!-- SECTION RENT: END -->
      

      <!-- SECTION FREE TRIAL: START -->
      <section class="la-rto--main">
          <!-- Section Free Trial Desktop Version: Start -->
          <div class="container d-none d-lg-block">
            <div class="la-rto__item row">         
              <div class="col-lg-4">
                <div class="la-rto__item-label la-rto__item-label2 text-2xl head-font">Free Trial                            </div>
              </div>
              <div class="col-lg-2 text-center">
                <div class="la-rto__item-label text-sm">From </div>
              </div>
              <div class="col-lg-1 text-center">
                <div class="la-rto__item-label text-sm">Until</div>
              </div>
              <div class="col-lg-1 text-center">
                <div class="la-rto__item-label text-sm">Payment Mode</div>
              </div>
              <div class="col-lg-1 px-0 text-center">
                <div class="la-rto__item-label text-sm">Total Price</div>
              </div>
              <div class="col-lg-1 text-center">
                <div class="la-rto__item-label text-sm">Payment Status </div>
              </div>
              <div class="col-lg-1 p-0 text-center">
                <div class="la-rto__item-label text-sm">Invoice </div>
              </div>
              <div class="col-lg-1 p-0 text-center">
                <div class="la-rto__item-label text-sm">Actions  </div>
              </div>
            </div>

            @php
              $trial1 = new stdClass;
              $trial1->img = "https://picsum.photos/200/100";
              $trial1->classes= "";
              $trial1->course = "Photography";
              $trial1->creator = "Charlotte Floyd";
              $trial1->fromdate = "20.01.19";
              $trial1->todate = "20.01.20";
              $trial1->paymode = "payTM";
              $trial1->total = 39;
              $trial1->paystatus = "Paid";
              $trial1->invoice = "Invoice";
              $trial1->invoiceUrl = "";
              $trial1->upgrade = "Renew";
              $trial1->upgradeUrl = "";

              $trials = array($trial1);
            @endphp

            @foreach ($trials as $trial)
                <x-rent 
                    :img="$trial->img"
                    :classes="$trial->classes"
                    :course="$trial->course"
                    :creator="$trial->creator"
                    :fromdate="$trial->fromdate"
                    :todate="$trial->todate"
                    :paymode="$trial->paymode"
                    :total="$trial->total"
                    :paystatus="$trial->paystatus"
                    :invoice="$trial->invoice"
                    :invoiceUrl="$trial->invoiceUrl"
                    :upgrade="$trial->upgrade"
                    :upgradeUrl="$trial->upgradeUrl"
                />
            @endforeach
          </div>
          <!-- Section Free Trial Desktop Version: End -->

            <!-- Section Free Trial Mobile Version: Start -->
          <div class="container">
            <div class="la-ph__mobile d-block d-lg-none">
              <div class="la-purchaseh__item-label la-purchaseh__item-label2 text-xl head-font">Free Trial</div>
            </div>
            
            @php
              $trial1 = new stdClass;
              $trial1->img = "https://picsum.photos/100/100";
              $trial1->classes= "";
              $trial1->course = "Photography";
              $trial1->creator = "Charlotte Floyd";
              $trial1->fromdate = "20.01.19";
              $trial1->todate = "20.01.20";
              $trial1->paymode = "payTM";
              $trial1->total = 39;
              $trial1->paystatus = "Paid";
              $trial1->invoice = "Invoice";
              $trial1->invoiceUrl = "";
              $trial1->upgrade = "Renew";
              $trial1->upgradeUrl = "";

              $trials = array($trial1);
            @endphp

            @foreach ($trials as $trial)
                <x-rent-mobile 
                    :img="$trial->img"
                    :classes="$trial->classes"
                    :course="$trial->course"
                    :creator="$trial->creator"
                    :fromdate="$trial->fromdate"
                    :todate="$trial->todate"
                    :paymode="$trial->paymode"
                    :total="$trial->total"
                    :paystatus="$trial->paystatus"
                    :invoice="$trial->invoice"
                    :invoiceUrl="$trial->invoiceUrl"
                    :upgrade="$trial->upgrade"
                    :upgradeUrl="$trial->upgradeUrl"
                />
            @endforeach
          </div>
          <!-- Section Free Trial Mobile Version: End -->
      </section>
      <!-- SECTION FREE TRIAL: END -->

      
      <!-- SECTION OTHERS: START -->
      <section class="la-rto--main">
        <!-- Section Others Desktop Version: Start -->
        <div class="container d-none d-lg-block">
          <div class="la-rto__item row">         
            <div class="col-lg-4">
              <div class="la-rto__item-label la-rto__item-label2 text-2xl head-font">Others                           </div>
            </div>
            <div class="col-lg-2 text-center">
              <div class="la-rto__item-label text-sm">From </div>
            </div>
            <div class="col-lg-1 text-center">
              <div class="la-rto__item-label text-sm">Until                     </div>
            </div>
            <div class="col-lg-1 text-center">
              <div class="la-rto__item-label text-sm">Payment Mode                      </div>
            </div>
            <div class="col-lg-1 px-0 text-center">
              <div class="la-rto__item-label text-sm">Total Price                       </div>
            </div>
            <div class="col-lg-1 text-center">
              <div class="la-rto__item-label text-sm">Payment Status                      </div>
            </div>
            <div class="col-lg-1 p-0 text-center">
              <div class="la-rto__item-label text-sm">Invoice </div>
            </div>
            <div class="col-lg-1 p-0 text-center">
              <div class="la-rto__item-label text-sm">Actions  </div>
            </div>
          </div>

          @php
            $other1 = new stdClass;
            $other1->img = "https://picsum.photos/200/100";
            $other1->classes= "";
            $other1->course = "Photography";
            $other1->creator = "Charlotte Floyd";
            $other1->fromdate = "20.01.19";
            $other1->todate = "20.01.20";
            $other1->paymode = "payTM";
            $other1->total = 39;
            $other1->paystatus = "Paid";
            $other1->invoice = "Invoice";
            $other1->invoiceUrl = "";
            $other1->upgrade = "Renew";
            $other1->upgradeUrl = "";

           
            $others = array($other1);
          @endphp

          @foreach ($others as $other)
              <x-rent 
                  :img="$other->img"
                  :classes="$other->classes"
                  :course="$other->course"
                  :creator="$other->creator"
                  :fromdate="$other->fromdate"
                  :todate="$other->todate"
                  :paymode="$other->paymode"
                  :total="$other->total"
                  :paystatus="$other->paystatus"
                  :invoice="$other->invoice"
                  :invoiceUrl="$other->invoiceUrl"
                  :upgrade="$other->upgrade"
                  :upgradeUrl="$other->upgradeUrl"
              />
          @endforeach

        </div>
        <!-- Section Others Desktop Version: End -->

        <!-- Section Others Mobile Version: Start -->
        <div class="container">
          <div class="la-ph__mobile d-block d-lg-none">
            <div class="la-purchaseh__item-label la-purchaseh__item-label2 text-xl head-font">Others</div>
          </div>

          @php
            $rent1 = new stdClass;
            $rent1->img = "https://picsum.photos/100/100";
            $rent1->classes= "";
            $rent1->course = "Photography";
            $rent1->creator = "Charlotte Floyd";
            $rent1->fromdate = "20.01.19";
            $rent1->todate = "20.01.20";
            $rent1->paymode = "payTM";
            $rent1->total = 39;
            $rent1->paystatus = "Paid";
            $rent1->invoice = "Invoice";
            $rent1->invoiceUrl = "";
            $rent1->upgrade = "Renew";
            $rent1->upgradeUrl = "";

            $rents = array($rent1);
          @endphp

          @foreach ($rents as $rent)
            <x-rent-mobile 
                :img="$rent->img"
                :classes="$rent->classes"
                :course="$rent->course"
                :creator="$rent->creator"
                :fromdate="$rent->fromdate"
                :todate="$rent->todate"
                :paymode="$rent->paymode"
                :total="$rent->total"
                :paystatus="$rent->paystatus"
                :invoice="$rent->invoice"
                :invoiceUrl="$rent->invoiceUrl"
                :upgrade="$rent->upgrade"
                :upgradeUrl="$rent->upgradeUrl"
            />
          @endforeach             
        </div>
        <!-- Section Others Mobile Version: End -->
      </section>
      <!-- SECTION OTHERS: END -->



       <!-- SECTION SUBSCRIPTION: START -->
       <section class="la-rto--main">
          <!-- Section Subscription Desktop Version: Start -->
          <div class="container d-none d-lg-block py-8">
              <div class="la-rto__item row">         
                  <div class="col-lg-4">
                  <div class="la-rto__item-label la-rto__item-label2 text-2xl head-font">Subscribed                            </div>
                  </div>
                  <div class="col-lg-2 text-center">
                  <div class="la-rto__item-label text-sm">From </div>
                  </div>
                  <div class="col-lg-1 text-center">
                  <div class="la-rto__item-label text-sm">Until  </div>
                  </div>
                  <div class="col-lg-1 text-center">
                  <div class="la-rto__item-label text-sm">Payment Mode</div>
                  </div>
                  <div class="col-lg-1 px-0 text-center">
                  <div class="la-rto__item-label text-sm">Total Price</div>
                  </div>
                  <div class="col-lg-1 text-center">
                  <div class="la-rto__item-label text-sm">Payment Status</div>
                  </div>
                  <div class="col-lg-1 p-0 text-center">
                  <div class="la-rto__item-label text-sm">Invoice </div>
                  </div>
                  <div class="col-lg-1 p-0 text-center">
                  <div class="la-rto__item-label text-sm">Actions</div>
                  </div>
              </div>

              @php
                  $sub1 = new stdClass;
                  $sub1->subscription = "Annual Subscription";
                  $sub1->fromdate = "20.01.19";
                  $sub1->todate = "20.01.20";
                  $sub1->paymode = "payTM";
                  $sub1->total = 423;
                  $sub1->paystatus = "Paid";
                  $sub1->invoice = "Invoice";
                  $sub1->invoiceUrl = "";
                  $sub1->renew = "Renew";
                  $sub1->renewUrl = "";
              
                  $subs = array($sub1);
              @endphp

              @foreach ($subs as $sub)
                  <x-subscription 
                      :subscription="$sub->subscription"
                      :fromdate="$sub->fromdate"
                      :todate="$sub->todate"
                      :paymode="$sub->paymode"
                      :total="$sub->total"
                      :paystatus="$sub->paystatus"
                      :invoice="$sub->invoice"
                      :invoiceUrl="$sub->invoiceUrl"
                      :renew="$sub->renew"
                      :renewUrl="$sub->renewUrl"
                  />
              @endforeach
          </div>
          <!-- Section Subscription Desktop Version: End -->

          <!-- Section Subscription Mobile Version: Start -->
          <div class="container">
              <div class="la-ph__mobile d-block d-lg-none ">
                  <div class="la-ph__mobile-inner d-flex justify-content-between my-5">
                  <div class="la-ph__course text-md">Subscription</div>
                  <div class="la-ph__status text-md">Status</div>
                  </div>
              </div>
                          
              @php
                  $sub1 = new stdClass;
                  $sub1->subscription = "Annual Subscription";
                  $sub1->fromdate = "20.01.19";
                  $sub1->todate = "20.01.20";
                  $sub1->paymode = "payTM";
                  $sub1->total = 423;
                  $sub1->paystatus = "Paid";
                  $sub1->invoice = "Invoice";
                  $sub1->invoiceUrl = "";
                  $sub1->renew = "Renew";
                  $sub1->renewUrl = "";
              
                  $subs = array($sub1);
              @endphp

              @foreach ($subs as $sub)
                  <x-subscription-mobile 
                      :subscription="$sub->subscription"
                      :fromdate="$sub->fromdate"
                      :todate="$sub->todate"
                      :paymode="$sub->paymode"
                      :total="$sub->total"
                      :paystatus="$sub->paystatus"
                      :invoice="$sub->invoice"
                      :invoiceUrl="$sub->invoiceUrl"
                      :renew="$sub->renew"
                      :renewUrl="$sub->renewUrl"
                  />
              @endforeach
                          
          </div>
          <!-- Section Subscription Mobile Version: End -->
      </section>
      <!-- SECTION SUBSCRIPTION: END -->
     
    </div>
  </div>
@endsection