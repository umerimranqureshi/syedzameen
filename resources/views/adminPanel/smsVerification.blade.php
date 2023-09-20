@extends('adminPanel.layout')





@section('body')


<div class="main-content">

    <div class="page-content">



        <div class="row">

            <div class="col-sm-6">
                <div class="card">

                    <div class="card card-body">

                        <div class="container-fluid">
                            <div class="row">


                                <div class="col-12 justify-content-center">
                                    <h5>please enter you'r code here which has been sended to you mobile.</h5>

                                    <h5 class="text text-danger">{{session()->get("msg")??''}}</h5>
                                </div>




                                <div class="col-12">
                                    <form method="POST" class="form-goup" action="{{route('finalPhone')}}">
                                        @csrf

                                        <input class="form-control" name="code" placeholder="code" type="text">
                                </div>

                                <div class="col-12 mt-2">
                                    <button class="btn btn-dark" type="submit"> submit </button>
                                </div>
                                </form>

                            </div>




                        </div>





                    </div>



                </div>


            </div>
        </div>
    </div>



</div>





@endsection