@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Breadcrumbs -->
            {{ Breadcrumbs::render('companies.show', $company) }}

            <!-- Session messages -->
            @include('partials.session_message')

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Detalles del Emprendimiento</span>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Nombre</th>
                                <td>{{$company->name}}</td>
                            </tr>
                            <tr>
                                <th>Sector</th>
                                <td>{{$company->sector->name}}</td>
                            </tr>
                            <tr>
                                <th>Moneda de trabajo</th>
                                <td>{{$company->currency}}</td>
                            </tr>
                           
                            <tr>
                                <th>Imagen</th>
                                <td>
                                    @if(isset($company) && $company->logo)
                                    <input type="image" src="{{url('uploads/company_logos/'.$company->logo)}}" width="140" height="80">
                                    @endif
                                </td>
                            </tr>
                           
                        </tbody>
                    </table>
                    <a href="{{route('companies.edit', $company)}}" class="btn btn-primary">Editar</a>
                    <a href="/companies" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection