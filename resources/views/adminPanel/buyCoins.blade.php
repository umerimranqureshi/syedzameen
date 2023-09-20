@extends('adminPanel.layout')


@section('body')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Buy Coins</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Buy</a></li>
                                    <li class="breadcrumb-item active">Coins</li>
                                </ol>
                            </div>
                            
                        </div>
                    </div>
                </div>     
                <div class="row">
                    <div class="col">
                        <p class="text text-danger" style="text-align: center">
                            @if(session('buyCoins'))
                                {{session('buyCoins')}}
                            @endif    
                        </p>    
                    </div>    
                </div>  

                    <div class="">
                        <div class="row">

                            <div class="col-lg-6">
                                <h2 style="text-align: center">Rates</h2>
                                <div class="card card-pricing">
                                   <div class="row">
                                       <div class="col">
                                        <div class="card-body text-center">
                                            
                                            <i class="card-pricing-icon mdi mdi-fire text-white" style="background-color: rgb(255, 0, 234)" ></i>
                                            <h5 class="font-weight-bold mt-4 text-uppercase" style="color: rgb(255, 0, 234)">Hot </h5> 
                                            @if($freshRates) 
                                            <h2 class="mt-4"><i class="mdi mdi-coin" style="color: rgb(255, 123, 0)"></i> {{$freshRates->hot_rates}}</h2>
                                            @endif                                 
                                          
                                        </div>
                                       </div>
                                       <div class="col">
                                        <div class="card-body text-center">
                                        
                                           
                                            
                                            <i class="card-pricing-icon mdi mdi-fire text-white" style="background-color: red" ></i>
                                            <h5 class="font-weight-bold mt-4 text-uppercase" style="color: red">Super Hot </h5> 
                                            @if($freshRates)   
                                            <h2 class="mt-4"><i class="mdi mdi-coin" style="color: rgb(255, 123, 0)"></i>
                                                 {{$freshRates->superhot_rates}}</h2>
                                            @endif
                                        </div>
                                    </div>
                                   </div>
                                </div> 
                            </div>

                            <div class="col-lg-6">
                                @if($freshRates)
                                <h2 style="text-align: center">Buy Your Coins</h2>
                              <div class="card align-items-center" style="">
                                <p class="mt-1">Fill the form and admin will contact you</p>
                                
                                <form action="{{route('addCoins')}}" class="" method="POST">
                                    @csrf
                                    <div class="form-group ">
                                        <label for="inputEmail4">Current coin rate {{$freshRates->coin_rates}}
                                            <i class="mdi mdi-coin" style="color: rgb(255, 174, 0);font-size:20px"></i>
                                        </label>
                                        <input id="coininput"
                                        placeholder="XXX - XXX - XXXX" 
                                        onkeypress="return isNumberKey(event)"
                                        type="text"
                                        class="form-control"
                                         name="coins"
                                         >
                                         @error('coins')
                                            <span id="server_msg" class="text text-danger">{{$message}}</span>
                                         @enderror
                                         @if (session('message'))
                                         <span id="server_msg" class="text text-danger">{{session('message')}}</span>
                                         @endif
                                         
                                          <h5 id="rupees" class="text text-success mt-2"></h5>
                                      </div>
                                      <button type="submit" class="btn btn-primary btn-lg mb-4">Buy</button>  
                                   </form>
                                   @else
                                   <h5>Admin is not set pricing yet</h5>
                                   @endif
                              </div>
                            </div>
                          
                        </div>
                    </div>
              
        </div>
    </div>
</div>
      
<script>
    function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
            return false;
            return true;
        }  

    $(document).ready(()=>{
        $('#coininput').on('keyup',function(){
        $('#server_msg').hide();
        $perCoinRate="{{($freshRates)?$freshRates->coin_rates:''}}";
        $newRate=$perCoinRate*$(this).val();
        $('#rupees').text('RS'+' '+$newRate);
    });
    });
        

</script>
@endsection