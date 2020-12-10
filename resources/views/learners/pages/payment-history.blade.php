@extends('learners.layouts.app')

@section('content')
    <section class="la-section la-cbg--main">
        <div class="la-section__inner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="la-payment__history-title text-2xl text-md-4xl">Payment History</h1>
                    </div>

                    <div class="col-12 py-6 py-md-12">
                        <table class="table text-center table-hover la-payment__history-table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Invoice</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td><span class="la-icon icon-tick la-payment__history-success"></span></td>
                                    <td><div>LYP128GS</div></td>
                                    <td><div>20-12-2020</div></td>
                                    <td>
                                        <div class="d-inline-flex align-items-center">
                                            <span class="la-icon la-icon--xl icon-card-filled"></span>
                                            <span class="pl-2">Visa ending with 5525</span>
                                        </div>
                                    </td>
                                    <td><div>$45.00</div></td>
                                    <td>
                                        <div class="text-center">
                                            <a href="" role="button">
                                                <span class="la-icon la-icon--lg icon-download la-payment__history-invoice"></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class="la-icon icon-cancel la-payment__history-danger"></span></td>
                                    <td><div>LYP128GS</div></td>
                                    <td><div>20-12-2020</div></td>
                                    <td>
                                        <div class="d-inline-flex align-items-center">
                                            <span class="la-icon la-icon--xl icon-card-filled"></span>
                                            <span class="pl-2">Visa ending with 5525</span>
                                        </div>
                                    </td>
                                    <td><div>$45.00</div></td>
                                    <td>
                                        <div class="text-center">
                                            <a href="" role="button">
                                                <span class="la-icon la-icon--lg icon-download la-payment__history-invoice"></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class="la-icon icon-tick la-payment__history-success"></span></td>
                                    <td><div>LYP128GS</div></td>
                                    <td><div>20-12-2020</div></td>
                                    <td>
                                        <div class="d-inline-flex align-items-center">
                                            <span class="la-icon la-icon--xl icon-card-filled"></span>
                                            <span class="pl-2">Visa ending with 5525</span>
                                        </div>
                                    </td>
                                    <td><div>$45.00</div></td>
                                    <td>
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
    </section>

@endsection