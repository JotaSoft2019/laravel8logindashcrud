@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
    {!! Form::open(['route' => 'roles.store']) !!}
<div class="card">
    <div class="card-body">
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del nuevo rol']) !!}
        </div>

        <h2 class="h3">Lista de permisos</h2>

        @foreach ($permissions as $permission)
            <div>
                <label>
                    {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                    {{ $permission->description }}
                </label>
            </div>
        @endforeach
        {!! Form::submit('Crear Rol', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop