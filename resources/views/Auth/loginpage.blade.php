@extends('Auth.login')

@section('container')
    <div class="card-header text-center">
        <img src="../app-assets/img/logos/logo-color-big.png" alt="company-logo" class="mb-3" width="80">
        <h4 class="text-uppercase text-bold-400 grey darken-1">Login</h4>
    </div>
    <div class="card-body">
        <div class="card-block">
            <form class="form-horizontal" action="{{ route('loggin') }}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="email" class="form-control form-control-lg" name="email" id="inputEmail"
                            placeholder="Email Address" required email>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <input type="password" class="form-control form-control-lg" name="password" id="inputPass"
                            placeholder="Password" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0 ml-5">
                                <input type="checkbox" class="custom-control-input" checked id="rememberme">
                                <label class="custom-control-label float-left" for="rememberme">Remember Me</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="text-center col-md-12">
                        <button type="submit"
                            class="btn btn-danger px-4 py-2 text-uppercase white font-small-4 box-shadow-2 border-0">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer grey darken-1">
        <div class="text-center mb-1">Forgot Password? <a><b>Reset</b></a></div>
        <div class="text-center">Don't have an account? <a href="{{ route('utilisateurs.create') }}"><b>Signup</b></a></div>
    </div>
@endsection
