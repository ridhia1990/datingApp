@extends('layouts.frontLayout.front_design')
@section('content')

<?php 

//echo "<pre>"; print_r($userProfile); 
?>
  <div id="right_container">
        <div style="padding:20px 15px 30px 15px;">
          <h1>{{ $userProfile->name }}</h1>
          
          <div style="float: left;">
            
            <strong>Name:</strong> {{ $userProfile->name }}<br>
            <strong>Email:</strong> {{ $userProfile->email }}<br>
            <strong>Date of Birth:</strong> {{ $userProfile->dobirth }}<br>
            <strong>Gender:</strong> {{ $userProfile->gender }}<br>
                       
            <div class="clear"></div>
          </div>
          <div style="float: right;">
             @if(!empty($userProfile->photo))
              <img src="{{ asset('images/frontend_images/photos/'.$userProfile->photo) }}" alt="" width="210" class="aboutus-img" />
            @else
              <img src="{{ asset('images/frontend_images/photos/default.jpg') }}" alt="" width="210" class="aboutus-img" />
            @endif
          </div>
          <div class="clear"></div>
                    
          </div>         
        </div>
@endsection