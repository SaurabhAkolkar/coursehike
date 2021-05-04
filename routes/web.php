<?php

use App\FaqStudent;
use App\FaqInstructor;
use App\User;
use App\Setting;
use App\CourseClass;
use Barryvdh\DomPDF\Facade as PDF;

// dd(Auth::user());
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['web'])->group(function () {
    Route::view('/accessdenied','accessdenied')->name('inactive');
    Route::get('/install/proceed/Eula','InstallerController@eula')->name('installer');
    Route::post('/install/proceed/Eula','InstallerController@storeeula')->name('store.eula');
    Route::get('/install/proceed/servercheck','InstallerController@serverCheck')->name('servercheck');
    Route::post('/install/proceed/servercheck','InstallerController@storeserver')->name('store.server');

    Route::get('verifylicense','InstallerController@verifylicense')->name('verifylicense');
    Route::get('install/proceed/verifyapp','InstallerController@verify')->name('verifyApp');
    Route::post('verifycode','InitializeController@verify');

    Route::get('/install/proceed/step1','InstallerController@index')->name('installApp');

    Route::post('store/step1','InstallerController@step1')->name('store.step1');
    Route::get('get/step2','InstallerController@getstep2')->name('get.step2');
    Route::post('store/step2','InstallerController@step2')->name('store.step2');
    Route::get('get/step3','InstallerController@getstep3')->name('get.step3');
    Route::post('store/step3','InstallerController@storeStep3')->name('store.step3');
    Route::get('get/step4','InstallerController@getstep4')->name('get.step4');
    Route::post('store/step4','InstallerController@storeStep4')->name('store.step4');
    Route::get('get/step5','InstallerController@getstep5')->name('get.step5');
    Route::post('store/step5','InstallerController@storeStep5')->name('store.step5');

    Route::get('bigblue/api/callback','BigBlueController@logout');
});


Route::view('/ipblock','ipblock')->name('ip.block');

  
Route::middleware(['web','IsInstalled' ,'switch_languages', 'ip_block'])->group(function () {

    // Auth Routes
    Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
    Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');


    Route::middleware(['is_verified'])->group(function () {
  
        //  Route::get('/', function () {
        //     return view('home');
        //  });

        Route::get('/', 'HomeController@index');

        Route::get('/home', 'HomeController@index')->name('home');

    });

    Auth::routes();

    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
 

    Route::prefix('admins')->group(function (){
        Route::get('/', 'AdminController@index')->name('admin.index');
    });
  

    Route::middleware(['web', 'is_active', 'auth', 'is_admin', 'switch_languages'])->group(function () {

      // Player Settings
      Route::get('/admin/playersetting','PlayerSettingController@get')->name('player.set');
      Route::post('/admin/playersetting/update','PlayerSettingController@update')->name('player.update');


      Route::get('admin/ads','AdsController@getAds')->name('ads');
      Route::post('admin/ads/insert','AdsController@store')->name('ad.store');

      Route::get('admin/ads/setting','AdsController@getAdsSettings')->name('ad.setting');

      Route::put('admin/ads/timer','AdsController@updateAd')->name('ad.update');

      Route::put('admin/ads/pop','AdsController@updatePopAd')->name('ad.pop.update');

      Route::delete('admin/ads/delete/{id}','AdsController@delete')->name('ad.delete');

      Route::get('admin/ads/create','AdsController@create')->name('ad.create');

      Route::get('admin/ads/edit/{id}','AdsController@showEdit')->name('ad.edit');

      Route::put('admin/ads/edit/{id}','AdsController@updateADSOLO')->name('ad.update.solo');

      Route::put('admin/ads/video/{id}','AdsController@updateVideoAD')->name('ad.update.video');

      Route::post('admin/ads/bulk_delete', 'AdsController@bulk_delete');

      Route::post('/quickupdate/course/{id}','QuickUpdateController@courseQuick')->name('course.quick');
      Route::post('/quickupdate/user/{id}','QuickUpdateController@userQuick')->name('user.quick');
      Route::post('/quickupdate/slider/{id}','QuickUpdateController@sliderQuick')->name('slider.quick');
      Route::post('/quickudate/course/{id}','QuickUpdateController@courseabc')->name('course.featured');
      Route::post('/quickupdate/category/{id}','QuickUpdateController@categoryQuick')->name('category.quick');
      Route::post('/quickupdate/language/{id}','QuickUpdateController@languageQuick')->name('language.quick');
      Route::post('/quickupdate/pag/{id}','QuickUpdateController@pageQuick')->name('page.quick');
      Route::post('/quickupdate/what/{id}','QuickUpdateController@whatQuick')->name('what.quick');
      Route::post('/quickupdate/ansr/{id}','QuickUpdateController@ansrQuick')->name('ansr.quick');
      Route::post('/quickupdate/Chapter/{id}','QuickUpdateController@ChapterQuick')->name('Chapter.quick');
      Route::post('/quickupdate/testimonial/{id}','QuickUpdateController@testimonialQuick')->name('testimonial.quick');
      Route::post('/quickupdate/subcategory/{id}','QuickUpdateController@subcategoryQuick')->name('subcategory.quick');
      Route::post('/quickupdate/childcategory/{id}','QuickUpdateController@childcategoryQuick')->name('childcategory.quick');
      Route::post('/quickupdate/y/{id}','QuickUpdateController@categoryfQuick')->name('categoryf.quick');
      Route::post('/quickupdate/blog_status/{id}','QuickUpdateController@blog_statusQuick')->name('blog.status.quick');
      Route::post('/quickupdate/blog_approved/{id}','QuickUpdateController@blog_approvedQuick')->name('blog.approved.quick');
      Route::post('/quickupdate/status/{id}','QuickUpdateController@reviewstatusQuick')->name('reviewstatus.quick');
      Route::post('/quickupdate/approved/{id}','QuickUpdateController@reviewapprovedQuick')->name('reviewapproved.quick');
      Route::post('/quickupdate/featured/{id}','QuickUpdateController@reviewfeaturedQuick')->name('reviewfeatured.quick');
      Route::post('/quickupdate/faq/{id}','QuickUpdateController@faqQuick')->name('faq.quick');
      Route::post('/quickupdate/faqinstructor/{id}','QuickUpdateController@faqInstructorQuick')->name('faqInstructor.quick');

      Route::post('/quickupdate/order/{id}','QuickUpdateController@orderQuick')->name('order.quick');
      Route::get('/user/subscriptions/add-class/{id}','UserController@addClass');
      Route::get('/user/subscriptions/add-course/{id}','UserController@addCourse');
      Route::get('/get-classes','UserController@getClasses');
      Route::post('/add-user-class','UserController@addUserCourse')->name('addusercourse');
      Route::post('/add-bundle-course','UserController@addBundleCourse')->name('addbundlecourse');

      Route::get('/user/subscription/create/{id}','UserController@addSubscription')->name('create.subscription');
      Route::post('/user/subscription/store','UserController@storeSubscription')->name('store.subscription');

      Route::prefix('user')->group(function (){
        Route::get('/','UserController@viewAllUser')->name('user.index');
        Route::get('/learners','UserController@learners')->name('user.learners');
        Route::get('/subscribed','UserController@subscribed')->name('user.subscribed');
        Route::get('/ontrial','UserController@ontrial')->name('user.ontrial');
        Route::get('/adduser','UserController@create')->name('user.add');
        Route::post('/insertuser','UserController@store')->name('user.store');
        Route::get('/subscriptions/{id}','UserController@subscriptions')->name('user.subscriptions');
        Route::get('/subscriptions/add','UserController@addSubscriptions')->name('user.addSubscription');
        Route::get('edit/{id}','UserController@edit')->name('user.edit');
        Route::put('/edit/{id}','UserController@update')->name('user.update');   
        Route::delete('delete/{id}','UserController@destroy')->name('user.delete');
      });

      Route::resource("admin/country","CountryController");
      Route::resource("admin/state","StateController");
      Route::resource("admin/city","CityController");

      Route::resource('page','PageController');
      Route::resource('/testimonial','TestimonialController');
      Route::resource('slider','SliderController');
      Route::resource('trusted','TrustedController');
      

      Route::post('mailsetting/update','SettingController@updateMailSetting')->name('update.mail.set');
      Route::get('settings','SettingController@genreal')->name('gen.set');
      Route::post('setting/store','SettingController@store')->name('setting.store');
      Route::post('setting/seo','SettingController@updateSeo')->name('seo.set');
      Route::post('setting/addcss','SettingController@storeCSS')->name('css.store');
      Route::post('setting/addjs','SettingController@storeJS')->name('js.store');
      Route::post('setting/sociallogin/fb','SettingController@slfb')->name('sl.fb');
      Route::post('setting/sociallogin/gl','SettingController@slgl')->name('sl.gl');
      Route::post('setting/sociallogin/git','SettingController@slgit')->name('sl.git');
      Route::post('setting/sociallogin/amazon','SettingController@slamazon')->name('sl.amazon');
      Route::post('setting/sociallogin/linkedin','SettingController@sllinkedin')->name('sl.linkedin');
      Route::post('setting/sociallogin/twitter','SettingController@sltwitter')->name('sl.twitter');

      Route::get('/admin/api','ApiController@setApiView')->name('api.setApiView');
      Route::post('admin/api','ApiController@changeEnvKeys')->name('api.update');
      Route::put('/review/update/{id}','ReviewratingController@update')
      ->name('review.update');

      Route::resource('facts', 'SliderfactsController');
      Route::get('coursetext', 'CoursetextController@show');
      Route::put('coursetext/update', 'CoursetextController@update');
      Route::get('getstarted', 'GetstartedController@show');
      Route::put('getstarted/update', 'GetstartedController@update');
      Route::resource('hometext', 'HomeTextController');
      Route::get('terms', 'TermsController@show')->name('termscondition');
      Route::put('termscondition', 'TermsController@update');
      Route::get('policy', 'TermsController@showpolicy')->name('policy');
      Route::put('privacypolicy', 'TermsController@updatepolicy');

      Route::resource('reports','ReportReviewController');
      
      Route::get('aboutpage', 'AboutController@show')->name('about.page');
      Route::put('aboutupdate', 'AboutController@update');
      Route::get('comingsoon', 'ComingSoonController@show')->name('comingsoon.page');
      Route::put('comingsoonupdate', 'ComingSoonController@update');
      Route::get('careers', 'CareersController@show')->name('careers.page');
      Route::put('careers/update', 'CareersController@update');
      Route::resource('faq','FaqController');
      Route::resource('faqinstructor','FaqInstructorController');
      Route::resource('carts', 'CartController');

      Route::get('currency', 'CurrencyController@show');
      Route::put('currency/update', 'CurrencyController@update');
      

      Route::get('widget', 'WidgetController@edit')->name('widget.setting');
      Route::put('widget/update', 'WidgetController@update');

      Route::get('/firstsection', 'FirstSectionController@index');
      Route::get('/firstsection/remove-video', 'FirstSectionController@removeVideo');
      Route::put('firstsection/update', 'FirstSectionController@update');
      
      Route::get('/featuredMentors', 'FeaturedMentorController@index');
      Route::get('/featuredMentors/create', 'FeaturedMentorController@create');
      Route::post('/featuredMentors/store', 'FeaturedMentorController@store');
      Route::get('/featuredMentors/edit/{id}', 'FeaturedMentorController@edit')->name('featuredmentor.edit');
      Route::post('/featuredMentors/update', 'FeaturedMentorController@update');
      Route::get('/featuredMentors/getcourses', 'FeaturedMentorController@getCourses');
      Route::delete('/featuredMentors/{id}', 'FeaturedMentorController@delete');



      Route::post('admin/class/{id}/addsubtitle','SubtitleController@post')->name('add.subtitle');
      Route::post('admin/class/{id}/delete/subtitle','SubtitleController@delete')->name('del.subtitle');

      Route::post('admin/class/{id}/audiotrack','AudioTrackController@post')->name('add.audiotrack');
      Route::delete('admin/class/{id}/audiotrack','AudioTrackController@delete')->name('del.audiotrack');


      Route::get('frontslider', 'CategorySliderController@show')->name('category.slider');
      Route::put('frontslider/update', 'CategorySliderController@update');

      Route::resource('requestinstructor', 'InstructorRequestController');

      Route::resource('coupon','CouponController');

      Route::get('all/instructor', 'InstructorRequestController@allinstructor')->name('all.instructor');

      Route::get('instructor/edit-addition-details/{id}', 'InstructorRequestController@editMentorDetails');

      Route::post('instructor/update-addition-details','InstructorRequestController@updateDetails')->name('instructor.update.details');
      
      Route::get('view/order/admin/{id}', 'OrderController@vieworder')->name('view.order');

      Route::resource('user/course/report','CourseReportController');

      Route::get('banktransfer', 'BankTransferController@show')->name('bank.transfer');
      Route::put('banktransfer/update', 'BankTransferController@update');

      Route::get('admin/lang', 'LanguageController@showlang')->name('show.lang');

      Route::get('admin/frontstatic/{local}', 'LanguageController@frontstaticword')->name('frontstatic.lang');

      Route::post('/admin/update/{lang}/frontTranslations/content','LanguageController@frontupdate')->name('static.trans.update');

      Route::get('admin/adminstatic/{local}', 'LanguageController@adminstaticword')->name('adminstatic.lang');

      Route::post('/admin/update/{lang}/adminTranslations/content','LanguageController@adminupdate')->name('admin.static.update');

      Route::get('admin/pwa', 'PwaSettingController@index')->name('show.pwa');

      Route::post('/admin/pwa/update/manifest','PwaSettingController@updatemanifest')->name('manifest.update');

      Route::post('/admin/pwa/update/sw','PwaSettingController@updatesw')->name('sw.update');

      Route::post('/admin/pwa/update/icons','PwaSettingController@updateicons')->name('icons.update');

      Route::post('/admin/manualcity','CityController@addcity')->name('city.manual');

      Route::post('/admin/manualstate','StateController@addstate')->name('state.manual');

      Route::resource('user/question/report','QuestionReportController');

      // adsense routes
      Route::get('/admin/adsensesetting/','AdsenseController@index')->name('adsense');
      Route::put('/admin/adsensesetting','AdsenseController@update')->name('adsense.update');

    });

    Route::middleware(['web', 'is_active', 'auth', 'admin_instructor', 'switch_languages'])->group(function () {      

      // if(\DB::connection()->getDatabaseName()){
      //     if(env('IS_INSTALLED') == 1){
      //         $zoom_enable = Setting::first()->zoom_enable;

      //         $bbl_enable  = Setting::first()->bbl_enable;
              
      //         if(isset($zoom_enable) && $zoom_enable == 1){
                  
      //             Route::prefix('zoom')->group(function (){
      //                 Route::get('setting','ZoomController@setting')->name('zoom.setting');
      //                 Route::get('dashboard','ZoomController@dashboard')->name('zoom.index');
      //                 Route::post('token/update','ZoomController@updateToken')->name('updateToken');
      //                 Route::get('create/meeting','ZoomController@create')->name('meeting.create');
      //                 Route::delete('delete/meeting/{id}','ZoomController@delete')->name('zoom.delete');
      //                 Route::post('store/new/meeting','ZoomController@store')->name('zoom.store');
      //                 Route::get('edit/meeting/{meetingid}','ZoomController@edit')->name('zoom.edit');
      //                 Route::post('update/meeting/{meetingid}','ZoomController@updatemeeting')->name('zoom.update');
      //                 Route::get('show/meeting/{meetingid}','ZoomController@show')->name('zoom.show');
      //             });
      //         }

      //         if(isset($bbl_enable) && $bbl_enable == 1){
      //             Route::prefix('bigblue')->group(function (){
      //                 Route::view('setting','bbl.setting')->name('bbl.setting');
      //                 Route::post('setting','BigBlueController@setting')->name('bbl.update.setting');
      //                 Route::get('meetings','BigBlueController@index')->name('bbl.all.meeting');
      //                 Route::view('meeting/create','bbl.create')->name('bbl.create');
      //                 Route::post('meeting/store','BigBlueController@store')->name('bbl.store');
      //                 Route::get('meeting/edit/{meetingid}','BigBlueController@edit')->name('bbl.edit');
      //                 Route::post('meeting/update/{meetingid}','BigBlueController@update')->name('bbl.update');
      //                 Route::delete('meeting/delete/{id}','BigBlueController@delete')->name('bbl.delete');
      //                 Route::get('api/create/meeting/{id}','BigBlueController@apiCreate')->name('api.create.meeting');

                      
      //             });
      //         }


      //     }
      //   }

      Route::prefix('user')->group(function (){
        Route::get('edit/{id}','UserController@edit')->name('user.edit');
        Route::put('/edit/{id}','UserController@update')->name('user.update');
      });

      Route::resource('category','CategoriesController');
      Route::get('/category/{slug}','CategoriesController@show')->name('category.show'); 
      Route::resource('subcategory','SubcategoryController');
      Route::resource('childcategory','ChildcategoryController');
      Route::resource('course','CourseController');
      Route::get('featuredcourses','CourseController@featuredCourses');
      Route::resource('courseinclude','CourseincludeController');
      Route::resource('coursechapter','CoursechapterController');
      Route::resource('courseresource','CourseresourceController');
      Route::resource('whatlearns','WhatlearnsController');
      Route::resource('relatedcourse','RelatedcourseController');
      Route::resource('questionanswer','QuestionanswerController');
      Route::resource('courseanswer', 'AnswerController');
      Route::resource('courseclass','CourseclassController');
      Route::resource('reviewrating','ReviewratingController');
      Route::resource('announsment','AnnounsmentController');
      Route::resource('announcement','AnnouncementController');
      Route::get('/course/class/search-video/','CourseclassController@searchVideo')->name('search-class-video');
      Route::get('/course/create/{id}','CourseController@showCourse')->name('course.show');
      Route::post('/send-course-to-publish','CourseController@sendToPublish');
      Route::post('/send-course-to-unpublish','CourseController@sendToUnpublish');
      // Route::post('/course/annoucement','CourseController@storeAnnoucement')->name('annoucement.store');
      Route::post('/category/insert','CategoriesController@categoryStore')->name('cat.store');
      Route::post('/subcategory/insert','SubcategoryController@SubcategoryStore')->name('child.store');
      Route::put('/course/include/{id}','CourseController@testup')->name('corinc.update');
      Route::put('/course/whatlearns/{id}','CourseController@test')->name('what.update');
      Route::put('/course/coursechapter/{id}','CourseController@tes')->name('chapter.update');
      Route::get('send', 'CourseclassController@store')->name('notification');
      Route::resource('courselang','CourseLanguageController');
      Route::get("admin/dropdown","CourseController@upload_info");
      Route::get("admin/gcat","CourseController@gcato");


      Route::get('instructor', 'InstructorController@index')->name('instructor.index');
      Route::resource('userenroll', 'InstructorEnrollController');
      Route::resource('instructorquestion', 'InstructorQuestionController');
      Route::resource('instructoranswer', 'InstructorAnswerController');
      Route::get('coursereview', 'CourseReviewController@index');
      Route::get('publishrequest', 'CourseReviewController@coursePublish');
      Route::get('coursereviewunpublish', 'CourseReviewController@courseUnPublish');
      Route::post('/approve-course-to-publish', 'CourseReviewController@publishRequestApproval');
      Route::post('/unpublish-course', 'CourseReviewController@unpublishCourse');

      Route::resource('instructor/announcement', 'InstructorAnnouncementController');
      Route::resource('usermessage', 'ContactUsController');
      Route::resource('languages', 'LanguageController');

      Route::get('reposition/category', 'CategoriesController@reposition')->name('category_reposition');

      Route::get('reposition/course', 'CourseController@reposition')->name('course_reposition');

      Route::post('reposition/class', 'CourseclassController@sort')->name('class-sort');

      Route::get('reposition/slider', 'SliderController@reposition')->name('slider_reposition');

      Route::resource('admin/quiztopic', 'QuizTopicController');

      Route::resource('/admin/questions', 'QuizController');

      Route::resource('blog', 'BlogController');

      Route::resource('order', 'OrderController');

      Route::get('/purchasedcourses','OrderController@purchasedCourses');

      Route::get('/subscriptions','OrderController@subscriptions');

      Route::post('update-dollar-price','OrderController@updateDollarPrice')->name('update.dollar');

      Route::get('/revenue-excel', 'OrderController@getExcel');

      Route::get('payout/analytics', 'CompletedPayoutController@analytics')->name('admin.creatorpayoutanalytics');;

      Route::resource('featurecourse', 'FeatureCourseController');

      Route::post('/paywithpaytm', 'FeatureCourseController@order')->name('paywithpaytm');
      Route::get('/featurepayment/status', 'FeatureCourseController@paymentCallback');

      Route::post('featuredwithpaypal', 'FeatureCourseController@payWithpaypal')->name('featuredWithpaypal');
      Route::get('getfeaturedstatus', 'FeatureCourseController@getPaymentStatus')->name('featured');

      Route::resource('bundle', 'BundleCourseController');

      Route::resource('assignment', 'AssignmentController');

      Route::resource('appointment', 'AppointmentController');

    });

    Route::middleware(['web','switch_languages', 'is_verified'])->group(function () {

      Route::post('rating/show/{id}','ReviewratingController@rating')->name('course.rating');
      Route::post('reports/insert/{id}','ReportReviewController@store')->name('report.review');
      Route::get('/course/{id}/{slug}','CourseController@CourseDetailPage')->name('user.course.show');
      Route::get('all/blog','BlogController@blogpage')->name('blog.all');
      Route::get('about/show','AboutController@aboutpage')->name('about.show');
      Route::get('show/comingsoon','ComingSoonController@comingsoonpage')->name('comingsoon.show');
      Route::get('show/careers','CareersController@careerpage')->name('careers.show');
      Route::get('detail/blog/{id}','BlogController@blogdetailpage')->name('blog.detail');
      Route::get('gotomycourse', 'CourseController@mycoursepage')->name('mycourse.show');

      Route::get('show/help', function(){
      $data = FaqStudent::first();
      $item = FaqInstructor::first();
      return view('front.help.faq',compact('data', 'item')); 
      })->name('help.show');

      Route::get('pages/{slug}','PageController@showpage')->name('page.show');

      Route::post('show/wishlist/{id}','WishlistController@wishlist');
      Route::post('remove/wishlist/{id}','WishlistController@removewishlist');

      Route::get('enroll/show/{id}', 'EnrollmentController@enroll')->name('show.enroll');

      Route::get('show/coursecontent/{id}', 'CourseController@CourseContentPage');

      Route::post('addquestion/{id}','QuestionanswerController@question');
      Route::post('addanswer/{id}','AnswerController@answer');

      Route::get('all/wishlist', 'WishlistController@wishlistpage')->name('wishlist.show');
      Route::post('delete/wishlist/{id}', 'WishlistController@deletewishlist');

      Route::post('addtocart', 'CartController@addtocart')->name('addtocart');

      Route::post('removefromcart/{id}','CartController@removefromcart')
        ->name('remove.item.cart');

      Route::get('all/cart', 'CartController@cartpage')->name('cart.show');

      Route::post('gotocheckout', 'CheckoutController@checkoutpage');
      
      Route::get('notifications/{id}', 'NotificationController@markAsRead')
      ->name('markAsRead');
      Route::get('delete/notifications', 'NotificationController@delete')
      ->name('deleteNotification');

      Route::get('/view', 'DownloadController@getDownload'); 

      Route::get('/download/{id}', 'DownloadController@getDownload')->name('downloadPdf')->middleware('auth');

      Route::post('review/helpful/{id}', 'ReviewHelpfulController@store')->name('helpful');
      Route::post('review/delete/{id}', 'ReviewHelpfulController@destroy')
      ->name('helpful.delete');

      Route::get('gotocategory/page/{id}', 'CategoriesController@categorypage')->name('category.page');
      Route::get('gotosubcategory/page/{id}', 'CategoriesController@subcategorypage')->name('subcategory.page');
      Route::get('gotochildcategory/page/{id}', 'CategoriesController@childcategorypage')->name('childcategory.page');

      Route::post('apply/instructor', 'InstructorRequestController@instructor')
      ->name('apply.instructor');

      Route::get('search', 'SearchController@index')->name('search');

      Route::get('/user/movie/time/{endtime}/{movie_id}/{user_id}','TimeHistoryController@movie_time');

      Route::get('all/purchase', 'OrderController@purchasehistory')->name('purchase.show');
      Route::get('invoice/show/{id}', 'OrderController@invoice')->name('invoice.show');

      
      Route::get('profile/show/{id}', 'UserProfileController@userprofilepage')->name('profile.show');
      Route::put('/edit/{id}','UserProfileController@userprofile')->name('user.profile');

      Route::post('course/reports/{id}','CourseReportController@store')->name('course.report');

      Route::get('watch/course/{id}', 'WatchController@watch')->name('watchcourse');
      Route::get('watch/courseclass/{id}', 'WatchController@watchclass')->name('watchcourseclass');
      Route::get('audio/courseclass/{id}', 'WatchController@audioclass')->name('audiocourseclass');

      Route::get('language-switch/{local}', 'LanguageSwitchController@languageSwitch')->name('languageSwitch');

      Route::get("country/dropdown","CountryController@upload_info");
      Route::get("country/gcity","CountryController@gcity");
      Route::get("country/gstate","CountryController@gstate");


      Route::get("country/dropdown","CountryController@upload_info");
      Route::get("country/gcity","CountryController@gcity");

      Route::view('terms_condition', 'terms_condition');
      Route::view('privacy_policy', 'privacy_policy');

      Route::get('detail/faq/{id}','HelpController@faqstudentpage')->name('faq.detail');
      Route::get('faqinstructor/detail/{id}','HelpController@faqinstructorpage')->name('faqinstructor.detail');

      Route::view('user_contact', 'front.contact');
      Route::post('contact/user', 'ContactUsController@usermessage')
      ->name('contact.user');

      Route::get('tabcontent/{id}','TabController@show');

      Route::post('paywithpaypal', 'PaypalController@payWithpaypal')->name('payWithpaypal');
      Route::get('getpaymentstatus', 'PaypalController@getPaymentStatus')->name('status');

      Route::get('event', 'InstaMojoController@index');
      Route::post('pay', 'InstaMojoController@pay');
      Route::get('pay-success', 'InstaMojoController@success');

      Route::get('stripe', 'StripePaymentController@stripe');
      Route::post('paytostripe', 'StripePaymentController@payStripe')->name('stripe.pay');

      Route::get('payment/braintree', 'BraintreeController@get_bt');
      Route::post('payment/braintree', 'BraintreeController@payment');

      Route::get('razorpay', 'RazorpayController@pay')->name('pay');
      Route::post('dopayment', 'RazorpayController@dopayment')->name('dopayment');

      Route::post('/paywithpaystack', 'PayStackController@redirectToGateway')->name('paywithpaystack');
      Route::get('callback', 'PayStackController@handleGatewayCallback'); 

      Route::post('apply/coupon', 'ApplyCouponController@applycoupon');

      Route::post('removecoupon/{id}','ApplyCouponController@remove')
        ->name('remove.coupon');

      Route::post('/paywithpayment', 'PaytmController@order')->name('paywithpayment');
      Route::post('payment/status', 'PaytmController@paymentCallback');

      Route::post('process/banktransfer', 'BankTransferController@banktransfer');
      
      Route::get('watchcourse/in/frame/{url}/{course_id}', 'WatchController@view')->name('watchinframe');

      Route::get('start_quiz/{id}', 'QuizStartController@quizstart')->name('start_quiz');

      Route::post('/start_quiz/store/{id}','QuizStartController@store')->name('start.quiz.store');

      Route::get('finish/{id}','QuizStartController@show')->name('start.quiz.show');

      Route::get('invoice/download/{id}', 'OrderController@pdfdownload')->name('invoice.download');

      Route::get('watch/lightbox/{id}', 'WatchController@lightbox')->name('lightbox');

      Route::post('question/reports/{id}','QuestionReportController@store')->name('question.report');

      Route::get('cirtificate/{id}', 'CertificateController@show')->name('cirtificate.show');

      Route::get('cirtificate/download/{id}', 'CertificateController@pdfdownload')->name('cirtificate.download');

      Route::get('answersheet/{id}', 'QuizTopicController@delete')->name('answersheet');

      Route::get('tryagain/{id}', 'QuizStartController@tryagain')->name('tryagain');

      Route::get('admin/instructor/settings', 'InstructorSettingController@view')->name('instructor.settings');

      Route::post('admin/instructor/update', 'InstructorSettingController@update')->name('instructor.update');

      Route::get('instructor/details', 'InstructorSettingController@instructor')->name('instructor.pay');

      Route::post('instructor/payout/{id}', 'InstructorSettingController@settings')->name('instructor.payout');

      Route::get('pending/payout', 'PayoutController@pending')->name('pending.payout');

      Route::get('pending/revenue', 'InstructorRevenueController@instructorRevenue')->name('instructor.revenue');

      Route::get('admin/instructor', 'AdminPayoutController@index')->name('admin.instructor');

      Route::get('admin/creatorpayout', 'CreatorPayoutController@index')->name('admin.creatorpayout');

      Route::get('admin/addpayout', 'CreatorPayoutController@create');
      Route::post('admin/creatorpayout/store', 'CreatorPayoutController@store')->name('creatorpayout.store');
      Route::get('admin/creatorpayout/edit/{id}', 'CreatorPayoutController@edit')->name('creatorpayout.edit');
      Route::put('admin/creatorpayout/update', 'CreatorPayoutController@update')->name('creatorpayout.update');
      Route::post('/save-existing-videos','CourseclassController@saveExitingVideo');


      Route::get('admin/pending/{id}', 'AdminPayoutController@pending')->name('admin.pending');
      Route::get('admin/paid/{id}', 'AdminPayoutController@paid')->name('admin.paid');

      Route::post('admin/payout/bulk_payout/{id}', 'AdminPayoutController@bulk_payout');

      Route::post('admin/paypal/{id}', 'PaymentController@paypal')->name('admin.paypal');
      Route::post('admin/banktransfer/{id}', 'PaymentController@banktransfer')->name('admin.banktransfer');
      Route::post('admin/paytm/{id}', 'PaymentController@paytm')->name('admin.paytm');

      Route::get('admin/completed/payout', 'CompletedPayoutController@show')->name('admin.completed');
      Route::get('payout/completed/view/{id}', 'CompletedPayoutController@view')->name('completed.view');

      Route::get('admin/meeting/show', 'MeetingController@index')->name('meeting.show');
      Route::delete('destroy/meeting/{id}','MeetingController@destroy')->name('zoom.destroy');

      Route::post('course/checked/{id}', 'CourseProgressController@checked');

      Route::post('bundle/cart/{id}', 'BundleCourseController@addtocart')->name('bundlecart');
      Route::get('bundle/detail/{id}', 'BundleCourseController@detailpage')->name('bundle.detail');
      Route::get('bundle/enroll/{id}', 'BundleCourseController@enroll')->name('bundle.enroll');

      Route::get('bbl/detail/{id}', 'BigBlueController@detailpage')->name('bbl.detail');

      Route::get('join/meeting/{meetingid}','BigBlueController@joinview')->name('bbluserjoin');
      Route::post('api/join/meeting','BigBlueController@apiJoin')->name('bbl.api.join');
      

      Route::post('course/assignment/{id}', 'AssignmentController@submit')->name('assignment.submit');
      Route::post('assignment/delete/{id}', 'AssignmentController@delete');

      Route::get('instructor/{id}', 'InstructorSettingController@instructorprofile')->name('instructor.profile');

      Route::post('course/appointment/{id}', 'AppointmentController@request')->name('appointment.request');
      Route::post('appointment/delete/{id}', 'AppointmentController@delete');
      
      Route::get('/my-courses','SearchController@myCourses');

      //- Payment Info of Learners
      Route::get('/manage-billing', 'SubscriptionController@manage_billing');
      // Route::get('/billing', 'SubscriptionController@billing');
      Route::get('/payment-history', 'SubscriptionController@payment_history');
      // Route::view('/payment-cards', 'learners.pages.payment-cards');
      Route::get('/payment-details', 'SubscriptionController@payment_update');
      Route::post('/payment-details/update', 'SubscriptionController@payment_update');
      

    });

    Route::get('/learn/course/{id}/{slug}', 'LearnController@show')->name('learn.course');
    Route::get('/learn/class/{id}/{slug}', 'LearnController@class')->name('learn.class');
    Route::post('/learn/course/{video_id}','LearnController@video')->name('learn.video');
    Route::post('/subscribed-courses/{course_id}/{class_id}/progress-logs', 'CourseProgressController@progress_log');
    Route::post('/subscribed-courses/{course_id}/{class_id}/completion', 'CourseProgressController@class_completed');
    Route::get('/watch_time', 'InstructorController@totalWatchTime');
    Route::get('/payoutCalculate', 'InstructorController@payoutCalculate');
    Route::get('/browse/classes','SearchController@classes');
    Route::get('/browse/courses','SearchController@courses');
    Route::get('/master-classes','SearchController@masterClasses');
    Route::get("/search-course","SearchController@searchCourse");
    Route::get("/search-classes","SearchController@searchClass");


    Route::get('/filter-courses','SearchController@applyFilter')->name('apply.filters');
    Route::get('/add-to-cart','CartController@addtocartAjax');
    Route::post('/add-to-cart','CartController@addToCart');

    Route::get('/remove-from-cart/{id}','CartController@removeFromCart');
    Route::get('/apply-coupon/{id}','CartController@applyCoupon');
    Route::post('/apply-coupon','CartController@applyCouponManual');
    Route::get('/move-to-wishlist/{id}','CartController@moveToWishlist');

    // Route::post('/checkout','CartController@cartCheckout');
    Route::post('/stripe-checkout','CartController@cartCheckout');

    //- Checkout Status for Learners
    Route::get('/checkout-successful/{id}', 'CartController@checkoutSuccessful');
    Route::get('/checkout-failure/{id}', 'CartController@checkoutFailed');

    Route::get('/jwt', 'CourseclassController@token_generate');

    Route::stripeWebhooks('/hooks');
    

});


