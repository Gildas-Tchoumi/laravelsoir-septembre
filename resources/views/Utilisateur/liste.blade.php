@extends('welcome')
@section('content')
    <h1>Liste des utilisateurs</h1>
    <!--Inverse Table Starts-->
    <section id="inverse-table">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-warning">
                            <h4 class="card-title">Inverse Table</h4>
                        </div>
                        <p>
                            You can also invert the colors—with light text on dark
                            backgrounds—with <code>.table-inverse</code>.
                        </p>
                        {{-- <a href="{{ route('utilisateurs.create') }}" class="btn btn-info">Ajouter un utilisateur</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Sexe</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($utilisateurs as $items)
                                        <tr>

                                            <td>{{ $items->firstname }}</td>
                                            <td>{{ $items->lastname }}</td>
                                            <td>{{ $items->sexe }}</td>
                                            <td>{{ $items->email }}</td>
                                            <td><a class="btn bg-info p-0 white" href="{{ route('roles.assignRole', $items->id) }}">
                                                    Role
                                                </a>
                                            </td>

                                            <td>
                                                <a class="success p-0" href="">
                                                    <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                                </a>
                                                <a class="info p-0" href="">
                                                    <i class="fa fa-check font-medium-3 mr-2"></i>
                                                </a>
                                                <a class="danger p-0" href="">
                                                    <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Inverse Table Ends-->
@endsection
