@extends('layouts.app')

@section('content')

    @section('url_back', url('employee'))
    @include('layouts.partials.back')

    <br />
    <h2>Crear Empleado</h2>
    <br />

    <form action="{{ route('employee.store') }}" method="POST" class="container center">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group row">
            <label for="nombre" class="col-sm-4 col-form-label">Nombre completo *</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo del empleado" required />
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label">Correo electrónico *</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" required />
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Sexo *</label>
            <div class="col-sm-8">
                @foreach($sexs as $sex)
                    <div class="flx">
                        <input type="radio" class="form-control" id="{{ $sex[0] }}" name="sexo" value="{{ $sex[0] }}" required />
                        &nbsp;
                        <label for="{{ $sex[0] }}" class="pointer m-0x">{{ $sex[1] }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group row">
            <label for="area_id" class="col-sm-4 col-form-label">Área *</label>
            <div class="col-sm-8">
                <select class="form-control" id="area_id" name="area_id" required>
                    <option disabled selected></option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="descripcion" class="col-sm-4 col-form-label">Descripción *</label>
            <div class="col-sm-8">
                <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción de la experiencia del empleado" required></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-4 col-form-label"></label>
            <div class="col-sm-8">
                <div class="flx">
                    <input type="checkbox" class="form-control" id="boletin" name="boletin" required />
                    &nbsp;
                    <label for="boletin" class="pointer m-0x">Deseo recibir el boletín informativo</label>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="rol_id" class="col-sm-4 col-form-label">Roles *</label>
            <div class="col-sm-8">
                @foreach($rols as $rol)
                    <div class="flx">
                        <input type="checkbox" class="form-control" id="{{ $rol->id }}" name="rol" value="{{ $rol->id }}" required />
                        &nbsp;
                        <label for="{{ $rol->id }}" class="pointer m-0x">{{ $rol->nombre }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="sumit" class="btn btn-success">Guardar</button>
    </form>

    @include('layouts.partials.message')

@endsection
