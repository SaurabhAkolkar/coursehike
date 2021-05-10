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
            <div class="la-announcement__main-title d-lg-flex ">
                <a class="la-new__back la-icon la-icon--5xl icon-back-arrow ml-n2 ml-lg-n5 mt-n1 pr-lg-3 la-anim__stagger-item--x" href="{{URL::previous()}}"></a>
                <h1 class="text-3xl text-md-4xl mb-4 la-anim__stagger-item">New Releases</h1>
            </div>
          </div>

          <div class="col-12">
            <div class="la-new__announcements">

                  @if($release->layout == 1)
                        <x-new-update
                              :img="$release->previewImage"
                              :title="$release->title"
                              :timestamp="$release->created_at"
                              :desc="$release->short_description.' '.$release->long_description"
                              :updateId="$release->id"
                          />
                  @elseif($release->layout == 2)
                          <x-app-update
                                :title="$release->title"
                                :timestamp="$release->created_at"
                                :desc="$release->short_description.' '.$release->long_description"
                                :appId="$release->id"

                            />

                  @else
                        <x-new-event
                            :title="$release->title"
                            :timestamp="$release->created_at"
                            :about="$release->short_description"
                            :img="$release->preview_image"
                            :desc="$release->long_description"
                            :eventId="$release->id"

                          />
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
