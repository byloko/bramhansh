@extends('backend.layouts.app')

@section('style')
	<style type="text/css">
	
	</style>
@endsection

@section('content')

  <ul class="breadcrumb">
            <li><a href="">User</a></li>
            <li><a href="">User List</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> User List</h2>
        </div>

         <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">

                    {{-- start --}}
                   @include('message')
                   <a href="{{ url('admin/user/add') }}" class="btn btn-primary" title="Add New User"><i class="fa fa-plus"></i>&nbsp;&nbsp;<span class="bold">Add New User</span></a>
                    {{-- End --}}

                    {{-- Search Box Start --}}
            <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">User Search</h3>
                  </div>

                  <div class="panel-body" style="overflow: auto;">
                    <form action="" method="get">
                        <div class="col-md-1">
                           <label>ID</label>
                           <input type="text" value="{{ Request()->idsss }}" class="form-control" placeholder="ID" name="idsss">
                        </div>
                        <div class="col-md-3">
                           <label>First Name</label>
                           <input type="text" class="form-control" value="{{ Request()->firstname }}" placeholder="First Name" name="firstname">
                        </div>
                        <div class="col-md-2">
                           <label>Last Name</label>
                           <input type="text" class="form-control" value="{{ Request()->lastname }}" placeholder="Last Name" name="lastname">
                        </div>
                       
                        <div class="col-md-3">
                           <label>Email ID</label>
                           <input type="email" class="form-control" value="{{ Request()->email }}" placeholder="Email ID" name="email">
                        </div>
                        <div class="col-md-2">
                           <label>Country</label>
                           <input type="text" class="form-control" value="{{ Request()->country }}" placeholder="Country" name="country">
                        </div>

                       <div class="col-md-1">
                           <label>Age</label>
                           <input type="text" class="form-control" value="{{ Request()->age }}" placeholder="Age" name="age">
                        </div>
                        
                        <div style="clear: both;"></div>
                        <br>
                        <div class="col-md-12">
                           <input type="submit" class="btn btn-primary" value="Search">
                           <a href="{{ url('admin/user') }}" class="btn btn-success">Reset</a>
                        </div>
                     </form>
                  </div>
               </div>  

                    {{-- Search Box End --}}

                    {{-- Section Start --}}
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">User List</h3>
                  </div>
                 

              <div class="panel-body" style="overflow: auto;">
                  <table  class="table table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Email ID</th>
                              <th>Country</th>
                  
                      <th>Age</th>
                  
                       
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                    @forelse($getrecord as $value)
                          <tr>
                              <td>{{ $value->id }}</td>
                              <td>{{ $value->firstname }}</td>
                              <td>{{ $value->lastname }}</td>                        
                              <td>{{ $value->email }}</td>
                              <td>{{ $value->country }}</td>
                                 <td>{{ $value->age }}</td>

                               

                              
                              <td>
                                
   <a href="{{ url('admin/user/view/'.$value->id) }}" class="btn btn-warning btn-rounded btn-sm"><span class="fa fa-eye"></span></a> 

                                 <a href="{{ url('admin/user/edit/'.$value->id) }}" class="btn btn-success btn-rounded btn-sm"><span class="fa fa-pencil"></span></a> 
                        
                            

     						           <button class="btn btn-danger btn-rounded btn-sm" onClick="delete_record('{{ url('admin/user/delete/'.$value->id) }}');"><span class="fa fa-trash-o"></span></button> 
                   


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
                   
                     {{--    {{ $getrecord->appends(Illuminate\Support\Facades\Input::except('page'))->links() }} --}}
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
