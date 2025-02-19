@extends("admin/layouts.master")
@section('title','Add New Coupon')

@section('body')

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <h3 class="la-admin__section-title ml-3">{{ __('adminstaticword.Add') }} {{ __('adminstaticword.Coupon') }}</h3>
    
      
        <div class="box-body">
          <form action="{{ route('coupon.store') }}" method="POST">
          @csrf
      
          <div class="row">
            <div class="col-md-4">
              <label>{{ __('adminstaticword.CouponCode') }}:<span class="redstar">*</span></label>
              <input required="" type="text" class="form-control" name="code" value="{{ old('code') }}">
              @error('code')
                  <div class="alert alert-danger">
                      {{$message}}
                  </div>
              @enderror
            </div>

            <div class="col-md-4">
              <label>{{ __('adminstaticword.DiscountType') }}:<span class="redstar">*</span></label>
                <select required="" name="distype" id="distype" class="form-control js-example-basic-single">
                  <option value="fix" @if(old('distype') == 'fix') selected @endif>{{ __('adminstaticword.FixAmount') }}</option>
                  <option value="per" @if(old('distype') == 'per') selected @endif>% {{ __('adminstaticword.Percentage') }}</option>
                </select>
                @error('distype')
                  <div class="alert alert-danger">
                      {{$message}}
                  </div>
              @enderror
            </div>
          </div>

          <div class="row  mt-3">
            <div class="col-md-8">
                <label>{{ __('adminstaticword.Amount') }}:<span class="redstar">*</span></label>
                <input required="" type="text"  class="form-control" name="amount" value="{{ old('amount') }}">
                @error('amount')
                  <div class="alert alert-danger">
                      {{$message}}
                  </div>
              @enderror
            </div>
          </div>
          
          <div class="row mt-3">
              <div class="col-md-4">
                <label>{{ __('adminstaticword.MaxUsageLimit') }}:<span class="redstar">*</span></label>
                <input required="" type="number" min="1" class="form-control" name="maxusage" value="{{ old('maxusage') }}">
                @error('maxusage')
                  <div class="alert alert-danger">
                      {{$message}}
                  </div>
              @enderror
              </div>

              <div class="col-md-4">
                <label>{{ __('adminstaticword.ExpiryDate') }}:<span class="redstar">*</span></label>
                <div class="input-group">
                  <span class="input-group-addon pt-1 px-3 border"><i class="la-icon la-icon--md icon-calender-filled"></i></span>
                  <input required="" id="expirydate" type="text" class="form-control" name="expirydate" value="{{ old('expirydate') }}">
                    @error('expirydate')
                    <div class="alert alert-danger">
                      {{$message}}
                    </div>
                    @enderror
                </div>
              </div>
          </div>

          <div class="row">
            <div class="col-md-4 mt-4 mt-md-0">
              <label>{{ __('adminstaticword.Linkedto') }}:<span class="redstar">*</span></label>
              
                <select required="" name="link_by" id="link_by" class="form-control js-example-basic-single">
                  <option value="none" selected disabled hidden> 
                    {{ __('adminstaticword.SelectanOption') }}
                  </option>
                  <option value="course">{{ __('adminstaticword.LinktoCourse') }}</option>
                  <option value="cart">{{ __('adminstaticword.LinktoCart') }}</option>
                  <option value="category">{{ __('adminstaticword.LinktoCategory') }}</option>
                </select>
                @error('link_by')
                  <div class="alert alert-danger">
                    {{$message}}
                  </div>
                  @enderror

                <div id="probox" class="col-md-12 px-0 mt-4 mt-md-0 display-none">
                  <label>{{ __('adminstaticword.SelectCourse') }}:<span class="redstar">*</span> </label>
                  <br>
                  <select style="width: 100%" id="pro_id" name="course_id" class="js-example-basic-single form-control">
                      <option value="none" selected disabled hidden> 
                        {{ __('adminstaticword.SelectanOption') }}
                      </option>
                      @foreach(App\Course::where('status','1')->get() as $product)
                        @if($product->type == 1)
                          <option value="{{ $product->id }}">{{ $product['title'] }}</option>
                        @endif
                      @endforeach
                  </select>
                  @error('course_id')
                  <div class="alert alert-danger">
                    {{$message}}
                  </div>
                  @enderror
                </div>
            
                <div id="catbox" class="col-md-12  px-0 mt-4 mt-md-0 display-none">
                  <label>{{ __('adminstaticword.SelectCategories') }}:<span class="required redstar">*</span> </label>
                  <br>
                  <select style="width: 100%" id="cat_id" name="category_id" class="js-example-basic-single form-control">
                      <option value="none" selected disabled hidden> 
                        {{ __('adminstaticword.SelectanOption') }}
                      </option>
                      @foreach(App\Categories::where('status','1')->get() as $category)
                        <option value="{{ $category->id }}">{{ $category['title'] }}</option>
                      @endforeach
                  </select>
                  @error('category_id')
                  <div class="alert alert-danger">
                    {{$message}}
                  </div>
                  @enderror
                </div>
            </div>

            <div class="col-md-4 mt-4 mt-md-0" id="minAmount" >
                <label>{{ __('adminstaticword.MinAmount') }}: </label>
                <div class="input-group">
                  @php 
                    $currency = App\Currency::first();
                  @endphp
                  <span class="input-group-addon pt-1 px-4 border"><i class="{{ $currency->icon }}"></i></span>
                  <input type="number" min="0.0" value="0.00" step="0.1" class="form-control" name="minamount">
                  @error('minamount')
                  <div class="alert alert-danger">
                    {{$message}}
                  </div>
                  @enderror
                </div>
              </div>
          </div><br/>

          <div class="row">
            <!-- ADD CLASS  TOGGLER: START -->
            <div class="col-md-4">
                <div class="la-admin__master-toggler m-0">
                  <label  class="la-admin__preview-label pl-2">Status:</label>
                  <div class="la-admin__master-class pl-2">
                        <input type="checkbox" id="coupon-status" name="coupon-status" class="la-admin__toggle-switch" />
                        <label for="coupon-status" class="la-admin__toggle-label"></label> 
                  </div>
                </div>
            </div>
            <!-- ADD CLASS  TOGGLER: END -->
        </div>

        <!-- COUPON PACKAGE TYPE: START -->
        {{-- <div class="row">
          <div class="col-12">
            <div class="la-admin__course-package la-admin__class-package">
                <div class="la-admin__cp-subscription">
                    <input type="radio" name="coupon-package" id="addCoupon" value="Subscription" class="la-admin__cp-input" /> 
                    <label for="addCoupon"> 
                      <div class="la-admin__cp-circle">
                          <span class="la-admin__cp-radio"></span>
                          <span class="la-admin__cp-label">Percentage</span> 
                          <small><i class="fa fa-info-circle px-1"></i> (Default)</small>
                      </div>

                      <div class="la-admin__cp-desc">
                        <p>This coupon provides some percentage of amount as discount</p>
                        <div class="form-group row  la-admin__subform-group">
                          <div class="la-admin__add-coupon">
                            <label for="coupon-discount" class="la-admin__coupon-label"> Please enter Discount % value<sup class="redstar">*</sup></label>
                            <div class="input-group col-10 la-admin__subinput-group">
                              <div class="input-group-prepend la-admin__subinput-prepend" >
                                  <span class="fa fa-percent input-group-text la-admin__subinput-text"></span> 
                              </div>
                              <input type="text" name="coupon-discount" id="coupon-discount" class="form-control la-admin__subform-input" value="20"/>
                            </div>
                          </div>
                          
                          <div class="la-admin__add-coupon">
                            <label for="coupon-amount" class="la-admin__coupon-label"> Maximum Amount</label>
                            <div class="input-group col-10 la-admin__subinput-group">
                              <div class="input-group-prepend la-admin__subinput-prepend" >
                                  <span class="fa fa-dollar input-group-text la-admin__subinput-text"></span> 
                              </div>
                              <input type="text" name="coupon-discount" id="coupon-amount" class="form-control la-admin__subform-input" value="20"/>
                            </div>
                          </div>
                        </div>
                      </div>
                    </label>
                </div> <br/>


                <div class="la-admin__cp-free">
                      <input type="radio" name="coupon-package" id="coupon-fixed" value="fixed" class="la-admin__cp-input">
                      <label for="coupon-fixed" > 
                        <div class="la-admin__cp-circle">
                          <span class="la-admin__cp-radio"></span>
                          <span class="la-admin__cp-label">Fixed Amount</span> 
                          <small><i class="fa fa-info-circle pl-1"></i> </small>
                        </div>

                          <div class="la-admin__cp-desc">
                              <p class="la-admin__cp-info"> This coupon provides a fixed amount as discount </p>
                              <div class="la-admin__add-coupon">
                                <label for="fixed-amount" class="la-admin__coupon-label"> Fixed Amount <sup class="redstar">*</sup></label>
                                <div class="input-group col-10 la-admin__subinput-group">
                                  <div class="input-group-prepend la-admin__subinput-prepend" >
                                      <span class="fa fa-dollar input-group-text la-admin__subinput-text"></span> 
                                  </div>
                                  <input type="text" name="coupon-discount" id="fixed-amount" class="form-control la-admin__subform-input" value="20"/>
                                </div>
                              </div>
                          </div>
                      </label>
                </div>
            </div>
          </div>
        </div> --}}
      <!-- COUPON PACKAGE TYPE: END -->

      <!-- COUPON USAGE LIMIT: START -->
      {{-- <div class="row">
          <div class="col-12">
              <div class="la-admin__coupon-usage">
                <label class="la-admin__usage-label"> Usage Limit 
                  <small><i class="fa fa-info-circle pl-1"></i></small>
                </label>
                <div class="form-group la-admin__add-coupon">
                  <div class="col-5">
                  <label for="coupon-amount" class="la-admin__coupon-label"> Please Enter No. of time this coupon can be used</label>
                  <input type="text" name="coupon-discount" id="coupon-amount" class="form-control " placeholder="Enter Count"/>
                  </div>
                </div>
              </div>
          </div>
      </div> --}}
      <!-- COUPON USAGE LIMIT: END -->

      <div class="row">
        <div class="col-md-8 mt-8">
          <div class="box-footer">
            <button type="submit" class="btn btn-primary px-18"> {{ __('adminstaticword.Save') }}</button>
          </div>
        </div>
      </div>
    </form>
     <!--  <a href="{{ route('coupon.index') }}" title="Cancel and go back" class="btn btn-md btn-default btn-flat">
        <i class="fa fa-reply"></i> {{ __('adminstaticword.Back') }}
      </a> -->
    </div>
    </div>       
  </div>
  </div>
</section>

@endsection

@section('scripts')
<script>
  (function($) {
  "use strict";
    
      $('#link_by').change(function(){
        var opt = $(this).val();
       
        if(opt == 'course'){
          $('#minAmount').hide();
          $('#probox').show();
          $('#minAmount').hide();
          $('#pro_id').attr('required','required');
        }else{
          $('#minAmount').show();
          $('#probox').hide();
          $('#pro_id').removeAttr('required');
        }
    });

      $('#link_by').change(function(){
        var opt = $(this).val();
       
        if(opt == 'category'){
          $('#catbox').show();
          $('#pro_id').attr('required','required');
        }else{
          $('#catbox').hide();
          $('#pro_id').removeAttr('required');
        }
    });

      $( function() {
        $( "#expirydate" ).datepicker({
          dateFormat : 'yy-m-d'
        });
      });

  })(jQuery);
    
</script>
 
@endsection
