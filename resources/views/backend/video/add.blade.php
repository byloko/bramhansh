@extends('backend.layouts.app')
	
	@section('style')
	<style type="text/css">
		
	</style>
	@endsection
@section('content')

  <ul class="breadcrumb">
            <li><a href="">Video</a></li>
            <li><a href="">Add Video</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> Add Video</h2>
        </div>

         <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                    {{-- Section Start --}}
                       <form class="form-horizontal" method="post" action="{{ url('admin/video/add') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Add Video</h3>
                                </div>
                                <div class="panel-body">
                                
                                <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Program Name <span style="color:red"> *</span></label>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="">
                                            <select class="form-control" name="program_id" required id="getUser">
                                             <option value="">Select Program Name</option>
                                          @foreach($getProgramRecord as $value)
                                             <option value="{{ $value->id }}">{{ $value->program_name }}</option>
                                          @endforeach
                                           </select>
                                        </div>
                                    </div>
                                </div> 

                                  <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Playlist Name <span style="color:red"> *</span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                         <select class="form-control" required name="playlist_id" id="getCategory">
                                            <option value="">Select Playlist Name</option>
                                          </select>
                                              
                                          </div>
                                      </div>
                                  </div> 
    
                               <div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label">Video Title<span style="color:red"> *</span></label>
                                    <div class="col-md-7 col-xs-12">
                                        <div class="">
                                            <input name="video_title" value="{{ old('video_title') }}" placeholder="Video Title" type="text" required class="form-control" />
                                            <span style="color:red">{{  $errors->first('video_title') }}</span>
                                        </div>
                                    </div>
                                </div>

                        

                                 <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Video Upload<span style="color:red"> *</span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                              <input name="video_url" placeholder="Video Upload" type="file" required class="form-control" />
                                              <span style="color:red">{{  $errors->first('video_url') }}</span>
                                          </div>
                                      </div>
                                  </div>

                              

                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                        </form>
                    {{-- Section End --}}
                </div>
            </div>
        </div>

@endsection
  @section('script')
  <script type="text/javascript">
  $('#getUser').change(function(){
      var id = $(this).val();
      $.ajax({
         url: "{{ url('admin/video/get_play_list_dropdown') }}",
         type: "POST",
         data:{
           "_token": "{{ csrf_token() }}",
             id:id,
          },
          dataType:"json",
          success:function(response){
            $('#getCategory').html(response.success);
          },
      });

});  




  </script>
@endsection

