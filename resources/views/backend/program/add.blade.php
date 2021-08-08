@extends('backend.layouts.app')
	
	@section('style')
	<style type="text/css">
		
	</style>
	@endsection
@section('content')

  <ul class="breadcrumb">
            <li><a href="">Program</a></li>
            <li><a href="">Add Program</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> Add Program</h2>
        </div>

         <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                    {{-- Section Start --}}
                       <form class="form-horizontal" method="post" action="{{ url('admin/program/add') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Add Program</h3>
                                </div>
                                <div class="panel-body">
                                
                                 <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Program Name <span style="color:red"> *</span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                              <input name="program_name" value="{{ old('program_name') }}" placeholder="Program Name" type="text" required class="form-control" />
                                              <span style="color:red">{{  $errors->first('program_name') }}</span>
                                          </div>
                                      </div>
                                  </div>

<hr>
                                    <div class="form-group">
            <label class="col-md-3 col-xs-12 control-label">Playlist Sub Option Add</label>
            <div class="col-md-7 col-xs-12">
               <table class="table">
                  <tr>
                     <th>Playlist Name</th>
                    
                     <th>Action</th>
                  </tr>
                  <tr>
                     <td><input  class="form-control"  name="option[100][playlist_name]" type="text"></td>
                    
                     <td><a href="#" class="item_remove btn btn-danger">Remove</a></td>
                  </tr>
                  <tr id="item_below_row100">
                     <td colspan="100%">
                        <button type="button" id="100" class="btn btn-primary add_row">Add</button>
                     </td>
                  </tr>
               </table>
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
    var item_row = 101;
   
   $("body").delegate(".add_row","click",function(e) {
      var id = $(this).attr('id');
      e.preventDefault();
      // var html = '';
      html    ='<tr><td><input  class="form-control" required name="option['+item_row+'][playlist_name]" type="text"></td>\n\
              <td><a href="#" class="item_remove btn btn-danger">Remove</a></td>\n\
              </tr>';
   
      $("#item_below_row"+id).before(html);
      item_row++;
   });

   $('body').delegate(".item_remove", "click", function(e){
    e.preventDefault();
    $(this).parent().parent().remove();
   });
  </script>
@endsection

