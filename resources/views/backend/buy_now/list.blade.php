@extends('backend.layouts.app')

@section('style')
	<style type="text/css">
		
	</style>
@endsection

@section('content')

  <ul class="breadcrumb">
            <li><a href="">Buy Now</a></li>
            <li><a href="">Buy Now List</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> Buy Now List</h2>
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
                      <h3 class="panel-title">Buy Now Search</h3>
                  </div>

                  <div class="panel-body" style="overflow: auto;">
                    <form action="" method="get">
                        <div class="col-md-3">
                           <label>ID</label>
                           <input type="text" value="{{ Request()->idsss }}" class="form-control" placeholder="ID" name="idsss">
                        </div>

                         <div class="col-md-4">
                           <label>Username</label>
                           <input type="text" class="form-control" value="{{ Request()->user_id }}" placeholder="Username" name="user_id">
                        </div>

                        

                        
                        

                        <div style="clear: both;"></div>
                        <br>
                        <div class="col-md-12">
                           <input type="submit" class="btn btn-primary" value="Search">
                           <a href="{{ url('admin/buy_now') }}" class="btn btn-success">Reset</a>
                        </div>
                     </form>
                  </div>
               </div>  

                    {{-- Search Box End --}}

                    {{-- Section Start --}}
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">
Buy Now  List</h3>
                  </div>
                 

              <div class="panel-body" style="overflow: auto;">
                  <table  class="table table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Username</th>
                               <th>Buy Status</th>
                                <th>Change Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                    @forelse($getrecord as $value)
                          <tr>
                              <td>{{ $value->id }}</td>

                                 <td>{{ !empty($value->getUserName->firstname) ? $value->getUserName->firstname : '' }}</td>
                                 
                               <td>
                                  <?php if ($value->buy_state == '0') { ?>
                                 <span class="label label-success" style="font-size: 12px;">Processing</span>
                                    
                                 <?php  }elseif ($value->buy_state == '1') { ?>
                                 <span class="label label-warning" style="font-size: 12px;">Premium Customer</span>
                                    
                                <?php }   ?>
                               </td>
                           
                               <td>
                                    <select class="form-control changeStatus" style="width: 170px;" id="{{ $value->id }}">
                                     
                                            <option {{ ($value->buy_state == '0') ? 'selected' : '' }} value="0">Processing</option>
                                            <option {{ ($value->buy_state == '1') ? 'selected' : '' }} value="1">Premium Customer</option>
                                     
                                    </select>
                                </td>
                          
                               

                              
                              <td>
                                


                            
                            

     						           <button class="btn btn-danger btn-rounded btn-sm" onClick="delete_record('{{ url('admin/buy_now/delete/'.$value->id) }}');"><span class="fa fa-trash-o"></span></button> 
                   


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
                    {{--     {{ $getrecord->appends(Illuminate\Support\Facades\Input::except('page'))->links() }} --}}
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
  
  $('.changeStatus').change(function(){
      var status_id = $(this).val();
      var order_id = $(this).attr('id');
       $.ajax({
             type:'GET',
             url:"{{url('admin/changeStatus')}}",
             data: {status_id: status_id,order_id:order_id},
             dataType: 'JSON',
             success:function(data){
                alert('Status successfully changed.');
            window.location.href = "";
             }

  
      });
  });


  </script>
@endsection
