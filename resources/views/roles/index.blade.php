@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Lista de roles</h1>
@stop

@section('content')
@if (session('info'))
<div id="success-alert" class="alert alert-success">
    <strong>{{ session('info') }}</strong>
</div> 
@endif
<!--<a href="{{ route('roles.create') }}" class="btn btn-outline-success">Crear Nuevo rol
</a>-->
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Role</th>
                    <th colspan="2"></th>
                </tr>

            </thead>

            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td width="10px">
                            <a href="{{route('roles.edit', $role)}}" class="btn btn-sm btn-primary">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('roles.destroy', $role)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

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