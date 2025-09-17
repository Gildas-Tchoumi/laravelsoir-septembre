@extends('Auth.login')

@section('container')
    <div class="card-header text-center">
        <img src="../app-assets/img/logos/logo-color-big.png" alt="company-logo" class="mb-3" width="80">
        <h4 class="text-uppercase text-bold-400 grey darken-1">Message</h4>
    </div>
    <div class="card-body">
        <div class="card-block">
            <p>
                Un email de verification vous a été envoyé. Veuillez vérifier votre boîte de réception.
            </p>
            <a href="{{ route('login') }}" class="btn btn-success">Se connecter</a>
        </div>
    </div>
@endsection
