<!DOCTYPE html>

  <html>

    <head>

      <meta charset="utf-8">

      <meta httpequiv="XUACompatible" content="IE=edge">

      <meta name="viewport" content="width=devicewidth, initialscale=1">

      <title>Laravel</title>

  	<link href="{{ URL::asset('stylesheets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  	<link href="{{ URL::asset('stylesheets/bootstrap-material-design/css/bootstrap-material-design.min.css') }}" media="all" rel="stylesheet" />
	<link href="{{ URL::asset('stylesheets/bootstrap-material-design/css/ripples.min.css') }}" media="all" rel="stylesheet" />
	<link href="{{ URL::asset('stylesheets/dataTables/dataTables.bootstrap.min.css') }}" media="all" rel="stylesheet" />
	<link href="{{ URL::asset('stylesheets/dataTables/responsive/responsive.bootstrap.min.css') }}" media="all" rel="stylesheet" />
	<link href="{{ URL::asset('stylesheets/colorbox/colorbox.css') }}" media="all" rel="stylesheet" />
	<link href="{{ URL::asset('stylesheets/animate.css') }}" media="all" rel="stylesheet" />
	<link href="{{ URL::asset('stylesheets/gmaps/gmaps.css') }}" media="all" rel="stylesheet" />
	<link href="{{ URL::asset('stylesheets/lightGallery/css/lightgallery.css') }}" media="all" rel="stylesheet" />
	<link href="{{ URL::asset('stylesheets/custom.css') }}" media="all" rel="stylesheet" />
    <script src="{{ URL::asset('javascripts/jquery/jquery.js') }}"></script>
    <script src="{{ URL::asset('javascripts/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('javascripts/dataTables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ URL::asset('javascripts/dataTables/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('javascripts/dataTables/responsive/dataTables.responsive.min.js') }}"></script>
	<script src="{{ URL::asset('javascripts/dataTables/responsive/responsive.bootstrap.min.js') }}"></script>
	<script src="{{ URL::asset('javascripts/bootstrap-material-design/js/material.min.js') }}"></script>
	<script src="{{ URL::asset('javascripts/bootstrap-material-design/js/ripples.min.js') }}"></script>
	<script src="{{ URL::asset('javascripts/colorbox/colorbox.js') }}"></script>
	<script src="{{ URL::asset('javascripts/bootstrap-notify.js') }}"></script>
	<script src="{{ URL::asset('javascripts/Chart.bundle.js') }}"></script>
	<script src="{{ URL::asset('javascripts/chartkick.js') }}"></script>
	<script src="{{ URL::asset('javascripts/gmaps/gmaps.js') }}"></script>
	<script src="{{ URL::asset('javascripts/lightGallery/js/lightgallery.min.js') }}"></script>
	<script src="{{ URL::asset('javascripts/lightGallery/js/lg-fullscreen.js') }}"></script>
	<script src="{{ URL::asset('javascripts/lightGallery/js/lg-thumbnail.js') }}"></script>
	<script src="{{ URL::asset('javascripts/lightGallery/js/lg-video.js') }}"></script>
	<script src="{{ URL::asset('javascripts/lightGallery/js/lg-autoplay.js') }}"></script>
	<script src="{{ URL::asset('javascripts/lightGallery/js/lg-zoom.js') }}"></script>
	<script src="{{ URL::asset('javascripts/lightGallery/js/lg-hash.js') }}"></script>
	<script src="{{ URL::asset('javascripts/lightGallery/js/lg-pager.js') }}"></script>
	<script src="{{ URL::asset('javascripts/masonry/masonry.js') }}"></script>
	<script src="{{ URL::asset('javascripts/custom.js') }}"></script>
      <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    </head>

    <body style="padding-top:75px;">

      <!--bagian navigation-->

      @include('shared.head_nav')

      <!-- Bagian Content -->

      <div class="container">


              @yield("content")


      </div>

    <script>
        $('.ckeditor').ckeditor({
        	
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        });
        // $('.textarea').ckeditor(); // if class is prefered.
    </script>

    </body>

  </html>