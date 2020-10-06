@extends("admin/layouts.master")
@section('title','Edit Coupon ')
@section('body')

<section class="content">
  <div class="row">
    <div class="col-md-8">
      <div class="box box-primary">
        <div class="box-header with-border">
          <div class="box-title">
              {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Coupon') }}: {{ $coupan->code }}
          </div>
        </div>
        <form action="{{ route('coupon.update',$coupan->id) }}" method="POST">
          @csrf
          {{ method_field("PUT") }}

          <div class="box-body">
               
              <div class="form-group">
                <label>{{ __('adminstaticword.CouponCode') }}: <span class="redstar">*</span></label>
                <input value="{{ $coupan->code }}" type="text" class="form-control" name="code">
              </div>
              <div class="form-group">
                <label>{{ __('adminstaticword.DiscountType') }}: <span class="redstar">*</span></label>
                
                  <select required="" name="distype" id="distype" class="form-control ">
                    
                    <option {{ $coupan->distype == 'fix' ? "selected" : ""}} value="fix">{{ __('adminstaticword.FixAmount') }}</option>
                    <option {{ $coupan->distype == 'per' ? "selected" : ""}} value="per">% {{ __('adminstaticword.Percentage') }}</option>
                    
                  </select>
                
              </div>
              <div class="form-group">
                  <label>{{ __('adminstaticword.Amount') }}: <span class="redstar">*</span></label>
                  <input type="text" value="{{ $coupan->amount }}"  class="form-control" name="amount">
                
              </div>
              <div class="form-group">
                <label>{{ __('adminstaticword.Linkedto') }}: <span class="redstar">*</span></label>
                
                  <select required="" name="link_by" id="link_by" class="form-control js-example-basic-single">
                    <option {{ $coupan->link_by == 'course' ? "selected" : ""}} value="course">{{ __('adminstaticword.LinktoCourse') }}</option>
                    <option {{ $coupan->link_by == 'cart' ? "selected" : ""}} value="cart">{{ __('adminstaticword.LinktoCart') }}</option>
                    <option {{ $coupan->link_by == 'category' ? "selected" : ""}} value="category">{{ __('adminstaticword.LinktoCategory') }}</option>
                  </select>
                
              </div>

              <div style="{{ $coupan->link_by == 'course' ? "" : "display: none"}}" id="probox" class="form-group">
                <label>{{ __('adminstaticword.SelectCourse') }}: <span class="redstar">*</span> </label>
                <br>
                <select id="pro_id" name="course_id" class="js-example-basic-single form-control">
                    <option value="none" selected disabled hidden> 
                       {{ __('adminstaticword.SelectanOption') }}
                    </option>
                    @foreach(App\Course::where('status','1')->get() as $product)
                      @if($product->type == 1)
                        <option {{ $coupan->course_id == $product->id ? 'selected' : "" }} value="{{ $product->id }}">{{ $product['title'] }}</option>
                      @endif
                    @endforeach
                </select>
              </div>

              <div style="{{ $coupan->link_by == 'category' ? "" : "display: none"}}" id="catbox" class="form-group">
                <label>{{ __('adminstaticword.SelectCategories') }}: <span class="redstar">*</span> </label>
                <br>
                <select style="width: 100%" id="cat_id" name="category_id" class="js-example-basic-single form-control">
                    <option value="none" selected disabled hidden> 
                      {{ __('adminstaticword.SelectanOption') }}
                    </option>
                    @foreach(App\Categories::where('status','1')->get() as $category)
                      <option {{ $coupan->category_id == $category->id ? 'selected' : "" }} value="{{ $category->id }}">{{ $category['title'] }}</option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>{{ __('adminstaticword.MaxUsageLimit') }}: <span class="redstar">*</span></label>
                <input value="{{ $coupan->maxusage }}" type="number" min="1" class="form-control" name="maxusage">
              </div>
              <div style="{{ $coupan->link_by=='product' ? "display:none" : "" }}" id="minAmount" class="form-group">
                <label>{{ __('adminstaticword.MinAmount') }}: </label>
                <div class="input-group">
                  @php
                      $currency = App\Currency::first();
                  @endphp 
                  <span class="input-group-addon"><i class="{{ $currency->icon }}"></i></span>
                  <input value="{{ $coupan->minamount }}" type="number" min="0.0" value="0.00" step="0.1" class="form-control" name="minamount">
                </div>
              </div>
               <div class="form-group">
                <label>{{ __('adminstaticword.ExpiryDate') }}: </label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input value="{{ date('Y-m-d',strtotime($coupan->expirydate)) }}" id="expirydate" type="text" class="form-control" name="expirydate">
                </div>
              </div>
          </div>


          
      <!-- COUPON PACKAGE TYPE: START -->
      <div class="row">
        <div class="col-12">
          <div class="la-admin__course-package la-admin__class-package">
              <div class="la-admin__cp-subscription">
                  <input type="radio" name="coupon-edit" id="editCoupon" value="Subscription" class="la-admin__cp-input" /> 
                  <label for="editCoupon"> 
                    <div class="la-admin__cp-circle">
                        <span class="la-admin__cp-radio"></span>
                        <span class="la-admin__cp-label">Percentage</span> 
                        <small><i class="fa fa-info-circle px-1"></i> (Default)</small>
                    </div>

                    <div class="la-admin__cp-desc">
                      <p>This coupon provides some percentage of amount as discount</p>
                      <div class="form-group row  la-admin__subform-group">
                        <div class="la-admin__add-coupon">
                          <label for="coupon-editDiscount" class="la-admin__coupon-label"> Please enter Discount % value<sup class="redstar">*</sup></label>
                          <div class="input-group col-10 la-admin__subinput-group">
                            <div class="input-group-prepend la-admin__subinput-prepend" >
                                <span class="fa fa-percent input-group-text la-admin__subinput-text"></span> 
                            </div>
                            <input type="text" name="edit-percent" id="coupon-editDiscount" class="form-control la-admin__subform-input" value="20"/>
                          </div>
                        </div>
                        
                        <div class="la-admin__add-coupon">
                          <label for="coupon-editAmount" class="la-admin__coupon-label"> Maximum Amount</label>
                          <div class="input-group col-10 la-admin__subinput-group">
                            <div class="input-group-prepend la-admin__subinput-prepend" >
                                <span class="fa fa-dollar input-group-text la-admin__subinput-text"></span> 
                            </div>
                            <input type="text" name="edit-maxAmount" id="coupon-editAmount" class="form-control la-admin__subform-input" value="20"/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </label>
              </div> <br/>


              <div class="la-admin__cp-free">
                    <input type="radio" name="coupon-edit" id="coupon-editFixed" value="fixed" class="la-admin__cp-input">
                    <label for="coupon-editFixed" > 
                      <div class="la-admin__cp-circle">
                        <span class="la-admin__cp-radio"></span>
                        <span class="la-admin__cp-label">Fixed Amount</span> 
                        <small><i class="fa fa-info-circle pl-1"></i> </small>
                      </div>

                        <div class="la-admin__cp-desc">
                            <p class="la-admin__cp-info"> This coupon provides a fixed amount as discount </p>
                            <div class="la-admin__add-coupon">
                              <label for="edit-fixedAmount" class="la-admin__coupon-label"> Fixed Amount <sup class="redstar">*</sup></label>
                              <div class="input-group col-10 la-admin__subinput-group">
                                <div class="input-group-prepend la-admin__subinput-prepend" >
                                    <span class="fa fa-dollar input-group-text la-admin__subinput-text"></span> 
                                </div>
                                <input type="text" name="edit-fixedAmount" id="edit-fixedAmount" class="form-control la-admin__subform-input" value="20"/>
                              </div>
                            </div>
                        </div>
                    </label>
              </div>
          </div>
        </div>
      </div>
     <!-- COUPON PACKAGE TYPE: END -->

    <!-- COUPON USAGE LIMIT: START -->
    <div class="row">
        <div class="col-12">
            <div class="la-admin__coupon-usage">
              <label class="la-admin__usage-label"> Usage Limit 
                <small><i class="fa fa-info-circle pl-1"></i></small>
              </label>
              <div class="form-group la-admin__add-coupon">
                <div class="col-5">
                <label for="edit-usage" class="la-admin__coupon-label"> Please Enter No. of time this coupon can be used</label>
                <input type="text" name="edit-usage" id="edit-usage" class="form-control la-admin__subinput-group" placeholder="Enter Count"/>
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- COUPON USAGE LIMIT: END -->

    <!-- ADD CLASS MASTER TOGGLER: START -->
    <div class="row">
      <div class="col-12">
          <div class="la-admin__master-toggler">
            <label  class="la-admin__preview-label">Status<sup class="redstar">*</sup></label>
            <div class="la-admin__master-class pl-2">
                  <input type="checkbox" id="edit-couponStatus" name="edit-couponStatus" class="la-admin__toggle-switch" />
                  <label for="edit-couponStatus" class="la-admin__toggle-label"></label> 
            </div>
          </div>
      </div>
    </div>
    <!-- ADD CLASS MASTER TOGGLER: END -->


          <div class="box-footer">
            <button type="submit" class="btn btn-md btn-primary">
              <i class="fa fa-save"></i> {{ __('adminstaticword.Update') }}
            </button>
          </form>
          <!-- <a href="{{ route('coupon.index') }}" title="Cancel and go back" class="btn btn-md btn-default btn-flat"><i class="fa fa-reply"></i> {{ __('adminstaticword.Back') }}</a>
          -->
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

      $('#link_by').on('change',function(){
        var opt = $(this).val();
       
        if(opt == 'course'){
          $('#minAmount').hide();
          $('#probox').show();
          $('#catbox').hide();
          $('#pro_id').attr('required','required');
        }else{
          $('#minAmount').show();
          $('#probox').hide();
          $('#catbox').show();
          $('#pro_id').removeAttr('required');
        }
    });

      $('#link_by').on('change',function(){
        var opt = $(this).val();
       
        if(opt == 'category'){
          $('#catbox').show();
          $('#probox').hide();
          $('#cat_id').attr('required','required');
        }else{
          $('#catbox').hide();
          $('#probox').show();
          $('#cat_id').removeAttr('required');
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
