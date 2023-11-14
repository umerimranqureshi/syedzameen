<?php use App\Http\Controllers\helper;

?>

@extends('layout')




@section('body')



<div class="page-banner overlay-black  mobile-responsive-header" style="padding: 150px 0 ; margin-top: -90px;" >
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-12">
                <h1 class="page-banner-title color-primary">Syed Zameen Blogs</h1>
                <div class="text-area w-50 mt-15 color-white">
                    <p>Find the information which is compulsary for your daily life.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-secondary">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 py-15 px-0 bg-transparent hover-white-primary">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Page Banner End
            ==================================================================-->
<!-- Blog Thumbnail Start
            ==================================================================-->
<section>
    <div class="container">
        <div class="row">



            @foreach ($blogs as $blog)


            <div class="col-md-12 col-lg-4">
                <div class="post-thumbnail hover-secondery-primary mt-30">
                    <div class="post-img overflow-hidden"><img style="height: 200px"
                            src="{{ $blog->blogOneImage !=null ? asset('public/'.$blog->blogOneImage->img_path):''}}" alt="">
                    </div>
                    <div class="post-meta icon-primary color-secondary-a px-20 py-10 bg-gray">
                        <ul class="post-info list-style-1 d-flex color-secondary">
                            <li><i class="fa fa-user"></i> Admin</li>
                            {{-- <li><a href="#"><i class="fa fa-comments-o"></i>
                                            127</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-share-alt"></i> 86</a></li>
                                    --}}
                        </ul>
                    </div>
                    <div class="post-content mt-20 color-secondary color-secondary-a">
                        <div class="post-date w-25 float-left bg-gray mr-20 text-center">
                            @php

                            $dateArray= helper::DBDateToSimpleFormat($blog->created_at->toDateString());

                            @endphp
                            <div class="py-10"><span class="d-block">{{$dateArray[0]}}</span>{{$dateArray[1]}}</div>
                            <div class="post-love py-5 bg-primary"><a href="#"><i class="fa fa-heart"
                                        aria-hidden="true"></i></a></div>
                        </div>
                        <div class="text-area d-table">
                            <a class="post-title mb-15" href="{{route("blogMainSingleView",['id'=>$blog->id])}}">
                                <h5>{{$blog->title}}</h5>
                            </a>
                            <p>{!! helper::conciseContent($blog->content) !!}</p>
                                                        <!--<p>{!! $blog->content !!}</p>-->


                            <a class="btn-more mt-15" href="{{route("blogMainSingleView",['id'=>$blog->id])}}">Read
                                More</a>

                        </div>
                    </div>
                </div>
            </div>


            @endforeach
            <!---------pagination starts---------------->
            <div class="col-lg-12">
                <div class="mx-auto d-table">
                    <ul class="pagination mt-50">
                        <?php    $items=$blogs->total();

                                                    $loopValue=ceil($items/12);

                                                    $totalPage=$blogs->lastPage();

                                                    $currentPage = $blogs->currentPage();

                                          ?>
                        <li class="page-item"><a class="{{ 1>=$currentPage?'isDisabled page-link':" page-link "}}"
                                href="{{url("rent/commercial/?page=".($currentPage-1))}}">Prev</a></li>
                        @for ($i = 1; $i <= $loopValue; $i++) <li class="page-item">
                            <a class="page-link active" href="{{url("rent/commercial/?page=".$i)}}">
                                <span>{{$i}}</span> </a>
                            </li>
                            @endfor

                            <li class="page-item"><a
                                    class=" {{ $totalPage <= $currentPage?'isDisabled page-link':" page-link "}}"
                                    href="{{url("rent/commercial/?page=".($currentPage+1))}}">Next</a>
                            </li>
                    </ul>
                </div>
            </div>
            <!---------pagination starts ends---------------->




            {{-- <div class="col-lg-12">
                <div class="mx-auto d-table">
                    <ul class="pagination mt-50">
                        <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<!-- Blog Thumbnail End



@endsection