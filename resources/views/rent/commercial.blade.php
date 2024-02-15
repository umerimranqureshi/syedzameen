@extends('layout')



@section('header')
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
	integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
 --}}

@endsection



@section('body')



<!-- End Back to top
=========================================================================-->
<!-- Start Header
===================================================================-->
<div class="page-banner overlay-black  mobile-responsive-header" style="padding: 150px 0 ; margin-top: -90px;" >
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-lg-12">
				<h1 class="page-banner-title color-primary">A Place You Call Home</h1>
				<div class="text-area w-50 mt-15 color-white">
					<p>All properties are listed below !</p>
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
						<li class="breadcrumb-item"><a href="#">Listing</a></li>
						<li class="breadcrumb-item"><a href="#">Property</a></li>
						<li class="breadcrumb-item active" aria-current="page">Property Thumbnail </li>
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
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="top-filter pb-15">
					<div class="row">
						<div class="col-md-3 col-lg-6 col-xl-7">

							<label> {{count($allRCP)}} -6 of {{$allRCP->total()}} results </label>
						</div>

					</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-12">
				<!-----------form-section-------------------------->


				@include('search-pagination-file.search')



				<!-----------form-section end---------------------------->
			</div>
			<div class="col-md-12 col-lg-12">
				<div class="tab-content  border-top-1-gray" id="myTabContent">

					<div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
						<div class="row">
							@foreach ($allRCP as $post)
							<div class="col-md-12 col-lg-6 col-xl-4">
								<div class="property-thumbnail mt-30">
									<div class="property-img position-relative overflow-hidden overlay-secondary-4" style="border-radius: 1.5rem;">
									
										<img src="{{$post->mainimage?asset('mainimage/'.$post->mainimage):asset('houseLog.jpg') }}" alt="image"  style="height:300px;width:450px">


										@if ($post->sold=="1")

										<div style="position: absolute;width:100%;text-align:center;top:40%">
											<h1 style="color:white">SOLD</h1>
										</div>

										@endif



										<div class="thumbnail-content z-index-1 color-white-a color-white">
											<span
												class="thum-category category-1 bg-secondary color-white z-index-1 px-15">For
												{{$post->propertyCate->purpose}}
												@if($post->post_boaster=='hot' ||  $post->post_boaster=='superhot')
												<i class="fa fa fa-fire px-1" 
												style="color:{{($post->post_boaster=='superhot')?'red':'rgb(255, 0, 234)'}}"
												></i>
												@endif
											</span>
											<ul class="hover-option position-absolute icon-white z-index-1">
												@if (isset($favPost))
												
													<li>
														<a data-toggle="tooltip" data-placement="top" 
															@foreach ($favPost as $fav) 
																@if($fav->user_id==Auth::id() && $post->favPostUser->count()>0 && $fav->post_id==$post->id)
																	class="bg-danger fav-heart"
																	title="remove wishlist"
																@endif

															@endforeach
															@if($post->favUserPost==null && Auth::check())
																class="fav-heart"
																title="wishlist"
															@endif
															href="{{route('favPost',['id'=>$post->id])}}">
															<i class="fa fa-heart-o" aria-hidden="true"></i>
														</a>
													</li>
												@endif

												<li>
													<a data-toggle="tooltip" data-placement="top" title="Compare"
														href="#"><i class="fa fa-random" aria-hidden="true"></i></a>
												</li>
											</ul>
											<div class="hover-content py-30 px-20 overlay-hover-gradient">
												<div class="thumbnail-title z-index-1 position-relative">

													@if($post->sold==1)
													<span
														class="thumbnail-price bg-white color-secondary px-15  mb-15 d-table">
														SOLD</span>

													@endif
													@if($post->post_boaster=='superhot' || $post->post_boaster=='hot')
													<span
													class="thumbnail-price px-15 mb-10 d-table" style="background-color:{{($post->post_boaster=='superhot')?'rgba(216, 71, 71, 0.877)':'rgba(94, 54, 54, 0.897)'}}" >
												
													{{($post->post_boaster=='superhot')?'Super Hot':'Hot'}}</span>
													@endif


													@php
													$formattedPrice = formatPrice($post->price);
													@endphp

													<span
														class="thumbnail-price bg-dark color-secondary px-15 mb-10 d-table"> RS
														{{$formattedPrice}}
													</span>
														
														
													<a class="color-secondary mb-5"
														href="{{route('singlePage',['title'=>str_replace(' ', '-', $post->property_title),'id'=>$post->id])}}">
														<h4>{{$post->property_title}}</h4>

														<span class="address icon-primary f-14"><i
																class="fa fa-map-marker"></i>{{$post->address}}</span>
												</div>
												<ul
													class="about-property icon-primary d-table f-14 z-index-1 position-relative">
													<li><span class="color-primary">{{$post->land_area }}</span>Marla
													</li>
													<li><span class="color-primary">{{$post->bedrooms}}</span>bedrooms
													</li>
													<li><span class="color-primary">{{$post->bathrooms}}</span>bathrooms
													</li>
													<li><span class="color-primary">1</span> Garage</li>
												</ul>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach

							@php
							function formatPrice($price) 
							{
								if ($price >= 10000000) 
								{
									return round($price / 10000000, 2) . ' Crore';
								} 
								elseif ($price >= 100000) 
									{
										return round($price / 100000, 2) . ' Lac';
									} 
								elseif ($price >= 1000) 
									{
										return round($price / 1000, 2) . ' Thousand';
									} 
								else
									{
										return $price;
									}
							}
							@endphp


							<div class="col-lg-12">
								<div class="mx-auto d-table">
									<ul class="pagination mt-50">




										<!-------------------pagination-starts------------------------>



										@include('search-pagination-file.pagination')






										<!-------------------pagination-starts end------------------------>



									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
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
								Syed Zameen By SYED REAL ESTATE .
								Syed zameen is a project of SYED REAL ESATAE ,
								Syed Real Estates and builders is the largest full-service real estate and property
								management company , They known for their quanlity work .

								.
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
								<p>Wait a bit ! before leaving add your email we will notify you about new property and
									much more .</p>

							</div>
							<form class="news-letter bg-gray mt-30">
								<div id="subscribe-message" style="margin-bottom:2px;font-size:20px"></div>
								<div class="form-group position-relative" id="subscribe-hide">
									<input class="form-control" type="text" name="email" placeholder="Subscribe"
										id="subscribe-input">
									<button class="bg-gray color-secondary" id="btn-subscribe"><i
											class="fa fa-paper-plane"></i></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>







