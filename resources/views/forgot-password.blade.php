@extends('layout')
@section('body')



<!-- Start Login Form-->

@if(isset($view) && $view=="forgotView"))

<div class="login-form position-relative">
	<div class="login-form-area shadow p-50 lg-px-15 bg-white position-relative">

		@if(session()->has('msg'))


		<h5 class="text text-danger">{{session()->get('msg')}}</h5>

		@endif

		<form method="POST" action="{{route('forgotPost')}}" class="position-relative">
			@csrf
			<div class="form-logo text-center pb-50"><a href="#"><img src="{{asset('logo-3.png')}}"
						alt="logo-image"></a></div>
						
			<div class="form-group validate-input w-100 position-relative">

				<input class="form-control" type="text" name="number" id="mobile_number">
				<span class="data-placeholder" data-placeholder="Enter your phone number 92********"></span>
				@error('number')
					<span id="server_error" class="text text-danger">{{$message}}</span>
				@enderror
				<span id="js_error"></span>
					
				
			</div>


			{{-- <a class="mb-30 color-primary" href="#">Forgot Password?</a> --}}

			<button type="submit" class="btn btn-primary d-table mx-auto w-100">enter</button>

			<div class="text-center mt-30">



			</div>
		</form>

	</div>
</div>
@endif




@if(isset($enterCode) || session()->has("enterCode"))



<div class="login-form position-relative">
	<div class="login-form-area shadow p-50 lg-px-15 bg-white position-relative">

		<h4 class="text text-info">enter your code here which has been sended to your number</h4>

		<h5 class="text text-danger">{{ $msg ?? ""}}</h5>

		<form method="POST" action="{{route('forgotFinalPost')}}" class="position-relative">
			@csrf
			<div class="form-logo text-center pb-50"><a href="#"><img src="{{asset('logo-3.png')}}"
						alt="logo-image"></a></div>

			<input hidden name="userID" value="{{$userID==null?session()->get("user_id"):$userID}}" type="text">

			<div class="form-group validate-input w-100 position-relative">

				<input class="form-control" type="text" name="code">
				<span class="data-placeholder" data-placeholder="Enter your code here"></span>
			</div>


			{{-- <a class="mb-30 color-primary" href="#">Forgot Password?</a> --}}

			<button type="submit" class="btn btn-primary d-table mx-auto w-100">enter</button>

			<div class="text-center mt-30">



			</div>
		</form>

	</div>
</div>






@endif





<script>
$(document).ready(()=>{
	$("#mobile_number").on("input",function(){
			$("#server_error").hide();
		

			$regex = /^92[0-9]\d{9}$/;

			if ($regex.test($(this).val())) {
				$("#js_error").text('perfect');
				$("#js_error").removeClass('text text-danger');
				$("#js_error").addClass("text text-success");
				$("#js_error").delay(1000).fadeOut("slow");

			}else{
				$("#js_error").text("type a valid phone");
				$("#js_error").addClass('text text-danger');
			}
	});
})
</script>








@endsection