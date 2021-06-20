@extends('learners.layouts.app')

@section('seo_content')
    <title>New Releases | Learn Tattoo & Graphic Design | LILA </title>
    <meta name='description' itemprop='description' content='Check out all the New Releases on tattoo, graphic design, digital art from basic to advanced mentored by Globally reconginized artists' />

    <meta property="og:description" content="Check out all the New Releases on tattoo, graphic design, digital art from basic to advanced mentored by Globally reconginized artists" />
    <meta property="og:title" content="New Releases | Learn Tattoo & Graphic Design | LILA" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="LILA Art" />
    <meta property="og:image" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:url" content="{{config('app.url')}}/images/learners/logo.svg" />
    <meta property="og:image:size" content="300" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="New Releases | Learn Tattoo & Graphic Design | LILA" />
    <meta name="twitter:site" content="@lilaaliens" />

    <script type="application/ld+json">{"@context":"https://schema.org","@type":"WebPage","name":"New Releases | Learn Tattoo & Graphic Design | LILA"}</script>
@endsection

@section('content')
 <!-- Main Section: Start-->
 <section class="la-section__small la-cbg--main">
    <!-- Section: Start-->
    <section class="la-new--releases">
      <div class="container la-new__events ">
        <div class="row la-anim__wrap">
          <div class="col-12">
            <div class="la-announcement__main-title d-lg-flex la-anim__stagger-item">
                <a class="la-new__back la-icon la-icon--5xl icon-back-arrow ml-n2 ml-lg-n5 mt-n1 pr-lg-3 " href="{{URL::previous()}}" style="color:var(--gray4);"></a>
                <h1 class="text-3xl text-lg-4xl mb-3">New Releases</h1>
            </div>
          </div>

          <div class="col-12">
            <div class="la-new__announcements">

                @if(count($allReleases))      
                
                  @foreach ($allReleases as $ar)
                    @if($ar->layout == 1)
                          <x-new-update
                                :img="asset('images/announcement/'.$ar->preview_image)"
                                :title="$ar->title"
                                :timestamp="$ar->created_at"
                                :updateId="$ar->id"
                                :desc="$ar->short_description.' '.$ar->long_description"
                            />
                    @elseif($ar->layout == 2)
                            <x-app-update
                                  :title="$ar->title"
                                  :timestamp="$ar->created_at"
                                  :appId="$ar->id"
                                  :desc="$ar->short_description.' '.$ar->long_description"
                              />

                    @else
                          <x-new-event
                              :title="$ar->title"
                              :timestamp="$ar->created_at"
                              :about="$ar->short_description"
                              :img="asset('images/announcement/'.$ar->preview_image)"
                              :eventId="$ar->id"
                              :desc="$ar->long_description"
                            />
                    @endif
                    
                @endforeach

                @else

                <div class="col-12">
            
                  <div class="col-12 px-0 my-auto la-anim__wrap">
                    <div class="la-empty__inner py-10">
                      <h6 class="la-empty__course-title text-center text-2xl text-md-3xl la-anim__stagger-item" style="color:var(--gray8);">
                          No new Releases yet.
                      </h6>
                    </div>
                  </div>
      
                 
                </div>
                @endif
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- Section: End-->
  </section>
  <!-- Main Section: End-->
@endsection