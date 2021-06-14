
@extends('layouts.admin')

@section('content')
    <h1 style="margin-left: 40px; margin-right: 40px">Список всех коментариев</h1>
    <table class="table table-bordered table-striped" style="margin-left: 40px; margin-right: 40px">
        <thead>
        <tr>
            <th>Товар</th>
            <th>Коментарий</th>
            <th>Одобрить</th>
            <th>Удалить</th>
            <th>Удалить все</th>
        </tr>
        </thead>
        @foreach($comments as $comment)
            <tbody >
            <tr>
                <td><a href="{{route('product.show', ['id'=>$comment->product_id])}}">Посмотреть</a></td>
                <td style="width: 500px;">{{$comment->describe}}</td>
                <td>
                    <form action="{{route('admin.comment.good', ['id'=>$comment->id])}}" method="post">
                        @csrf
                        <button style="color:white; height: 50px; border-radius: 10px;background-color: #0c673b; font-size: 20px;">Одобрить</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('admin.comment.bad', ['id'=>$comment->id])}}" method="post">
                        @csrf
                        <button style="color:white; height: 50px; border-radius: 10px;background-color: #9b3434; font-size: 20px;">Удалить</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('admin.comment.badall',['id'=>$comment->id])}}" method="post">
                        @csrf
                        <button style="color:white; height: 50px; border-radius: 10px; background-color: #9b3434; font-size: 20px;">Удалить все</button>
                    </form>

                </td>
            </tr>
            </tbody>

        @endforeach
    </table>
    <div class="pagination-wrap mt-30 text-center">
        <nav>
            <ul class="pagination">
                <li class="page-item"><a href="{{$comments->previousPageUrl()}}"><i class="fas fa-chevron-left"></i></a></li>
                @for($i=1; $i <$comments->lastPage()+1; $i++)
                    <li class="page-item {{ $i == $comments->currentPage() ? 'active' : '' }}"><a href="{{$comments->url($i)}}">{{ $i}}</a></li>
                @endfor
                <li class="page-item"><a href="{{$comments->nextPageUrl()}}"><i class="fas fa-chevron-right"></i></a></li>
            </ul>
        </nav>
    </div>
@endsection
