@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-10 custom-form">
      <!-- Breadcrumbs -->
      {{ Breadcrumbs::render('invoices.create') }}
      
      <!-- Session messages -->
      @include('partials.session_message')

      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <span>Crear factura #{{numerationReportFormat($invoiceQty+1)}} por: {{auth()->user()->name}}</span>
        </div>

        <div class="card-body">
          {!! Form::open(['route' => 'invoices.store']) !!}
            @include('invoices.partials.form')
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
