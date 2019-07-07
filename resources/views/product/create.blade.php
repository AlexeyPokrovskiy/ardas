@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">products</div>

                    <div class="card-body">
                        <form  action="{{route('product.store')}}" method="post">
                            @csrf
                            @include('product.partials.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection