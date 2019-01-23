@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Unwatched</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @forelse ($shows as $show)
                    {{$show}}
                    @empty
                    <span>En este momento no tienes Shows registrados</span>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
