@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Breadcrumbs -->
			{{ Breadcrumbs::render('users.show', $user) }}

            <!-- Session messages -->
            @include('partials.session_message')

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Detalle de Usuario</span>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{$user->id}}</td>
							</tr>
                            <tr>
                                <th>Nombre</th>
                                <td>{{$user->name}}</td>
							</tr>
                            <tr>
                                <th>Apellido</th>
                                <td>{{$user->last_name}}</td>
							</tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$user->email}}</td>
							</tr>
                            <tr>
                                <th>Emprendimiento</th>
                                <td>{{$user->company->name }} ({{ $user->company->id}})</td>
							</tr>
                            <tr>
                                <th>Rol</th>
                                @switch($user->role->id)
                                @case(1)
                                <td>Administrador</td>
                                @break

                                @case(2)
                                <td>Moderador</td>
                                @break

                                @case(3)
                                <td>Usuario Simple</td>
                                @break

                                @default
                                <span>
                                    <td>{{ $user->role->id }}</td>
                                </span>
                                @endswitch
							</tr>
							
                            <tr>
                                <th>Imagen</th>
                                <td>NULL</td>
							</tr>
                        </tbody>
                    </table>

                    <a href="/users" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection