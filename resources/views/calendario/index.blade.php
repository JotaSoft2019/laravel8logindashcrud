@extends('adminlte::page')

@section('title', 'Calendario')

@section('content_header')
    <h1>Calendario</h1>
@stop

@section('content')
    <a href="{{ route('eventos.create') }}" class="btn btn-outline-success">CREAR EVENTO</a>

    <div class="container mt-5">
        <h1 class="text-center">Calendario</h1>
        <div id="calendar"></div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <VSheet height="600">
                        <VCalendar />
                    </VSheet>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ... tu código JavaScript para el calendario ...
    </script>
@stop

@section('js')
<script>
    import Applayout from '@/Layouts/AppLayout'
    import { VCalendar, VSheet } from 'vuetify/lib'

    export default {
        components: {
            AppLayout,
            VCalendar,
            VSheet,
        }
    }
</script>
@stop

