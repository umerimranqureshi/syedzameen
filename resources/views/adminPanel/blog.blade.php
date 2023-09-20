@extends('adminPanel.layout')






@section('body')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


<div class="main-content">

    <div class="page-content">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Blog Add</h4>
                    <h4 class="mb-0 font-size-18 text-success">{{ Session::get('msg') ?? '' }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Syed Zameen</a></li>
                            <li class="breadcrumb-item active">Blog Add</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>











        <div class="row">

            <div class="col-12">
                <div class="card">

                    <div class="card-body">

                        <div class="row">
                            <form method="POST" action="{{ isset($editBlog) ? route('blogEdit') : route('blog') }}"
                                enctype="multipart/form-data">
                                @csrf

                                @isset($editBlog)
                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                @endisset


                                <div class="col-sm-12 col-md-12">
                                    <div class="row">

                                        @if (isset($editBlog))
                                        <div class="col-12 d-flex justify-content-center mb-4">
                                            <h1 class=" border-bottom">Edit Blog</h1>
                                        </div>
                                        @else
                                        <div class="col-12 d-flex justify-content-center mb-4">
                                            <h1 class=" border-bottom">Write Blog</h1>
                                        </div>

                                        @endif

                                        <div class="col-sm-12  col-md-6">
                                            <h5>Blog title</h5>
                                            <input class="form-control" value=" {{ $blog->title ?? '' }}" name="title"
                                                placeholder="title" type="text">
                                            <p class="text text-danger">{{ $errors->blog_error->first('title') ?? '' }}
                                            </p>

                                            <h5 class="mt-2 mb-2">Blog content</h5>
                                            <textarea class="ckeditor form-control" name="content" placeholder="content"
                                                cols="20" rows="10">{{ $blog->content ?? '' }}</textarea>
                                            <p class="text text-danger">
                                                {{ $errors->blog_error->first('content') ?? '' }}
                                            </p>
                                               <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
                                        </div>


                                        <div class="col-sm-12 col-md-6">
                                            <h5>Add Tags </h5>
                                            <input name="tags" class="form-control" value=" {{ $blog->tags ?? '' }}"
                                                type="text">

                                            <h5 class="mt-2 mb-2">Quote section (after blog title) </h5>
                                            <input name="header" class="form-control" value="{{ $blog->header ?? '' }}"
                                                type="text">


                                            <h5 class="mt-2 mb-2">Select Only 10 Images for your blog:</h5>
                                            <input multiple type="file" name="images[]" type="text">




                                            <button class="btn btn-info mt-4 " type="submit">Submit</button>
                                        </div>





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




</div>







@endsection