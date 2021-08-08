@extends('backend.layouts.app')
  @section('style')
    <style type="text/css">
      
    </style>
  @endsection 
@section('content')

        <ul class="breadcrumb">
            <li><a href="">User</a></li>
            <li><a href="">View User</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> View User</h2>
        </div>

         <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                 @include('message')
                    {{-- start --}}
                     <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
            
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h3 class="panel-title">View User</h3>
                           </div>
                           <div class="panel-body">
                              
                              <div class="form-group">
                                 <label class="col-md-3 control-label">
                                 User ID :
                                 </label>
                                 <div class="col-sm-5" style="margin-top: 8px;">
                                    
                                    {{ $getrecord->id }}

                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-md-3 control-label">
                                Username :
                                 </label>
                                 <div class="col-sm-5" style="margin-top: 8px;">
                                    
                                  {{ !empty($getrecord->firstname) ? $getrecord->firstname : '' }}
                                    
                                 </div>
                              </div>

                           </div>
                        </div>
                   </form>
                    {{-- End --}}


                    {{-- Start --}}

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
                    </tr>
                </thead>
                <tbody>
                  @php
                  $totalHour = 0;
                  $totalMinit = 0;
                  $totalSecond = 0;
                  @endphp
            
                    @forelse($getrecord->get_time_details as $value)
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
              
            </div>
        </div>

 <div class="panel-footer">
   <a class="btn btn-primary pull-right" href="{{ url('admin/user') }}"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;<span class="bold">Back</span></a>
 </div>

</div>

                     {{-- End --}}
                    
                </div>
            </div>
        </div>
 
@endsection
  @section('script')
  <script type="text/javascript">
   
  </script>
@endsection



