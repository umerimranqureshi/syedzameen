@extends('adminPanel.layout')







@section('body')


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-10">

                    <div class="card">
                        <div class="card-body">


                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-center mt-2 mb-4">

                                        <!-------this $check variable use for switch form either for edit or for add---->

                                        @if (isset($check))
                                        <h2>Edit Your Agency</h2>
                                        @else
                                        <h2>Add Your Agency</h2>
                                        @endif


                                    </div>
                                </div>
                                <div class="col-12">

                                    <div class="d-flex justify-content-center">
                                        <form class="form-group" method="POST" enctype="multipart/form-data"
                                            action="{{route('addAgency')}}">
                                            @csrf
                                            @if (isset($check))

                                            <h5>Agency Name</h5>
                                            <input class="form-control mt-1 mb-1" value="{{$recordExistsOrNot->name}}"
                                                name="name" type="text">
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror




                                            <h5>City Name</h5>
                                            <select class="form-control mt-1 mb-1" name="city" id="">

                                                @foreach ($cities as $city)

                                                <option {{$recordExistsOrNot->city==$city?"selected":""}}
                                                    value="{{$city->city}}">{{$city->city}}</option>

                                                @endforeach



                                            </select>







                                            <h5> Address</h5>
                                            <input class="form-control mt-1 mb-1"
                                                value="{{$recordExistsOrNot->address}}" name="address" type="text">
                                            @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                            <input type="hidden" name="check" value="true" id="">

                                            <h5>Select logo for your brand</h5>
                                            <input class="form-control mt-1 mb-1" name="image" type="file">
                                            @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <h5>Add description</h5>
                                            <input class="form-control" type="text"
                                                value="{{$recordExistsOrNot->description}}" name="description">
                                            @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <button class="form-control mt-3 mb-1" type="submit">Add?</button>





                                            @else


                                            <h5>Agency Name</h5>
                                            <input class="form-control mt-1 mb-1" name="name" type="text">



                                            <h5>City Name</h5>
                                            <select class="form-control mt-1 mb-1" name="city" id="">

                                                @foreach ($cities as $city)

                                                <option value="{{$city->city}}">{{$city->city}}</option>

                                                @endforeach



                                            </select>


                                            <h5> Address</h5>
                                            <input class="form-control mt-1 mb-1" name="address" type="text">

                                            <h5>Select logo for your brand</h5>
                                            <input class="form-control mt-1 mb-1" name="image" type="file">



                                            <button class="form-control mt-3 mb-1" type="submit">Add?</button>


                                            @endif





                                        </form>

                                    </div>


                                </div>






                            </div>
                        </div>





                    </div>


                </div>


            </div>
        </div>
    </div>









</div>


















@endsection