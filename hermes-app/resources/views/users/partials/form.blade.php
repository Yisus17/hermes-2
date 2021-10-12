<!-- NOMBRE -->
<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{isset($user) ? $user->name : old('name')}}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<!-- APELLIDO -->
<div class="form-group row">
    <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

    <div class="col-md-6">
        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{isset($user) ? $user->last_name : old('last_name')}}" required autocomplete="last_name">

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<!-- CORREO -->
<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{isset($user) ? $user->email : old('email')}}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<!-- ROL -->
@if(Auth::user()->isAdmin())
<div class="form-group row">
    <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

    <div class="col-md-6">
        <select name="role_id" id="role_id" class="form-control">
            <option value="" selected disabled>--Seleccionar--</option>
            @foreach($roles as $role)
            <option value="{{ $role->id }}" {{ (isset($user) && $role->id == $user->role_id) || old('role_id') == $role->id ? 'selected' : '' }}>
                {{ $role->name }}
            </option>
            @endforeach
        </select>

        @error('role')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
@endif

@if(Auth::user()->isModerator())
<div class="form-group row">
    <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

    <div class="col-md-6">
        <select name="role_id" id="role_id" class="form-control">
            <option value="" selected disabled>--Seleccionar--</option>
            @foreach($roles as $role)
                @if($role->id != 1)
                <option value="{{ $role->id }}" {{ (isset($user) && $role->id == $user->role_id) || old('role_id') == $role->id ? 'selected' : '' }}>
                    {{ $role->name }}
                </option>
                @endif
            @endforeach
        </select>

        @error('role')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
@endif

<!-- EMPRENDIMIENTO -->
@if(Auth::user()->isAdmin())
<div class="form-group row">
    <label for="company_id" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>

    <div class="col-md-6">
        <select name="company_id" id="company_id" class="form-control">
            <option value="" selected disabled>--Seleccionar--</option>
            @foreach($companies as $company)
            <option value="{{ $company->id }}" {{ (isset($user) && $company->id == $user->company_id) 
                                        || old('company_id') == $company->id ? 'selected' : '' }}>
                {{ $company->name }}
            </option>
            @endforeach
        </select>

        @error('company')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
@endif

<!-- PASSWORD -->
@if($isCreatingForm)
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
</div>
@endif

<!-- BOTONES -->
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Guardar') }}
        </button>
        <a href="{{ url('/users') }}">
            <button type="button" class="btn btn-secondary">
                {{ __('Cancelar') }}
            </button>
        </a>
    </div>
</div>