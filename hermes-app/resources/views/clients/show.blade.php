@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">

			<!-- Breadcrumbs -->
			{{ Breadcrumbs::render('clients.show', $client) }}

			<!-- Session messages -->
			@include('partials.session_message')

			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<span>Detalles del contacto</span>
				</div>
				<div class="card-body">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th>Razón social</th>
								<td>{{$client->business_name}}</td>
							</tr>
							<tr>
								<th>CIF</th>
								<td>{{$client->cif}}</td>
							</tr>
							<tr>
								<th>Supplier ID</th>
								<td>{{$client->supplier_id}}</td>
							</tr>
							<tr>
								<th>ID Fiscal</th>
								<td>{{$client->fiscal_id}}</td>
							</tr>
							<tr>
								<th>Dirección</th>
								<td>{{$client->address}}</td>
							</tr>
							<tr>
								<th>Código postal</th>
								<td>{{$client->postal_code}}</td>
							</tr>
							<tr>
								<th>Comunidad autónoma</th>
								<td>{{isset($client->community) ? $client->community->name : ''}}</td>	
							</tr>
							<tr>
								<th>Teléfono</th>
								<td>{{$client->phone}}</td>
							</tr>
							<tr>
								<th>Teléfono secundario</th>
								<td>{{$client->secondary_phone}}</td>
							</tr>
							<tr>
								<th>Nombre</th>
								<td>{{$client->name}}</td>
							</tr>
							<tr>
								<th>Apellido</th>
								<td>{{$client->lastname}}</td>
							</tr>
							<tr>
								<th>Email</th>
								<td>{{$client->email}}</td>
							</tr>
							<tr>
								<th>Tipo</th>
								<!-- Tipo de cliente con tabla de tipos 
									<td>{{isset($client->clientType) ? $client->clientType->name : ''}}</td> 
								-->
								<td>{{$client->typology}}</td>
							</tr>
						</tbody>
					</table>
					<a href="{{route('clients.edit', $client)}}" class="btn btn-primary">Editar</a>
					<a href="/clients" class="btn btn-secondary">Volver</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection