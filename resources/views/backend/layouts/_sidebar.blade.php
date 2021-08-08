  <div class="page-sidebar">

        <ul class="x-navigation">
            

            <li class="" style="background: #F85F6A; text-align: center;">
                <a style="font-size: 22px;" href="{{ url('admin/dashboard') }}"><b>Bramhansh</b></a>
                <a href="#" class="x-navigation-control"></a>
            </li>

            <li class="@if ( Request::segment(2) == 'dashboard') active @endif">
                <a href="{{ url('admin/dashboard') }}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
            </li>

            <li class="@if ( Request::segment(2) == 'user') active @endif">
                <a href="{{ url('admin/user') }}"><span class="fa fa-user"></span> <span class="xn-text">User List</span></a>
            </li>

            <li class="@if ( Request::segment(2) == 'program') active @endif">
                <a href="{{ url('admin/program') }}"><span class="fa fa-tasks"></span> <span class="xn-text">Program List</span></a>
            </li>

            <li class="@if ( Request::segment(2) == 'playlist') active @endif">
                <a href="{{ url('admin/playlist') }}"><span class="fa fa-music"></span> <span class="xn-text">Play List</span></a>
            </li>

            <li class="@if ( Request::segment(2) == 'video') active @endif">
                <a href="{{ url('admin/video') }}"><span class="fa fa-video-camera"></span> <span class="xn-text">Video List</span></a>
            </li>


            <li class="@if ( Request::segment(2) == 'buy_now') active @endif">
                <a href="{{ url('admin/buy_now') }}"><span class="fa fa-user"></span> <span class="xn-text">Buy Now</span></a>
            </li>

            <li class="@if ( Request::segment(2) == 'feed_back') active @endif">
                <a href="{{ url('admin/feed_back') }}"><span class="fa fa-comments-o"></span> <span class="xn-text">feedback</span></a>
            </li>

              <li class="@if ( Request::segment(2) == 'total_time') active @endif">
                <a href="{{ url('admin/total_time') }}"><span class="fa fa-times"></span> <span class="xn-text">Total Time</span></a>
            </li>
            

            <li class="@if ( Request::segment(2)== 'myaccount') active @endif">
                <a href="{{ url('admin/myaccount') }}"><span class="fa fa-cog"></span> <span class="xn-text">My Account</span></a>
            </li>


              
            
           
          


        </ul>
    </div>