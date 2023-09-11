@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Asignar Rol</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-success">
    <strong>{{session('info')}}</strong>
</div>   
@endif

   <div class="card">
    <div class="card-body">
        <p class="h5">Nombre:</p>
        <p class="form-control">{{$user->name}}</p>
    <h2 class="h5">Listado de roles</h2>
    <form action="{{ route('users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')

    @foreach ($roles as $role)
    <div>
        <label>
            <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                   {{ in_array($role->name, ['user', 'admin']) && $user->roles->contains('name', $role->name) ? 'checked' : '' }}> 
            {{ $role->name === 'user' ? 'User' : ($role->name === 'admin' ? 'Admin' : $role->name) }}
        </label>
    </div>
     
@endforeach
<button type="submit" class="btn btn-primary mt-2">Guardar Cambios</button>
   </form>
        
    </div>
   </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/custom_pagination.css">
@stop

@section('js')
<script>console.log('Hi!');</script>
@stop