Route::middleware(['auth'])->group(function () {

  Route::post('/rate-course','SearchController@rateCourse')->name('rate.course');
  Route::put('/update-review','SearchController@updateReview')->name('update.review');

  Route::get('/playlist','PlaylistController@index');
  Route::get('/playlist/{id}','PlaylistController@show');
  Route::get('/playlist/{playlist_id}/{id}/{slug}','PlaylistController@removeCourse');
  
  Route::post('/add-to-playlist','PlaylistController@addToPlaylist')->name('add.to.playlist');
  Route::post('/create-playlist','PlaylistController@createPlaylist')->name('create.playlist');
  Route::post('/edit-playlist','PlaylistController@editPlaylist');
  // Wishlist Routes
  Route::post('/add-to-wishlist','LearnerWishlistController@store');
  Route::get('/wishlist','LearnerWishlistController@index');
  Route::get('/remove-from-wishlist/{id}','LearnerWishlistController@destroy');

  Route::get('/playlist-delete/{id}','LearnerWishlistController@deletePlaylist');

  Route::post('/profile',"ProfileController@updateProfile");
  Route::get('/profile','ProfileController@index');
  Route::post('/update-password','ProfileController@updatePassword')->name('update.password');
  Route::view('/edit', 'admin.course.courseresource.edit');

  Route::get('/releases','AnnouncementController@showAllRelease');
  Route::get('/releases/{id}','AnnouncementController@showRelease');
  Route::get('/mark-nofification-read','AnnouncementController@markNotificationRead');

  Route::get('/interests','UserController@getInterests');
  Route::get('/my-interests', 'UserController@myInterests');
  Route::post('/add-to-my-interest', 'UserController@addMyInterests');
  Route::post('/add-interests','UserController@storeInterest');
  Route::post('/remove-interest','UserController@removeInterest');
  Route::get('/clear-all-notification','NotificationController@clearAll');

  Route::get('/cart','CartController@learnerCart');

  Route::get('/creator-signup','InstructorController@creatorSignUpPage')->middleware('check_creator');
  Route::post('/creator-signup','InstructorController@creatorSignUp')->middleware('check_creator');

  Route::get('/purchase-history','PurchaseHistoryController@index');
  
  Route::get('/download-invoice/{id}','PurchaseHistoryController@downloadPdf');

  Route::get('/subscription/{slug}', 'SubscriptionController@plans');
  // Route::post('/subscription/plans', 'SubscriptionController@postPaymentStripe')->name('subscription.plans');
  Route::post('/subscription-checkout', 'SubscriptionController@plan_subscription')->name('subscription.checkout');
  Route::post('/subscription/cancel', 'SubscriptionController@cancelSubscription')->name('subscription.cancel');
  Route::get('/subscription-successful/{CHECKOUT_SESSION_ID}', 'SubscriptionController@success')->name('subscription.success');
  Route::get('/download-certificate/{id}','LearnController@downloadCertificate');


  Route::get('/user-dashboard','UserDashboardController@index');

});

