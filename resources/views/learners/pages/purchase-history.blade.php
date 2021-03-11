@extends('learners.layouts.app')

@section('content')
<div class="la-profile">
    <div class="la-profile__wrap">

      <!-- Side Navbar: Start -->
      @include ('learners.pages.sidebar')
      <!-- Side Navbar: End -->
      <div class="la-profile__main">
        <div class="container la-anim__wrap">
          <div class="la-profile__main-inner pb-6 pb-md-20">
            <!-- SECTION PURCHASED: START -->
            <section class="la-purchase--history">
                <div class="container px-0 la-anim__stagger-item">
                  <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-3" href="{{URL::previous()}}"></a>
                  <div class="la-purchaseh__main-title text-3xl head-font mb-5 mb-lg-10">Purchase History</div>
                </div>
                  <!-- Purchased Desktop Version: Start -->

                @if(count($invoice) != 0 )
                <div class="container px-0"> 
                      <div class="d-none d-md-block">
                        <div class="la-purchaseh__item row mb-5 ">          
                          <div class="col-3 col-lg-4 la-anim__stagger-item--x">
                            <div class="la-purchaseh__item-label la-purchaseh__item-label2 text-sm text-md-2xl head-font">Invoice ID                            </div>
                          </div>
                          {{-- <div class="col-lg-1 "></div> --}}

                          <div class="col-3 col-lg-2 la-anim__stagger-item--x">
                            <div class="la-purchaseh__item-label text-sm">On  </div>
                          </div>
                          
                          {{-- <div class="col-lg-1"></div>
                          <div class="col-lg-1  la-anim__stagger-item--x">
                            <div class="la-purchaseh__item-label text-sm">Payment Mode </div>
                          </div> --}}

                          <div class="col-2 col-lg-1 la-anim__stagger-item--x">
                            <div class="la-purchaseh__item-label text-sm">Total Price </div>
                          </div>
                          <div class="col-2 col-lg-1  la-anim__stagger-item--x">
                            <div class="la-purchaseh__item-label text-sm">Payment Status </div>
                          </div>
                          <div class="col-2 col-lg-2  la-anim__stagger-item--x">
                            <div class="la-purchaseh__item-label text-sm">Invoice </div>
                          </div>
                        </div>
                      </div>

                      <div class="la-purchaseh__mobile row  d-block d-md-none">          
                        <div class="px-4 d-flex justify-content-between align-items-start mb-5">
                          <div class="col-10 px-0 la-purchaseh__item-label la-purchaseh__item-label2 text-md head-font  la-anim__stagger-item--x">Invoice ID </div>
                          <div class="col-2 px-0 la-purchaseh__item-label text-md la-anim__stagger-item--x">Status</div>
                        </div>
                      </div>


                      @foreach ($invoice as $i)
                          {{-- @foreach($i->details as $detail) --}}
                              <x-purchase 
                                  :date="Carbon\Carbon::parse($i->created_at)->format('d.M.Y')"
                                  :paymode="'PayTM'"
                                  :total="$i->total"
                                  :paystatus="$i->status"
                                  :invoice="$i->invoice_id"
                                  :invoiceUrl="'/download-invoice/'.$i->id"
                                  :id="$i->id"
                              />
                          {{-- @endforeach --}}
                      @endforeach
                </div>
                @else
                  <div class="la-anim__wrap">
                    <div class="la-anim__stagger-item">
                          <div class="la-empty__inner py-10">
                              <h6 class="la-empty__course-title text-center text-2xl text-md-3xl la-anim__stagger-item" style="color:var(--gray8);">No Purchase History.</h6>
                          </div>
                      </div>
                    </div>

                @endif
                  <!-- Purchased Desktop Version: End -->

                  <!-- Purchased Mobile Version: Start -->
               {{-- @if(count($invoice) != 0 )
                <div class="container ">
                  <div class="la-ph__mobile d-block d-lg-none la-anim__stagger-item">
                    <div class="la-ph__mobile-inner d-flex justify-content-between my-5">
                      <div class="la-ph__course text-md ">Course</div>
                      <div class="la-ph__status text-md">Status</div>
                    </div>
                    <div class="la-purchaseh__item-label la-purchaseh__item-label2 text-xl head-font pb-3">Purchased</div>
                  </div>
                  
                    @foreach ($invoice as $i)
                      @foreach($i->details as $detail)
                        <x-purchase-mobile 
                          :id="$detail->id"
                          :img="'https://picsum.photos/200/100'"
                          :course="$detail->course->title"
                          :creator="$detail->course->user->fullname"
                          :date="Carbon\Carbon::parse($detail->created_at)->isoFormat('D/M/YY')"
                          :paymode="'PayTM'"
                          :currency="$i->currency"
                          :total="$i->total"
                          :paystatus="$i->status"
                          :invoice="'Invoice'"
                          :invoiceUrl="'/download-invoice/'.$i->id"
                        />
                      @endforeach   
                    @endforeach        
                </div>
                @else
                    <div class="d-block d-lg-none la-anim__wrap">
                      <div class="d-md-flex justify-content-between align-items-start  la-anim__stagger-item" >
                          <div class="text-center py-6 la-empty__inner">
                          <h6 class="la-empty__course-title text-xl la-anim__stagger-item" style="color:var(--gray8);">No Purchase History.</h6>
                          </div>
                      </div>
                    </div>
                @endif --}}
                <!-- Purchased Mobile Version: End -->
            </section>
            <!-- SECTION PURCHASED: END -->

            {{-- <!-- SECTION RENT: START -->
            <section class="la-rto--main la-anim__wrap">
              <!-- Section Rent Desktop Version : Start -->
              <div class="container px-0 d-none d-lg-block">
                <div class="la-rto__item row">         
                  <div class="col-lg-4 la-anim__stagger-item--x">
                    <div class="la-rto__item-label la-rto__item-label2 text-2xl head-font">Rented                            </div>
                  </div>
                  <div class="col-lg-1"></div>
                  <div class="col-lg-1 text-center la-anim__stagger-item--x">
                    <div class="la-rto__item-label text-sm">From </div>
                  </div>
                  <div class="col-lg-1 text-center la-anim__stagger-item--x">
                    <div class="la-rto__item-label text-sm">Until </div>
                  </div>
                  <div class="col-lg-1 text-center la-anim__stagger-item--x">
                    <div class="la-rto__item-label text-sm">Payment Mode </div>
                  </div>
                  <div class="col-lg-1 px-0 text-center la-anim__stagger-item--x">
                    <div class="la-rto__item-label text-sm">Total Price </div>
                  </div>
                  <div class="col-lg-1 text-center la-anim__stagger-item--x">
                    <div class="la-rto__item-label text-sm">Payment Status</div>
                  </div>
                  <div class="col-lg-1 p-0 text-center la-anim__stagger-item--x">
                    <div class="la-rto__item-label text-sm">Invoice </div>
                  </div>
                  <div class="col-lg-1 p-0 text-center la-anim__stagger-item--x">
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
              <div class="container la-anim__wrap">
                <div class="la-ph__mobile d-block d-lg-none la-anim__stagger-item">
                  <div class="la-purchaseh__item-label la-purchaseh__item-label2 text-xl head-font pb-3">Rented</div>
                </div>
                          
                @php
                  $rent1 = new stdClass;
                  $rent1->img = "https://picsum.photos/100/100";
                  $rent1->classes= "Classes 1 & 2";
                  $rent1->course = "Photography";
                  $rent1->id = "rent1";
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
                      :id="$rent->id"
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
            <section class="la-rto--main la-anim__wrap">
                <!-- Section Free Trial Desktop Version: Start -->
                <div class="container px-0 d-none d-lg-block">
                  <div class="la-rto__item row">         
                    <div class="col-lg-4 la-anim__stagger-item--x">
                      <div class="la-rto__item-label la-rto__item-label2 text-2xl head-font">Free Trial                            </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-1 text-center la-anim__stagger-item--x">
                      <div class="la-rto__item-label text-sm">From </div>
                    </div>
                    <div class="col-lg-1 text-center la-anim__stagger-item--x">
                      <div class="la-rto__item-label text-sm">Until</div>
                    </div>
                    <div class="col-lg-1 text-center la-anim__stagger-item--x">
                      <div class="la-rto__item-label text-sm">Payment Mode</div>
                    </div>
                    <div class="col-lg-1 px-0 text-center la-anim__stagger-item--x">
                      <div class="la-rto__item-label text-sm">Total Price</div>
                    </div>
                    <div class="col-lg-1 text-center la-anim__stagger-item--x">
                      <div class="la-rto__item-label text-sm">Payment Status </div>
                    </div>
                    <div class="col-lg-1 p-0 text-center la-anim__stagger-item--x">
                      <div class="la-rto__item-label text-sm">Invoice </div>
                    </div>
                    <div class="col-lg-1 p-0 text-center la-anim__stagger-item--x">
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
                <div class="container la-anim__wrap">
                  <div class="la-ph__mobile d-block d-lg-none la-anim__stagger-item">
                    <div class="la-purchaseh__item-label la-purchaseh__item-label2 text-xl head-font pb-3">Free Trial</div>
                  </div>
                  
                  @php
                    $trial1 = new stdClass;
                    $trial1->img = "https://picsum.photos/100/100";
                    $trial1->classes= "";
                    $trial1->course = "Photography";
                    $trial1->creator = "Charlotte Floyd";
                    $trial1->id = "trial1";
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
                          :id="$trial->id"
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
            <section class="la-rto--main la-anim__wrap">
              <!-- Section Others Desktop Version: Start -->
              <div class="container px-0 d-none d-lg-block">
                <div class="la-rto__item row">         
                  <div class="col-lg-4 la-anim__stagger-item--x">
                    <div class="la-rto__item-label la-rto__item-label2 text-2xl head-font">Others                           </div>
                  </div>
                  <div class="col-lg-1"></div>
                  <div class="col-lg-1 text-center la-anim__stagger-item--x">
                    <div class="la-rto__item-label text-sm">From </div>
                  </div>
                  <div class="col-lg-1 text-center la-anim__stagger-item--x">
                    <div class="la-rto__item-label text-sm">Until                     </div>
                  </div>
                  <div class="col-lg-1 text-center la-anim__stagger-item--x">
                    <div class="la-rto__item-label text-sm">Payment Mode                      </div>
                  </div>
                  <div class="col-lg-1 px-0 text-center la-anim__stagger-item--x">
                    <div class="la-rto__item-label text-sm">Total Price                       </div>
                  </div>
                  <div class="col-lg-1 text-center la-anim__stagger-item--x">
                    <div class="la-rto__item-label text-sm">Payment Status                      </div>
                  </div>
                  <div class="col-lg-1 p-0 text-center la-anim__stagger-item--x">
                    <div class="la-rto__item-label text-sm">Invoice </div>
                  </div>
                  <div class="col-lg-1 p-0 text-center la-anim__stagger-item--x">
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
              <div class="container la-anim__wrap">
                <div class="la-ph__mobile d-block d-lg-none la-anim__stagger-item">
                  <div class="la-purchaseh__item-label la-purchaseh__item-label2 text-xl head-font pb-3">Others</div>
                </div>

                @php
                  $other1 = new stdClass;
                  $other1->img = "https://picsum.photos/100/100";
                  $other1->classes= "";
                  $other1->course = "Photography";
                  $other1->creator = "Charlotte Floyd";
                  $other1->id = "other1";
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
                  <x-rent-mobile 
                      :img="$other->img"
                      :classes="$other->classes"
                      :course="$other->course"
                      :creator="$other->creator"
                      :id="$other->id"
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
              <!-- Section Others Mobile Version: End -->
            </section>
            <!-- SECTION OTHERS: END -->

            <!-- SECTION SUBSCRIPTION: START -->
            <section class="la-rto--main la-anim__wrap">
                <!-- Section Subscription Desktop Version: Start -->
                <div class="container px-0 d-none d-lg-block py-8">
                    <div class="la-rto__item row">         
                        <div class="col-lg-4 la-anim__stagger-item--x">
                          <div class="la-rto__item-label la-rto__item-label2 text-2xl head-font">Subscribed                            </div>
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-1 text-center la-anim__stagger-item--x">
                        <div class="la-rto__item-label text-sm">From </div>
                        </div>
                        <div class="col-lg-1 text-center la-anim__stagger-item--x">
                        <div class="la-rto__item-label text-sm">Until  </div>
                        </div>
                        <div class="col-lg-1 text-center la-anim__stagger-item--x">
                        <div class="la-rto__item-label text-sm">Payment Mode</div>
                        </div>
                        <div class="col-lg-1 px-0 text-center la-anim__stagger-item--x">
                        <div class="la-rto__item-label text-sm">Total Price</div>
                        </div>
                        <div class="col-lg-1 text-center la-anim__stagger-item--x">
                        <div class="la-rto__item-label text-sm">Payment Status</div>
                        </div>
                        <div class="col-lg-1 p-0 text-center la-anim__stagger-item--x">
                        <div class="la-rto__item-label text-sm">Invoice </div>
                        </div>
                        <div class="col-lg-1 p-0 text-center la-anim__stagger-item--x">
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
                <div class="container la-anim__wrap">
                    <div class="la-ph__mobile d-block d-lg-none la-anim__stagger-item">
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
            <!-- SECTION SUBSCRIPTION: END --> --}}
          
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection