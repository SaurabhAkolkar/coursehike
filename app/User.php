<?php

namespace App;

use Cartalyst\Stripe\Exception\NotFoundException;
use Cartalyst\Stripe\Stripe;
use Rinvex\Subscriptions\Traits\HasSubscriptions;

use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Rinvex\Subscriptions\Services\Period;
use Rinvex\Subscriptions\Models\Plan;

use Kyranb\Footprints\TrackableInterface;
use Kyranb\Footprints\TrackRegistrationAttribution;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements TrackableInterface
{
    use Notifiable, HasSubscriptions, TrackRegistrationAttribution;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'email', 'password', 'lname', 'dob', 'doa', 'mobile', 'address', 'city_id', 'facebook_id', 'google_id',
        'state_id', 'country_id','gender', 'pin_code', 'status', 'verified', 'role', 'married_status','user_img', 'detail', 'braintree_id', 'fb_url', 'twitter_url', 'youtube_url', 'linkedin_url', 'token','email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function country()
    {
      return $this->belongsTo('App\Allcountry','country_id', 'id');
    }

    public function state()
    {
      return $this->belongsTo('App\Allstate','state_id','id');
    }   

    public function city()
    {
        return $this->belongsTo('App\Allcity','city_id','id');
    }                                                                                               
    public function courses()
    {
        return $this->hasMany('App\Course','user_id');

    }     
    public function answer()
    {
        return $this->hasMany('App\Question','user_id');
    }   

    public function announsment()
    {
        return $this->hasMany('App\Announcement','user_id');
    }  

    public function review()
    {
        return $this->hasMany('App\ReviewRating','user_id');
    } 

    public function reportreview()
    {
        return $this->hasMany('App\ReportReview','user_id');
    }  

    public function viewprocess()
    {
        return $this->hasMany('App\ViewProcess','user_id');
    }   

    public function wishlist()
    {
        return $this->hasMany('App\Wishlist','user_id');
    } 
        
    public function getUserImgAttribute($value)
    {
        if($value != null){
            return Storage::url(config('path.profile'). $value);
        }else{
            return asset('images/default-images/mentor-default.jpg');
        }
    }

    public function getCheckWishlistAttribute(){
        if(Auth::check()){
            $wishlist = Wishlist::where(['user_id' => $this->id])->first();

            return $wishlist?true:false;
        }   
        return false;
}

    public function blogs()
    {
        return $this->hasMany('App\Blog','user_id');
    }

    public function relatedcourse()
    {
        return $this->hasMany('App\RelatedCourse','user_id');
    }

    public function courseclass()
    {
        return $this->hasMany('App\CourseClass','user_id');
    } 

    public function orders()
    {
        return $this->hasMany('App\Order','user_id');
    } 

    public function pending()
    {
        return $this->hasMany('App\PendingPayout','user_id');
    }
    
    public function liveclass()
    {
        return $this->hasMany('App\LiveCourse','user_id');
    } 

    public function completed()
    {
        return $this->hasMany('App\CompletedPayout','user_id');
    }  

    public function bundle()
    {
        return $this->hasMany('App\BundleCourse','user_id');
    }

    public function subscribed()
    {
        return $this->hasOne('App\UserSubscription','user_id');
    }

    public function getFullNameAttribute()
    {
        return ucfirst("{$this->fname} {$this->lname}");
    }
    
    public function getStripeIdAttribute($value)
    {
        $stripe = Stripe::make(config('services.stripe.secret'));

        if(!empty($value)){
            try {
                $customer = $stripe->customers()->find($value);

                if (!array_key_exists('deleted', $customer))
                    return $value;

            } catch (NotFoundException $e) {
                $message = $e->getMessage();
            }
        }

        $customer = $stripe->customers()->create([
            'email' => $this->email,
        ]);
        $this->attributes['stripe_id'] = $customer['id'];
        $this->save();

        return $customer['id'];
    }

    public function getAwardCountAttribute(){
        $user = Instructor::where(['user_id' => $this->id ])->first();
        if($user !=null && json_decode($user->awards)){            
            return count(json_decode($user->awards));
        }else{
            return 0;
        }
    }
    
    public function newSubscription($subscription, Plan $plan, $isTrial = TRUE)
    {
        $trial = new Period($plan->trial_interval, $plan->trial_period, now());
        $period = new Period($plan->invoice_interval, $plan->invoice_period, $trial->getEndDate());

        return $this->subscriptions()->create([
            'name' => $subscription,
            'plan_id' => $plan->getKey(),
            'trial_ends_at' => $isTrial ? $trial->getEndDate() : now(),
            'starts_at' => $isTrial ? $trial->getStartDate() : $period->getStartDate(),
            'ends_at' => $isTrial ? $trial->getEndDate() : $period->getEndDate(),
        ]);
    }

    public function subscription()
    {
        return $this->subscriptions()->first();
    }
}

