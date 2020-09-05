@extends('layouts.frontLayout.front_design')
@section('content')

<?php 

//echo "<pre>"; print_r($userProfile); 
?>
  <div id="right_container">
        <div style="padding:20px 15px 30px 15px;">
          <h1>{{ $userProfile->name }}</h1>
          
          <div>
            
            <strong>Name:</strong> {{ $userProfile->name }}<br>
            <strong>Email:</strong> {{ $userProfile->email }}<br>
            <strong>Date of Birth:</strong> {{ $userProfile->dobirth }}<br>
            <strong>Gender:</strong> {{ $userProfile->gender }}<br>
            
           
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
                    
          </div>         
        </div>
@endsection