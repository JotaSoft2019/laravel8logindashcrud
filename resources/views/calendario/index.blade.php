@extends('adminlte::page')

@section('title', 'Calendario')

@section('content_header')
@stop

@section('content')
    <a href="{{ route('eventos.create') }}" class="btn btn-outline-success mt-5">CREAR EVENTO</a>
    <div class="container mt-5 calendario">
        <div class="row">
            <div class="col-10">
                <h3 class="text-center mt-1"><b>Calendario de Eventos Jota Mundial</b></h3>
                <div class="col-md-11 offset-1 mt-3 mb-5">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom-form.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <script>
        $(document).ready(function() { 
            var calendario = @json($events);
        $('#calendar').fullCalendar({
    editable:true,
    header:{
     right:'prev,next today',
     center:'title',
     left:'month,agendaWeek,agendaDay'
    },
    events: calendario,
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
     var title = prompt("Enter Event Title");
     if(title)
     {
      var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
       url:"insert.php",
       type:"POST",
       data:{title:title, start:start, end:end},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    },
    editable:true,
    eventResize:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function(){
       calendar.fullCalendar('refetchEvents');
       alert('Event Update');
      }
     })
    },

    eventDrop:function(event)
    {
     var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
     var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
     var title = event.title;
     var id = event.id;
     $.ajax({
      url:"update.php",
      type:"POST",
      data:{title:title, start:start, end:end, id:id},
      success:function()
      {
       calendar.fullCalendar('refetchEvents');
       alert("Event Updated");
      }
     });
    },

    eventClick:function(event)
    {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
    },

   });
  });
    </script>
@stop




