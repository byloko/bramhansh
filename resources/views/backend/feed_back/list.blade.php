@extends('backend.layouts.app')

@section('style')
  <style type="text/css">
    
  </style>
@endsection

@section('content')

  <ul class="breadcrumb">
            <li><a href="">Feedback</a></li>
            <li><a href="">Feedback List</a></li>
        </ul>
        
        <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> Feedback List</h2>
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
                      <h3 class="panel-title">Feedback List Search</h3>
                  </div>

                  <div class="panel-body" style="overflow: auto;">
                    <form action="" method="get">
                        <div class="col-md-2">
                           <label>ID</label>
                           <input type="text" value="{{ Request()->idsss }}" class="form-control" placeholder="ID" name="idsss">
                        </div>

                         <div class="col-md-3">
                           <label>Username</label>
                           <input type="text" class="form-control" value="{{ Request()->user_id }}" placeholder="Username" name="user_id">
                        </div>

                        <div class="col-md-3">
                           <label>Feedback Rate</label>
                           <input type="text" class="form-control" value="{{ Request()->feedback_rate }}" placeholder="Feedback Rate" name="feedback_rate">
                        </div>
                        
                        <div class="col-md-4">
                           <label>Feedback Message</label>
                           <input type="text" class="form-control" value="{{ Request()->feedback_message }}" placeholder="Feedback Message" name="feedback_message">
                        </div>
                        
                        
                        
                        <div style="clear: both;"></div>
                        <br>
                        <div class="col-md-12">
                           <input type="submit" class="btn btn-primary" value="Search">
                           <a href="{{ url('admin/feed_back') }}" class="btn btn-success">Reset</a>
                        </div>
                     </form>
                  </div>
               </div>  

                    {{-- Search Box End --}}

                    {{-- Section Start --}}
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">Feedback List</h3>
                  </div>
                 

              <div class="panel-body" style="overflow: auto;">
                  <table  class="table table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Username</th>
                              <th>Feedback Rate</th>
                              <th>Feedback Message</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                    @forelse($getrecord as $value)
                          <tr>
                              <td>{{ $value->id }}</td>
                              <td>{{ !empty($value->getUserName->firstname) ? $value->getUserName->firstname : '' }}</td>
                              <td>{{ $value->feedback_rate }}</td>
                              <td>{{ $value->feedback_message }}</td>
                              
                              <td>
                              
                               <button class="btn btn-danger btn-rounded btn-sm" onClick="delete_record('{{ url('admin/feed_back/delete/'.$value->id) }}');"><span class="fa fa-trash-o"></span></button> 
                   
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
                   {{--      {{ $getrecord->appends(Illuminate\Support\Facades\Input::except('page'))->links() }} --}}

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
