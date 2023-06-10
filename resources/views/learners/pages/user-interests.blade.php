@extends('learners.layouts.app')
@section('seo_content')
    <title>Interests | Learn Anything Artistic Online | Start For Free Today | LILA</title>
    <meta name='description' itemprop='description' content='Creative online course for creative minds. Discover & learn classes on art,design, baking, tattoo making & much more. Start your free trial with LILA now' />

    <meta property="og:description" content="Creative online course for creative minds. Discover & learn classes on art,design, baking, tattoo making & much more. Start your free trial with LILA now" />
    <meta property="og:title" content="Interests | Learn Anything Artistic Online | Start For Free Today | LILA" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="LILA Art" />
    <meta property="og:image" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:url" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:size" content="300" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Interests | Learn Anything Artistic Online | Start For Free Today | LILA" />
    <meta name="twitter:site" content="@lilaaliens" />

    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"Dashboard | Learn Anything Artistic Online | Start For Free Today | LILA"}</script>
@endsection


@section('content')
    <section class="la-cdashboard-main">
        <div class="la-section la-section__inner">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 offset-md-3 text-center">
                        <div class="la-dashboard__interests">
                            <h1 class="la-cdashboard__user-name mb-2 text-3xl text-md-4xl text-capitalize">
                                Welcome 
                                <span style="color:var(--app-indigo-1);">Nathan!</span>
                            </h1>
                            <p class="la-dashboard__interests-tag">Let's explore something extraordinary <br class="d-none d-md-block"/> and learn it like aliens.</p>
                        </div>

                       
                        <div class="la-interests__like">
                            <div class="la-interests__title mb-6">You might also like</div>
                                
                                    @php
                                        $interest1 = new stdClass;                        
                                        $interest1->img = "../images/learners/dashboard/hp1.png";
                                        $interest1->name = "Photography";
                                        $interest1->id = "1";
            
                                        $interest2 = new stdClass;                           
                                        $interest2->img = "../images/learners/dashboard/hp1.png";
                                        $interest2->name = "Photography";
                                        $interest2->id = "2";
            
                                        $interest3 = new stdClass;
                                        $interest3->img = "../images/learners/dashboard/hp1.png";
                                        $interest3->name = "Photography";
                                        $interest3->id = "3";
                                        
                                        $interests = array( $interest1, $interest2, $interest3);
                                    @endphp
                                    
                                <div class="row">
                                    @foreach ($interests as $interest)
                                        <user-interests
                                            :img="$interest->img"
                                            :name="$interest->name"
                                            :id="$interest->id"
                                        />
                                    @endforeach
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection