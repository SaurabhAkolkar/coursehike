@extends('learners.layouts.app')

@section('seo_content')
    <title> Payment Successful </title>
@endsection

@section('content')
<section class="la-section la-payment__msg-section">
    <div class="la-section__inner">
        <div class="container px-lg-14">
            <div class="la-payment__msg-box text-center">
                @if ($msg ?? '' == 'success')
                    <div class="la-payment__msg-inner">
                        <div class="la-payment__msg-icon la-payment__msg-icon--success mb-8 d-flex align-items-center justify-content-center">
                            <span class="la-icon icon-tick"></span>
                        </div>
                        <h1 class="la-payment__msg-title mb-5">Thank you!</h1>
                        <p class="la-payment__msg-para mb-7">Your payment was successful. State learning from the best mentors across the globe!</p>
                        <div class="la-hero__actions">
                            <a class="d-inline-block la-btn__app py-3 text--black" href="">Go To Dashboard</a>
                        </div>
                    </div>
                @else
                    <div class="la-payment__msg-inner">
                        <div class="la-payment__msg-icon la-payment__msg-icon--failed mb-8 d-flex align-items-center justify-content-center">
                            <span class="la-icon icon-tick"></span>
                        </div>
                        <h1 class="la-payment__msg-title mb-5">Payment Unsuccessful!</h1>
                        <p class="la-payment__msg-para mb-7">Your payment failed. Reason for payment failure message displayed here.</p>
                        <div class="la-hero__actions d-flex flex-column">
                            <a class="la-btn" href="">Try Again</a>
                            <span class="la-btn__plain text--burple mt-4 text-uppercase text-spacing text--sm"><a href="">Go Back to Home</a></span>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection