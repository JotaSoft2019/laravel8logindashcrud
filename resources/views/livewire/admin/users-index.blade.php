@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
@if (session('info'))
<div id="success-alert" class="alert alert-success">
    <strong>{{ session('info') }}</strong>
</div> 
@endif
<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de un usuario o correo electronico">
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th></th>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('users.edit', $user)}}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
        {{ $users->links()  }}
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/custom_pagination.css">
@stop

@section('js')
<script>
   
    document.addEventListener("DOMContentLoaded", function () {
        
        setTimeout(function () {
            var successAlert = document.getElementById('success-alert');
            if (successAlert) {
                successAlert.style.display = 'none';
            }
        }, 3000);
    });
</script>
@stop



