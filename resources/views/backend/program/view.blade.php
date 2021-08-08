
@extends('backend.layouts.app')
  @section('style')
    <style type="text/css">
      
    </style>
  @endsection 
@section('content')

        <ul class="breadcrumb">
            <li><a href="">Program</a></li>
            <li><a href="">View Program</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> View Program</h2>
        </div>

         <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
 @include('message')
                    {{-- start --}}
                     <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
            
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h3 class="panel-title">View Program</h3>
                           </div>
                           <div class="panel-body">
                              
                              <div class="form-group">
                                 <label class="col-md-3 control-label">
                                 Program ID :
                                 </label>
                                 <div class="col-sm-5" style="margin-top: 8px;">
                                    
                                    {{ $getrecord->id }}

                                 </div>
                              </div>

                              <div class="form-group">
                                 <label class="col-md-3 control-label">
                                 Program Name :
                                 </label>
                                 <div class="col-sm-5" style="margin-top: 8px;">
                                  {{ !empty($getrecord->program_name) ? $getrecord->program_name : '' }}
                                 </div>
                              </div>

                            


              <div class="form-group">
                     <label class="col-md-3 col-xs-12 control-label">Playlist Sub Option View :</label>
                     <div class="col-md-8 col-xs-12">
                        <table class="table">
                           <tr>
                             <th>Playlist ID</th>
                               <th>Playlist Name</th>
                              <th>Action</th>
                           </tr>
                           @forelse($getrecord->option as $value)
                           <tr>
                            <td>{{ $value->id }}</td>
                            
                                <td>{{ $value->playlist_name }}</td>
                                
                            <td>
                                    

                            <a onclick="return confirm('Are you sure you want to delete this option item?');" href="{{ url('admin/program/option_delete/'.$value->id) }}" class="btn btn-danger">Remove</a></td> 
                           </tr>
                           @empty
                           <tr>
                              <td colspan="100%">Record not found.</td>
                           </tr>
                           @endforelse
                        </table>
                     </div>
                  </div>



                           </div>
                           <div class="panel-footer">
                             <a class="btn btn-primary pull-right" href="{{ url('admin/program') }}"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;<span class="bold">Back</span></a>
                           
                           </div>
                        </div>
                   </form>
                    {{-- End --}}
                    
                </div>
            </div>
        </div>
 
@endsection
  @section('script')
  <script type="text/javascript">
   
  </script>
@endsection



