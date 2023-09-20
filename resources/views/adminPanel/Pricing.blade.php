@extends('adminPanel.layout')


@section('body')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Pricing</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Pricing</li>
                            </ol>
                        </div>
                        
                    </div>
                </div>
            </div>   
         
            <!-- end page title -->

            @if(!is_null($freshRates))
            <div class="row justify-content-center">
                <div class="col-xl-10">

                    <!-- Plans -->
                    <div class="row mt-sm-5 mt-3 mb-3">
                        <div class="col-md-4">
                            <div class="card card-pricing">
                                <div class="card-body text-center">
                                    <i class="card-pricing-icon mdi mdi-coin text-white" style="background-color: rgb(255, 174, 0)"></i>
                                    <h5 class="font-weight-bold mt-4 text-uppercase" style="color: rgb(255, 174, 0)">Coin Rate</h5>
                                    
                                    <ul class="card-pricing-features">
                                        <li>Buy Coins To Boast</li>
                                        <li>Daily Basis Rates</li>
                                     
                                    </ul>

                                    <h2 class="mt-4">Rs {{$freshRates->coin_rates}}</h2>
                                    <p class="text-muted">Per Coin</p>
                                    <a class="btn mt-4 mb-2 btn-rounded text-white" 
                                    style="background-color: rgb(255, 174, 0)"
                                    href="{{route('CoinBuy')}}">Get Started <i class="mdi mdi-arrow-right ml-1"></i></a>
                                </div>
                            </div> <!-- end Pricing_card -->
                        </div> <!-- end col -->

                        <div class="col-md-4">
                            <div class="card card-pricing">
                                <div class="card-body text-center">
                                    <i class="card-pricing-icon mdi mdi-fire text-white" style="background-color: rgb(255, 0, 234)" ></i>
                                    <h5 class="font-weight-bold mt-4 text-uppercase" style="color: rgb(255, 0, 234)">Hot </h5>
                                    <ul class="card-pricing-features">
                                        <li>Post Boaster</li>
                                        <li>Less then Super Hot</li>
                                      
                                    </ul>

                                    <h2 class="mt-4">RS {{$freshRates->hot_rates}}</h2>
                                    <p class=" text-muted">Per Post</p>
                                    <a style="background-color: rgb(255, 0, 234)" href="{{url('all/post')}}"
                                     class="btn text-white mt-4 mb-2 btn-rounded">Get Started <i class="mdi mdi-arrow-right ml-1"></i></a>
                                </div>
                            </div> <!-- end Pricing_card -->
                        </div> <!-- end col -->

                        <div class="col-md-4">
                            <div class="card card-pricing">
                                <div class="card-body text-center">
                                    <i class="card-pricing-icon mdi mdi mdi-fire text-white" style="background-color: red"></i>
                                    <h5 class="font-weight-bold mt-4 text-uppercase" style="color: red">Super Hot</h5>
                                    <ul class="card-pricing-features">
                                        <li>Top Ranking</li>
                                        <li>Unlimited Boaster</li>
                                      
                                    </ul>

                                    <h2 class="mt-4">Rs {{$freshRates->superhot_rates}}</h2>
                                    <p class="text-muted">Per Post</p>
                                    <a class="btn text-white mt-4 mb-2 btn-rounded" href="{{url('all/post')}}"
                                    style="background-color: red"
                                    >Get Started <i class="mdi mdi-arrow-right ml-1"></i></a>
                                </div>
                            </div> <!-- end Pricing_card -->
                        </div> <!-- end col -->

                    </div>
                    <!-- end row -->

                </div> <!-- end col-->
            </div>
            @else
            <p class="alert alert-danger" style="text-align: center">The Admin is not set the pricing yet.</p>
            @endif
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
</div>
@endsection