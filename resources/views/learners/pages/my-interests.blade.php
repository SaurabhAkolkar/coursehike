@extends('learners.layouts.app')

@section('content')
    <div class="la-profile__wrap">

        <!-- Side Navbar: Start -->
        @include ('learners.pages.sidebar')
        <!-- Side Navbar: End -->

        <div class="la-profile__main">
            <div class="container">
              <div class="la-profile__main-inner">
                <div class="la-profile__title-wrap m-0">
                  <a class="la-icon la-icon--5xl icon-back-arrow d-block d-md-none ml-n1 mt-n2 mb-5" href="#"></a>
                  <h1 class="la-profile__title ">Interests</h1>
                </div>

                <section class="la-section la-interests__sec">
                    <div class="la-interests__inner">
                        <div class="la-interests__title">Your Interests</div>
                        <ul class="la-interests__list d-md-flex justify-content-start">
                            
                            @php
                                $interest1 = new stdClass;
                                $interest1->img = "https://picsum.photos/100/100";
                                $interest1->name = "Design";

                                $interest2 = new stdClass;
                                $interest2->img = "https://picsum.photos/100/100";
                                $interest2->name = "Rangoli";

                                $interest3 = new stdClass;
                                $interest3->img = "https://picsum.photos/100/100";
                                $interest3->name = "Dance";

                                $interest4 = new stdClass;
                                $interest4->img = "https://picsum.photos/100/100";
                                $interest4->name = "Music";

                                $interest5 = new stdClass;
                                $interest5->img = "https://picsum.photos/100/100";
                                $interest5->name = "Makeup";

                                $interest6 = new stdClass;
                                $interest6->img = "https://picsum.photos/100/100";
                                $interest6->name = "Tattoo";

                                $interest7 = new stdClass;
                                $interest7->img = "https://picsum.photos/100/100";
                                $interest7->name = "Fashion";

                                $interest8 = new stdClass;
                                $interest8->img = "https://picsum.photos/100/100";
                                $interest8->name = "Photography";

                                $interests = array($interest1, $interest2, $interest3, $interest4);
                            @endphp

                            @if(count($myInterests))
                                @foreach ($myInterests as $interest)
                                    <x-my-interest
                                        :img="'https://picsum.photos/100/100'"
                                        :name="$interest->category->title"
                                    />
                                @endforeach
                            @endif
                        </ul>

                        <div class="la-interests__like">
                            <div class="la-interests__title">You might also like</div>
                            <ul class="la-interests__list d-md-flex justify-content-start">
                                @php
                                    $interests = array($interest1, $interest2, $interest3, $interest4, $interest5, $interest6, $interest7, $interest8);
                                @endphp

                                @foreach ($otherCategories as $category)
                                    <x-my-interest
                                        :img="'https://picsum.photos/100/100'"
                                        :name="$category->title"
                                    />
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </section>
              </div>
            </div>
        </div>
    </div>
@endsection