<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chin Literature & Culture Committee</title>
    <link rel="shortcut icon" href="{{asset('css/images/clcc_logo.jpg')}}" >

    <!-- booststrap cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
    <!-- jquery image-select -->

   <!-- summernote cdn -->
    <link rel="stylesheet" href="{{asset('css/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css">
    
    <!-- style of css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body style="background-color:rgba(188,188,188,0.2 );">
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2  p-0 ">
                @include('layouts.sidebar')
            </div>
            <div class="col-md-10 p-0">
                @include('layouts.navbar')
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- script of image-select -->
  
    <!-- script  -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>

    <!-- tinymce script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.3.2/tinymce.min.js"></script>

    @stack('scripts')
  

</body>

</html>