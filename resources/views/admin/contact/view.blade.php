@extends('admin.layouts.master')
@section('title', 'View Message - Admin')
@section('body')
 
<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-md-12">
    	<div class="box box-primary">
			<h3 class="la-admin__section-title ml-2 mb-10">{{ __('adminstaticword.Message') }}</h3>
			   
			<div class="col-8">
				<div class="la-admin__contact-top pb-10">
					<h4 class="la-admin__contact-name text-capitalize mb-2" style="font-family:var(--head-font);color:var(--gray5);font-weight:var(--font-semibold);">{{ $show->fname }}</h4>
					<div class="d-flex align-items-center mb-1">
						<span class="la-icon la-icon--lg icon-contact-number"></span>
						<span class="pl-2 text-sm">{{ $show->mobile }}</span>
					</div>
					<div class="d-flex align-items-center mb-1">
						<span class="la-icon la-icon--lg icon-mail-id"></span>
						<span class="pl-2 text-sm">{{ $show->email }}</span>
					</div>
				</div>

				<div class="la-admin__contact-btm py-8" style="border-top:1px dashed var(--gray4)">
					<h5 class="m-0" style="font-weight:var(--font-semibold);">Message:</h5>
					<p class="text-sm" style="color:var(--gray4)" >{{ date('jS F Y', strtotime($show->created_at)) }}</p>

					<div class="la-admin__contact-msg">{{ $show->message }}</div>
				</div>
			</div>
      	</div>
  	</div>
  </div>
</section>
@endsection