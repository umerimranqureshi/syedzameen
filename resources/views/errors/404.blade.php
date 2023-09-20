@extends('layout')

@section('body')
<div class="error-page py-80" style="background: url({{asset('7.png')}}) no-repeat center right/45%; height: 100vh">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-lg-12">
				<div class="error-info text-center w-50">
					<h1 class="color-primary" style="font-size: 96px">404</h1>
					<h2 class="py-20 color-secondary">Opps! Page Not Found</h2>
					<p>The page you are looking for might have been removed Had its name changed
                        or its temporarily removed.
                    </p>
					<a class="btn btn-primary mt-30" href="{{route('home')}}">Back to Home</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection