<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="/assets/css/register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   
   @extends('admin.layout.default')

   @section('titles')
       @parent  Update User
   @endsection
<body>
    @section('content')
        
  <div class="container">
    <div class="title">Update</div>
    <div class="content">
      <form action="{{ route('admin.users.updatePutUser', $users->id)}}" style="margin:50px" method="post">
        @method('put')
        @csrf
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="fullname" placeholder="Enter your name" value="{{ $users->fullname}}">
            @if ($errors->has('fullname'))
                  <span class="errors-messages" style="color: red">
                    {{ $errors->first('fullname') }}
                </span>
            @endif
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" placeholder="Enter your username" value="{{ $users->username}}">
            @if ($errors->has('username'))
                <span class="errors-messages" style="color: red">
                  {{ $errors->first('username') }}
                </span>
            @endif
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your email" value="{{ $users->email}}">
            @if ($errors->has('email'))
                <span class="errors-messages" style="color: red">
                  {{ $errors->first('email') }}
                </span>
            @endif
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phone" placeholder="Enter your number" value="{{ $users->phone}}">
            @if ($errors->has('phone'))
                <span class="errors-messages" style="color: red">
                  {{ $errors->first('phone') }}
                </span>
            @endif
          </div>
          {{-- <div class="input-box">
            <span class="details">Password</span>
            <input type="text" name="password" placeholder="Enter your password" required>
          </div> --}}
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name="address" placeholder="Confirm your address" value="{{ $users->address}}">
            @if ($errors->has('address'))
            <span class="errors-messages" style="color: red">
              {{ $errors->first('address') }}
            </span>
        @endif
          </div>
        </div>
        <div class="gender-details" value="{{ $users->gender}}">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="Update" value="Update">
        </div>
      </form>
    </div>
  </div>
  @endsection

</body>
</html>
