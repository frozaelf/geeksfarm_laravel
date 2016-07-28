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
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h5>Biodata</h5>
				</div>
				<div class="panel-body"> 
					<table class="table table-striped table-bordered"> 
						<tbody> 
						<tr> <th>Nama</th> <td>Rulli Eka Nurcakra</td></tr> 
						<tr> <th>Tempat, Tanggal Lahir</th> <td>Bandung, 14 Agustus 1994</td></tr>
						<tr> <th>Jenis Kelamin</th> <td>Pria</td> </tr> 
						<tr> <th>Alamat Domisili</th> <td>Jl randusari utara III no 16 Bandung</td></tr> 
						</tbody> 
					</table> 
				</div> 
			</div>
		</div>
	</div>
@stop