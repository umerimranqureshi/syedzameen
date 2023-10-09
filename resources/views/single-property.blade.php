@inject('helper', 'App\Http\Controllers\helper')
@extends('layout')

@section('header')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFdIgZTDOYWsZZ2MQzBLk49K2xFnLmI1s"></script>

<style>
	.icon-size {
		font-size: 20px;
		color: #fd9834;
	}

	.multiline {
		white-space: pre-wrap;
	}
</style>


<script>
	window.onload = function() {

		var cvt = $('.convrt b').contents();
		var sites = {!!json_encode($latestPost->toArray())!!};

		for (let index = 0; index < sites.length; index++) {

			var val = Math.abs(sites[index].price)
			if (val >= 10000000) {
				val = (val / 10000000).toFixed(2) + ' Crore';
			} else if (val >= 100000) {
				val = (val / 100000).toFixed(2) + ' Lakh';
			}
			cvt[index].data = val;

		}
	}
</script>

@endsection
@section('body')



<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="mb-30">
					<div class="row">
						<div class="col-md-12 col-lg-6">
							<div class="single-property position-relative">

								<span class="bg-secondary color-white z-index-1 px-15 py-5 mr-20">{{$post->propertyCate->purpose}}
									@if ($post->post_boaster=='hot'||$post->post_boaster=='superhot')

									<i style="color:{{($post->post_boaster=='superhot')? 'rgba(238, 14, 14, 0.932)' :'rgba(255, 0, 179, 0.877)' }} ;
									font-size:17px" class="fa fa-fire"> </i>
									@endif
								</span>

								@if ($post->post_boaster=='superhot')
								<span class="color-white z-index-1 px-15 py-5 mr-20" style="background-color: rgba(255, 0, 0, 0.788)">super Hot</span>
								@endif
								@if ($post->post_boaster=='hot')
								<span class="color-white z-index-1 px-15 py-5 mr-20" style="background-color: rgba(255, 0, 119, 0.774)">Hot</span>
								@endif
								<strong class="color-primary f-20">PKR {{$price	}}
									{{$post->propertyCate->purpose=="rent"?"Monthly":"" }} </strong>
								<h3 class="color-secondary mt-15">{{$post->property_title}}</h3>
								<span class="address icon-primary f-14 mt-5"><i class="fa fa-map-marker"></i>
									{{$post->cityAndArea->area ." ,". $post->cityAndArea->city }}</span>
									 <span class="address icon-primary f-14 mt-5"><i class="fa fa-map-marker"></i>
                                        {{ $post->manual_location . ' ,' . $post->cityAndArea->city }}</span>
								<ul class="property-features icon-primary d-table f-14 mt-15">
									<li><i style="font-size: 20px" class="fa fa-area-chart"></i>{{$post->land_area}}
										Marla</li>
									<li><i style="font-size: 20px" class="fa fa-bed"></i>{{$post->bedrooms}} Bedrooms
									</li>
									<li><i style="font-size: 20px" class="fa fa-bath"></i>{{$post->bathrooms}} Bathrooms
									</li>
									<li><i style="font-size: 20px" class="fa fa-car"></i> Garage</li>

								</ul>

							</div>
						</div>

						<div class="col-md-12 col-lg-3">
							<div class="thumbnail-content float-right">
								<ul class="hover-option icon-white z-index-1 position-relative mt-md-30" style="opacity: 1; top: 0; right: 0;">
									<li>

										<a data-toggle="tooltip" data-placement="top" @if($favPost->isNotEmpty())
											@foreach ($favPost as $fav)

											@if($fav->user_id==Auth::id() && $fav->post_id==$post->id)
											class="fav-heart bg-danger"
											title="remove wishlist"
											@else
											class="fav-heart "
											title="wishlist"
											@endif

											@endforeach
											@endif
											@if($favPost->isEmpty() && Auth::check())
											class="fav-heart "
											title="wishlist"
											@endif

											href="{{route('favPost',['id'=>$post->id])}}" >
											<i class="fa fa-heart-o " aria-hidden="true"> </i></a>


									</li>

								</ul>
								<!-- Nav tabs -->
								{{-- <ul class="nav nav-tabs border-0 float-right navbar-tab-view mt-15 sm-mt-0"
									role="tablist" style="line-height: 20px;">
									<li class="nav-item">
										<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
											role="tab" aria-controls="home" aria-selected="true"><i
												class="fa fa-file-image-o" aria-hidden="true"></i></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
											role="tab" aria-controls="profile" aria-selected="false"><i
												class="flaticon-location"></i></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages"
											role="tab" aria-controls="messages" aria-selected="false"><i
												class="flaticon-street-view"></i></a>
									</li>
								</ul> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row d-flow-root">
			<div class="product-slider">
				<div class="tab-content">
					<div class="tab-pane active position-relative" id="home" role="tabpanel" aria-labelledby="home-tab">
						 <div class="container">
                                <div class="row align-items-start">
                                    {{-- <div class="col-sm-12  col-md-8 ">
                                        <div class="service-images owl-carousel slide-1 dot-on-slider">
										@if ($post->postImages->isEmpty())
										<img style=" position: relative;  width: 100%;height: 450px;" src="/mainimage/{{$post->mainimage }}" alt="slide">
										@else
										<img style=" position: relative;  width: 100%;height: 450px;" src="/mainimage/{{$post->mainimage }}" alt="slide">
										@foreach ($post->postImages as $image)
										<img style=" position: relative;  width: 100%;height: 450px;" src="{{asset($image->img_path. '/'.$image->img_name)}}" alt="slide">
										@endforeach
										@endif   
									</div>       --}}
                                       <div class="col-sm-12  col-md-8 ">
                                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img style=" position: relative;  width: 100%;height: 450px;"
                                                        class="d-block w-100" src="/mainimage/{{ $post->mainimage }}"
                                                        alt="First slide">
                                                </div>
                                                @foreach ($post->postImages as $image)
                                                    <div class="carousel-item">
                                                        <img style=" position: relative;  width: 100%;height: 450px;"
                                                            class="d-block w-100"
                                                            src="{{ asset($image->img_path . '/' . $image->img_name) }}"
                                                            alt="Slide">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                                data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only" style="color:#fd9834">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                                data-slide="next" style="color:#fd9834">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>                                    <div class="col-sm-12  col-md-4 ">
                                        <div class="sidebar-widget bg-white  shadow py-40 px-30">
                                            <h3 class="color-secondary line-bottom pb-15 mb-20">Send Enquiry message</h3>
                                            <form id="sendMessageForm" class="mt-30">
                                                <div class="row">

                                                    <div class="form-group col-md-12">
                                                        <input type="hidden" name="message[]"
                                                            value=" <a href='{{ url('ad/') .'/'. str_replace(' ', '-', $post->property_title) . '/' . $post->id }}'>Property Title : {{ $post->property_title }}</a><br>">

                                                        <textarea class="form-control bg-gray" rows="4" name="message[]" placeholder="Type Your Message"></textarea>

                                                        <input type="hidden" name="reciver_id"
                                                            value="{{ $post->user->id }}" id="">

                                                        <input type="hidden" name="sender_id" value="{{ Auth::id() }}"
                                                            id="">

                                                        <p id="success_msg" class="text-success"></p>

                                                    </div>


                                                    <div class="col-lg-12"><button type="submit"
                                                            class="btn btn-primary w-100 {{ Auth::id() == $post->user->id ? 'disabled' : '' }}">Send
                                                            Message</button></div>
                                                </div><br>

                                                <button type="button" class="btn btn-success w-100" data-toggle="modal"
                                                    data-target="#callModal1" data-id="{{ $post->id }}"
                                                    class="toggle-class">
                                                    Call
                                                </button><br>

                                                <br><button type="button " class="btn btn-primary  w-100 "
                                                    data-toggle="modal" data-target="#emailModal1"
                                                    data-id="{{ $post->id }}" class="toggle-class">
                                                    Email
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="emailModal1" tabindex="-1"
                                                    aria-labelledby="emailModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="emailModalLabel1">Syed Zameen
                                                                </h5>

                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Contact Person Name
                                                                <div>
                                                                    {{ $post->contact_person_name }}
                                                                </div>
                                                                Email
                                                                <div>

                                                                    <a
                                                                        href="mailto:{{ $post->email }}">{{ $post->email }}</a>
                                                                </div>


                                                                <!-- The button used to copy the text -->


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="callModal1" tabindex="-1"
                                                    aria-labelledby="callModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="callModalLabel1">Syed Zameen
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="card-text"><span
                                                                        class="font-weight-bold text-success"></span>

                                                                </p> <b>Contact Person Name</b>
                                                                <div>
                                                                    {{ $post->contact_person_name }}
                                                                </div>
                                                                <b> Mobile Number </b>

                                                                <div>
                                                                    <a
                                                                        href="tel:+{{ $post->mobile_number }}">{{ $post->mobile_number }}</a>


                                                                </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>



                                        </div>


                                    </div>




                                </div>



					</div>
					<div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div id="map" class="canvas" style="height: 500px;margin: 63px 0px 0px 0px;"></div>
					</div>
					<div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
<script>
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 37.7749, lng: -122.4194},
    zoom: 13
  });

  var request = {
    placeId: 'ChIJIQBpAG2ahYAR_6128GcTUEo',
    fields: ['name', 'formatted_address', 'place_id', 'geometry']
  };

  var infowindow = new google.maps.InfoWindow();
  var service = new google.maps.places.PlacesService(map);

  service.getDetails(request, function(place, status) {
    if (status === google.maps.places.PlacesServiceStatus.OK) {
      var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location
      });
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                              'Place ID: ' + place.place_id + '<br>' +
                              place.formatted_address + '</div>');
        infowindow.open(map, this);
      });
    }
  });
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFdIgZTDOYWsZZ2MQzBLk49K2xFnLmI1s&libraries=places&callback=initMap"></script>

