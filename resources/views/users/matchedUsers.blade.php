@extends('layouts.frontLayout.front_design')
@section('content')

<?php 

//echo "<pre>"; print_r($userProfile); 
?>
<div id="right_container">
	<div style="padding:20px 15px 30px 15px;">
		<h1>Other Profiles</h1>
		<div class="recent_add_prifile">
			<div class="profile_box">
				<span class="photo">
					<a href="#"><img src="{{ asset('images/frontend_images/photos/default.jpg') }}" alt="" /></a>
				</span>
				<p class="left">Name:</p>
				<p class="right"></p>
				<p class="left">Age:</p>
				<p class="right"></p>
				<p class="left">Location:</p>
				<p class="right"></p>
				<a href="#">
					<img src="{{ asset('images/frontend_images/more_btn.gif') }}" alt="" class="more_1" />
				</a> 
			</div>
		
		</div>
		<div class="expert_dating_tips"></div>       
	</div>         
</div>
@endsection