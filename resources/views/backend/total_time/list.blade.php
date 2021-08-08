@extends('backend.layouts.app')

@section('style')
  <style type="text/css">
    
  </style>
@endsection

@section('content')

  <ul class="breadcrumb">
            <li><a href="">Total Time</a></li>
            <li><a href="">Total Time List</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> Total Time List</h2>
        </div>

         <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">

                    {{-- start --}}
                   @include('message')
                  
                    {{-- End --}}

                    {{-- Search Box Start --}}
            <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">Total Time List Search</h3>
                  </div>

                  <div class="panel-body" style="overflow: auto;">
                    <form action="" method="get">
                        <div class="col-md-3">
                           <label>ID</label>
                           <input type="text" value="{{ Request()->idsss }}" class="form-control" placeholder="ID" name="idsss">
                        </div>

                         <div class="col-md-3">
                           <label>Username</label>
                           <input type="text" class="form-control" value="{{ Request()->user_id }}" placeholder="Username" name="user_id">
                        </div>

                        <div class="col-md-3">
                           <label>Playlist Name</label>
                           <input type="text" class="form-control" value="{{ Request()->playlist_id }}" placeholder="Playlist Name" name="playlist_id">
                        </div>
                        
                        
                        <div style="clear: both;"></div>
                        <br>
                        <div class="col-md-12">
                           <input type="submit" class="btn btn-primary" value="Search">
                           <a href="{{ url('admin/total_time') }}" class="btn btn-success">Reset</a>
                        </div>
                     </form>
                  </div>
               </div>  

                    {{-- Search Box End --}}

                    {{-- Section Start --}}
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">Total Time List</h3>
                  </div>
                 

              <div class="panel-body" style="overflow: auto;">
                  <table  class="table table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Username</th>
                              <th>Playlist Name</th>
                              <th>Total Time</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @php
                  $totalHour = 0;
                  $totalMinit = 0;
                  $totalSecond = 0;
                  @endphp
                    @forelse($getrecord as $value)
                          <tr>

                               @php
                  $time_divide = explode(':', $value->total_time);
                  $totalH = !empty($time_divide[0]) ? $time_divide[0] : 0 ;
                  $totalHour = $totalHour + $totalH;
                  $totalM =  !empty($time_divide[1]) ? $time_divide[1] : 0 ;
                  $totalMinit = $totalMinit + $totalM;
                  $totalm = !empty($time_divide[2]) ? $time_divide[2] : 0 ;
                   $totalSecond = $totalSecond + $totalm;
                @endphp



                              <td>{{ $value->id }}</td>
                              <td>{{ !empty($value->getUserName->firstname) ? $value->getUserName->firstname : '' }}</td>
                              <td>{{ !empty($value->getPlaylistName->playlist_name) ? $value->getPlaylistName->playlist_name : '' }}</td>
                              <td>{{ $value->total_time }}</td>

                              
                              
                              <td>
                              
                               <button class="btn btn-danger btn-rounded btn-sm" onClick="delete_record('{{ url('admin/total_time/delete/'.$value->id) }}');"><span class="fa fa-trash-o"></span></button> 
                   
                              </td>
                          </tr>
                         @empty
                          <tr>
                              <td colspan="100%">Record not found.</td>

                          </tr>
                          @endforelse
                          <tr>
                          <th colspan="3"> Total Time</th>
                          <td>

                        {{ $totalHour }}:{{ $totalMinit }}:{{ $totalSecond }}
                        </td>

                         </tr>
                        </tbody>

                  </table>
                  <div style="float: right">
                       {{--  {{ $getrecord->appends(Illuminate\Support\Facades\Input::except('page'))->links() }} --}}
                        {{ $getrecord->links() }} 
                  </div>
              </div>

              </div>
              {{-- Section End --}}
                    
                </div>
            </div>
        </div>


@endsection
  @section('script')
  <script type="text/javascript">
  
  </script>
@endsection
