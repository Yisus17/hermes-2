@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Breadcrumbs -->
            {{ Breadcrumbs::render('users.edit', $user) }}

            <!-- Session messages -->
            @include('partials.session_message')


            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Editar usuario por: {{auth()->user()->name}}</span>
                </div>

                <div class="card-body">
                    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
                        @include('users.partials.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection