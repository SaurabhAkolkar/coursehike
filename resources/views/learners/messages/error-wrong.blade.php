@extends('learners.layouts.app')

@section('seo_content')
    <title> Something went wrong </title>
@endsection

@section('content')
<section class="la-cbg--main">
    <div class="la-section__small">
        <div class="la-section__inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 h-100 py-6">
                        <div class="la-status__error-page">
                            <img src="../images/learners/status/error-wrong.svg" data-src="../images/learners/status/error-wrong.svg" alt="Something went wrong" class="lazy w-100 img-fluid d-block mx-auto" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection