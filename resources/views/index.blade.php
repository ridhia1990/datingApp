@extends('layouts.frontLayout.front_design')
@section('content')
<div id="right_container">
  <div class="heading">
    <h1>Love Story</h1>
    <h2>create new friendships, experience romance &amp; find love!</h2>
    <div class="containt">
      <h3>In volutpat convallis dui. Nunc a quam quis dui auctor lacinia. </h3>
      <p> Nunc accumsan, risus sed viverra commodo, lorem diam luctus libero, rutrum placerat augue purus id augue. Donec ipsum eros, dictum a, bibendum quis, facilisis vitae, dolor. Sed pharetra felis vel arcu. Nulla a lectus. Sed eget nibh. Nunc velit. Donec nulla. Nunc id risus nec urna dignissim tristique. In hac habitasse platea dictumst. Mauris diam eros, adipiscing vitae, posuere non, hendrerit eu, velit. Etiam eu lorem ac odio lacinia euismod. Duis tincidunt. In urna. </p>
      <h4>why should i join?</h4>
      <ul>
        <li><img src="{{ asset('images/frontend_images/bullet.gif') }}" alt="" />half a million members worldwide.</li>
        <li><img src="{{ asset('images/frontend_images/bullet.gif') }}" alt="" />meet quality singles today.</li>
        <li class="last"><img src="{{ asset('images/frontend_images/bullet.gif') }}" alt="" />free to join, free to search &amp; free to chat.</li>
      </ul>
    </div>
  </div>
  <div class="recent_add_prifile">
          <div class="profile_box">
            <span class="photo"><a href="#"><img src="{{ asset('images/frontend_images/photos/default.jpg') }}" alt="" /></a></span>
          <p class="left">Name:</p>
          <p class="right"></p>
          <p class="left">Age:</p>
          <p class="right"></p>
          <p class="left">Location:</p>
          <p class="right"></p>
          <a href="#"><img src="{{ asset('images/frontend_images/more_btn.gif') }}" alt="" class="more_1" /></a> </div>
          <div class="clear"></div>
  </div>
  <div class="expert_dating_tips"></div>
  <div class="clear"></div>
</div>
@endsection