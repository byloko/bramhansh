@extends('layout')

@section('title', 'Spritual Experience Box')

@section('content')
  <div class="page-header" data-parallax="true" style="background-image: url({{ url('public/assets/img/background/happy-office.jpg') }});">
    <div class="filter"></div>
    <div class="container">
      <div class="motto">
        <h1 style="font-weight: 500;margin: 5% 0;">Enriching mental well-being at workplace</h1>
        <h3>When things change inside us, things change around us</h3>
        <br />
        <button type="button text-center" class="btn-outline-neutral btn-round book-btn"><a href="{{ url('admin/login') }}" style="text-decoration: none;color: #ffffff; font-size: 16px;"><i class="fa fa-play"></i>ADMIN LOGIN</a></button>
      </div>
    </div>
  </div>
  <div class="main">
    <div class="section text-center" id="our-approach">
      <div class="container" >
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title">Our Approach</h2>
            <h5 class="title font-weight-normal">1. EMPLOYEE WELLNESS PROGRAM -EWP</h5>
            <blockquote class="blockquote text-left">
              <p class="mb-0 font-weight-normal h6"><i>Every employee has a unique
                mental well-being journey</i></p>
            </blockquote>
            <br>
            <h5 class="description text-left">Root cause of workplace stress is not confined to single factor, so to cater it an innovative
              therapeutic device is offered at your workplace , 20 min of which relaxes the mind and
              simultaneously we also assess the employee in consecutive time intervals using our
              Special EAF- Employee Assessment Form developed by team of psychologist ,next we do an
              intense data analysis which helps in designing a tailor made solution delivered especially by our
              team of versatile experts depending upon problem identified in analysis.</h5>
            <br>
          </div>
        </div>
        <br/>
        <br/>
        <h4 class="title font-weight-normal">2. The BIG question, Why EWP ?</h4>
        <br/>
        <br/>
        <div class="row">
          <div class="col-md-3">
            <div class="info">
              <div class="icon icon-danger">
                <i class="fas fa-headset"></i>
              </div>
              <div class="description">
                <h4 class="info-title">Supported By Theraputic Device</h4>
                <br>
                <p class="description">Quick 20 min. session of our
                  innovative therapeutic device
                  tunes your mind into meditative
                  calmness any where any time</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info">
              <div class="icon icon-danger">
                <i class="fab fa-medapps"></i>
              </div>
              <div class="description">
                <h4 class="info-title">Reseach Based Program</h4>
                <br>
                <p>Profound scientific
                  research studies and
                  expert intervention
                  helped us in bundling
                  a program that
                  elevates the employee
                  psychological capital</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info">
              <div class="icon icon-danger">
                <i class="nc-icon nc-chart-bar-32"></i>
              </div>
              <div class="description">
                <h4 class="info-title">Analytical Solution</h4>
                <br>
                <p>Expert designed
                  Employee Assessment
                  Form -EAF helps us
                  in delivering custom
                  made solution based
                  on problem identified
                  by data analysis</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info">
              <div class="icon icon-danger">
                <i class="nc-icon nc-sun-fog-29"></i>
              </div>
              <div class="description">
                <h4 class="info-title">Trusted</h4>
                <br>
                <p>Our device is validated by
                  psychotherapist and we are
                  a versatile team of
                  psychologist, meditation &
                  Yoga experts , etc. working
                  for Employee Mental
                  Wellness </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h4 class="title font-weight-normal">3. <i>WellMing</i>, The revolutionary gadget </h4>
            <div class="product-container row">
              <div class="product-decription col-md-6">
                <blockquote class="blockquote text-left">
                <p class="mb-0 font-weight-normal h6"><i>PEACE OF MIND
                  ON YOUR DESK</i></p>
                </blockquote>
                <h5 class="description text-left">WELLMING our innovative therapeutic device
                  effortlessly tunes your mind into meditative calmness
                  and rejuvenates you with a refreshing start again</h5>
                <br>
              </div>
              <div class="product-view col-md-6 carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                  <li data-target="#demo" data-slide-to="0" class="active"></li>
                  <li data-target="#demo" data-slide-to="1"></li>
                  <li data-target="#demo" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ url('public/assets/img/product-fullcopy.jpg') }}" height="300">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ url('public/assets/img/logo-metal.jpeg') }}" height="300">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ url('public/assets/img/product_new.jpeg') }}" height="300">
                  </div>
                </div>

                <!-- Left and right controls -->
                <!-- <a class="carousel-control-prev" href="#demo" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </a> -->
                <!-- <img src="./assets/img/product1.jpeg" alt="" height="300"> -->
              </div>
            </div>
          </div>
        </div>
        <br/>
        <br/>
        <h4 class="title font-weight-normal">4. Features</h4>
        <br/>
        <br/>
        <div class="row">
          <div class="col-md-3">
            <div class="info">
              <div class="icon icon-danger">
                <i class="far fa-smile-beam"></i>
              </div>
              <div class="description">
                <h4 class="info-title">Carefree Relax</h4>
                <br>
                <p class="description">Relax in 20 min
                  effortlessly without
                  need of expert</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info">
              <div class="icon icon-danger">
                <i class="fab fa-medapps"></i>
              </div>
              <div class="description">
                <h4 class="info-title">Reseach Based</h4>
                <br>
                <p>Derived from
                  profound research
                  studies of frequency
                  and delivered through
                  technological
                  implication</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info">
              <div class="icon icon-danger">
                <i class="fa fa-check"></i>
              </div>
              <div class="description">
                <h4 class="info-title">Validated</h4>
                <br>
                <p>Validated by
                  psychotherapist
                  using research
                  grade device</p>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info">
              <div class="icon icon-danger">
                <i class="nc-icon nc-sun-fog-29"></i>
              </div>
              <div class="description">
                <h4 class="info-title">Affilated by Govt.</h4>
                <br>
                <p>A unique way of
                  delivering frequency
                  to relax mind</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section section-dark text-center" id="about-us">
      <div class="container">
        <h2 class="title">Our team</h2>
        <h4 style="color: #e2e2e2;">We are a team of mental wellness enthusiast, meditation expert,
          psychotherapist, engineers developing and applying
          technological advancement into product and services based on
          psychological research studies for making workplace pleasant
          and filled with liveliness.</h4>
        <div class="row">
          <div class="col-md-4">
            <div class="card card-profile card-plain">
              <div class="card-avatar">
                <a href="#avatar">
                  <img src="{{ url('public/assets/img/faces/jai.jpeg') }}" alt="...">
                </a>
              </div>
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h4 class="card-title">Jaideep Tiwari</h4>
                    <h6 class="card-category">Founder & CEO</h6>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-profile card-plain">
              <div class="card-avatar">
                <a href="#avatar">
                  <img src="{{ url('public/assets/img/faces/1606923010381.jpeg') }}" alt="...">
                </a>
              </div>
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h4 class="card-title">K Kartik</h4>
                    <h6 class="card-category">Co-Founder & COO</h6>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-profile card-plain">
              <div class="card-avatar">
                <a href="#avatar">
                  <img src="{{ url('public/assets/img/faces/dr.nisha mam.jpg') }}" alt="...">
                </a>
              </div>
              <div class="card-body">
                <a href="#paper-kit">
                  <div class="author">
                    <h4 class="card-title">Dr. Nisha Goswani</h4>
                    <h6 class="card-category">Psychotherapist & Advisor</h6>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ----------------------------------------- -->
    <div class="section landing-section" id="media-recogonition">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="text-center my-5" >Media Recogonition</h2>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide col-md-8 ml-auto mr-auto" data-ride="carousel" style="height: 500px;;border: solid 1px grey;">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" >
            <div class="carousel-item active" style=" vertical-align: middle;">
              <img class="d-block w-100" src="{{ url('public/assets/img/media_recog/WhatsApp Image 2018-06-24 at 3.20.59 PM.jpeg') }}" alt="First slide" style="margin: 10% 0; vertical-align: middle;">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ url('public/assets/img/media_recog/IMG_20190530_113433_710.jpg') }}" alt="Second slide" >
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ url('public/assets/img/media_recog/IMG_20190603_123334.jpg') }}" alt="Third slide" >
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="{{ url('public/assets/img/media_recog/WhatsApp Image 2018-06-24 at 3.39.20 PM.jpeg') }}" alt="Second slide" style="height: 450px !important;">
            </div>
            <div class="carousel-item">
              <img class="d-block mr-auto ml-auto" src="{{ url('public/assets/img/media_recog/WhatsApp Image 2018-06-24 at 6.58.32 PM (3).jpeg') }}" alt="Third slide" style="height: 480px !important; width: 70%;">
            </div>
            <div class="carousel-item">
              <img class="d-block mr-auto ml-auto" src="{{ url('public/assets/img/media_recog/WhatsApp Image 2018-06-24 at 6.58.32 PM (2).jpeg') }}" alt="Third slide" style="height: 480px !important; width: 35%;">
            </div>
            <div class="carousel-item">
              <img class="d-block mr-auto ml-auto" src="{{ url('public/assets/img/media_recog/WhatsApp Image 2018-06-24 at 6.58.32 PM.jpeg') }}" alt="Third slide" style="height: 480px !important; width: 50%;">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="text-center my-5" >Supported By</h2>
        </div>
        <div class="mx-0" style="display: flex;flex-wrap: wrap; width: 100vw!important ;justify-content:center;">
          <img class="mx-5 my-3" src="{{ url('public/assets/img/supporters/forge-logo-04-trimmed.png') }}" alt="Girl in a jacket" width="200" height="100">
          <img class="mx-5 my-3" src="{{ url('public/assets/img/supporters/sine.png') }}" alt="Girl in a jacket" >
          <img class="mx-5 my-3" src="{{ url('public/assets/img/supporters/KIET.png') }}" alt="Girl in a jacket">
          <img class="mx-5 my-3" src="{{ url('public/assets/img/supporters/govt.png') }}" alt="Girl in a jacket">
          <img class="mx-5 my-3" src="{{ url('public/assets/img/supporters/36inc.png') }}" alt="Girl in a jacket">
          <img class="mx-5 my-3" src="{{ url('public/assets/img/supporters/aicte.png') }}" alt="Girl in a jacket" >
          <img class="mx-5 my-3" src="{{ url('public/assets/img/supporters/bhau_logo.png') }}" alt="Girl in a jacket">
          <img class="mx-5 my-3" src="{{ url('public/assets/img/supporters/coE.png') }}" alt="Girl in a jacket">
          <img class="mx-5 my-3" src="{{ url('public/assets/img/supporters/sstc-bi.png') }}" alt="Girl in a jacket">
          <img class="mx-5 my-3" src="{{ url('public/assets/img/supporters/startuplogo-cg.png') }}" alt="Girl in a jacket">
          <img class="mx-5 my-3" src="{{ url('public/assets/img/supporters/startupindia.png') }}" alt="Girl in a jacket">
          <img class="mx-5 my-0" src="{{ url('public/assets/img/supporters/makeinindia.jpeg') }}" alt="Girl in a jacket" >
          <img class="mx-5 my-0" src="{{ url('public/assets/img/supporters/ACND Nexus Final Logo (1).png') }}" alt="Girl in a jacket" height="100">
          <img class="mx-5 my-0" src="{{ url('public/assets/img/supporters/ACND FINAL LOGO.jpg') }}" alt="Girl in a jacket" height="100">
        </div> 
    </div>
    <!-- --------------------- -->
    <div class="section landing-section mb-3" id="contact-us">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto"  >
            <h2 class="text-center">Let's Connect</h2>
            <h4 class="text-center">We would love to hear from you.</h4>
            <form id="organization_form" class="contact-form" method="post" action="{{ url('organization_details')  }}">
            @if(Session::has('message'))
              <p id="success_msg" style="font-weight: 800;" class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li style="font-weight: 800;">{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <label>Organization</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="nc-icon nc-single-02"></i>
                      </span>
                    </div>
                    <input type="text" name="organization_name" class="form-control" placeholder="Organization" value="{{ old('organization_name') }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="nc-icon nc-email-85"></i>
                      </span>
                    </div>
                    <input type="text" id="email_id" name="email_id" class="form-control" placeholder="Email" value="{{ old('email_id') }}">
                  </div>
                </div>
              </div>
              <label>Message</label>
              <textarea class="form-control" name="message" rows="4" placeholder="Tell us your thoughts and feelings...">{{ old('message') }}</textarea>
              <div class="row">
                <div class="col-md-4 ml-auto mr-auto">
                  <button class="btn btn-danger btn-lg btn-fill" >Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    if($('.alert-danger ul li').text() != ""){
      window.scrollTo(0,document.body.scrollHeight);
    }
    if($('#success_msg').text() != ""){
      window.scrollTo(0,document.body.scrollHeight);
    }
  </script>
  @stop