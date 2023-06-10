@extends('admin/layouts.master')
@section('title', 'View Classes - Admin')
@section('body')

<section class="content">

	@include('admin.course.partial.index')
      	
</section>

@endsection

@section('script')
<script src="{{url('js/multifilter.min.js')}}"></script>

<script type='text/javascript'>
 
  $(document).ready(function() {

    $('.filter').multifilter({
      'target' : $('#example1')
    })

    $('#example1_filter').hide();

  });
    
  </script>
  
@endsection
  