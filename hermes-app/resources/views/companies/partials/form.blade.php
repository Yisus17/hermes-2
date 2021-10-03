<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{isset($company) ? $company->name : old('name')}}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="sector_id" class="col-md-4 col-form-label text-md-right">{{ __('Sector') }}</label>

    <div class="col-md-6">
        <select name="sector_id" id="sector_id" class="form-control">
            <option value="" selected disabled>--Seleccionar--</option>
            @foreach($sectors as $sector)
            <option value="{{ $sector->id }}" {{ (isset($company) && $sector->id == $company->sector_id) 
                                        || old('sector_id') == $sector->id ? 'selected' : '' }}>
                {{ $sector->name }}
            </option>
            @endforeach
        </select>

        @error('sector')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

    <div class="col-md-6">
        <input id="logo" type="text" class="form-control @error('logo') is-invalid @enderror" name="logo" value="{{isset($company) ? $company->logo : old('logo')}}" autocomplete="logo" autofocus>

        @error('logo')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>


<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Crear') }}
        </button>
        <a href="{{ url('/companies') }}">
            <button type="button" class="btn btn-secondary">
                {{ __('Cancelar') }}
            </button>
        </a>
    </div>
</div>