<div id="map" style="height:24px; width:100%;"></div>

    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<dizzzzv class="row  " style="flex-direction: column-reverse;" > 
			<div class="col-md-12 col-lg-4">
				<!--------------------------- Message Box Start--------------------------->

				<!--------------------------- Message Box  end--------------------------->



				<div class="sidebar-widget bg-white mt-50 shadow py-40 px-30">
					<h3 class="color-secondary line-bottom pb-15 mb-20">Latest Properties</h3>

					<div class="owl-carousel slide-1 owl-dots-none">

						@foreach ($latestPost as $postL)
						<a class="color-secondary mb-5" href="{{route('singlePage',['title'=>str_replace(' ', '-', $post->property_title),'id'=>$postL->id])}}">
							<div class="property-item">
								<div class="property-img position-relative overflow-hidden overlay-secondary-4">

									<a class="color-secondary mb-5" href="{{route('singlePage',['title'=>str_replace(' ', '-', $post->property_title),'id'=>$postL->id])}}">
										<img src="/mainimage/{{$postL->mainimage }}" style="height: 200px">
									</a>
									<span class="thum-category category-1 bg-secondary color-white z-index-1 px-15">New
										@if ($post->post_boaster=='hot'||$post->post_boaster=='superhot')

										<i style="color:{{($post->post_boaster=='superhot')? 'rgba(238, 14, 14, 0.932)' :'rgba(255, 0, 179, 0.877)' }} ;
									font-size:17px" class="fa fa-fire"> </i>
										@endif

									</span>
									<ul class="hover-option position-absolute icon-white z-index-1">
										<li>
											<a data-toggle="tooltip" data-placement="top" @foreach ($favAllPost as $fav) @if($fav->user_id==Auth::id() && $postL->favPostUser->count()>0 &&
												$fav->post_id==$postL->id)
												class="bg-danger fav-heart"
												title="remove wishlist"


												@endif

												@endforeach
												@if($post->favUserPost==null)
												class="fav-heart"
												title="wishlist"
												@endif

												href="{{route('favPost',['id'=>$postL->id])}}"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
										</li>


									</ul>
									<div class="meta-property icon-primary color-white z-index-1">
										<ul>
											<a class="color-secondary mb-5" style="color: white !important" href="{{route('singlePage',['title'=>str_replace(' ', '-', $post->property_title),'id'=>$postL->id])}}">
												<li><i class="fa fa-calendar"></i>{{$postL->created_at}}</li>
												<li><i class="fa fa-user"></i> {{$postL->user->name}}</li>
											</a>
										</ul>
									</div>
								</div>
								<div class="property-content bg-white pt-30 pb-50">
									<a class="color-secondary mb-5" href="{{route('singlePage',['title'=>str_replace(' ', '-', $post->property_title),'id'=>$postL->id])}}">
										<h5>{{$postL->property_title}}</h5>
									</a>
									<a class="color-secondary mb-5" href="{{route('singlePage',['title'=>str_replace(' ', '-', $post->property_title),'id'=>$postL->id])}}">
										<span class="address icon-primary f-14"><i class="fa fa-map-marker"></i>{{$postL->address}}</span>
										<ul class="about-property list-half icon-primary d-table f-14 mb-30 mt-20">
											<li><i class="fa fa-plus-square "></i>{{$postL->land_area." ". $postL->unit }}</li>
											<li><i class="fa fa-bed"></i>{{$postL->bedrooms}} bedrooms</li>
											<li><i class="fa fa-bath"></i>{{$postL->bathrooms}} bathrooms</li>
											<li><i class="fa fa-home"></i>1 Garage</li>
										</ul>
									</a>
									<div class="property-cost color-white list-half w-100">
										<ul>
											<li>{{$postL->propertyCate->purpose}}</li>
											<li><p style="font-size: 13px;">{{" ".$postL->price}}</p>
												<sub>{{$postL->propertyCate->purpose=="rent"?'Monthly':''}}</sub>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</a>
						@endforeach

					</div>

				</div>


			</div>
			<div class="col-md-12 col-lg-8">
				<div class="text-area mt-50">
					<h3 class="color-secondary line-bottom pb-15 mb-20">Description</h3>
					<div class="multiline">{{$post->description}} </div>

					<div class="agent-more-details color-secondary-a">
						<a class="color-secondary position-relative plus-minus my-15 pl-15 d-block" data-toggle="collapse" href="#multiCollapse1" role="button" aria-expanded="false" aria-controls="multiCollapse1">More Details</a>
						<div class="collapse" id="multiCollapse1">


						</div>
					</div>
				</div>
				<div class="border-top-1-gray py-30">
					<h3 class="color-secondary line-bottom pb-15 mb-20">Property Details</h3>
					<div class="row">
						<div class="col-md-12 col-lg-6">
							<ul class="list-by-tag">
								@if($post->bedrooms || $post->bathrooms)
								<li><b><i style="font-size: 20px" class="fa fa-bed icon-size"></i> Bedrooms
										<span>{{$post->bedrooms}}</span></b></li>


								{{-- <li>Orienten : <span>East</span></li> --}}
								<li><b><i style="font-size: 20px" class="fa fa-bath icon-size"></i> Bathrooms :
										<span>{{$post->bathrooms}}</span></b></li>
								{{-- <li>Type : <span>Private House</span></li> --}}
								@endif
								<li><b><i style="font-size: 20px" class="fa fa-user icon-size"></i> contact person name :
										<span>{{$post->contact_person_name}}</span></b></li>
								<li><b><i style="font-size: 20px" class="fa fa-user icon-size"></i> Property Type :
										<span>{{$post->propertyCate->property_type}}</span></b></li>
								<li><b><i style="font-size: 20px" class="fa fa-user icon-size"></i> Property Sub Type :
										<span>{{$post->propertyCate->property_sub_type}}</span></b></li>

							</ul>
						</div>
						<div class="col-md-12 col-lg-6">
							<ul class="list-by-tag hover-secondery-primary">
								<li><b><i class="fa fa-plus-square icon-size"></i> Land Area :
										<span>{{$post->land_area." ". $post->unit." Marla" }} </span></b></li>

								<li><b><i style="font-size: 20px" class="fa fa-car icon-size"></i> Garage : <span>1</span>
								</li>
								<li><i style="font-size: 20px" class="fa fa-clock-o icon-size"></i> Post Timings :
									<span>{{$post->created_at->diffForHumans()}}</span>
								</li>

								{{-- <li>Plot size : <span>300x200x300</span></li> --}}
								{{-- <li>Kitchens : <span>2</span></li> --}}
							</ul>
						</div>
						{{-- <div class="col-md-12 col-lg-6">


							<ul class="list-by-tag hover-secondery-primary">
								<li><i style="font-size: 20px" class="fa fa-map-marker icon-size"></i> Address : <span>{{$post->address}}</span>
						</li>

						</ul>
					</div> --}}
				</div>
			</div>

			<!-------------------------------------Amenities---------------------------->
			<div class="border-top-1-gray py-30">
				<h3 class="color-secondary line-bottom pb-15 mb-20">Property Feature</h3>
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<ul class="single-property-amenities icon-primary my-20"> 

							@foreach ($helper::stringSeperatedByCommaToArray($post->amenities) as $amenitie)

							@if($amenitie=="furnished")
							
							<li><i  class="fal fa-square"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif

							@if($amenitie=="Maintaince-Staff") 
							
							<li><i  class="fa fa-user-secret"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif

							@if($amenitie=="Security-Staff")
							
							<li><i  class="fa fa-user-secret"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif


							@if($amenitie=="Drawing-Room")
							
							<li><i  class="fa fa-home"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif

							@if($amenitie=="Dining-Room")
							
							<li><i  class="fa fa-home"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif

							@if($amenitie=="Prayer-Room") 
							
							<li><i  class="fa fa-bed"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif

							@if($amenitie=="Power-Room")
							
							<li><i  class="fa fa-power-off"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif

							@if($amenitie=="TV-lounge")
							
							<li><i  class="fa fa-tv"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif

							@if($amenitie=="Sitting-room") 
							
							<li><i  class="fa fa-home"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif

							@if($amenitie=="Near-to-schools")  <i class="fa-solid fa-school"></i>
							
							<li><i  class="fa fa-university"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif

							@if($amenitie=="Near-to-hospitals")
							
							<li><i  class="fa fa-hospital-o"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif

						

							@if($amenitie=="Park-Facing")
							
							<li><i  class="fa fa-tree"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif


							@if($amenitie=="Possession")
							
							<li><i  class="fa fa-key"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif

							@if($amenitie=="Corner")
							
							<li><i  class="fal fa-square"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif

							@if($amenitie=="Desputed")
							
							<li><i  class="fa fa-handshake-o"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif

							@if($amenitie=="File")
							
							<li><i  class="fa fa-envelope"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif

							@if($amenitie=="Electricity")  
							
							<li><i  class="fa-solid fa-bolt"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif

							@if($amenitie=="Severage") 
							
							<li><i  class="fa fa-water"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif

							@if($amenitie=="Water-Supply")
							
							<li><i  class="fas fa-water"></i> {{$amenitie}}</li>
							@endif

							@if($amenitie=="Sui-Gas")
							
							<li><i  class="fa fa-water"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif

							@if($amenitie=="other")
							
							<li><i  class="fa fa-envelope"	aria-hidden="true"></i> {{$amenitie}}</li>
							@endif
							
							<!-- <li><i  class="fa fa-home" aria-hidden="true"></i> {{$amenitie}}</li> -->
                        
							@endforeach

						</ul>
					</div>
				</div>
			</div>
			<!--//-----------------------------------Amenities end-----------------//----------->

			<!---------------------------------------Video Div---------------------------------->


			@if($post->video_link==NULL)

			@else

			<div class="border-top-1-gray py-30">
				<h3 class="color-secondary line-bottom pb-15 mb-20">Property Video</h3>
				<div class="property-video bg-img-3 position-relative">

					<iframe id="iframe_youtube" style="position: relative; height: 100%; width: 100%;" src="" frameborder="0"></iframe>


					{{-- <a data-fancybox="" class="video-popup xy-center bg-primary color-white"
						href="javascript:void(0)"><i class="fa fa-play"
							aria-hidden="true"></i></a> --}}
					{{-- <div class="loader xy-center">
						<div class="loader-inner ball-scale-multiple">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</div> --}}
				</div>
			</div>


			@endif
			<!------//------------------------------Video Div end------------------------//---------->

	</div>






	</div>
	</div>
