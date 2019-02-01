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
                    <tv-calendar></tv-calendar>               
            </div>
        </div>           
    </div>
</div>
@endsection

@section('js')
    
<script>

    $('.c-event-container').qtip({ // Grab some elements to apply the tooltip to
        content: {
            text: 'My common piece of text here'
        }
    })
</script>
@endsection