Route::get("allcountry/dropdown","AllCountryController@upload_info");
Route::get("allcountry/gcity","AllCountryController@gcity");


Route::get('/activestatus', 'WatchCourseController@active');

Route::post('/contact', 'ContactUsController@contactUs');

Route::get('/verify-user-email/{id}/{hash}','UserController@verifyEmail')->name('useremail.verify');

Route::post('/reset-passoword-mail', 'UserController@resetPasswordMail');

Route::get('active/courses', 'WatchCourseController@watchlist')->name('active.courses');
Route::post('active/delete/{id}', 'WatchCourseController@delete')->name('active.delete');

Route::get('admin/ipblock', 'IPBlockController@view')->name('ipblock.view');

Route::post('admin/ipblock/update', 'IPBlockController@update')->name('ipblock.update');

Route::get('all/assignment', 'AssignmentController@view')->name('assignment.view');
Route::get('view/assignment/{id}', 'AssignmentController@assignment')->name('list.assignment');

Route::get('/become-mentor','WebsiteController@becomeCreator');
Route::get('/guided-mentor','WebsiteController@guidedCreator');
Route::get('/learning-plans','WebsiteController@learningPlans');

// test
Route::get("zoho/module","ZohoController@createRecords");
// Zoho module
Route::get('/requests', 'CourseReviewController@instructorRequests');
Route::post('/delete-course-request', 'CourseReviewController@deleteCourseRequest');
// Route for Learner's View
Route::view('/signup','learners.auth.signup');
Route::view('/signin','learners.auth.signin');
Route::get('/mentors','InstructorController@allMentors');
Route::get('/category/{id}/{category}','WebsiteController@categoryPage');
Route::get('/search-mentor','InstructorController@searchMentor');
Route::get('/mentor/{id}/{name?}','InstructorController@creator')->name('mentor.profile');

Route::view('/payment-successful','learners.pages.payment-successful');
Route::view('/contact','learners.pages.contact')->name('contactus');
Route::view('/about', 'learners.pages.about');
Route::view('/cancellations-refund', 'learners.pages.cancellations-refund');
Route::view('/subscription-trial', 'learners.pages.subscription-trial');

Route::view('/terms-conditions', 'learners.pages.terms-conditions');
Route::view('/privacy-policy', 'learners.pages.terms-conditions');


//- Error Pages
Route::view('/error-404', 'learners.messages.error-404');
Route::view('/error-wrong', 'learners.messages.error-wrong');


