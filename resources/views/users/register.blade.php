@extends('layouts.frontLayout.front_design')
@section('content')
  <div id="right_container">
    <div class="registration_box">
      <h2>New User Registration</h2>
      <form id="signupForm" action="{{ url('/register') }}" method="post">{{ csrf_field() }}
        <table width="100%">
          <tr>
            <td align="left" valign="top" class="body"><strong> Name:</strong></td>
            <td align="left" valign="top"><input id="name" name="name" type="text" size="22" /></td>
          </tr>
          
          <tr>
            <td align="left" valign="top" class="body"><strong> Email: </strong></td>
            <td align="left" valign="top"><input id="user_email" name="email" type="text" size="22" /></td>
          </tr>

          <tr>
            <td align="left" valign="top" class="body"><strong> Password: </strong></td>
            <td align="left" valign="top"><input id="user_password" name="password" type="password" size="22" /><span id="passstrength"></span></td>
          </tr>

          <tr>
            <td align="left" valign="top" class="body"><strong> Confirm Password: </strong></td>
            <td align="left" valign="top"><input id="confirm_password" name="confirm_password" type="password" size="22" /></td>
          </tr>

          <tr>
            <td align="left" valign="top" class="body"><strong> Date of Birth:</strong></td>
            <td align="left" valign="top"><input id="dob" name="dobirth" type="text" size="22" /></td>
          </tr>

          <tr>
            <td align="left" valign="top" class="body"><strong> Gender:</strong></td>
            <td align="left" valign="top">
                <select class="gender" name="gender">
                          <option value="Female">Female</option>
                          <option value="Male">Male</option>
                      </select>
            </td>
          </tr>
          
          <tr>
            <td></td>
            <td><input type="submit" name="submit" class="button" value="Register Now" /></td>
          </tr>
        </table>
      </form>
    </div>
    <div class="clear"></div>
  </div>
@endsection