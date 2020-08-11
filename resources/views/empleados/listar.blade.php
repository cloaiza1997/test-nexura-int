@extends('layouts.app')

@section('content')

    @section('url_back', url('/'))
    @include('layouts.partials.back')

    <h2>Listado de Empleados</h2>

    <div class="w-80">
        <a href="{{ route('employee.create') }}" class="btn btn-success float-right">
            <i class="fas fa-user-plus"></i>
            &nbsp;
            Crear
        </a>
    </div>

    @include('layouts.partials.message')

    <br/>

    <table class="table w-80">
        <thead class="thead-dark">
            <tr>
                <th><i class="fas fa-user"></i> Nombre</th>
                <th><i class="fas fa-at"></i> Email</th>
                <th><i class="fas fa-venus-mars"></i> Sexo</th>
                <th><i class="fas fa-briefcase"></i> Área</th>
                <th><i class="fas fa-envelope"></i> Boletín</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->nombre }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->sexo == 'F' ? 'Femenino' : 'Masculino' }}</td>
                    <td>{{ $employee->getArea->nombre }}</td>
                    <td>{{ $employee->boletin ? 'Si' : 'No' }}</td>
                    <td>
                        <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-info btn-table">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                    <td>
                    @section('action')
                        {{ route('employee.destroy', $employee->id) }}
                        @overwrite
                        @include('layouts.partials.form-delete')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
