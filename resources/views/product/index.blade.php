@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Products
                        <a class="float-right" href="{{route("product.create")}}"><button class="btn btn-primary">Add</button></a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tbody>
                            @forelse($products as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->cost}}</td>
                                        <td>{{$product->created_at}}</td>
                                        <td>
                                            <form onsubmit="if(confirm('Удалить')){return true}else{return false}" action="{{route('product.destroy',$product)}}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <a class="btn btn btn-secondary" href="{{route('product.edit',$product)}}">
                                                   Edit
                                                </a>
                                                <button type="submit" class="btn btn-danger" >Delete</button>

                                            </form>
                                        </td>
                                    </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <p>данных нет</p>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="4">
                                    <ul class="pagination">
                                        {{$products->links()}}
                                    </ul>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