</section>
<!-- Single Property End
==================================================================-->
<!--  Partners and Subscribe Form Start
==================================================================-->
<div class="patner-subscribe">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="bg-white shadow py-80">
					<div class="row">
						<div class="col-md-12 col-lg-6 px-60 border-right">
							<div class="side-title pb-30">
								<span class="small-title color-primary position-relative line-primary">Partners</span>
								<h2 class="title mb-20 color-secondary">Our Popular Fellows!</h2>
								<p>These are our popular fellows. if you want to become a fellow then <a href="{{route('contactUs')}}">contact us</a>
								</p>
							</div>
							<div class="owl-carousel partners mt-30">
								<img src="{{asset('login-logo.png')}}" alt="Image not found!">
								<img src="{{asset('syedEstate Real logo.png')}}" alt="">
								{{-- <img src="" alt=""> --}}
							</div>
						</div>
						<div class="col-md-12 col-lg-6 px-60">
							<div class="side-title pb-30 text-right mt-md-50">
								<span class="small-title color-primary position-relative line-right-primary">Newsletter</span>
								<h2 class="title mb-20 color-secondary">Get Update Now!</h2>
								<p>Get daily news of properties in the market by our newsletter features just subscribe
									us</p>
							</div>
							<form class="news-letter bg-gray mt-30">
								<div id="subscribe-message" style="margin-bottom:2px;font-size:20px"></div>
								<div class="form-group position-relative" id="subscribe-hide">
									<input class="form-control" type="text" name="email" placeholder="Subscribe" id="subscribe-input">
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
<!--  Partners and Subscribe Form
==================================================================-->
<!-- jquery Links
==================================================================-->

