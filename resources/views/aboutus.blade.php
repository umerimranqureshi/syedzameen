@extends('layout')


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
        flex-basis: 33.33%;
        /* Set the width to 33.33% to display three blocks inline */
        max-width: 33.33%;
        text-align: center;
        padding: 30px;
    }

    .icon {
        font-size: 40px;
        margin-bottom: 20px;
        color: black;
        /* Change the icon color to black */
    }

    .list-0 {
        padding-left: 0;
        list-style: none;
    }

    .list-0 li {
        margin-bottom: 10px;
        color: black;
        /* Change the text color to black */
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
        color: black;
        /* Change the text color to black */
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

    .icons {
        font-size: 40px;
        margin-bottom: 40px;
        color: #2f77ad;
    }
</style>


@section('body')
    <div class="page-banner overlay-black  mobile-responsive-header" style="padding: 150px 0 ; margin-top: -90px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <h1 class="page-banner-title color-primary">A Place You Call Home</h1>
                    <div class="text-area w-50 mt-15 color-white">
                        <p>About Us!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section novi-background section-sm">

        <div class="container">
            <div class="layout-bordered">

                <div class="layout-bordered-item wow-outer">
                    <div class="layout-bordered-item-inner wow slideInUp">
                        <div class="icon novi-icon icon-lg mdi mdi-map-marker text-primary">
                        </div>
                        <div class="icons"> About Us</div>
                        <div>
                            <p>
                                Syed Zameen is the leading property portal based in Pakistan - We offer the highest levels
                                of service to property buyers sellers landlords tenants alike in Lahore and all over
                                Pakistan. We are providing quality property - commercial plots, Industrial lands, Buildings,
                                apartments - bungalows, and home buying. Moreover, You can also list your property on our
                                portal.
                            </p>
                        </div>
                        <div class="icon novi-icon icon-lg mdi mdi-map-marker text-primary"></div>
                        {{-- <div class="icons"><i class="fa fa-map-marker"></i></div> --}}
                    </div>
                </div>

                <div class="layout-bordered-item wow-outer">
                    <div class="layout-bordered-item-inner wow slideInUp">
                        <div class="icon novi-icon icon-lg mdi mdi-email text-primary"></div>
                        <div class="icons">Our Vision</div>
                        <p>
                            The result of Syed Zameen's vision and hard work is the cutting-edge real estate property portal
                            that bears his name. This platform seamlessly connects buyers, sellers, and renters, providing a
                            comprehensive range of listings that cater to diverse preferences and budgets. From houses and
                            apartments to commercial spaces and plots of land, the portal's extensive database ensures that
                            every user finds something that suits their requirements.
                        </p>
                    </div>
                </div>

                <div class="layout-bordered-item wow-outer">
                    <div class="layout-bordered-item-inner wow slideInUp">
                        <div class="icon novi-icon icon-lg mdi mdi-phone text-primary"></div>
                        <ul class="list-0">
                            <div class="icons">Our Mission</div>
                            <p>
                                Syed Zameen, a dynamic and forward-thinking entrepreneur, recognized the gaps and challenges
                                in Pakistan's real estate sector. Syed Zameen envisioned a digital platform that could
                                bridge these gaps, offering a one-stop solution for all real estate needs. With a background
                                in technology and a passion for real estate, Syed Zameen embarked on a journey to create
                                something revolutionary.
                            </p>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
