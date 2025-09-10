@extends('welcome')

@section('content')
    <h1>Creation d'un Role</h1>
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

                    <form action="{{ route('roles.store') }}" method="POST" class="form">
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control border-primary" id="name" type="text" name="name">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" rows="5" class="form-control border-primary" name="description"></textarea>
                            </div>
                            
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
