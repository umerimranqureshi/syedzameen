@extends('adminPanel.layout')


@section('header')
    <style>
        .btn-rates{
            background-color: rgba(128, 0, 128, 0.747);
            color: white;
        }
    </style>
@endsection

@section('body')
<div class="main-content">

    <div class="page-content">


        <div class="container">
            <div class="row">

              <div class="col-lg-12">

                @isset($updateRate)
                <div class="card p-3 ">

                  <div class="card-title">
                      Update Current Rate
                  </div>

                  
                 
                  <form method="POST" action="{{route('updateRates',['id'=>$updateRate->id])}}">
                    @csrf
                    
                     @if(session('message'))
                    <div style="text-align: center">
                      <span class="alert alert-success">{{session('message')}}</span>
                    </div>
                    @endif 
                 
                      <div class="form-row">
                        <div class="form-group  col-md-4">
                          <label for="inputEmail4">Coin Rates
                              <i class="mdi mdi-coin" style="color: rgb(255, 174, 0);font-size:25px"></i>
                          </label>
                          <input id="inputEmail4"
                          placeholder="XXX - XXX - XXXX" 
                          onkeypress="return isNumberKey(event)"
                          type="text"
                          class="form-control"
                           name="coin_rate"
                           value="{{$updateRate->coin_rates}}"
                           >
                           @error('coin_rate')
                               <span class="text text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputPassword4">Hot Post Rates 
                              <i class="mdi mdi-fire" style="color: rgb(255, 0, 234);font-size:25px"></i>
                          </label>
                          <input id="inputEmail4"
                          placeholder="XXX - XXX - XXXX" 
                          onkeypress="return isNumberKey(event)"
                          type="text"
                          class="form-control"
                           name="hot_post_rate"
                           value="{{$updateRate->hot_rates}}"
                           >
                           @error('hot_post_rate')
                               <span class="text text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputPassword4">Super Hot Rates
                              <i class="mdi mdi-fire" style="color: red;font-size:25px"></i>
                          </label>
                          <input id="txtNumber" 
                          placeholder="XXX - XXX - XXXX" 
                          onkeypress="return isNumberKey(event)"
                          type="text"
                          class="form-control"
                           name="super_hot_post_rate"
                           value="{{$updateRate->superhot_rates}}"
                           >
                           @error('super_hot_post_rate')
                               <span class="text text-danger">{{$message}}</span>
                           @enderror
                        </div>
                      </div> 
                      <button type="submit" class="btn btn-rates">Update Rates</button>
                    </form>
                      
                   
                </div>
                @endisset




                 @isset($rates)
                 <div class="card p-3 ">

                  <div class="card-title">
                      Add Current Rates
                  </div>

                  
                 
                  <form method="POST" action="{{route('addFreshesRates')}}">
                    @csrf
                    
                     @if(session('message'))
                    <div style="text-align: center">
                      <span class="alert alert-success">{{session('message')}}</span>
                    </div>
                    @endif 
                 
                      <div class="form-row">
                        <div class="form-group  col-md-4">
                          <label for="inputEmail4">Coin Rates
                              <i class="mdi mdi-coin" style="color: rgb(255, 174, 0);font-size:25px"></i>
                          </label>
                          <input id="inputEmail4"
                          placeholder="XXX - XXX - XXXX" 
                          onkeypress="return isNumberKey(event)"
                          type="text"
                          class="form-control"
                           name="coin_rate">
                           @error('coin_rate')
                               <span class="text text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputPassword4">Hot Post Rates 
                              <i class="mdi mdi-fire" style="color: rgb(255, 0, 234);font-size:25px"></i>
                          </label>
                          <input id="inputEmail4"
                          placeholder="XXX - XXX - XXXX" 
                          onkeypress="return isNumberKey(event)"
                          type="text"
                          class="form-control"
                           name="hot_post_rate">
                           @error('hot_post_rate')
                               <span class="text text-danger">{{$message}}</span>
                           @enderror
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputPassword4">Super Hot Rates
                              <i class="mdi mdi-fire" style="color: red;font-size:25px"></i>
                          </label>
                          <input id="txtNumber" 
                          placeholder="XXX - XXX - XXXX" 
                          onkeypress="return isNumberKey(event)"
                          type="text"
                          class="form-control"
                           name="super_hot_post_rate">
                           @error('super_hot_post_rate')
                               <span class="text text-danger">{{$message}}</span>
                           @enderror
                        </div>
                      </div> 
                      <button type="submit" class="btn btn-rates">Add Rates</button>
                    </form>
                      
                   
                </div>
                 @endisset
              </div>

            </div>

            @isset($rates)
            <div class="row">
                <div class="col">
                    <h3 style="text-align: center">Overall Rate List</h3>
                    <p style="text-align: center;color:blue;">Only Latest Rates Can be Update!</p>
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Coins</th>
                            <th scope="col">Hot Post</th>
                            <th scope="col">Super Hot Post</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                          @foreach ($rates as $key=> $rate)
                          <tr class="{{($key==0)?'table-success':''}}">
                          <th scope="row">{{$key+1}}</th>
                          <td>{{$rate->coin_rates}}</td>
                          <td>{{$rate->hot_rates}}</td>
                          <td>{{$rate->superhot_rates}}</td>
                          <td>{{$rate->created_at->format('d/m/y')}}</td>
                          
                          <td>
                            @if($key==0)
                            <a href="{{route('editFreshView',['id'=>$rate->id])}}">
                            <i title="edit" class="mdi mdi-pencil" style="font-size: 20px;color:rgb(109, 128, 0)"></i>  
                          </a> 
                          @endif
                        </td>
                          
                        </tr>
                          @endforeach
                         
                        </tbody>
                      </table>
                      
                      
                </div>
            </div>
            @endisset
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
			

</script>

@endsection

