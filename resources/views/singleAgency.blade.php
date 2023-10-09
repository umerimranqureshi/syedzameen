@inject('helper', 'App\Http\Controllers\helper')
@extends('layout')

@section('header')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>

<style>
    .img-circle-logo{
height: 4vw;
width: 4vw;
overflow: hidden;
border: 1px solid rgba(128, 128, 128, 0.322);
border-radius: 50%;
}
.img-rounded{
width: 100%;
height: 100%;

object-fit: fill;

}
.center-agent{
	display: flex;
	justify-content: flex-end;

}
</style>

@endsection

@section('body')
<div class="page-banner overlay-black" style="padding: 150px 0">
	<div class="container h-100">
		<div class="row h-100 align-items-center">
			<div class="col-lg-12">
				<h1 class="page-banner-title color-primary">Find your Agent</h1>
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
				    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
				    <li class="breadcrumb-item"><a href="{{route('showAgencies')}}">Agencies</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Agents</li>
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
			{{-- <div class="col-md-12 col-lg-12">
				<div class="top-filter pb-15 border-bottom-1-gray">
					<div class="row">
						
					</div>
				</div>
			</div> --}}
			<div class="col-md-12 col-lg-4">
			
	  		
	  			<div class="sidebar-widget bg-white mt-50 shadow py-40 px-30" style="margin-top:29px">
					<h3 class="color-secondary line-bottom pb-15 mb-20">{{$singleAgency->name}}'s Properties</h3>
					<div class="owl-carousel slide-1 owl-dots-none">
					
						@foreach ($singleAgency->user->post as $postt)
						<div class="property-item">

                            <div class="property-img position-relative overflow-hidden overlay-secondary-4">
                                <img style="height:300px "
                                    src="{{$postt->postImagesOne?asset('propertyImages/'.$postt->postImagesOne->img_path):asset('houseLog.jpg') }}"
                                    alt="image">
    
                                <!-------if post is sold then show below element------>
                                @if ($postt->sold=="1")
    
                                <div style="position: absolute;width:100%;text-align:center;top:40%">
                                    <h1 style="color:white">SOLD</h1>
                                </div>
    
                                @endif
    
    
    
                                <span
                                    class="thum-category category-1 bg-secondary color-white z-index-1 px-15 headings-post">
                                    {{$postt->propertyCate->purpose}}
                                    @if($postt->post_boaster=='hot' ||  $postt->post_boaster=='superhot')
                                                    <i class="fa fa fa-fire px-1" 
                                                    style="color:{{($postt->post_boaster=='superhot')?'red':'rgb(255, 0, 234)'}}"
                                                    ></i>
                                                    @endif
                                </span>
                                <span style="margin-left: -15px"
                                    class="thum-category category-2 bg-secondary color-white z-index-1 px-15 headings-post">Featured</span>
                                   
                                    
                                <ul class="hover-option position-absolute icon-white z-index-1">
                                    <li>
    
                                        <a data-toggle="tooltip" data-placement="top" @foreach ($favPost as $fav)
                                            @if($fav->user_id==Auth::id() && $postt->favPostUser->count()>0 &&
                                            $fav->post_id==$postt->id)
                                            class="bg-danger fav-heart "
                                            title="remove wishlist"
    
    
                                            @endif
    
                                            @endforeach
                                            @if($postt->favUserPost==null && Auth::check())
                                            class="fav-heart headings-post"
                                            title="wishlist"
                                            @endif
    
                                            href="{{route('favPost',['id'=>$postt->id])}}" >
                                            <i class="fa fa-heart-o heart" aria-hidden="true"> </i></a>
                                    </li>
    
    
    
                                </ul>
    
    
    
                                <div class="meta-property icon-primary color-white z-index-1">
                                    <ul>
                                        <li><i class="fa fa-calendar"></i> {{$postt->created_at->diffForHumans()}}</li>
                                        
                                        <li><i class="fa fa-user"></i>{{$postt->user->name}} </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="property-content bg-white pt-30 pb-50 px-30">
    
                                <a class="color-secondary mb-5" style="word-break: break-all"
                                    href="{{route('singlePage',['title'=>str_replace(' ', '-', $post->property_title),'id' => $postt->id])}}">
                                    <h4 id="for-lenght" style="line-height: 30px;height:61px">{{$postt->property_title}}.
                                    </h4>
    
                                    <span class="address icon-primary f-14" style="height: 60px"><i
                                            class="fa fa-map-marker"></i>{{$postt->address}}.</span>
                                    <ul class="about-property list-half icon-primary d-table f-14 mb-30 mt-20">
    
                                        <li><i
                                                class="fa fa-plus-square icon-size"></i>{{$postt->land_area." ". $postt->unit }}
                                            Marla</li>
                                        <li><i class="fa fa-bed icon-size"></i>{{$postt->bedrooms}} Bedrooms</li>
                                        <li><i class="fa fa-bath icon-size"></i>{{$postt->bathrooms}} Bathrooms</li>
                                        <li><i class="fa fa-home icon-size"></i>Garage</li>
                                        <li><i style="font-size: 17px;" class="fa fa-eye" aria-hidden="true"></i>
                                            {{" ".count($postt->postViews)." "}}views</li>
    
                                    </ul>
                                    <div class="property-cost color-white list-half w-100">
                                        <ul>
                                            <li>{{$postt->propertyCate->purpose}}</li>
                                            <li style="font-size:14px">PKR : {{" ".$helper::labelWithAmount($postt->price) }} <sub>
                                                    </sub></li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>
						@endforeach
					
					</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-8">
				<div class="tab-content" id="myTabContent">
			  		<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
			  			<div class="row ">
			  				<div class="col-md-12 col-lg-6">
			  					<div class="agents-profile mt-30">
									<div class="agent-image position-relative overflow-hidden">
										<span class="thum-category category-1 bg-secondary color-white z-index-1 px-15">{{count($singleAgency->user->post).' properties'}}</span>
										<img src="{{($singleAgency->user->img_path)?asset($singleAgency->user->img_path):asset('profilepic.png') }}" alt="image">
                                        <div class="meta-property icon-primary color-white z-index-1">
                                            <ul>
                                                <li class="img-circle-logo"><img class="img-rounded" src="{{asset($singleAgency->logo)}}" alt=""></li>
                                                
                                                <li class="bg-secondary px-15 mt-3"><i class="fa fa-user color-white"></i>{{$postt->user->name}} </li>
                                            </ul>
                                        </div>
                                        
										{{-- <span class="agent-agency position-absolute bg-primary color-white px-15">Real Properties</span> --}}
									</div>
									<div class="d-table mt-20 hover-secondery-primary">
										<a class="mb-5 d-block" href="#"><h4>{{$singleAgency->name}}</h4></a>
										<span class="color-gray">{{$singleAgency->description}}</span>
									</div>
								</div>
			  				</div>
			  				
			  				
			  				
			  				
			  				
			  				
			  				
			  			
			  			</div>
			  		</div>
			  		<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			  			<div class="row">
			  				
							
						
							
						
							{{-- <div class="col-lg-12">
								<div class="mx-auto d-table">
									<ul class="pagination mt-50">
										<li class="page-item"><a class="page-link" href="#">Prev</a></li>
										<li class="page-item"><a class="page-link active" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">Next</a></li>
									</ul>
								</div>
							</div> --}}
			  			</div>
			  		</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Property Grid End
==================================================================-->

<script>
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
						self.classList.add("headings-post");
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
</script>
@endsection