@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Settings</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <form action="{{route('settings.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="language">Idioma</label>
                                <select name="language" id="language" class="form-control">
                                        <option value="en">English</option>
                                        <option value="es">Español</option>
                                </select>
                        </div>

                        <div class="form-group custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="adult" name="adult">
                                <label class="custom-control-label" for="adult">Contenido adulto</label>
                              </div>
                            
                        <div class="form-group">
                        <button class="btn btn-primary" type="submit">{{__('Save!')}}</button>
                        </div>
                    </form>    
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
