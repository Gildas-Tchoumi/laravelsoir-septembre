@extends('Auth.login')

@section('container')
    <h1>S'inscrire</h1>
    <div class="main-content">
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            {{-- <div class="card-title-wrap bar-warning">
                    <h4 class="card-title" id="basic-layout-colored-form-control">Utilisateur</h4>
                </div> --}}
                            {{-- <p class="mb-0">Company registration Form. Form action buttons are on the
                    bottom right position.</p> --}}
                        </div>
                        <div class="card-body">
                            <div class="px-3">

                                <form action="{{ route('utilisateurs.store') }}" method="POST" class="form">
                                    @csrf
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label>FirstName</label>
                                            <input class="form-control border-primary" id="firstname" type="text"
                                                name="firstname">
                                        </div>
                                        <div class="form-group">
                                            <label for="price">LastName</label>
                                            <input class="form-control border-primary" type="text" id="lastname"
                                                name="lastname">
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity">Email</label>
                                            <input class="form-control border-primary" type="email" id="email"
                                                name="email">
                                        </div>
                                        <div class="col-xl-12 col-lg-6 col-md-12">

                                            <label for="category_id">Sexe</label>
                                            <select class="form-control" id="sexe" name="sexe">
                                                <option>Select sexe</option>
                                                <option value="masculin">Masculin</option>
                                                <option value="feminin">Feminin</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="description">PassWord</label>
                                            <input class="form-control border-primary" type="password" id="password"
                                                name="password">
                                        </div>

                                    </div>

                                    <div class="form-actions right">
                                        {{-- <button type="button" class="btn btn-danger mr-1">
                                <i class="icon-trash"></i> Cancel
                            </button> --}}
                                        <button type="submit" class="btn btn-success">
                                            <i class="icon-note"></i> Enregistrer
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
