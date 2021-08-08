@extends('backend.layouts.app')

@section('style')
	<style type="text/css">
		
	</style>
@endsection

@section('content')

  <ul class="breadcrumb">
            <li><a href="">Video</a></li>
            <li><a href="">Video List</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> Video List</h2>
        </div>

         <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">

                    {{-- start --}}
                   @include('message')
                   <a href="{{ url('admin/video/add') }}" class="btn btn-primary" title="Add New Video"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New Video</span></a>
                    {{-- End --}}

                    {{-- Search Box Start --}}
            <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">Video Search</h3>
                  </div>

                  <div class="panel-body" style="overflow: auto;">
                    <form action="" method="get">
                        <div class="col-md-3">
                           <label>ID</label>
                           <input type="text" value="{{ Request()->idsss }}" class="form-control" placeholder="ID" name="idsss">
                        </div>

                         <div class="col-md-3">
                           <label>Program Name</label>
                           <input type="text" class="form-control" value="{{ Request()->program_id }}" placeholder="Program Name" name="program_id">
                        </div>

                          <div class="col-md-3">
                           <label>Playlist Name</label>
                           <input type="text" class="form-control" value="{{ Request()->playlist_id }}" placeholder="Playlist Name" name="playlist_id">
                        </div>


                        <div class="col-md-3">
                           <label>Video Title</label>
                           <input type="text" class="form-control" value="{{ Request()->video_title }}" placeholder="Video Title" name="video_title">
                        </div>
                        
                        

                        <div style="clear: both;"></div>
                        <br>
                        <div class="col-md-12">
                           <input type="submit" class="btn btn-primary" value="Search">
                           <a href="{{ url('admin/video') }}" class="btn btn-success">Reset</a>
                        </div>
                     </form>
                  </div>
               </div>  

                    {{-- Search Box End --}}

                    {{-- Section Start --}}
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">Video  List</h3>
                  </div>
                 

              <div class="panel-body" style="overflow: auto;">
                  <table  class="table table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Program Name</th>
                               <th>Playlist Name</th>
                              <th>Video Title</th>
                              <th>Video </th>
                         
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                    @forelse($getrecord as $value)
                          <tr>
                              <td>{{ $value->id }}</td>

                                 <td>{{ !empty($value->getProgramName->program_name) ? $value->getProgramName->program_name : '' }}</td>
                                    <td>{{ !empty($value->getPlaylistName->playlist_name) ? $value->getPlaylistName->playlist_name : '' }}</td>
                              <td>{{ $value->video_title }}</td>

                                <td> 
                                   @if(!empty($value->video_url))
                <iframe width="200" height="100" src="{{ url('upload/'.$value->video_url) }}">
                </iframe>
                @endif
                                </td>
                            
                               

                              
                              <td>
                                


                                 <a href="{{ url('admin/video/edit/'.$value->id) }}" class="btn btn-success btn-rounded btn-sm"><span class="fa fa-pencil"></span></a> 
                        
                            

     						           <button class="btn btn-danger btn-rounded btn-sm" onClick="delete_record('{{ url('admin/video/delete/'.$value->id) }}');"><span class="fa fa-trash-o"></span></button> 
                   


                               <!-- MESSAGE BOX-->
     
                    <!-- END MESSAGE BOX-->    


                              </td>
                          </tr>
                         @empty
                          <tr>
                              <td colspan="100%">Record not found.</td>

                          </tr>
                          @endforelse
                      </tbody>

                  </table>
                  <div style="float: right">
                      {{--   {{ $getrecord->appends(Illuminate\Support\Facades\Input::except('page'))->links() }} --}}
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
