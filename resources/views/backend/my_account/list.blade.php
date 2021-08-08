@extends('backend.layouts.app')
  @section('style')
    <style type="text/css">
      
    </style>
  @endsection 
@section('content')

        <ul class="breadcrumb">
            <li><a href="">My Account</a></li>
            <li><a href="">My Account List</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> My Account List</h2>
        </div>

         <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">

                    {{-- start --}}
                        @include('message')
                        
                    <form class="form-horizontal" method="post" action="{{ url('admin/myaccount/add') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"> Update My Account</h3>
                                </div>
                                <div class="panel-body">
                                
                                 <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Name<span style="color:red"> *</span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                              <input name="firstname" value="{{ $user->firstname }}" required placeholder="Firstname" type="text" class="form-control" />
                                              <span style="color:red">{{  $errors->first('firstname') }}</span>
                                          </div>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Email ID<span style="color:red"> *</span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                              <input name="email" readonly value="{{ $user->email }}" required placeholder="Email ID" type="email" class="form-control" />
                                              <span style="color:red">{{  $errors->first('email') }}</span>
                                          </div>
                                      </div>
                                  </div>

                                     <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Password<span style="color:red"> *</span></label>
                                      <div class="col-md-7 col-xs-12">
                                          <div class="">
                                              <input name="password" readonly value="" placeholder="Password" type="text" class="form-control" />
                                              <span style="color:red">{{  $errors->first('password') }}</span>
                                                (Leave blank if you are not changing the password)
                                          </div>
                                      </div>
                                  </div>
                                 

                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-primary pull-right">Update</button>
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





