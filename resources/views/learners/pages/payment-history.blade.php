@extends('learners.layouts.app')

@section('content')

<div class="la-profile">
    <div class="la-profile__wrap">
      
       <!-- Side Navbar: Start -->
       @include ('learners.pages.sidebar')
       <!-- Side Navbar: End --> 

        <div class="la-profile__main pb-md-20">
            <div class="container la-anim__wrap">
                <div class="la-profile__main-inner ">
                    <h1 class="la-profile__title text-2xl text-lg-4xl  la-anim__stagger-item">
                        <a href="/billing" role="button" style="color: var(--app-indigo-1)">Billing</a>/
                            Payment History
                    </h1>
                    <div class="row">
                        <div class="col-12 py-6 py-md-12">
                            <div class="la-payment__history-tablelayout">
                                <table class="table text-center table-hover la-payment__history-table la-anim__stagger-item--x">
                                    <thead>
                                        <tr>
                                            <th class="la-anim__stagger-item--x" scope="col">#</th>
                                            <th class="la-anim__stagger-item--x" scope="col">ID</th>
                                            <th class="la-anim__stagger-item--x" scope="col">Date</th>
                                            <th class="la-anim__stagger-item--x" scope="col">Payment Method</th>
                                            <th class="la-anim__stagger-item--x" scope="col">Amount</th>
                                            <th class="la-anim__stagger-item--x" scope="col">Invoice</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td class="la-anim__stagger-item--x"><span class="la-icon icon-tick la-payment__history-success"></span></td>
                                            <td class="la-anim__stagger-item--x"><div>LYP128GS</div></td>
                                            <td class="la-anim__stagger-item--x"><div>20-12-2020</div></td>
                                            <td class="la-anim__stagger-item--x">
                                                <div class="d-inline-flex align-items-center">
                                                    <span class="la-icon la-icon--xl icon-card-filled"></span>
                                                    <span class="pl-2">Visa ending with 5525</span>
                                                </div>
                                            </td>
                                            <td class="la-anim__stagger-item--x"><div>$45.00</div></td>
                                            <td class="la-anim__stagger-item--x">
                                                <div class="text-center">
                                                    <a href="" role="button">
                                                        <span class="la-icon la-icon--lg icon-download la-payment__history-invoice"></span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="la-anim__stagger-item--x"><span class="la-icon icon-cancel la-payment__history-danger"></span></td>
                                            <td class="la-anim__stagger-item--x"><div>LYP128GS</div></td>
                                            <td class="la-anim__stagger-item--x"><div>20-12-2020</div></td>
                                            <td class="la-anim__stagger-item--x">
                                                <div class="d-inline-flex align-items-center">
                                                    <span class="la-icon la-icon--xl icon-card-filled"></span>
                                                    <span class="pl-2">Visa ending with 5525</span>
                                                </div>
                                            </td>
                                            <td class="la-anim__stagger-item--x"><div>$45.00</div></td>
                                            <td class="la-anim__stagger-item--x">
                                                <div class="text-center">
                                                    <a href="" role="button">
                                                        <span class="la-icon la-icon--lg icon-download la-payment__history-invoice"></span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="la-anim__stagger-item--x"><span class="la-icon icon-tick la-payment__history-success"></span></td>
                                            <td class="la-anim__stagger-item--x"><div>LYP128GS</div></td>
                                            <td class="la-anim__stagger-item--x"><div>20-12-2020</div></td>
                                            <td class="la-anim__stagger-item--x">
                                                <div class="d-inline-flex align-items-center">
                                                    <span class="la-icon la-icon--xl icon-card-filled"></span>
                                                    <span class="pl-2">Visa ending with 5525</span>
                                                </div>
                                            </td>
                                            <td class="la-anim__stagger-item--x"><div>$45.00</div></td>
                                            <td class="la-anim__stagger-item--x">
                                                <div class="text-center">
                                                    <a href="" role="button">
                                                        <span class="la-icon la-icon--lg icon-download la-payment__history-invoice"></span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection