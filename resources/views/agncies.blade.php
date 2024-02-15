@extends('layout')
@section('header')
	<style>
			.icon-size{
    font-size: 20px;

  }
	</style>
@endsection
@section('body')
<!-- Page Banner Start 

==================================================================-->
<div class="page-banner overlay-black  mobile-responsive-header" style="padding: 150px 0 ; margin-top: -90px;" >
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-lg-12">
				<h1 class="page-banner-title color-primary">Agency</h1>
				<div class="text-area w-50 mt-15 color-white">
					<p>We have some extra ordinary agents to assit you at any time at any place.</p>
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
						{{-- <li class="breadcrumb-item"><a href="#">Agencies</a></li> --}}
						<li class="breadcrumb-item active" aria-current="page">Agencies</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- Page Banner End
==================================================================-->
<!-- Property Grid Start
==================================================================-->
<section class="bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="top-filter pb-15 border-bottom-1-gray">
					<div class="row">
						<div class="col-md-3 col-lg-6 col-xl-7">

							<label>{{$featureAgencies->currentPage()}}-{{$featureAgencies->lastPage()}} of
								{{$featureAgencies->total()}} results</label>
						</div>
						<div class="col-md-9 col-lg-6 col-xl-5">
							<div class="row">
								<div class="col-md-9 col-lg-7">
									{{-- <form>
										<div class="form-group d-flex mb-0">
											<label class="w-50">Short By :</label>
											<div class="select-wrapper position-relative w-100">
												<select class="select form-control">
													<option>Default</option>
													<option>Newest</option>
													<option>Oldest</option>
													<option>Random</option>
												</select>
											</div>
										</div>
									</form> --}}
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 col-lg-8">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="row">

							@foreach ($featureAgencies as $agency)
							<div class="col-md-12 col-lg-6">
								<div class="agencies mt-30 py-40 px-30 bg-white hover-secondery-primary">
									<a href="#"><img src="{{ asset('image/' . $agency->image) }}"  alt="image"
											style="height:120px;width:100%"></a>
									<div class="agencies-content mt-10">
										<a href="{{$agency->url}}" target="blank">
											<h4 style="color: #007bff;">{{$agency->name}}</h4>
										</a>
										<span class="mt-5 mb-30 d-block">{{$agency->url}}.</span>
										
									</div>
								</div>
							</div>
							@endforeach


							<div class="col-lg-12">
								<div class="mx-auto d-table">
									<ul class="pagination mt-50">
										<?php    $items=$featureAgencies->total();

                                        $loopValue=ceil($items/6);

                                        $totalPage=$featureAgencies->lastPage();

                                        $currentPage = $featureAgencies->currentPage();

                              ?>
										<li class="page-item">
											<a id="pre-page" href="{{url("agencies/?page=".($currentPage-1))}}"
												class="{{ 1>=$currentPage?'isDisabled page-link':" page-link "}}">Prev</a>
										</li>
										@for ($i = 1; $i <= $loopValue; $i++) <li class="page-item">
											<li>

												<a class="page-link active " href="{{url("agencies/?page=".($i))}}">
													<span class="page-length">{{$i}}</span> </a>

											</li>

											@endfor

											<li class="page-item"><a id="next-page"
													href="{{url("agencies/?page=".($currentPage+1))}}"
													class=" {{ $totalPage <= $currentPage?'isDisabled page-link':" page-link "}}">Next</a>
											</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="col-md-12 col-lg-4">
				<form action="{{route('searchAgency')}}" method="get"
					class="adbanced-form-two amenities-list bg-white py-40 px-30 mt-30">
					<h3 class="color-secondary line-bottom pb-15 mb-20">Find Agency</h3>
					<div class="row">
						<div class="form-group col-md-12">
							<input value="{{$old_agency_name??''}}" name="agency_name" type="text"
								class="form-control bg-gray" placeholder="Write Agency Name">
						</div>
						<div class="form-group col-lg-12 pt-15">
							<div class="select-wrapper position-relative">
								<select name="city" class="select form-control">
									<option value="null">City</option>


									@foreach ($cities as $city)


									<option @isset($old_city) {{$old_city==$city->city?"selected":""}} @endisset
										value="{{$city->city}}">{{$city->city}}</option>


									@endforeach










								</select>
							</div>
						</div>

						<div class="form-group col-md-12">

							<button class="btn btn-info" type="submit">Search !</button>


						</div>


					</div>




				</form>
				{{-- <div class="sidebar-widget bg-white mt-50 shadow py-40 px-30">
					<h3 class="color-secondary line-bottom pb-15 mb-20">Top Agency</h3>
					<ul>
						<li class="border-bottom-1-gray pb-15">
							<div class="agencies hover-secondery-primary">
								<a href="#">
									<div class="agencies-content">
										<h5>Homelax Builders</h5>
										<span class="mt-5 d-block color-gray f-14">11-13 Whitehall, London SW1A 2DD,
											UK</span>
									</div>
								</a>
							</div>
						</li>
						<li class="color-secondary-a border-bottom-1-gray py-15">
							<div class="agencies hover-secondery-primary">
								<a href="#">
									<div class="agencies-content">
										<h5>Landex Builders</h5>
										<span class="mt-5 d-block color-gray f-14">366 Glenmore Ave, Brooklyn,
											USA.</span>
									</div>
								</a>
							</div>
						</li>
						<li class="color-secondary-a border-bottom-1-gray py-15">
							<div class="agencies hover-secondery-primary">
								<a href="#">
									<div class="agencies-content">
										<h5>Nester Builders</h5>
										<span class="mt-5 d-block color-gray f-14">40 Tower Avenue, Melbourne,
											Australia.</span>
									</div>
								</a>
							</div>
						</li>
						<li class="color-secondary-a pt-15">
							<div class="agencies hover-secondery-primary">
								<a href="#">
									<div class="agencies-content">
										<h5>Realhome Builders</h5>
										<span class="mt-5 d-block color-gray f-14">11-13 Whitehall, London SW1A 2DD,
											UK</span>
									</div>
								</a>
							</div>
						</li>
					</ul>
				</div> --}}
                    <!--------------------------- Message Box Start--------------------------->

                    <!--------------------------- Message Box  end--------------------------->



                    <div class="sidebar-widget bg-white mt-50 shadow py-40 px-30"
                        style="    position: sticky; top: 115px;">
                        <h3 class="color-secondary line-bottom pb-15 mb-20">Latest Properties</h3>

                        <div class="owl-carousel slide-1 owl-dots-none">
                            {{-- {{dd($latestPost)}} --}}
                            @foreach ($latestPost as $postL)


                                <div class="property-item">
                                    <div class="property-img position-relative overflow-hidden overlay-secondary-4">
                                        <a class="color-secondary mb-5 color-primary"
                                            href="{{ route('singlePage', ['title' => str_replace(' ', '-', $postL->property_title), 'id' => $postL->id]) }}">
                                            <img src="{{ asset('mainimage/' . $postL->mainimage) }}"
                                                style="height: 200px">
                                        </a>
                                        <span class="thum-category category-1 bg-secondary color-white z-index-1 px-15">New
                                            @if ($postL->post_boaster == 'hot' || $postL->post_boaster == 'superhot')

                                                <i style="color:{{ $postL->post_boaster == 'superhot' ? 'rgba(238, 14, 14, 0.932)' : 'rgba(255, 0, 179, 0.877)' }} ;
														font-size:17px"
                                                    class="fa fa-fire"> </i>
                                            @endif

                                        </span>
                                        <ul class="hover-option position-absolute icon-primary z-index-1">
                                            <li>
                                                <a data-toggle="tooltip" data-placement="top"
                                                    @foreach ($favPost as $fav) @if ($fav->user_id == Auth::id() && $postL->favPostUser->count() > 0 && $fav->post_id == $postL->id)
												class="bg-danger fav-heart"
												title="remove wishlist"


												@endif @endforeach
                                                    @if ($postL->favUserPost == null) class="fav-heart"
												title="wishlist" @endif
                                                    href="{{ route('favPost', ['id' => $postL->id]) }}"><i
                                                        class="fa fa-heart-o" aria-hidden="true"></i></a>
                                            </li>


                                        </ul>
                                        <div class="meta-property icon-primary color-primary z-index-1">
                                            <ul>
                                                <a class="color-secondary mb-5" style="color: primary !important"
                                                    href="{{ route('singlePage', ['title' => str_replace(' ', '-', $postL->property_title), 'id' => $postL->id]) }}">
                                                    <li><i class="fa fa-calendar"></i>{{ $postL->created_at }}
                                                    </li>
                                                    <li><i class="fa fa-user"></i> {{ $postL->user->name }}</li>
                                                </a>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="property-content bg-primary pt-30 pb-50">
                                        <a class="color-secondary mb-5 color-primary"
                                            href="{{ route('singlePage', ['title' => str_replace(' ', '-', $postL->property_title), 'id' => $postL->id]) }}">
                                            <h5>{{ $postL->property_title }}</h5>
                                        </a>
                                        <a class="color-secondary mb-5 color-primary"
                                            href="{{ route('singlePage', ['title' => str_replace(' ', '-', $postL->property_title), 'id' => $postL->id]) }}">
                                            <span class="address icon-primary f-14"><i
                                                    class="fa fa-map-marker"></i>{{ $postL->address }}</span>
                                            <ul class="about-property list-half icon-primary d-table f-14 mb-30 mt-20">
                                                <li><i
                                                        class="fa fa-plus-square "></i>{{ $postL->land_area . ' ' . $postL->unit }}
                                                </li>
                                                <li><i class="fa fa-bed"></i>{{ $postL->bedrooms }} bedrooms</li>
                                                <li><i class="fa fa-bath"></i>{{ $postL->bathrooms }} bathrooms
                                                </li>
                                                <li><i class="fa fa-home"></i>1 Garage</li>
                                            </ul>
                                        </a>
                                        <div class="property-cost color-primary list-half w-100">
                                            <ul>
                                                <li>{{ $postL->propertyCate->purpose }}</li>
                                                <li>
                                                    <p style="font-size: 17px;
														font-weight: 900;">
                                                        {{ ' ' . $postL->price }}</p>
                                                    <sub>{{ $postL->propertyCate->purpose == 'rent' ? 'Monthly' : '' }}</sub>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>


				{{-- <div class="sidebar-widget bg-white mt-50 shadow py-40 px-30">
					<h3 class="color-secondary line-bottom pb-15 mb-20">Latest Properties</h3>
					<div class="owl-carousel slide-1 owl-dots-none">
						@foreach ($latestPost as $post)
						<div class="property-item">
							<div class="property-img position-relative overflow-hidden overlay-secondary-4" style="border-radius: 1.5rem;">
								<img src="{{$post->postImagesOne?asset('propertyImages/'.$post->postImagesOne->img_path):asset('houseLog.jpg') }}"
									alt="image" style="height:200px">
								<span
									class="thum-category category-1 bg-secondary color-white z-index-1 px-15">New</span>
								<ul class="hover-option position-absolute icon-white z-index-1">
									<li>
										<a data-toggle="tooltip" data-placement="top" @foreach ($favPost as $fav)
											@if($fav->user_id==Auth::id() && $post->favPostUser->count()>0 &&
											$fav->post_id==$post->id)
											class="bg-danger fav-heart"
											title="remove wishlist"


											@endif

											@endforeach
											@if($post->favUserPost==null && Auth::check())
											class="fav-heart"
											title="wishlist"
											@endif

											href="{{route('favPost',['id'=>$post->id])}}"><i class="fa fa-heart-o"
												aria-hidden="true"></i></a>
									</li>

								</ul>
								<div class="meta-property icon-primary color-white z-index-1">
									<ul>
										<li><i class="fa fa-calendar"></i>{{$post->created_at}}</li>
										<li><i class="fa fa-user"></i> {{$post->user->name}}</li>
									</ul>
								</div>
							</div>
							<div class="property-content bg-white pt-30 pb-50">
								<a style="word-break: break-all" class="color-secondary mb-5" href="single-property.html">
									<h5 style="height:62px">{{$post->property_title}}</h5>
								</a>
								<span class="address icon-primary f-14"><i
										class="fa fa-map-marker"></i>{{$post->address}}</span>
										<ul class="about-property list-half icon-primary d-table f-14 mb-30 mt-20">
											<li><i class="fa fa-plus-square "></i>{{$post->land_area." ". $post->unit }}</li>
											<li><i class="fa fa-bed " ></i>{{$post->bedrooms}} bedrooms</li>
											<li><i class="fa fa-bath "></i>{{$post->bathrooms}} bathrooms</li>
											<li><i class="fa fa-home "></i>1 Garage</li>
										</ul>
								<div class="property-cost color-white list-half w-100">
									<ul>
										<li>For {{$post->propertyCate->purpose}}</li>

										<li>{{$post->price}} <sub
												style="font-size: 8px">PKR{{$post->propertyCate->purpose=="/rent"?'/Monthly':''}}</sub>
										</li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach

					</div>
				</div> --}}
			</div>
		</div>
	</div>
