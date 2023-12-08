    <div class="container">
        <div class="row" >
           
            {{-- <div>
                 <a class="btn btn-primary mb-3 mr-1 arrow-button" href="#carouselExampleIndicators4" style="
                height: 65px; font-size:40px; float:left; top:400px; right:130px; z-index:1; background-color:transparent; border:none;
                " role="button" data-slide="prev">
                                <i class="fa fa-arrow-left"></i>
                            </a>
                <a class="btn btn-primary mb-3 arrow-button" href="#carouselExampleIndicators4" style="
                    height: 65px; font-size:40px; float:right; top:400px; left:130px; background-color:transparent; border:none;
                     z-index:1;"
                    role="button" data-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div> --}}
            <div class="col-12">
                <div id="carouselExampleIndicators4" class="carousel slide" data-ride="carousel">


                    <div class="carousel-inner">
                        <div class="carousel-item active">

                            <div class="row">
								@foreach($showReallatestPost as $post)
									<div class="col-md-4 col-sm-6 mb-2">


										<div class="property-thumbnail mt-30">

											<div class="property-img position-relative overflow-hidden overlay-secondary-4">

												<img src="{{$post->mainimage?(file_exists('mainimage/'.$post->mainimage)?asset('mainimage/'.$post->mainimage):asset('houseLog.jpg')):asset('houseLog.jpg') }}" alt="image" style="height:300px ">

												<div class="thumbnail-content z-index-1 color-white-a color-white">
													<span class="thum-category category-1 bg-secondary color-white z-index-1 px-20">
														{{$post->purpose}}
																		@if ($post->post_boaster=='hot'||$post->post_boaster=='superhot')

													<i style="color:{{($post->post_boaster=='superhot')? 'rgba(238, 14, 14, 0.932)' :'rgba(255, 0, 179, 0.877)' }} ;
														font-size:20px" class="fa fa-fire"> </i>
													@endif
														</span>

													<ul class="hover-option position-absolute icon-white z-index-1">
															<li>
																<a data-toggle="tooltip" data-placement="top" class="bg-secondary fav-phone" title="" href="tel:+923328447174" class="color-white" data-original-title="Call">
																<i class="fa fa-phone" aria-hidden="true"></i></a>
														</li>
														<!--<li>-->
														<!--	<a data-toggle="tooltip" data-placement="top" class="bg-danger fav-heart" title="" href="https://syedzameen.com/public/fav/post/add/{{$post->id}}" data-original-title="remove wishlist">-->
														<!--		<i class="fa fa-heart-o" aria-hidden="true"></i></a>-->
														<!--</li>-->
														<!--<li>-->
														<!--	<a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Compare"><i class="fa fa-random" aria-hidden="true"></i></a>-->

														<!--</li>-->
													</ul> 
													<div class="hover-content py-30 px-20 overlay-hover-gradient">
														<div class="thumbnail-title z-index-1 position-relative">


															<span class="thumbnail-price bg-white color-secondary px-15 mb-10 d-table convrt3">
																<b  style="color: black;"> RS
																</b></span>
															<a class="color-secondary mb-5" href="{{route('singlePage',[str_replace(' ', '-', $post->property_title), $post->id] )}}">
															<h4>	
																{{-- {{Str::limit($post->property_title, 20, $end='.......')}} --}}
																{{$post->property_title}}
															</h4>

																<span class="address icon-primary f-14"><i class="fa fa-map-marker"></i>{{$post->area}}</span>
														</a></div><a class="color-secondary mb-5" href="{{route('singlePage',[str_replace(' ', '-', $post->property_title), $post->id] )}}">
														<ul class="about-property icon-primary d-table f-14 z-index-1 position-relative">
															<li><span class="color-primary">{{$post->land_area}}</span>Marla
															</li>
															<li><span class="color-primary">{{$post->bedrooms}}</span>bedrooms
															</li>
															{{-- <li><span class="color-primary">{{$post->bathrooms}}</span>bathrooms
															</li> --}}

														</ul>
														</a>
													</div>

												</div>
											</div>
										</div>

									</div>
								@endforeach
                       		</div>

                    	</div><!--- carousel item closing div --->
						<div class="carousel-item">

								<div class="row">
									@foreach($showReallatestPost2 as $post)
										<div class="col-md-4 col-sm-6 mb-4">

									<div class="property-thumbnail mt-30">

										<div class="property-img position-relative overflow-hidden overlay-secondary-4">

										<img src="{{$post->mainimage?(file_exists('mainimage/'.$post->mainimage)?asset('mainimage/'.$post->mainimage):asset('houseLog.jpg')):asset('houseLog.jpg') }}" alt="image" style="height:300px ">




											<div class="thumbnail-content z-index-1 color-white-a color-white">
												<span class="thum-category category-1 bg-secondary color-white z-index-1 px-15">
													{{$post->purpose}}
													</span>



												<ul class="hover-option position-absolute icon-white z-index-1">
														<li>
															<a data-toggle="tooltip" data-placement="top" class="bg-secondary fav-phone" title="" href="tel:+923328447174" class="color-white" data-original-title="Call">
															<i class="fa fa-phone" aria-hidden="true"></i></a>
													</li>
													<!--<li>-->
													<!--	<a data-toggle="tooltip" data-placement="top" class="bg-danger fav-heart" title="" href="https://syedzameen.com/public/fav/post/add/{{$post->id}}" data-original-title="remove wishlist"}>-->
													<!--		<i class="fa fa-heart-o" aria-hidden="true"></i></a>-->
													<!--</li>-->
													<!--<li>-->
													<!--	<a data-toggle="tooltip" data-placement="top" title="" href="#" data-original-title="Compare"><i class="fa fa-random" aria-hidden="true"></i></a>-->

													<!--</li>-->
												</ul>
												<div class="hover-content py-30 px-20 overlay-hover-gradient">
													<div class="thumbnail-title z-index-1 position-relative">


														<span class="thumbnail-price bg-white color-secondary px-15 mb-10 d-table convrt4"><b style="color: black;"> RS
															</b></span>
														<a class="color-secondary mb-5" href="{{route('singlePage',[str_replace(' ', '-', $post->property_title), $post->id] )}}">
														<h4>	
															{{-- {{Str::limit($post->property_title, 20, $end='.......')}} --}}
															{{$post->property_title}}
														</h4>

															<span class="address icon-primary f-14"><i class="fa fa-map-marker"></i>{{$post->area}}</span>
													</a></div><a class="color-secondary mb-5">
													<ul class="about-property icon-primary d-table f-14 z-index-1 position-relative">
														<li><span class="color-primary">{{$post->land_area}}</span>Marla
														</li>
														<li><span class="color-primary">{{$post->bedrooms}}</span>bedrooms
														</li>
														{{-- <li><span class="color-primary">{{$post->bathrooms}}</span>bathrooms
														</li> --}}

													</ul>
													</a>

												</div>

											</div>
										</div>
									</div>

								</div>
								@endforeach
							</div>

						</div><!--- carousel item closing div --->

                	</div>
            	</div>
        	</div>
		</div>
    </div>