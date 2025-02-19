

<section class="content">
  <div class="row">
    <div class="col-12">
    
        <div class="box-header">
          <a href="{{ action('LanguageController@create') }}" class="btn btn-info btn-sm">+ {{ __('adminstaticword.Add') }}</a>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
           
                <tr class="table-heading-row">
                  <th>#</th>                
                  <th>{{ __('adminstaticword.Name') }}</th>
                  <th>{{ __('adminstaticword.Local') }}</th>
                  <th>{{ __('adminstaticword.Default') }}</th>
                  <th>{{ __('adminstaticword.Edit') }}</th>
                </tr>
              </thead>
              @if ($languages)
                <tbody>
                  @foreach ($languages as $key => $language)
                    <tr>
                      <td>
                        {{$key+1}}
                      </td>
                      <td>{{$language->name}}</td>
                      <td>{{$language->local}}</td>
                      <td align="left">
                        @if($language->def ==1)
                          <i class="text-success fa fa-check"></i>
                        @else
                          <i class="text-danger fa fa-times"></i>
                        @endif
                      </td>
                      
                      <td><a class="btn btn-success btn-sm" href="{{route('adminstatic.lang', $language->local)}}">
                        <i class="fa fa-edit"></i></a>
                      </td>

                     
                    </tr>
                    
                  @endforeach
                </tbody>
              @endif
            </table>
        </div>
        <!-- /.box-body -->
     
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>