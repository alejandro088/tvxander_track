@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/tv_details.css">
@endsection

@section('content')
<div class="show">
    <!-- content here -->
    @include('tv.details')
</div>
@endsection

@section('js')
    <script src="//cariera.co/templates/movify/assets/js/owl.carousel.min.js"></script>
@endsection
