<div class="custom-form row">
  <div class="form-group required-info col-12">
    <span>*Campos obligatorios</span>
  </div>
  
  <div class="form-group col-6">
    <label for="name"><span class="required-field">*</span>Razón Social</label>
    <input 
      type="text" 
      name="business_name" 
      class="form-control" 
      value="{{isset($client) ? $client->business_name : old('business_name')}}" 
      required/>
  </div>

  <div class="form-group col-6">
    <label for="name"><span class="required-field">*</span>CIF</label>
    <input 
      type="text" 
      name="cif" 
      class="form-control" 
      value="{{isset($client) ? $client->cif : old('cif')}}" 
      required/>
  </div>

  <div class="form-group col-6">
    <label for="name"></span>Supplier ID</label>
    <input 
      type="text" 
      name="supplier_id" 
      class="form-control" 
      value="{{isset($client) ? $client->supplier_id : old('supplier_id')}}" 
      required/>
  </div>

  <div class="form-group col-6">
    <label for="name"><span class="required-field">*</span>ID Fiscal</label>
    <input 
      type="text" 
      name="fiscal_id" 
      class="form-control" 
      value="{{isset($client) ? $client->fiscal_id : old('fiscal_id')}}" 
      required/>
  </div>

  <div class="form-group col-12">
    <label for="address"><span class="required-field">*</span>Dirección</label>
    <textarea 
      class="form-control" 
      name="address" 
      rows="2" 
      required>{{isset($client) ? $client->address : old('address')}}</textarea>
  </div>

  <div class="form-group col-12 col-sm-6">
    <label for="postal_code">Código postal</label>
    <input 
      type="text" 
      name="postal_code" 
      class="form-control" 
      value="{{isset($client) ? $client->postal_code : old('postal_code')}}"/>
  </div>

  <div class="form-group col-12 col-sm-6">
    <label for="community_id">Comunidad autónoma</label>
    <select name="community_id" class="form-control selectpicker" data-live-search="true">
      <option value="" selected disabled>--Selecciona una opción--</option>
      @foreach($communities as $community)
        <option value="{{ $community->id }}" {{ (isset($client) && $community->id == $client->community_id) || old('community_id') == $community->id ? 'selected' : '' }}>{{ $community->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group col-12 col-sm-6">
    <label for="phone"><span class="required-field">*</span>Teléfono</label>
    <input 
      type="text" 
      name="phone" 
      class="form-control" 
      value="{{isset($client) ? $client->phone : old('phone')}}" 
      required/>
  </div>

  <div class="form-group col-12 col-sm-6">
    <label for="secondary_phone">Teléfono secundario</label>
    <input 
      type="text" 
      name="secondary_phone" 
      class="form-control" 
      value="{{isset($client) ? $client->secondary_phone : old('secondary_phone')}}" />
  </div>

  <div class="form-group col-12 col-sm-6">
    <label for="name"><span class="required-field">*</span>Nombre</label>
    <input 
      type="text" 
      name="name" 
      class="form-control" 
      value="{{isset($client) ? $client->name : old('name')}}" 
      required/>
  </div>

  <div class="form-group col-12 col-sm-6">
    <label for="lastname"><span class="required-field">*</span>Apellido</label>
    <input 
      type="text" 
      name="lastname" 
      class="form-control" 
      value="{{isset($client) ? $client->lastname : old('lastname')}}" 
      required/>
  </div>

  <div class="form-group col-12 col-sm-6">
    <label for="email"><span class="required-field">*</span>Email</label>
    <input 
      type="email" 
      name="email" 
      class="form-control" 
      value="{{isset($client) ? $client->email : old('email')}}" 
      required/>
  </div>

  <!-- Tipo de cliente usando foreign id en BD -->
  <!-- <div class="form-group col-12 col-sm-6">
    <label for="client_type_id">Tipo</label>
    <select name="client_type_id" class="form-control selectpicker" data-live-search="true">
      <option value="" selected disabled>--Selecciona una opción--</option>
      @foreach($clientTypes as $clientType)
        <option value="{{ $clientType->id }}" {{ (isset($client) && $clientType->id == $client->client_type_id) || old('client_type_id') == $clientType->id ? 'selected' : '' }}>{{ $clientType->name }}</option>
      @endforeach
    </select>
  </div> -->

  <!-- Tipo de cliente usando un input text directo a un field en tabla de cliente -->
  <div class="form-group col-12 col-sm-6">
    <label for="lastname"><span class="required-field">*</span>Tipo</label>
    <input 
      type="text" 
      name="typology" 
      class="form-control" 
      value="{{isset($client) ? $client->typology : old('typology')}}" 
      required/>
  </div>

  <div class="form-group col-12">
    <button class="btn btn-primary " type="submit">Guardar</button>
    <a href="/clients" class="btn btn-secondary">Volver</a>
  </div>
</div>