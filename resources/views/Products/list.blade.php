@extends('welcome')
@section('content')
    <h1>Liste des Produits</h1>
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
                        <a href="{{ route('products.create') }}" class="btn btn-info">Ajouter un produit</a>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $items)
                                        <tr>
                                            <th scope="row">{{ $items->code }}</th>
                                            <td>{{ $items->name }}</td>
                                            <td>{{ $items->price }}</td>
                                            <td>{{ $items->quantity }}</td>
                                            <td>{{ $items->category->name }}</td>
                                            <td>{{ $items->description }}</td>
                                            <td>
                                                <a class="success p-0" href="">
                                                    <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                                </a>
                                                <a class="info p-0" href="">
                                                    <i class="fa fa-check font-medium-3 mr-2"></i>
                                                </a>
                                                <a class="danger p-0" href="{{ route('categories.delete', $items->id) }}">
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
