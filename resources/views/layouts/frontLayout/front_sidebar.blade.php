<div id="left_container">
    <div class="partner_search">
        <h2>Member Login</h2>
        <div class="form_container">
            <form action="{{ url('login' )}}" method="post">{{ csrf_field() }}
                <fieldset>
                    <div class="search_row">
                        <div class="search_column_1">
                            <label>Username</label>
                        </div>
                        <div class="search_column_2">
                            <input id="username" name="username" type="text" placeholder="Username" required="">
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
</div>