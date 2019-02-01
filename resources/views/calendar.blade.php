@inject('image', 'Tmdb\Helper\ImageHelper')

@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.print.css">


@endsection

@section('content')

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">

            

            <div class="row mt-3">
                    <div id='calendar'></div>
                
            </div>
        </div>           
    </div>
</div>
@endsection

@section('js')
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"></script>
    <script>
            $('#calendar').fullCalendar({
                events: [
                    {
                    title: 'Event Title1',
                    start: '2019-02-17T13:13:55.008',
                    end: '2019-02-19T13:13:55.008'
                    },
                    {
                    title: 'Event Title2',
                    start: '2019-02-17T13:13:55-0400',
                    end: '2019-02-19T13:13:55-0400'
                    }
            ]
              });
    </script>
@endsection