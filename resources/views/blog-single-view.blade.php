<?php use App\Http\Controllers\helper;

?>

@extends('layout')




@section('body')



<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-8">
				<div class="blog-item">
					<div class="blog-img position-relative post-content">
						<img style="height: 400px"
							src="{{isset($blog->blogImages[0])? asset('public/'.$blog->blogImages[0]->img_path):''}}" alt="Image">
						<div class="date post-date float-left bg-gray mr-20 text-center color-secondary">

							@php
							$date=helper::DBDateToSimpleFormat($blog->created_at->toDateString());
							@endphp



							<div class="py-10"><span class="d-block">{{$date[0]}}</span>{{$date[1]}}</div>
							<div class="post-love py-5 bg-primary"><a href="#"><i class="fa fa-heart"
										aria-hidden="true"></i> 1.3k</a></div>
						</div>
					</div>
					<div class="blog-info color-secondary-a">
						<div class="post-meta icon-primary color-secondary-a pt-30 pb-15">
							<ul class="post-info list-style-1 d-flex color-secondary">
								<li><i class="fa fa-user"></i> Admin</li>
								{{-- <li><a href="#"><i class="fa fa-comments-o"></i> 583</a></li>
								<li><a href="#"><i class="fa fa-share-alt"></i> 378</a></li> --}}
							</ul>
						</div>
						<h3 class="mb-20 color-secondary">{{$blog->title}}</h3>
						<p></p>
						<blockquote class="bg-gray color-secondary text-center p-30 my-30">
							<span class="mb-15 color-primary"><i class="fa fa-quote-left"></i></span>
							<p class="m-0"><strong>{{$blog->header}}.</strong>
							</p>
						</blockquote>
						<p style="word-break:break-all" class="mb-15">{!! $blog->content !!}</p>
						<!--<p style="word-break:break-all">{!! $blog->content !!}</p>-->
						
							<div class="mt-sm-30"><img
									src="{{isset($blog->blogImages[1])? asset('public/'.$blog->blogImages[1]->img_path):''}}"
									alt="image"></div>
						
						<!--<p style="word-break:break-all">{!! $blog->content !!}</p>-->


								<div class="mt-sm-30"><img
										src="{{isset($blog->blogImages[2])? asset('public/'.$blog->blogImages[2]->img_path):''}}"
										alt="image"></div>
							

					</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-4">
				<div class="blog-sidebar color-secondary-a mt-md-50">
					<!-- Search form -->
					<h3>Search blog </h3>

					<select class="shadow search_blog" name="blog_title" id="search_blog">

						@foreach ($blogs as $blog)

						<option value="{{$blog->id}}">{{$blog->title}}</option>

						@endforeach

					</select>

					<button class="button" id="submit_form" type="button">search</button>


					<!-- Categories -->
					{{-- <div class="widget py-50 px-30 bg-white mt-50 shadow">
						<h3 class="color-secondary line-bottom pb-15 mb-30">Categories</h3>
						<ul class="widget-catogory">
							<li><a href="#">Classic</a></li>
							<li><a href="#">Mordan</a></li>
							<li><a href="#">Overlay Title</a></li>
							<li><a href="#">Mosonry Title</a></li>
							<li><a href="#">Mosonry Grid</a></li>
							<li><a href="#">Blog List</a></li>
							<li><a href="#">Blog Full-Width</a></li>
						</ul>
					</div> --}}
					<!-- Recent News -->
					{{-- <div class="widget py-50 px-30 bg-white mt-50 shadow">
						<h3 class="color-secondary line-bottom pb-15 mb-30">Recent News</h3>
						<ul class="widget-news">
							<li>
								<h6><a class="post-widget-title" href="#">Pellentes bibendum felis soc feugy tempus
										suscipit bibendum.</a></h6>
								<div class="post-meta color-gray mt-5 f-14">
									<span class="d-inline-block">10 Mar 2020</span>
									<a class="d-inline-block color-gray float-right" href="#">02 Comments</a>
								</div>
							</li>
							<li>
								<h6><a class="post-widget-title" href="#">Pellentes bibendum felis soc feugy tempus
										suscipit bibendum.</a></h6>
								<div class="post-meta color-gray mt-5 f-14">
									<span class="d-inline-block">10 Mar 2020</span>
									<a class="d-inline-block color-gray float-right" href="#">02 Comments</a>
								</div>
							</li>
							<li>
								<h6><a class="post-widget-title" href="#">Pellentes bibendum felis soc feugy tempus
										suscipit bibendum.</a></h6>
								<div class="post-meta color-gray mt-5 f-14">
									<span class="d-inline-block">10 Mar 2020</span>
									<a class="d-inline-block color-gray float-right" href="#">02 Comments</a>
								</div>
							</li>
						</ul>
					</div> --}}
					<!-- Widget Archive -->
					{{-- <div class="widget py-50 px-30 bg-white mt-50 shadow">
						<h3 class="color-secondary line-bottom pb-15 mb-30">Archive</h3>
						<ul class="widget-archive">
							<li><a href="#">February 2020</a></li>
							<li><a href="#">January 2020</a></li>
							<li><a href="#">December 2019</a></li>
							<li><a href="#">November 2019</a></li>
							<li><a href="#">October 2019</a></li>
						</ul>
					</div> --}}
					<!-- Widget Tags -->
					{{-- <div class="widget py-50 px-30 bg-white mt-50 d-inline-block shadow">
						<h3 class="color-secondary line-bottom pb-15 mb-30">Poppular Tags</h3>
						<ul class="widget-tags">
							<li><a href="#">Realestate,</a></li>
							<li><a href="#">Property,</a></li>
							<li><a href="#">House,</a></li>
							<li><a href="#">Land,</a></li>
							<li><a href="#">Bootstrap4,</a></li>
							<li><a href="#">Business,</a></li>
							<li><a href="#">Corporate,</a></li>
							<li><a href="#">Agent,</a></li>
							<li><a href="#">Nonprofit</a></li>
						</ul>
					</div> --}}
				</div>
			</div>
		</div>
	</div>
</section>



<script>
	//	console.log($);
	$("document").ready(() => {

		$("#search_blog").select2();




		$("#submit_form").click(function () {

			$SearchblogID = $("#search_blog").find(":selected").val();

			window.location = "{{url('/blog/main/single/view/')}}/" + $SearchblogID;


		});

	});


</script>






@endsection