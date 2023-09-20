@extends('layout')
@section('body')

@section('header')
<style>
	.media-size {
	        
	    height:100px;
	    
	    font-size: 40px;
        font-weight: 700;
        color: orange;
        back
         
	}

	@media only screen and (max-width: 576px) {
		.media-size {
			height: 100px;
		

		}
	}

	.login-with-google-btn {
		transition: background-color .3s, box-shadow .3s;
		text-decoration: none;
		padding: 12px 16px 12px 42px;
		border: none;
		border-radius: 3px;
		box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 1px 1px rgba(0, 0, 0, .25);

		color: #757575;
		font-size: 14px;
		font-weight: 500;
		font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;

		background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMTcuNiA5LjJsLS4xLTEuOEg5djMuNGg0LjhDMTMuNiAxMiAxMyAxMyAxMiAxMy42djIuMmgzYTguOCA4LjggMCAwIDAgMi42LTYuNnoiIGZpbGw9IiM0Mjg1RjQiIGZpbGwtcnVsZT0ibm9uemVybyIvPjxwYXRoIGQ9Ik05IDE4YzIuNCAwIDQuNS0uOCA2LTIuMmwtMy0yLjJhNS40IDUuNCAwIDAgMS04LTIuOUgxVjEzYTkgOSAwIDAgMCA4IDV6IiBmaWxsPSIjMzRBODUzIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNNCAxMC43YTUuNCA1LjQgMCAwIDEgMC0zLjRWNUgxYTkgOSAwIDAgMCAwIDhsMy0yLjN6IiBmaWxsPSIjRkJCQzA1IiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNOSAzLjZjMS4zIDAgMi41LjQgMy40IDEuM0wxNSAyLjNBOSA5IDAgMCAwIDEgNWwzIDIuNGE1LjQgNS40IDAgMCAxIDUtMy43eiIgZmlsbD0iI0VBNDMzNSIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZD0iTTAgMGgxOHYxOEgweiIvPjwvZz48L3N2Zz4=);
		background-color: white;
		background-repeat: no-repeat;
		background-position: 11px 15px;

		&:hover {
			box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 2px 4px rgba(0, 0, 0, .25);
		}

		&:active {
			background-color: #eeeeee;
		}

		&:focus {
			outline: none;
			box-shadow:
				0 -1px 0 rgba(0, 0, 0, .04),
				0 2px 4px rgba(0, 0, 0, .25),
				0 0 0 3px #c8dafc;
		}

		&:disabled {
			filter: grayscale(100%);
			background-color: #ebebeb;
			box-shadow: 0 -1px 0 rgba(0, 0, 0, .04), 0 1px 1px rgba(0, 0, 0, .25);
			cursor: not-allowed;
		}
	}


	.btn-facebook {
		color: #fff;
		background-color: #3b5998;
		border-color: rgba(0, 0, 0, 0.2);
	}

	.btn-social {
		position: relative;
		padding-left: 44px;
		text-align: left;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
		font-size:14px;
	}
</style>
@endsection

<!-- Start Login Form-->
<div class="login-form position-relative" style="height: 700px">
	<div class="login-form-area shadow p-50 lg-px-15 bg-white position-relative">
		@if (session('loginFirst'))
		<div class="text-center text-success" style="background-color:rgba(11, 240, 42, 0.212)">
			<h3 style="">{{ session('loginFirst') }}</h3>
		</div>
		@endif
		@if (session('socialite_execption'))
		<div class="text-center text-danger" style="background-color:rgba(240, 26, 11, 0.288)">
			<h3 style="font-size: 20px">{{(session('socialite_execption'))}}</h3>
		</div>
		@endif
		<form method="POST" action="{{route('login')}}" class="position-relative">
			@csrf
			<div class="form-logo text-center pb-50 "><a href="">
			    <span class="media-size">Profile</span>
			   <!-- <img class="media-size"-->
						<!--src="{{asset('admin_panel-logo.png')}}" alt="logo-image">-->
						</a></div>




			<p class="text text-danger mb-2">{{Session::get("msgg")??""}}</p>



			<div class="form-group validate-input w-100 position-relative" data-validate="Valid email is: a@b.c">
				<input class="form-control" type="text" name="email">
				<span class="data-placeholder" data-placeholder="Email or Username"></span>
			</div>

			<div class="form-group validate-input w-100 position-relative" data-validate="Enter password">
				<span class="btn-show-pass">
					<i class="fa fa-eye" aria-hidden="true"></i>
				</span>

				<input class="form-control" type="password" name="password">
				<span class="data-placeholder" data-placeholder="Password"></span>
			</div>
			<a class="mb-30 color-primary" href="{{route('forgotView')}}">Forgot Password?</a>

			<button type="submit" class="btn btn-primary d-table mx-auto w-100">Sign In</button>

			<a type="button" class="login-with-google-btn mt-3" href="{{ route('loginGoogle') }}">
				Sign in with Google
			</a>

			<a href="{{url("auth/facebook")}}" style="color: white;width:100%" class="btn btn-social btn-facebook mt-3">
				<i class="fa fa-facebook fa-fw"></i> Sign in with Facebook
			</a>


		</form>
		<div class="login-form-footer color-gray">
			<ul class="form-list d-table mx-auto color-secondary-a mt-md-30">
				<li>

					<span>Don’t have an account?</span>
				</li>
				<li>
					<a class="color-primary" href="{{route('signup')}}">Sign Up!</a>
				</li>
				{{-- <li><a href="contact.html">Contact Us</a></li>
				<li><a href="index.html">Home</a></li> --}}
			</ul>
		</div>
	</div>
</div>
@endsection