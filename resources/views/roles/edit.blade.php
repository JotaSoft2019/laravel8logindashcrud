@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')

  <div class="card">
    <div class="card-body">
       {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'put']) !!}
       @include('roles.partials.form')

       {!! Form::submit('Editar Rol', ['class' => 'btn btn-primary']) !!}
       
       <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancelar</a>
       
       {!! Form::close() !!}
    </div>
  </div>
@stop