<!----------------------------------------Javascript starts---------------------------------------->

<script src="{{asset('jsComman/comman.js')}}"></script>


<script type="text/javascript">
	function embedYoutubeURL() {
		$str = "{{$post->video_link}}";
		$res = $str.split("=");
		$embeddedUrl = "https://www.youtube.com/embed/" + $res[1];
		$("#iframe_youtube").attr("src", $embeddedUrl);
	}


	$(document).ready(() => {
		embedYoutubeURL();

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

				success: () => {
					console.log("success");

				},
				complete: (data) => {
					if (data.responseJSON.message == "remove") {
						self.classList.remove("bg-danger");

						setTimeout(() => {
							$(this).tooltip('hide').attr('data-original-title', 'wishlist');
						}, 500);
						console.log("class removes");
					} else if ((data.responseJSON.message == "success")) {
						self.classList.add("bg-danger");
						setTimeout(() => {
							$(this).tooltip('hide').attr('data-original-title', 'remove wishlist');
						}, 500);

					} else {
						console.log("no classs applied");
					}
				}

			});

		});

		$("#subscribe-input").on("input", function() {
			// Print entered value in a div box

			if (!$(this).val()) {

				$('#subscribe-message').text('email required');
				$('#subscribe-message').css('color', 'red');

			} else {
				$('#subscribe-message').text('');
			}

		});


		$(document).on('click', '#btn-subscribe', function(e) {
			e.preventDefault();
			if ($('#subscribe-input').val() == '') {
				$('#subscribe-message').text('email required');
				$('#subscribe-message').css('color', 'red');
			} else {


				$('#subscribe-hide').hide();
				$('#subscribe-message').text('Thanks for subscribing us');
				$('#subscribe-message').addClass('color-primary');

			}
		});


	});


	var auth_user = "{{Auth::id()}}";
	var post_user_id = "{{$post->user->id}}";

	$("#sendMessageForm").submit(function(e) {
		e.preventDefault();
		console.log(auth_user, post_user_id);
		if (auth_user == post_user_id) {

			return false;

		}

		$.ajax({
			url: "{{route('inbox.store')}}",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			async: false,
			method: "POST",
			data: $(this).serialize(),
			success: function(res) {

					$("#success_msg").text("Message Has Been Send");
					$('#success_msg').fadeIn().delay(2000).fadeOut('slow');


				}

				,

		});

		$(this).trigger("reset");


	});
</script>
@endsection