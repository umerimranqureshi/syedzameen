@extends('layout')



@section('header')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
	integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>

<style>
	.media-size {
		height: 100px
	}

	@media only screen and (max-width: 600px) {
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
	}
</style>
@endsection

@section('body')



<!-- Start Login Form-->
<div class="login-form position-relative" style="height: 810px;margin-top: 153px">
	<div class="login-form-area shadow p-20 lg-px-20 bg-white position-relative">
		<form method="POST" action="{{route('register')}}" class="position-relative">
			@csrf
			<div class="form-logo text-center">
			    <a href="#">
			        <img class="media-size" src="{{asset('login-logo.png')}}"
						alt="logo-image">
						</a></div>


			<div class="form-group validate-input w-100 mb-5 position-relative">
				<input class="form-control" type="text" name="name">
				<span class="data-placeholder" data-placeholder="Name"></span>

				@if($errors->register->has('name'))

				<span style="font-size: 15px" class="text text-danger">{{$errors->register->first('name')}}</span>


				@endif

			</div>







			<div class="form-group validate-input w-100 position-relative" data-validate="Valid email is: a@b.c">
				<input class="form-control" type="text" name="email">
				<span class="data-placeholder" data-placeholder="Email"></span>

				@if($errors->register->has('email'))

				<span style="font-size: 15px" class="text text-danger">{{$errors->register->first('email')}}</span>


				@endif


			</div>


			<div class="form-group validate-input w-100 position-relative">
				<input id="mobile_number" class="form-control" type="text" name="mobile_number">
				<span class="data-placeholder" data-placeholder="92**********"></span>
				<label id="error_mobile"></label>
				@if($errors->register->has('mobile_number'))

				<span style="font-size: 15px" class="text text-danger"
					id="server_error">{{$errors->register->first('mobile_number')}}</span>


				@endif
				@if(session('msg'))
				<span style="font-size: 15px" class="text text-danger" id="server_error">{{session('msg')}}</span>
				@endif


			</div>


			<div class="form-group validate-input w-100 position-relative">
				<span class="btn-show-pass">
					<i class="fa fa-eye" aria-hidden="true"></i>
				</span>

				<input class="form-control" type="password" name="password" id="pass">
				<span class="data-placeholder" data-placeholder="Password"></span>



				@if($errors->register->has('password'))

				<span style="font-size: 15px" class="text text-danger">{{$errors->register->first('password')}}</span>


				@endif

			</div>



			<div class="form-group validate-input w-100 position-relative">
				<span class="btn-show-pass">
					<i class="fa fa-eye" aria-hidden="true"></i>
				</span>

				<input class="form-control" type="password" name="password_confirmation" id="con_pass">
				<span class="data-placeholder" data-placeholder="confirm password"></span>
				<span id="password_match"></span>
				@if($errors->register->has('password_confirmation'))

				<span style="font-size: 15px"
					class="text text-danger">{{$errors->register->first('password_confirmation')}}</span>


				@endif


			</div>




			<a class="mb-30 color-primary" href="{{route('login')}}">Sign in?</a>

			<button id="signup-button" type="submit" class="btn btn-primary d-table mx-auto w-100 ">Sign UP</button>

			<a type="button" class="login-with-google-btn mt-3" href="{{ route('loginGoogle') }}">
				Sign up with Google
			</a>
			<a href="{{url("auth/facebook")}}" style="color: white;width:100%" class="btn btn-social btn-facebook mt-3">
				<i class="fa fa-facebook fa-fw"></i> Sign up with Facebook
			</a>

		</form>

	</div>
</div>

<script>
	/* 	document.getElementById("mobile_number").addEventListener("keydown", function (event) {

			//console.log(event);
			if (event.code == "Backspace" || event.key == "Backspace") {
				console.log("backspace");
			}
			//console.log("");

		});
	 */



	$("document").ready(function () {

		$("#mobile_number").keyup(function () {
			$value = this.value;
			// console.log($value, "keypress");


			/* setInterval(function () {

				console.log($value, "interval data");
			}, 1000); */
			checkPhoneField($(this).attr("id"));
		});

		$("#mobile_number").keyup(function (event) {
			//		console.log("back");
			if (event.key === "Backspace") {
				// console.log("backspace");
				checkPhoneField($(this).attr("id"));
				// console.log(this.value);
			}

		});

		$("#mobile_number").on("input",function(){
			$("#server_error").hide();
			if(!$(this).val()){

				$("#error_mobile").hide();
			}else{
				$("#error_mobile").show();
			}

		});
		$("#con_pass").on("input",function(){
			if(!$(this).val()){
				$("#password_match").hide();
			}
			else if($("#pass").val()!=$(this).val()){
				$("#password_match").show();
				$("#password_match").text('password not match');
				$("#password_match").addClass('text text-danger');
			}else{
				$("#password_match").text('matched!');
				$("#password_match").removeClass("text text-danger");
				$("#password_match").addClass('text text-success');
				$("#password_match").delay(700).fadeOut("slow");

			}
		});

		function checkPhoneField(elementID) {
			//console.log($("#" + elementID).val());
			$regex = /^92[0-9]\d{9}$/;
			if ($regex.test($("#" + elementID).val())) {
				//console.log($(`#${elementID}`).value, "match");
				$("#error_mobile").text("perfect");
				$("#error_mobile").delay(1000).fadeOut("slow");
				$("#error_mobile").removeClass("text text-danger");
				$("#error_mobile").addClass("text text-success");
				$("#signup-button").prop("disabled", false);
			} else {
				//console.log($(`#${elementID}`).value, "not match");

				$("#error_mobile").text("type valid mobile number");
				$("#error_mobile").addClass("text text-danger");
				$("#signup-button").prop("disabled", true);

			}






		}


	});






</script>





@endsection