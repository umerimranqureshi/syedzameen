@extends('Layout')


@section('body')
{{-- <div class="page-banner overlay-black" style="padding: 150px 0">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-lg-12">
				<h1 class="page-banner-title color-primary">Invoice</h1>
				<div class="text-area w-50 mt-15 color-white">
					<p>Porttitor luctus est sit lacinia non praesent aptent hymenaeos taciti tortor. Sociosq platea porta facilisis vitae dictum bibendun tellus ante fusce vulputate dolor lorem vulputate hac quisque diam etiam.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bg-secondary">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb m-0 py-15 px-0 bg-transparent hover-white-primary">
				    <li class="breadcrumb-item"><a href="#">Home</a></li>
				    <li class="breadcrumb-item"><a href="#">Pages</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Invoice</li>
				  </ol>
				</nav>
			</div>
		</div>
	</div>
</div> --}}
<!-- Page Banner End
==================================================================-->
<!-- Invoice List Start
==================================================-->
<section class="invoice-list bg-light">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="invoice-list-table w-100">
					<h3 class="mb-30 text-center color-secondary">Your request has been sucessfully sent to following agent</h3>
					<h3 class="mb-30 text-center color-secondary">Go to dashboard to see all requests</h3>
                    <table class="w-100">
                        <thead>
                            <tr class="color-white">
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile No</th>
                                <th>Address</th>
                                <th>Identity</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($postOfUser as $post)
                            <tr>
                                <td>{{$post->user->name}}</td>
                            <td>{{$post->email}}</td>
                                <td>{{$post->user->mobile_number}}</td>
								<td>{{$post->user->address}}</td>
								
                                <td>	<div class="contact-agent-image  float-left">
									@if($post->user->img_path)
									<img src="{{asset($post->user->img_path)}}"
									class="rounded-circle" alt="images">
									@else 
									<img src="{{asset('profilepic.png')}}"
									class="rounded-circle" alt="images">
									@endif
								</div></td>
                             
                            </tr>
                            @endforeach
                          
                           
                           
                        </tbody>
                    </table>
				
                </div>
			</div>
		</div>
	</div>
</section>
<!--  Partners and Subscribe Form Start
==================================================================-->
<div class="patner-subscribe bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="bg-white shadow py-80">
					<div class="row">
						<div class="col-md-12 col-lg-6 px-60 border-right">
							<div class="side-title pb-30">
								<span class="small-title color-primary position-relative line-primary">Partners</span>
								<h2 class="title mb-20 color-secondary">Our Popular Fellows!</h2>
								<p>Luctus posuere facilisi eros auctor lacinia litora. Convall aptent nisy parturient scelerisq. Nullam fringil condimen integer mauris lacus aliquam, quam massa lobortis commod proin magna.</p>
							</div>
							<div class="owl-carousel partners mt-30">
								<img src="images/partner/1.png" alt="Image not found!">
								<img src="images/partner/2.png" alt="Image not found!">
								<img src="images/partner/3.png" alt="Image not found!">
								<img src="images/partner/4.png" alt="Image not found!">
								<img src="images/partner/5.png" alt="Image not found!">
								<img src="images/partner/6.png" alt="Image not found!">
							</div>
						</div>
						<div class="col-md-12 col-lg-6 px-60">
							<div class="side-title pb-30 text-right mt-md-50">
								<span class="small-title color-primary position-relative line-right-primary">Newsletter</span>
								<h2 class="title mb-20 color-secondary">Get Update Now!</h2>
								<p>Luctus posuere facilisi eros auctor lacinia litora. Convall aptent nisy parturient scelerisq. Nullam fringil condimen integer mauris lacus aliquam, quam massa lobortis commod proin magna.</p>
							</div>
							<form class="news-letter bg-gray mt-30">
								<div class="form-group position-relative">
									<input class="form-control" type="text" name="email" placeholder="Subscribe">
									<button class="bg-gray color-secondary" id="btn-subscribe"><i class="fa fa-paper-plane"></i></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection