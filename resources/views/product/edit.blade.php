@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">products</div>

                    <div class="card-body">
                        <form  action="{{route('product.update',$product)}}" method="post">
                            <input type="hidden" name="_method" value="put">
                            @csrf
                            @include('product.partials.form')
                        </form>
                    </div>
                </div>
            </div>
    </div>
@endsection