@extends('backend.layouts.app')
  @section('style')
    <style type="text/css">
      
    </style>
  @endsection 
@section('content')

        <ul class="breadcrumb">
            <li><a href="">Video</a></li>
            <li><a href="">Edit Video</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> Edit Video</h2>
        </div>

         <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                      @include('message')
                  {{-- Section Start --}}
                      
                          <div class="panel panel-default">
                             <div class="panel-heading">
                                <h3 class="panel-title"> Edit Video</h3>
                             </div>

                             <form class="form-horizontal" method="post" action="{{ url('admin/video/edit/'.$getrecord->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}


                             <div class="panel-body">


   <div class="form-group">
    <label class="col-md-3 col-xs-12 control-label">Program Name<span style="color:red"> *</span></label>
        <div class="col-md-7 col-xs-12">
            <div class="">
                <select class="form-control" name="program_id" required id="getUser">
                 @foreach($getProgramRecord as $value)
                 <option {{ ( $value->id == $getrecord->program_id) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->program_name }}</option>
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
              @foreach ($getPlaylist as $element)
               <option {{ ( $element->id == $getrecord->playlist_id) ? 'selected' : '' }} value="{{ $element->id }}">{{ $element->playlist_name }}</option>
              @endforeach
            </select>
                
            </div>
        </div>
    </div> 

    <div class="form-group">
      <label class="col-md-3 col-xs-12 control-label">Video Title<span style="color:red"> *</span></label>
          <div class="col-md-7 col-xs-12">
              <div class="">
                  <input name="video_title" value="{{ $getrecord->video_title }}" placeholder="Video Title" type="text" required class="form-control" />
                  <span style="color:red">{{  $errors->first('video_title') }}</span>
              </div>
          </div>
      </div>


    



                               
                               <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Video Upload <span style="color:red"> *</span></label>
                                   <div class="col-md-7 col-xs-12">
                                      <div class="">
                                         <input name="video_url" placeholder="Video Upload" type="file" required class="form-control" /><br>
                                          @if(!empty($getrecord->video_url))
                                               <iframe width="200" height="100" src="{{ url('upload/'.$getrecord->video_url) }}">
                </iframe>
                                            @endif
                                         <span style="color:red">{{  $errors->first('video_url') }}</span>
                                      </div>
                                   </div>
                                </div>



         


                              
                               
                              </div>
                             <div class="panel-footer">
                                <button class="btn btn-primary pull-right">Update</button>
                             </div>

                            </form>

                          </div>
                      
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

  // Image
  
  </script>
@endsection
