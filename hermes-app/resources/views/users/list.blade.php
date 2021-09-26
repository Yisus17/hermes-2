@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<!-- Breadcrumbs -->
			{{ Breadcrumbs::render('users') }}

			<!-- Session messages -->
			@include('partials.session_message')

				<!-- Search Bar -->
				<div class="row">
					<div class="input-group col-10">
						<input 
							type="text" 
							class="form-control search-bar" 
							id="search-user" 
							placeholder="Busca un usuario" 
							value="{{isset($querySearch) ? $querySearch : ''}}">
						<div class="input-group-append">
							<button class="btn btn-primary" id="submit-search-user" type="button">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
					<div class="col-2 clear-search">
						<button class="btn btn-outline-secondary" id="clear-search-user" type="button">
							Limpiar
						</button>
					</div>
				</div>
				
				<div class="form-group guide-info col-10">
					<span>*Campos de búsqueda</span>
				</div>

				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
							<span>Listado de usuarios</span>
							<a href="/users/create" class="btn btn-primary btn-sm">Nuevo usuario</a>
					</div>

					<div class="card-body"> 
						@include('partials.loader')   
						<div id="user-list-container">
							@include('users.partials.results')
						</div>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	function sendSearchUser() {
		let keyword = $("#search-user").val();
		$("#user-list-container").html("");
		$(".loader-center").removeClass("hidden");

		$.ajax({
			type: "GET",
			url: "{{route('users.search')}}",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: {
				keyword: keyword
			}
		}).done(function(data) {
			$(".loader-center").addClass("hidden");
			$("#user-list-container").html(data);
		});
	}


	$("#search-user").keypress(function(e) {
		let key = e.which;
		if (key == 13) { // the enter key code
			sendSearchUser();
		}
	});

	$("#submit-search-user").click(function() {
		sendSearchUser();
	});

	$("#clear-search-user").click(function() {
		$('#search-user').val('');
		sendSearchUser();
	});
</script>
@endsection