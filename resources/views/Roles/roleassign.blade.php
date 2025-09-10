@extends('welcome')

@section('content')
    <h1>Assigner un role a l'utilisateur : {{ $utilisateur->firstname }}</h1>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title-wrap bar-warning">
                    <h4 class="card-title" id="basic-layout-colored-form-control">Roles</h4>
                </div>
                {{-- <p class="mb-0">Company registration Form. Form action buttons are on the
                    bottom right position.</p> --}}
            </div>
            <div class="card-body">
                <div class="px-3">

                    <form action="{{ route('roles.storeAssignRole',$utilisateur->id) }}" method="POST" class="form">
                        @csrf
                        <div class="form-body">

                            @foreach ($roles as $rol)
                                <div class="form-check">
                                    <input class="" id="name" type="checkbox" name="role_id[]"
                                        value="{{ $rol->id }}">
                                    <label class="form-check-label">{{ $rol->name }}</label>
                                </div>
                            @endforeach

                        </div>

                        <div class="form-actions right">
                            <button type="button" class="btn btn-danger mr-1">
                                <i class="icon-trash"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="icon-note"></i> Enregistrer
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
