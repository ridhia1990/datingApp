@extends('layouts.frontLayout.front_design')
@section('content')

<?php 

//echo "<pre>"; print_r($userProfile); 
?>
<div id="right_container">
	<div style="padding:20px 15px 30px 15px;">
		<h1>Other Profiles</h1>
		<div class="recent_add_prifile">
			<?php $count=1; ?>
	            @foreach($matchedUsers as $user)             
	                
	                  	<div class="profile_box">
		                    @if(!empty($user->photo))
		                      <span class="photo"><a href="{{ url('profile/'.$user->photo) }}"><img sizes="50" src="{{ asset('images/frontend_images/photos/'.$user->photo) }}" alt="" /></a></span>
		                    @else
		                      <span class="photo"><a href="{{ url('profile/'.$user->photo) }}"><img src="{{ asset('images/frontend_images/photos/default.jpg') }}" alt="" /></a></span>
		                    @endif
		                  <p>{{ $user->name }}</p>
		                  <p class="left">Age:</p>
		                  <p class="right"><?php echo $diff = date('Y') - date('Y',strtotime($user->dobirth)); ?> Yrs.</p>
		                  <p class="left">Gender:</p>
		                  <p class="right">{{ $user->gender }}</p>
		                  
		                  <p>
		                  	<button type="button" class="btn btn-primary">Like</button>
							<button type="button" class="btn btn-success">Dislike</button>
		                  </p>
	               		</div>
	                  
	                
	            @endforeach
		
		</div>
		
		<div class="expert_dating_tips"></div>       
	</div>         
</div>
@endsection