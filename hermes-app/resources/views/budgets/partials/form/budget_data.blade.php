<div id="budget-data" class="row mb-2">
  <div class="form-group col-12 col-sm-6">
    <label for="client_id"><span class="required-field">*</span>Contacto</label>
    <select name="client_id" class="form-control selectpicker" data-live-search="true">
      <option value="" selected disabled>--Selecciona una opción--</option>
      @foreach($clients as $client)
        <option value="{{ $client->id }}" {{ (isset($budget) && $client->id == $budget->client_id) || old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->business_name }}</option>
      @endforeach
    </select>
  </div>


  <div class="form-group col-12 col-sm-6">
    <label for="validity">Validez</label>
    <select name="validity" class="form-control">
      <option value="" selected disabled>--Selecciona una opción--</option>
      @foreach(getValidityOptions() as $key => $value)
        <option 
          value="{{$key}}"
          {{(isset($budget) && $key == $budget->validity) || old('validity') == $key ? 'selected' : '' }}>
          {{$value}}
        </option>
      @endforeach
    </select>
  </div>

  <div class="form-group col-12 col-sm-6">
    <label for="address">Dirección</label>
    <textarea 
      name="address" 
      class="form-control" 
      rows="2">{{isset($budget) ? $budget->address : old('address')}}</textarea>
  </div>

  <div class="form-group col-12 col-sm-6">
    <label for="description">Descripción del evento</label>
    <textarea 
      class="form-control" 
      name="description" 
      rows="2">{{isset($budget) ? $budget->description : old('description')}}</textarea>
  </div>

  <div class="form-group col-12 col-sm-6">
    <label for="delivery_date">Entrega</label>
    <div class="input-group">
      <input type="text" id="delivery_date" name="delivery_date" class="form-control datetimepicker" autocomplete="off"/>
      <div class="input-group-append">
        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
      </div>
    </div>
  </div>

  <div class="form-group col-12 col-sm-6">
    <label for="return_date">Devolución</label>
    <div class="input-group">
      <input type="text" id="return_date" name="return_date" class="form-control datetimepicker" autocomplete="off"/>
      <div class="input-group-append">
        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
      </div>
    </div>
  </div>

  <div class="form-group col-12 col-sm-6">
    <label for="instalation_date">Montaje</label>
    <div class="input-group">
      <input type="text" id="instalation_date" name="instalation_date" class="form-control datetimepicker" autocomplete="off"/>
      <div class="input-group-append">
        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
      </div>
    </div>
  </div>

  <div class="form-group col-12 col-sm-6">
    <label for="start_date">Inicio evento</label>
    <div class="input-group">
      <input type="text" id="start_date" name="start_date" class="form-control datetimepicker" autocomplete="off"/>
      <div class="input-group-append">
        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
      </div>
    </div>
  </div>

  <div class="form-group col-12 col-sm-6">
    <label for="end_date">Fin evento</label>
    <div class="input-group">
      <input type="text" id="end_date" name="end_date" class="form-control datetimepicker" autocomplete="off" />
      <div class="input-group-append">
        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
      </div>
    </div>
  </div>

  <div class="form-group col-12 col-sm-6">
    <label for="uninstalation_date">Desmontaje</label>
    <div class="input-group">
      <input type="text" id="uninstalation_date" name="uninstalation_date" class="form-control datetimepicker" autocomplete="off" />
      <div class="input-group-append">
        <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
      </div>
    </div>
  </div>

  <!-- Condiciones de pago with combo -->
  <!-- <div class="form-group col-12 col-sm-4">
    <label for="payment_conditions">Condiciones de pago</label>
    <select name="payment_conditions" class="form-control" >
      <option value="" selected disabled>--Selecciona una opción--</option>
      @foreach(getPaymentConditions() as $key => $value)
        <option 
          value="{{$key}}"
          {{(isset($budget) && $key == $budget->payment_conditions) || old('payment_conditions') == $key ? 'selected' : '' }}>
        {{$value}}
        </option>
      @endforeach
    </select>
  </div> -->

  
  <div class="form-group col-12 col-sm-4">
    <label for="payment_conditions">Condiciones de pago</label>
    <div class="input-group">
      <input 
        type="text" 
        name="payment_conditions" 
        class="form-control"
        value="{{isset($budget) ? $budget->payment_conditions :old('payment_conditions')}}"/>
    </div>
  </div>

  <!-- Metodos de pago with combo -->
  <!-- <div class="form-group col-12 col-sm-4">
    <label for="payment_method">Método de pago</label>
    <select name="payment_method" class="form-control">
      <option value="" selected disabled>--Selecciona una opción--</option>
      @foreach(getPaymentMethods() as $key => $value)
        <option 
          value="{{$key}}"
          {{(isset($budget) && $key == $budget->payment_method) || old('payment_method') == $key ? 'selected' : '' }}>
          {{$value}}
        </option>
      @endforeach
    </select>
  </div> -->

  <div class="form-group col-12 col-sm-4">
    <label for="tax_percentage">IVA</label>
    <div class="input-group">
      <input 
        type="number" 
        name="tax_percentage" 
        class="form-control"
        min="0" max="100" step="1" 
        value="{{isset($budget) ? $budget->tax_percentage : getGlobalTaxPercentage()}}"/>
      <div class="input-group-append">
        <span class="input-group-text">%</span>
      </div>
    </div>
  </div>

  <div class="form-group col-12">
    <label for="notes">Notas</label>
    <textarea class="form-control" name="notes" rows="2">{{isset($budget) ? $budget->notes : old('notes')}}</textarea>
  </div>
</div>

@section('scripts')
  @parent
  <script type="text/javascript">
    $('#budget-data .datetimepicker').datetimepicker({
      ...defaultDatetimepickerOptions,
      format: "DD/MM/YYYY HH:mm"
    });
  </script>


  @if(isset($budget))
    <script type="text/javascript">
      '{{$budget->delivery_date}}' ? 
        setDateData('{{$budget->delivery_date}}', '#delivery_date', false ) :
        setDateData('{{old("delivery_date")}}', '#delivery_date', true )

      '{{$budget->return_date}}' ? 
        setDateData('{{$budget->return_date}}', '#return_date', false ) :
        setDateData('{{old("return_date")}}', '#return_date', true )

      '{{$budget->instalation_date}}' ? 
        setDateData('{{$budget->instalation_date}}', '#instalation_date', false ) :
        setDateData('{{old("instalation_date")}}', '#instalation_date', true )

      '{{$budget->start_date}}' ? 
        setDateData('{{$budget->start_date}}', '#start_date', false ) :
        setDateData('{{old("start_date")}}', '#start_date', true )

      '{{$budget->end_date}}' ? 
        setDateData('{{$budget->end_date}}', '#end_date', false ) :
        setDateData('{{old("end_date")}}', '#end_date', true )
      
      '{{$budget->uninstalation_date}}' ? 
        setDateData('{{$budget->uninstalation_date}}', '#uninstalation_date', false ) :
        setDateData('{{old("uninstalation_date")}}', '#uninstalation_date', true )
    </script>
  @endif
@endsection
