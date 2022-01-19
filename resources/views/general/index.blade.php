@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Modulo General
                        </div>
                        <div class="card-body">
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td>#turno</td>
                                        <th>Cedula</th>
                                        <th>Nombre</th>
                                        <th>Atencion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)

                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->cedula }}</td>
                                            <td>{{ $user->nombre }}</td>
                                            <td>{{ $user->atencion }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('turno.destroy', $user) }}"
                                                    style="display: inline">
                                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                                    <button class="btn btn-xs btn-danger"
                                                        onclick="return confirm('¿Finalizar turno?')"><i
                                                            class="fa fa-times"></i>Finalizar turno</button>
                                                </form>

                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-login">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Turno</h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <h3>Por favor la persona {{ $user->nombre }} con turno #{{ $user->id }}
                                        acercarse a modulo general para ser atendido
                                    </h3>
                                    <p>por favor una vez atendida oprima el boton atender para que ingrese el siguiente
                                        paciente</p>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('turno.destroy', $user) }}" style="display: inline">
                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                <button class="btn btn-xs btn-danger" onclick="return confirm('¿Finalizar turno?')"><i
                                        class="fa fa-times"></i>Atender</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#myModal').modal('toggle')
            });
        </script>
@endsection
