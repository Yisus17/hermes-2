@extends('layouts.app')

@section('content')
<div class="container dashboard-cards">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<h3>Menú: Usuario Simple</h3>
			<div class="card-deck mt-4">

				<!-- PRODUCTS -->

				<div class="card">
					<a href="{{ url('/products') }}">
						<div class="image-dashboard-card cyan">
							<i class="fas fa-boxes"></i>
						</div>

						<div class="card-body">
							<h5 class="card-title">Inventario</h5>
							<p class="card-text">En esta sección podrás gestionar los productos de tu inventario.</p>
						</div>
					</a>
				</div>


				<!-- CLIENTS -->
				<div class="card">
					<a href="{{ url('/clients') }}">
						<div class="image-dashboard-card yellow">
							<i class="fas fa-user-friends"></i>
						</div>

						<div class="card-body">
							<h5 class="card-title">Contactos</h5>
							<p class="card-text">En esta sección podrás gestionar los datos de tus contactos.</p>
						</div>
					</a>
				</div>


			</div>
		</div>

		<div class="col-md-10">

			<div class="card-deck mt-4">

				<!-- BUDGETS -->
				<div class="card">
					<a href="{{ url('/budgets') }}">
						<div class="image-dashboard-card green">
							<i class="fas fa-hand-holding-usd"></i>
						</div>

						<div class="card-body">
							<h5 class="card-title">Presupuestos</h5>
							<p class="card-text">En esta sección podrás crear, editar y descargar tus presupuestos.</p>
						</div>
					</a>
				</div>

				<!-- Invoices -->
				<div class="card">
					<a href="{{ url('/invoices') }}">
						<div class="image-dashboard-card green">
							<i class="fas fa-file-invoice-dollar"></i>
						</div>

						<div class="card-body">
							<h5 class="card-title">Facturas</h5>
							<p class="card-text">En esta sección podrás crear, editar y descargar tus facturas.</p>
						</div>
					</a>
				</div>

				<!-- Purchase Orders -->
				<div class="card">
					<a href="{{ url('/purchases') }}">
						<div class="image-dashboard-card green">
							<i class="fas fa-file-invoice-dollar"></i>
						</div>

						<div class="card-body">
							<h5 class="card-title">Ordenes de Compra</h5>
							<p class="card-text">En esta sección podrás crear, editar y descargar tus ordenes de comp.</p>
						</div>
					</a>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection