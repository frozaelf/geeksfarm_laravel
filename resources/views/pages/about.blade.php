@extends("layouts.application")

@section("content")


	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	    <div class="item active">
	      <img src="{{URL::asset('/images/saber1.jpg')}}" class="img-responsive">
	      <div class="carousel-caption">
		3 Girl Knight 
	      </div>
	    </div>
	    <div class="item">
	      <img src="{{URL::asset('/images/saber3.jpg')}}" class="img-responsive">
	      <div class="carousel-caption">
		Saber Lily
	      </div>
	    </div>
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
		<div class="row m-t">
		<div class="col-md-8">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h5>About</h5>
				</div>
				<div class="panel-body"> 
					<p>
					Hallo Saya Rulli dan saya saat ini akan lulus dari kuliah,salam kenal ya. Berikut contoh dari hasil grafik yang saya buat :).
					</p>
			    </div>
			  </div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h5>Contact</h5>
				</div>
				<div class="panel-body"> 
			<p>Facebook : froza.elf@gmail.com</p>
			<p>Twitter : -</p>
			<p>Telp : 085794795964</p>
			<p>Alamat : Jl randusari utara III no 16 Bandung</p>
			    </div>
			  </div>
		</div>
		</div>
		
@stop
	