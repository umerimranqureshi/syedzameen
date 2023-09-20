@extends('layout')






@section('body')


<div style="display: flex;justify-content:center">
    <div>
        @if (session()->has('status'))
        <h5 style="margin-top:10px" class="alert alert-success ">Verfication link send !</h5>

        @else
        <h5 style="margin-top:10px" class="alert alert-success ">Account created succesfully please verify your email
            address, A link has been
            send
            to your email address!</h5>

        @endif


        <form style="width: 13%;margin: auto;" method="POST" action="{{route('verification.send')}}">
            @csrf
            <button style="color:aliceblue" class="alert alert-info" type="submit">Resend again
                ?</button>
        </form>

    </div>

</div>









@endsection