</section>
<!-- Property Grid End
==================================================================-->
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
								<p>Syed Zameen By SYED REAL ESTATE .
									Syed zameen is a project of SYED REAL ESATAE ,
									Syed Real Estates and builders is the largest full-service real estate and property
									management company , They known for their quanlity work .

									.</p>
							</div>
							<div class="owl-carousel partners mt-30">
								<img src="{{asset('login-logo.png')}}" alt="Image not found!">
								<img src="{{asset('syedEstate Real logo.png')}}" alt="">

							</div>
						</div>
						<div class="col-md-12 col-lg-6 px-60">
							<div class="side-title pb-30 text-right mt-md-50">
								<span
									class="small-title color-primary position-relative line-right-primary">Newsletter</span>
								<h2 class="title mb-20 color-secondary">Get Update Now!</h2>
								<p><p>Wait a bit ! before leaving add your email we will notify you about new property and much more .</p>.</p>
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


<script>
	$(document).ready(()=>{
		$(document).on('click', '.fav-heart', function(e) {
	e.preventDefault();


	var data = $(this).attr('href');

	var self = this;
  // Save the reference
        $.ajax({
            method: 'get',
            url: data,
            data: data,
            async: true,

            success: ()=>{
                // console.log(data);
				// $(self).data('disabled','disabled');


				console.log("success");

            },
			complete: (data)=> {
				if(data.responseJSON.message=="remove") {
						self.classList.remove("bg-danger");

						setTimeout(()=>{
							$(this).tooltip('hide').attr('data-original-title', 'wishlist');
						},500);
						console.log("class removes");
					}else if((data.responseJSON.message=="success")){
						self.classList.add("bg-danger");
						setTimeout(()=>{
							$(this).tooltip('hide').attr('data-original-title', 'remove wishlist');
						},500);

					}else{
						console.log("no classs applied");
					}


     		}

		});

});
	});
</script>


@endsection