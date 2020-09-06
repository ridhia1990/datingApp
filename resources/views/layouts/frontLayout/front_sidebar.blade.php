<?php 
use App\User; 
?>

<div id="left_container">
    @if(empty(Auth::check()))
    <div class="partner_search">
        <h2>Member Login</h2>
        <div class="form_container">
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
            @endif
            <form action="{{ url('login' )}}" method="post">{{ csrf_field() }}
                <fieldset>
                    <div class="search_row">
                        <div class="search_column_1">
                            <label>Email</label>
                        </div>
                        <div class="search_column_2">
                            <input id="email" name="email" type="text" placeholder="Email" required="">
                        </div>
                    </div>
                    <div class="search_row">
                        <div class="search_column_1">
                            <label>Password</label>
                        </div>
                        <div class="search_column_2">
                            <input id="password" name="password" type="password" placeholder="Password" required="">  
                        </div>
                    </div>
                    <div class="search_row last">
                        <div class="search_column_1">&nbsp;</div>
                        <div class="search_column_2">
                            <input type="submit" value="Login" class="search_btn" style="background-color: #532D1A; color: #ffffff; width:60px;">
                        </div>
                    </div>
                    <div class="search_row last">
                        <div class="search_column_1">&nbsp;</div>
                        <div class="search_column_2"><br>
                            <h3><a href="{{ url('register') }}">Register!</a></h3>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
 @else
    <div class="partner_search">          
            <div class="form_container">
                <h2>Welcome </h2>
                <div class="link_detail">
                    <p class="link"><a href="{{ url('/profile') }}">My Profile</a></p>
                    <p class="link"><a href="{{ url('/matchedUsers') }}">Other Profiles</a></p>
                    <p class="link"><a href="{{ url('/logout') }}">Logout</a></p>
                </div>
            </div>
        </div>
     @endif



</div>