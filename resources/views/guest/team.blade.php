@extends('layouts.main')

@section('title')
    Property Details
@endsection

@include('layouts.header-general')

@section ('mainContent')
   
        <div class="team">

            <div class="team-row">
      
              <div class="col-12 col-sm-6 col-md-4 col-lg-2 team-col">
                <div class="our-team">
                  <div class="picture">
                    <img class="img-fluid" src="{{asset('img/img-team/figo.jpg')}}">
                  </div>
                  <div class="team-content">
                    <h3 class="name">Jacopo Nigro</h3>
                    <h5>API REST Specialist</h5>
                  </div>
                  <ul class="social">
                    <li><a href="https://www.linkedin.com/in/jacopo-nigro-54a02b200/" class="fab fa-linkedin-in" aria-hidden="true"></a></li>
                  </ul>
                </div>
              </div>
      
              <div class="col-12 col-sm-6 col-md-4 col-lg-2 team-col">
                <div class="our-team">
                  <div class="picture">
                    <img class="img-fluid" src="{{asset('img/img-team/elisa.jpg')}}">
                  </div>
                  <div class="team-content">
                    <h3 class="name">Elisa Torazza</h3>
                    <h5>Front-End Web Developer</h5>
                  </div>
                  <ul class="social">
                    <li><a href="https://www.linkedin.com/in/elisatorazza/" class="fab fa-linkedin-in" aria-hidden="true"></a></li>
                  </ul>
                </div>
              </div>
      
      
              <div class="col-12 col-sm-6 col-md-4 col-lg-2 team-col">
                <div class="our-team">
                  <div class="picture">
                    <img class="img-fluid" src="{{asset('img/img-team/enrico.jpg')}}">
                  </div>
                  <div class="team-content">
                    <h3 class="name">Enrico Bellanti</h3>
                    <h5>Back-End Web Specialist</h5>
                  </div>
                  <ul class="social">
                    <li><a href="https://www.linkedin.com/in/enrico-bellanti/" class="fab fa-linkedin-in" aria-hidden="true"></a></li>
                  </ul>
                </div>
              </div>
      
      
              <div class="col-12 col-sm-6 col-md-4 col-lg-2 team-col">
                <div class="our-team">
                  <div class="picture">
                    <img class="img-fluid" src="{{asset('img/img-team/jessica.jpg')}}">
                  </div>
                  <div class="team-content">
                    <h3 class="name">Jessica Donzelli</h3>
                    <h5>Front-End Web Developer</h5>
                  </div>
                  <ul class="social">
                    <li><a href="https://www.linkedin.com/in/jdonzelli/" class="fab fa-linkedin-in" aria-hidden="true"></a></li>
                  </ul>
                </div>
              </div>
      
      
              <div class="col-12 col-sm-6 col-md-4 col-lg-2 team-col">
                <div class="our-team">
                  <div class="picture">
                    <img class="img-fluid" src="{{asset('img/img-team/robi.jpg')}}">
                  </div>
                  <div class="team-content">
                    <h3 class="name">Roberto Del Toro</h3>
                    <h5>Database Administrator</h5>
                  </div>
                  <ul class="social">
                    <li><a href="https://www.linkedin.com/in/roberto-del-toro-320001140/" class="fab fa-linkedin-in" aria-hidden="true"></a></li>
                  </ul>
                </div>
              </div>
      
          </div>
        </div>
    
@endsection