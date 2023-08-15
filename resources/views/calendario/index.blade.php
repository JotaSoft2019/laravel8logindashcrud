@extends('adminlte::page')

@section('title', 'Calendario')

@section('content_header')
@stop

@section('content')
<!--Notas NO TOCAR ESTE CODIGO-->
<div class="modal fade" id="calendarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Evento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" id="title">
                <span id="titleError" class="text-danger"></span>
                <div class="mt-3">
                    <label for="colorPicker">Color del Evento:</label>
                    <input type="color" id="colorPicker" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="saveBtn" class="btn btn-primary">Guardar Evento</button>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-10">
        <a href="{{ route('nota.create') }}" class="btn btn-outline-primary mt-3">CREAR NOTAS</a>
            <a href="{{ route('calendario.index') }}" class="btn btn-outline-success mt-3">ACTUALIZAR</a>
            <h3 class="text-center mt-1 ml-5"><b>Calendario Jota Mundial</b></h3>
            <div class="col-md-11 offset-1 mt-3 mb-5 calendario">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>
@if (count($notas) > 0)
                <div class="nota-container">
                    <h4>Notas:</h4>
                    @foreach ($notas as $nota)
                        <div class="nota nota-item">
                            <div class="informacion">
                                <div class="color-box" style="background-color: {{ $nota['color'] }}"></div>
                                <h5>{{ $nota['title'] }}</h5>
                                <p>{{ $nota['descripcion'] }}</p>
                                <form action="{{ route('nota.destroy', $nota['id']) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/calendario.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/locale/es.js'></script>
    <script>
        $(document).ready(function() {
        $('#addNoteBtn').click(function() {
        var noteTitle = $('#noteTitle').val();
        var noteColor = $('#noteColor').val();
        var noteContent = $('#noteContent').val();

        $.ajax({
            url: "{{ route('calendario.store') }}",
            type: "POST",
            dataType: "json",
            data: { title: noteTitle, color: noteColor, notes: noteContent },
            success: function(response) {
                $('#calendarioModal').modal('hide');
                            $('#calendar').fullCalendar('renderEvent',{
                                'title': response.title,
                                'note': response.note,
                                'color':response.color

                          });
            },
            error: function(error) {
                if(error.responseJSON.errors){
                                $('#titleError').html(error.responseJSON.errors.title);
                            }

            }
        });
    });
            
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var calendario = @json($events);
        $('#calendar').fullCalendar({
            header:{
               right:'prev,next,today',
               center:'title',
               left:'month,agendaWeek,agendaDay'
            },

            buttonText: {
            today: 'Hoy',
            month: 'Mes',
            week: 'Semana',
            day: 'Día' 

            },

        views: {


        month: {
            titleFormat: 'MMMM YYYY'  
        },
        agendaWeek: {
            titleFormat: 'D MMM YYYY'  
        },
        agendaDay: {
            titleFormat: 'D MMM YYYY'  
        }
       },



            locale:'es',
            defaultView: 'month',
            events: calendario,
            selectable: true,
            selectHelper: true,
            
            select: function(start, end, allDay)
            {
                $('#calendarioModal').modal('toggle');

                $('#saveBtn').click(function(){
                    var title = $('#title').val();
                    var start_date = moment(start).format('YYYY-MM-DD');
                    var end_date = moment(end).format('YYYY-MM-DD');
                    var color = $('#colorPicker').val();

                    $.ajax({
                        url:"{{ route('calendario.store') }}",
                        type:"POST",
                        dataType:"json",
                        data:{ title, start_date, end_date, color},
                        success:function(response)
                        {  
                            $('#calendarioModal').modal('hide');
                            $('#calendar').fullCalendar('renderEvent',{
                                'title': response.title,
                                'start': response.start,
                                'end': response.end,
                                'color':response.color

                          });
                        },
                        error:function(error)
                        {    
                            if(error.responseJSON.errors){
                                $('#titleError').html(error.responseJSON.errors.title);
                            }

                        },
                    });
                });
            },
    editable:true,
    eventDrop:function(event)
    {
        var id = event.id;
        var start_date = moment(event.start).format('YYYY-MM-DD');
        var end_date = moment(event.end).format('YYYY-MM-DD');
     
        $.ajax({
                        url:"{{ route('calendario.update', '') }}" + '/'+ id,
                        type:"PATCH",
                        dataType:"json",
                        data:{ start_date, end_date },
                        success:function(response)
                        {  
                            swal("Evento Actualizado!", "Correctamente", "success");
                        },
                        error:function(error)
                        {    
                            console.log(error)
                        },
                    });
    },

    //Aca quiero tener la opcion de editar el evento.
    
    eventClick: function(event) {
    if (confirm('¿Quieres Eliminar Este Evento?')) {
        $.ajax({
            url: "{{ route('calendario.destroy', '') }}" + '/' + event.id,
            type: "DELETE",
            dataType: 'json',
            success: function(response) {
                $('#calendar').fullCalendar('removeEvents', function(existingEvent) {
                    return existingEvent.id === event.id;
                });
                swal("Evento eliminado", "Correctamente", "success");
            },
            error: function(error) {
                console.log("Error:", error);
            },
        });
    }

},           

   });

     $("#calendarioModal").on("hidden.bs.modal", function () {
        $('#saveBtn').unbind();
     });

     
  });
    </script>

@stop