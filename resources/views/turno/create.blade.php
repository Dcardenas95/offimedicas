@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Pedir Turno
                    </div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form method="POST" action="{{ route('turno.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input name="nombre" value="{{ old('nombre') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cedula">Numero de Documento:</label>
                                <input name="cedula" value="{{ old('cedula') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="edad">Edad:</label>
                                <input name="edad" type="number"  value="{{ old('edad') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Escoge el Modulo:</label>
                                <select name="atencion" class="form-control select2">
                                    <option value=""></option>
                                    @foreach (App\Models\User::atencion as $at)
                                        <option value="{{ $at }}"
                                        >{{ $at }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <button class="btn btn-primary btn-block mt-1">Pedir Turno</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
