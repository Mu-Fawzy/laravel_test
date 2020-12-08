@extends('layouts.admin.master')
@section('css')
<!---Internal Fileupload css-->
<link href="{{URL::asset('assets/admin/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/admin/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal  Quill css -->
<link href="{{URL::asset('assets/admin/plugins/quill/quill.snow.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/admin/plugins/quill/quill.bubble.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Posts</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Edit</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
            <!-- row -->
            @include('alerts.admin')
            <form class="row row-sm" action="{{ route('posts.update', $post->id) }}" method="POST" id="form_post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-lg-8 col-xl-9 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-5">
                                <div class="main-content-label mg-b-10">
                                    Title
                                </div>
                                <div class="row row-sm">
                                    <div class="col-lg">
                                        <input class="form-control @error('title') parsley-error @enderror" placeholder="Post Title" name="title" type="text" value="{{ $post->title }}">
                                        @error('title')
                                            <ul class="parsley-errors-list filled" id="parsley-id-11">
                                                <li class="parsley-required">{{ $message }}</li>
                                            </ul>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-0">
                                <div class="main-content-label mg-b-10">
                                    Form Editor
                                </div>
                                <input type="hidden" name="content">
                                <div class="ql-wrapper ql-wrapper-demo bg-gray-100">
                                    <div id="quillEditor">{!! $post->content !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="mb-0">
                                <div class="main-content-label mg-b-10">
                                    Description
                                </div>
                                <div class="row row-sm">
                                    <div class="col-lg">
                                        <textarea class="form-control" placeholder="Post Description" rows="3" name="description">{{ $post->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/div-->
                
                <div class="col-lg-4 col-xl-3 col-md-12">
                    <div class="card mg-b-20 mg-md-b-0">
                        <div class="m-3 d-sm-flex">
                            <div class="w-100">
                                <button type="submit" class="w-100 btn btn-success">Save Changes</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="main-content-label mg-b-10">
                                    Post Status
                                </div>

                                <input type="hidden" name="active">
                                <div class="main-toggle-group-demo">
                                    <div class="main-toggle main-toggle-success @if ($post->active == 'Active') on @endif">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <hr class="mg-y-30">
                            <div class="mb-0">
                                <div class="main-content-label mg-b-10">
                                    Post Photo
                                </div>
                                <div>
                                    <input type="file" name="image" class="dropify @error('image') parsley-error @enderror" data-default-file="{{URL::asset($post->image)}}" data-height="200"  />
                                    @error('image')
                                        <ul class="parsley-errors-list filled" id="parsley-id-11">
                                            <li class="parsley-required">{{ $message }}</li>
                                        </ul>
                                    @enderror

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--div-->

            </form>

        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->

    
@endsection
@section('js')
<!--Internal Fileuploads js-->
<script src="{{URL::asset('assets/admin/plugins/fileuploads/js/fileupload.js')}}"></script>
<script src="{{URL::asset('assets/admin/plugins/fileuploads/js/file-upload.js')}}"></script>
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/admin/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal quill js -->
<script src="{{URL::asset('assets/admin/plugins/quill/quill.min.js')}}"></script>
<!-- Internal Form-editor js -->
<script>
    $(function() {
        'use strict'
        var icons = Quill.import('ui/icons');
        icons['bold'] = '<i class="la la-bold" aria-hidden="true"><\/i>';
        icons['italic'] = '<i class="la la-italic" aria-hidden="true"><\/i>';
        icons['underline'] = '<i class="la la-underline" aria-hidden="true"><\/i>';
        icons['strike'] = '<i class="la la-strikethrough" aria-hidden="true"><\/i>';
        icons['list']['ordered'] = '<i class="la la-list-ol" aria-hidden="true"><\/i>';
        icons['list']['bullet'] = '<i class="la la-list-ul" aria-hidden="true"><\/i>';
        icons['link'] = '<i class="la la-link" aria-hidden="true"><\/i>';
        icons['image'] = '<i class="la la-image" aria-hidden="true"><\/i>';
        icons['video'] = '<i class="la la-film" aria-hidden="true"><\/i>';
        icons['code-block'] = '<i class="la la-code" aria-hidden="true"><\/i>';
        var toolbarOptions = [
            [{
                'header': [1, 2, 3, 4, 5, 6, false]
            }],
            ['bold', 'italic', 'underline', 'strike'],
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],
            ['link', 'image', 'video']
        ];
        var quill = new Quill('#quillEditor', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });
        var toolbarInlineOptions = [
            ['bold', 'italic', 'underline'],
            [{
                'header': 1
            }, {
                'header': 2
            }, 'blockquote'],
            ['link', 'image', 'code-block'],
        ];

        // Toggle Switches
        $('.main-toggle').on('click', function() {
            var $el = $(this).toggleClass('on');
        })

        var form = document.getElementById("form_post"); // get form by ID
        form.onsubmit = function() {
        // Populate hidden form on submit
            var content = document.querySelector('input[name=content]');
            content.value = quill.root.innerHTML;

            var active = document.querySelector('input[name=active]');
            if ($('.main-toggle').hasClass('on')) {
                active.value = 1;
            }else{
                active.value = 0;
            }
        };
    
    });


</script>
@endsection