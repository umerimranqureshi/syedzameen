@extends('layout')

@section('body')



<!-- Find the best Place End
==================================================================-->

  <section class="section novi-background section-sm">

<style>
/* CSS for Contact Section */

.section {
  padding: 60px 0;
}

.section-sm {
  padding: 30px 0;
}

.container {
  width: 100%;
  max-width: 1140px;
  margin-left: auto;
  margin-right: auto;
  padding-left: 15px;
  padding-right: 15px;
}

.layout-bordered {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.layout-bordered-item {
  flex-basis: 33.33%; /* Set the width to 33.33% to display three blocks inline */
  max-width: 33.33%;
  text-align: center;
  padding: 30px;
}

.icon {
  font-size: 40px;
  margin-bottom: 20px;
  color: black; /* Change the icon color to black */
}

.list-0 {
  padding-left: 0;
  list-style: none;
}

.list-0 li {
  margin-bottom: 10px;
  color: black; /* Change the text color to black */
}

.link-default {
  /* color: #007bff; */
  color: black;
}

.link-default:hover {
  text-decoration: none;
}

.icon-lg {
  font-size: 60px;
}

.mdi {
  background-color: transparent;
}

.text-primary {
  color: black; /* Change the text color to black */
}

.layout-bordered-item-inner {
  /* position: relative; */
  transition: 0.4s;
}

.wow-outer {
  position: relative;
}

.slideInUp {
  animation-name: slideInUp;
  animation-duration: 0.7s;
  visibility: visible !important;
}

@keyframes slideInUp {
  from {
    transform: translateY(50px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}
.icons{
font-size: 40px;
margin-bottom: 40px;
color: #fd9834;
}



</style>

      <div class="container">
        <div class="layout-bordered">

              <div class="layout-bordered-item wow-outer">
            <div class="layout-bordered-item-inner wow slideInUp">
              <div class="icon novi-icon icon-lg mdi mdi-map-marker text-primary">
                </div>
                <div class="icons"><i class="fa fa-map-marker"></i></div>
                <a class="link-default" href="#">28F 1st Floor commercial Area DHA, Phase 1 Lahore</a>

              <div class="icon novi-icon icon-lg mdi mdi-map-marker text-primary"></div>
              <div class="icons"><i class="fa fa-map-marker"></i></div>
              <a class="link-default" href="#"> 2nd floor 47-MB<br>(Main Boulevard) Phase 6 DHA Lahore</a>

            </div>
          </div>

          <div class="layout-bordered-item wow-outer">
            <div class="layout-bordered-item-inner wow slideInUp">
              <div class="icon novi-icon icon-lg mdi mdi-email text-primary"></div>
              <div class="icons"><i class="fa fa-envelope"></i></div>
              <a class="link-default" href="mailto:syedrealestateandbuilders@gmail.com">syedrealestateandbuilders@gmail.com</a>
              <a class="link-default" href="mailto:syedrealestateandbuilders@gmail.com"> info@syedrealestates.com</a>

            </div>
          </div>

          <div class="layout-bordered-item wow-outer">
            <div class="layout-bordered-item-inner wow slideInUp">
              <div class="icon novi-icon icon-lg mdi mdi-phone text-primary"></div>
              <ul class="list-0">
                <div class="icons"><i class="fa fa-phone"></i></div>
                <li><a class="link-default" href="tel:#">+(92)-332-8447174</a></li>
                <li><a class="link-default" href="tel:#">+(
                    92)-324-8430329</a></li>
              </ul>
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
								<p>These are our popular fellows. if you want to become a fellow then <a href="{{route('contactUs')}}">contact us</a>
								</p>
							</div>
							<div class="owl-carousel partners mt-30">
								<img src="{{asset('Ourfellow.jpg')}}" alt="Image not found!">
								<img src="{{asset('syedEstate Real logo.png')}}" alt="">
								<img src="{{asset('logo-3.png')}}" alt="">
							</div>
						</div>
						<div class="col-md-12 col-lg-6 px-60">
							<div class="side-title pb-30 text-right mt-md-50">
								<span
									class="small-title color-primary position-relative line-right-primary">Newsletter</span>
								<h2 class="title mb-20 color-secondary">Get Update Now!</h2>
								<p>Get daily news of properties in the market by our newsletter features just subscribe us</p>
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

<script>

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
</script>

@endsection