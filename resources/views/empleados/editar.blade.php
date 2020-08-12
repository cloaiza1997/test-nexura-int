@extends('layouts.app')

@section('content')

@section('url_back', url('employee'))
    @include('layouts.partials.back')

    <h2><i class="fas fa-user-tie"></i> Editar Empleado <i class="fas fa-user-tie"></i></h2>
    <br />

    <form action="{{ route('employee.update', $employee->id) }}" method="POST" class="container center">
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @if ($errors->any())
            <div class="form-group row">
                <label class="col-sm-4 col-form-label"></label>
                <div class="col-sm-8 left message_error">
                    <p>Por favor corriga los siguiente campos:</p>
                    <br />
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <br />
        @endif

        <div class="form-group row">
            <label for="nombre" class="col-sm-4 col-form-label">Nombre completo *</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo del empleado"
                    value="{{ old('nombre') ?? $employee->nombre }}" />
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label">Correo electrónico *</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico"
                    value="{{ old('email') ?? $employee->email }}" />
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Sexo *</label>
            <div class="col-sm-8">
                @foreach ($sexs as $sex)
                    <div class="flx">
                        <input type="radio" class="form-control" id="{{ $sex[0] }}" name="sexo" value="{{ $sex[0] }}"
                            @if ( (old('sexo') ?? $employee->sexo) == $sex[0]) checked @endif
                            />
                        &nbsp;
                        <label for="{{ $sex[0] }}" class="pointer m-0x">{{ $sex[1] }}</label>
                    </div>
            @endforeach
            </div>
        </div>

        <div class="form-group row">
            <label for="area_id" class="col-sm-4 col-form-label">Área *</label>
            <div class="col-sm-8">
                <select class="form-control" id="area_id" name="area_id">
                    <option disabled selected></option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}"
                            @if (old('area_id') ?? $employee->area_id == $area->id) selected @endif
                            >
                            {{ $area->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="descripcion" class="col-sm-4 col-form-label">Descripción *</label>
            <div class="col-sm-8">
                <textarea class="form-control" id="descripcion" name="descripcion"
                    placeholder="Descripción de la experiencia del empleado">{{ old('descripcion') ?? $employee->descripcion }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label"></label>
            <div class="col-sm-8">
                <div class="flx">
                    <input type="checkbox" class="form-control" id="boletin" name="boletin"
                        @if(old('boletin') ? old('boletin') == 'on' : $employee->boletin == 1) checked @endif
                        />
                    &nbsp;
                    <label for="boletin" class="pointer m-0x">Deseo recibir el boletín informativo</label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="rol_id" class="col-sm-4 col-form-label">Roles *</label>
            <div class="col-sm-8">
                @foreach ($rols as $rol)
                    <div class="flx">
                        <input type="checkbox" class="form-control" id="{{ $rol->id }}" name="rol[]"
                            value="{{ $rol->id }}"
                            @if(old('rol') != null)
                                @foreach(old('rol') as $old)
                                    @if($old == $rol->id) checked @endif
                                @endforeach
                            @else
                                @foreach($employee->roles as $rol_db)
                                    @if($rol_db["rol_id"] == $rol->id) checked @endif
                                @endforeach
                            @endif
                            />
                        &nbsp;
                        <label for="{{ $rol->id }}" class="pointer m-0x">{{ $rol->nombre }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <button type="sumit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
    </form>

    @include('layouts.partials.message')

@endsection
