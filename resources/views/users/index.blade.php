@extends('layouts.app')

@section('css')
    /*<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">*/

@endsection


@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 align="center">Lista De Usuarios</h2>
        </div>
    </div>
    <li class="nav-item">
        <a class="btn btn-dark" href="{{ route('users.create')}}">Crear Usuario</a>
    </li>


</div>
<table id="usuario" class="table table-striped table-bordered" style="width:100%">
    <tr align="center">
        <th>Id</th>
        <th>Nombre</th>
        <th>Tipo de Documento</th>
        <th>Número de Documento</th>
        <th>Correo</th>
        <th>Acciones</th>
    </tr>
    @foreach ($users as $user)
    <tr align="center">
        <td>{{ ++$i}}</td>
        <td>{{ $user->name}}</td>
        <td>{{ $user->tipo_doc}}</td>
        <td>{{ $user->nro_documento}}</td>
        <td>{{ $user->email}}</td>
        <td>
        <form action="{{ route('users.Deshabilitar', $user->id)}}" method="POST" class="formulario-eliminar">
            <a class="btn btn-primary" href="{{ route('users.edit', $user->id)}}">Editar</a>

            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-danger">Deshabilitar</button>
        </form>
        </td>
    </tr>


    @endforeach
    </table>

@endsection

    @section('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        @if(session('eliminar') == 'true')
            <script>
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            </script>

        @endif



        <script>

            $('.formulario-eliminar').submit(function (e){
                e.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#dd3333',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                })


            });
        </script>

    @endsection







