
@extends('layouts.admin')

@section('content')
    <h1 style="margin-left: 40px; margin-right: 40px">Список всех продуктов</h1>
    <table class="table table-bordered table-striped" style="margin-left: 40px; margin-right: 40px">
    <thead>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Категория</th>
        <th>Редактировать</th>
        <th>Удалить</th>
    </tr>
    </thead>
    @foreach($products as $product)
    <tbody>
    <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->title}}</td>
        <td>{{$product->category->title}}</td>
        <td>
            <form action="{{route('admin.product.show', ['id'=>$product->id])}}" method="get">
                @csrf
                <button style="color:white; height: 50px; border-radius: 10px;background-color: #0c673b; font-size: 20px;">Редактировать</button>
            </form>
        </td>
        <td>
            <form action="{{route('admin.product.delete',['id'=>$product->id])}}" method="get">
                @csrf
                <button style="color:white; height: 50px; border-radius: 10px; background-color: #9b3434; font-size: 20px;">Удалить</button>
            </form>

        </td>
    </tr>
    </tbody>

    @endforeach
</table>
<div class="pagination-wrap mt-30 text-center">
    <nav>
        <ul class="pagination">
            <li class="page-item"><a href="{{$products->previousPageUrl()}}"><i class="fas fa-chevron-left"></i></a></li>
            @for($i=1; $i <$products->lastPage()+1; $i++)
                <li class="page-item {{ $i == $products->currentPage() ? 'active' : '' }}"><a href="{{$products->url($i)}}">{{ $i}}</a></li>
            @endfor
            <li class="page-item"><a href="{{$products->nextPageUrl()}}"><i class="fas fa-chevron-right"></i></a></li>
        </ul>
    </nav>
</div>
@endsection
