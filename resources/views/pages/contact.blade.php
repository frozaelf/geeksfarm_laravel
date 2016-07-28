@extends("layouts.application")

@section("content")

<div class="row">
		<div class="col-md-4">
			<p class=""><center>
				<h3>Rulli Eka Nurcakra</h3>
	      			<img src="{{URL::asset('/images/profile.jpg')}}" class="img-circle">
				<center>
			</p>
		</div>
		<div class="col-md-8">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h5>Biodata</h5>
				</div>
				<div class="panel-body"> 
				<form class="form-horizontal">
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      <input class="form-control" placeholder="Email Anda">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Messages</label>
				    <div class="col-sm-10">
				      <textarea class="form-control" placeholder="Messages Anda"></textarea>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-primary btn-raised">Submit</button>
				    </div>
				  </div>
				</form>
			    </div>
			  </div>
			</div>
		</div>
	</div>
@stop