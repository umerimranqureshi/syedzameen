@extends('adminPanel.layout')


@section('header')
{{-- <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
<style>
  .color-blue{
    color: #28272b
  }
  .color-grey{
    color: rgb(87, 84, 84);
  }
  .icon-size{
    font-size: 20px;
    color:#fd9834;
  }
  .icon-details{
    color: #666666;
    font-size: 12px;
  }

}
.container-pos{

position: relative;

}
.img-circle-logo{
position: absolute;
bottom: 8px;
right: 16px;


height: 3vw;
width: 3vw;
overflow: hidden;
border: 1px solid rgba(128, 128, 128, 0.322);
border-radius: 50%;
}
.img-rounded{
width: 100%;
height: 100%;

object-fit: fill;

}

@media screen and (max-width: 499px){
.img-circle-logo{
  
  height: 10vw;
  width: 10vw;

}
}


@media screen and (max-width: 499px){
  .img-circle-logo{
    
    height: 10vw;
    width: 10vw;
 
  }
}

.footer-pkr{
  font-size: 20px;
    background-color:#fd9834;
    color: whitesmoke;
}
  </style>
@endsection


@section('body')


{{-- <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"> --}}


<div class="main-content">

  <div class="page-content">

      <div class="container-fluid">
        @if($fav->count()>0)
        <div class="container">
         <h5>Click to request for agent</h5>
          <div class="row ">
            
            @foreach ($fav as $favpost)
          
            <div class="col-sm-4 mt-3">
      
              <a href="{{route('singlePage',['id'=>$favpost->post->id])}}">
              <div class="card">
                <div class="container-pos">

                  @if($favpost->image==null)
                  <img class="card-img-top" src="{{asset('houselog.jpg')}}" alt="image" style="height:300px ">
                 @else
                 <img class="card-img-top" src="{{asset('propertyImages/'.$favpost->image->img_path)}}" alt="Card image cap" style="height:300px ">
                 @endif

                  
                  @if($favpost->post->agencies)
                  <div class="img-circle-logo">
                     
                    <img class="img-rounded" src="{{($favpost->post->agencies==null) ? '' :asset($favpost->post->agencies->logo)}}" alt="">
                     
                  </div>
                  @endif
                </div>
              
             
            </div>
                <div class="card-body p-2 mt-1">
                <h5 class="card-title color-blue" style="font-size: 25px">{{$favpost->post->property_title}}</h5>
                

                <div class="row">
                  <div class="col-sm-6">
                  <i class="fas fa-vector-square icon-size "></i><span class="icon-details">{{$favpost->post->land_area."".$favpost->post->unit}}</span>
                  
                  </div> 
                  <div class="col-sm-6 ">
                    <i class="fas fa-bed icon-size"></i><span class="ml-2 icon-details">{{$favpost->post->bedrooms." bedrooms"}}</span>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <i class="fas fa-print icon-size"></i><span class="ml-2 icon-details">{{$favpost->post->propertyCate->purpose}}</span>
                    
                  </div>
                  <div class="col-sm-6">
                    <i class="fas fa-bath icon-size"></i><span class="ml-2 icon-details">{{$favpost->post->bathrooms." bathrooms"}}</span>
                  </div>
                </div>

                
              <p class="card-text icon-details" style="height: 80px">{{$favpost->post->description}}</p>
                 
                </div>
                <div class="card-footer footer-pkr">
                  <small class="">PKR : {{$favpost->post->price}}</small>
                </div>
              </a>
              </div>
              
           
              @endforeach
            </div>
           
        
        
      </div>
      @else
      <h5 class="text-success text-center">you dont have favourite post yet</h5>

      @endif
    </div>

     


      
       
      </div>
  </div>
</div>
       
          {{-- <div class="col-sm-6">
            <div class="card w-75">
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div> --}}


    
 {{-- <div class="main-content">
     <div class="page-content">
         <div class="container-fluid">
              <!--Section Recent Properties-->
  <section class="section-md text-center text-sm-left">
    <div class="container">
      <h2>favourite Ads</h2>
      <hr>
      <div class="row clearleft-custom">
  
  
  
  
        <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="thumbnail thumbnail-3">
            <a href="" class="img-link">
  
              <img style="height: 250px"
            src="{{asset('/assets/images/agency-2.jpg')}}" alt=""
                width="370">
  
            </a>
            <div class="caption">
              <h4>
              <a href="" class="text-sushi">{{$favpost->favpost->property_title}}</a>
              </h4>
            <span class="thumbnail-price h5">${{$favpost->favpost->price}}/
                <span class="mon text-regular"></span>
              </span>
              <ul class="describe-1">
                <li>
                  <span class="icon-square icon-sm">
                    <svg x="0px" y="0px" viewBox="0 0 100 100" style="enable-background:new 0 0 100 100"
                      xml:space="preserve">
                      <g>
                        <path
                          d="M3.6,75.7h3.6V7.3l85.7-0.1v85.3l-16.7-0.1l0-16.7c0-0.9-0.4-1.9-1-2.5c-0.7-0.7-1.6-1-2.5-1h-69V75.7h3.6                          H3.6v3.6H69L69,96c0,2,1.6,3.6,3.6,3.6l23.8,0.1c1,0,1.9-0.4,2.5-1c0.7-0.7,1-1.6,1-2.5V3.6c0-1-0.4-1.9-1-2.5                          c-0.7-0.7-1.6-1-2.5-1L3.6,0.1C1.6,0.2,0,1.7,0,3.7v72c0,0.9,0.4,1.9,1,2.5c0.7,0.7,1.6,1,2.5,1V75.7z">
                        </path>
                        <path
                          d="M38.1,76.9v-9.5c0-1.3-1.1-2.4-2.4-2.4c-1.3,0-2.4,1.1-2.4,2.4v9.5c0,1.3,1.1,2.4,2.4,2.4                          C37,79.3,38.1,78.2,38.1,76.9">
                        </path>
                        <path
                          d="M38.1,50.7V15c0-1.3-1.1-2.4-2.4-2.4c-1.3,0-2.4,1.1-2.4,2.4v35.7c0,1.3,1.1,2.4,2.4,2.4                          C37,53.1,38.1,52.1,38.1,50.7">
                        </path>
                        <path
                          d="M2.4,38.8h33.3c1.3,0,2.4-1.1,2.4-2.4c0-1.3-1.1-2.4-2.4-2.4H2.4c-1.3,0-2.4,1.1-2.4,2.4                          C0,37.8,1.1,38.8,2.4,38.8">
                        </path>
                        <path
                          d="M35.7,46h31c1.3,0,2.4-1.1,2.4-2.4c0-1.3-1.1-2.4-2.4-2.4h-31c-1.3,0-2.4,1.1-2.4,2.4                          C33.3,44.9,34.4,46,35.7,46">
                        </path>
                        <path
                          d="M78.6,46h16.7c1.3,0,2.4-1.1,2.4-2.4c0-1.3-1.1-2.4-2.4-2.4H78.6c-1.3,0-2.4,1.1-2.4,2.4                          C76.2,44.9,77.3,46,78.6,46">
                        </path>
                        <path
                          d="M78.6,46h16.7c1.3,0,2.4-1.1,2.4-2.4c0-1.3-1.1-2.4-2.4-2.4H78.6c-1.3,0-2.4,1.1-2.4,2.4                          C76.2,44.9,77.3,46,78.6,46">
                        </path>
                        <path
                          d="M81,43.6v-7.1c0-1.3-1.1-2.4-2.4-2.4c-1.3,0-2.4,1.1-2.4,2.4v7.1c0,1.3,1.1,2.4,2.4,2.4                          C79.9,46,81,44.9,81,43.6">
                        </path>
                        <path
                          d="M81,43.6v-7.1c0-1.3-1.1-2.4-2.4-2.4c-1.3,0-2.4,1.1-2.4,2.4v7.1c0,1.3,1.1,2.4,2.4,2.4                            C79.9,46,81,44.9,81,43.6">
                        </path>
                      </g>
                    </svg>
                  </span></li>
                <li>
                  <span class="icon icon-sm icon-primary hotel-icon-10"></span>{{$favpost->favpost->bathrooms}} bathrooms</li>
              </ul>
              <ul class="describe-2">
                <li>
                  <span class="icon icon-sm icon-primary hotel-icon-05"></span>{{$favpost->favpost->bedrooms}} bedrooms</li>
                
              </ul>
            <p class="text-abbey">{{$favpost->favpost->description}}</p>
            </div>
          </div>
        </div>
  
  
        @endforeach
  
  
      </div>
      <a href="property-catalog-grid.html" class="btn btn-sm btn-sushi offset-11">view all properties</a>
    </div>
</section>
         </div>
     </div>
 </div> --}}
    
@endsection