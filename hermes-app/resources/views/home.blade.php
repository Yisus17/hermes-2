@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<h3>Menú: Administrador</h3>
			<div class="card-deck mt-4">

				<!-- CLIENTS -->
				<div class="card">
					<a href="{{ url('/users') }}">
						<div class="image-dashboard-card cyan">
							<i class="fas fa-user-friends"></i>
						</div>

						<div class="card-body">
							<h5 class="card-title">Usuarios</h5>
							<p class="card-text">Administración de usuarios</p>
						</div>
					</a>
				</div>

				<!-- Companies -->
				<div class="card">
					<a href="{{ url('/companies') }}">
						<div class="image-dashboard-card yellow">
							<i class="fas fa-building"></i>
						</div>

						<div class="card-body">
							<h5 class="card-title">Emprendimientos</h5>
							<p class="card-text">Gestión de compañias de los emprendedores</p>
						</div>
					</a>
				</div>

				<!-- About -->
				<div class="card">
					<a href="{{ url('/about') }}">
						<div class="image-dashboard-card red">
							<i class="fas fa-address-card"></i>
						</div>

						<div class="card-body">
							<h5 class="card-title">Nucleo ENII </h5>
							<p class="card-text">Espacio para la incubación y desarrollo de emprendimientos innovadores provenientes de la comunidad universitaria UCVista</p>
						</div>
					</a>
				</div>



			</div>
		</div>


		
		<h4 style="margin-top: 4rem;">TODO: ADD DATA REPORTS</h4>

	</div>
</div>
@endsection