@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/tv_details.css">
@endsection

@section('content')
<div class="show">
    <!-- content here -->
    @include('partials.tv.details')
</div>
@endsection