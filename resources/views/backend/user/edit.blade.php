@extends('backend.layouts.app')
  @section('style')
    <style type="text/css">
      
    </style>
  @endsection 
@section('content')

        <ul class="breadcrumb">
            <li><a href="">User</a></li>
            <li><a href="">Edit User</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> Edit User</h2>
        </div>

         <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">

                  {{-- Section Start --}}
                      
                          <div class="panel panel-default">
                             <div class="panel-heading">
                                <h3 class="panel-title"> Edit User</h3>
                             </div>

                             <form class="form-horizontal" method="post" action="{{ url('admin/user/edit/'.$getrecord->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}


                             <div class="panel-body">
                               
                               <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">First Name <span style="color:red"> *</span></label>
                                   <div class="col-md-7 col-xs-12">
                                      <div class="">
                                         <input name="firstname" readonly value="{{ $getrecord->firstname }}" placeholder="First Name" type="text" required class="form-control" />
                                         <span style="color:red">{{  $errors->first('firstname') }}</span>
                                      </div>
                                   </div>
                                </div>

                                   <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Last Name <span style="color:red"> </span></label>
                                   <div class="col-md-7 col-xs-12">
                                      <div class="">
                                         <input name="lastname" value="{{ $getrecord->lastname }}" placeholder="Last Name" type="text" class="form-control" />
                                         <span style="color:red">{{  $errors->first('lastname') }}</span>
                                      </div>
                                   </div>
                                </div>

                                 <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Email ID <span style="color:red"> *</span></label>
                                   <div class="col-md-7 col-xs-12">
                                      <div class="">
                                         <input name="email" readonly value="{{ $getrecord->email }}" placeholder="Email ID" type="email" class="form-control" />
                                         <span style="color:red">{{  $errors->first('email') }}</span>
                                      </div>
                                   </div>
                                </div>

                               
                             
                              
                                        <div class="form-group">
                                   <label class="col-md-3 col-xs-12 control-label">Password <span style="color:red"> </span></label>
                                   <div class="col-md-7 col-xs-12">
                                      <div class="">
                                         <input name="password" value="" placeholder="Password" type="text" class="form-control" />
                                           <span style="color:red">{{  $errors->first('password') }}</span>
                                             (Leave blank if you are not changing the password)
                                      </div>
                                   </div>
                                </div>
                            
                             <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Country  <span style="color:red"> </span></label>
                                   <div class="col-md-7 col-xs-12">
                                      <div class="">
                                         <input name="country" value="{{ $getrecord->country }}" placeholder="Country" type="text" class="form-control" />
                                         <span style="color:red">{{  $errors->first('country') }}</span>
                                      </div>
                                   </div>
                                </div>

                                 
                                   <div class="form-group">
                                  <label class="col-md-3 col-xs-12 control-label">Age <span style="color:red"> *</span></label>
                                   <div class="col-md-7 col-xs-12">
                                      <div class="">
                                         <input name="age" required value="{{ $getrecord->age }}" placeholder="Age" type="number" maxlength="10" minlength="10" class="form-control" />
                                         <span style="color:red">{{  $errors->first('age') }}</span>
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
   
  </script>
@endsection