{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}

<script>
	$("document").ready(function () {

		checkPropertyType($("#property_type").val());

		$("#property_type").on("change", function () {
			//console.log(this.id);
			$property_type_value = $(this).val();

			checkPropertyType($property_type_value);

		});

	function checkPropertyType($value) {

			if ($value == "residential") {

				$("#sub_type option[value='home']").prop("selected", true);

				$("#sub_type option[value='shop']").hide();
				$("#sub_type option[value='office']").hide();
				$("#sub_type option[value='building']").hide();
				$("#sub_type option[value='commercial_plot']").hide();
				// $("#sub_type option[value='commercial_plot']").hide();

				$("#sub_type option[value='home']").show();
				$("#sub_type option[value='flat']").show();
				$("#sub_type option[value='upper_portion']").show();
				$("#sub_type option[value='lower_portion']").show();
				$("#sub_type option[value='residential_plot']").show();


			}
			else if ($value == "commercial") {
				$("#sub_type option[value='shop']").prop("selected", true);

				$("#sub_type option[value='shop']").show();
				$("#sub_type option[value='office']").show();
				$("#sub_type option[value='building']").show();
				$("#sub_type option[value='commercial_plot']").show();

				$("#sub_type option[value='home']").hide();
				$("#sub_type option[value='flat']").hide();
				$("#sub_type option[value='upper_portion']").hide();
				$("#sub_type option[value='lower_portion']").hide();
				$("#sub_type option[value='residential_plot']").hide();






			}

		}


		$(".page-length").click(function () {

			console.log($(this).text());
			$("#main-search-form").append("<input  name='page'   value=" + $(this).text() + "  type='text'  >");

			$("#main-search-form").submit();

		});


		$("#pre-page").click(function () {

			$current_page = "{{$allRCP->currentPage()}}";
			$previous_page = $current_page - 1;
			console.log($current_page, $previous_page);
			$("#main-search-form").append("<input  name='page'   value=" + $previous_page + "  type='text'  >");

			$("#main-search-form").submit();





		});


		$("#next-page").click(function () {

			$current_page = "{{$allRCP->currentPage()}}";
			$current_page = parseInt($current_page);
			$next_page = $current_page + 1;
			console.log($current_page, $next_page);
			$("#main-search-form").append("<input  name='page'   value=" + $next_page + "  type='text'  >");

			$("#main-search-form").submit();





		});









		$("#city").change(function () {

			//console.log("s");

			$city = $("#city option:selected").val();

			getAreaFromCity($city);




		});



		function getAreaFromCity(city = "lahore") {

			$.ajax({
				url: `{{url('areas')}}/${city}`,
				success: function (res) {

					$("#location").html(function () {
						$allOption = "";
						for ($i = 0; $i < res.length; $i++) {
							$allOption += "<option value='" + res[$i].id + "'> " + res[$i].area + " </option>";

						}

						return $allOption;
					});




				}



			});

		}



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
						console.log("class removes");
					}else if((data.responseJSON.message=="success")){
						self.classList.add("bg-danger");
						console.log("class add");
					}else{
						console.log("no classs applied");
					}


     		}

		});

});

$("#subscribe-input").on("input", function(){
        // Print entered value in a div box

			if(!$(this).val()){

				$('#subscribe-message').text('email required');
		$('#subscribe-message').css('color','red');

			}else{
				$('#subscribe-message').text('');
			}

    });

$(document).on('click', '#btn-subscribe', function(e) {
	e.preventDefault();
	if($('#subscribe-input').val()==''){
		$('#subscribe-message').text('email required');
		$('#subscribe-message').css('color','red');
	}else{


	$('#subscribe-hide').hide();
	$('#subscribe-message').text('Thanks for subscribing us');
	$('#subscribe-message').addClass('color-primary');

	}
});









	});

</script>





@endsection