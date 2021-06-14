
@extends('layouts.admin')

@section('content')

    <div class="col-xs-12 col-sm-6" style="margin-left: auto; margin-right: auto">
        <h1 style="text-align: center">Продукт: {{$product->title}}</h1>
    <div class="mb-4 card">
        <div class="card-body">
            <form method="post" action="{{route('admin.product.update', ['id'=>$product->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="" for="exampleEmail">Название продукта</label>
                    <input
                        class="form-control"
                        name="title"
                        placeholder="Название продукта"
                        type="text"/>
                </div>
                @error('title')
                <span class="help-block text-danger">{{$message}}</span>
                @enderror
                <div class="form-group">
                    <label class="" for="exampleEmail">Цена</label>
                    <input
                        class="form-control"
                        name="price"
                        placeholder="10000$"
                        type="text"/>
                </div>
                @error('price')
                <span class="help-block text-danger">{{$message}}</span>
                @enderror
                <div class="form-group">
                    <label class="" for="exampleEmail">Количество</label>
                    <input
                        class="form-control"
                        name="count"
                        placeholder="100"
                        type="text"/>
                </div>
                @error('count')
                <span class="help-block text-danger">{{$message}}</span>
                @enderror
                <div class="form-group">
                    <label class="" for="exampleSelect">Категория</label>
                    <select
                        class="form-control"
                        id="exampleSelect"
                        name="category_id">
                        <option value="0">Не изменять</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" >{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="" for="exampleText">Описание</label>
                    <textarea
                        class="form-control"
                        id="exampleText"
                        name="describe"
                    ></textarea>
                </div>
                @error('describe')
                <span class="help-block text-danger">{{$message}}</span>
                @enderror
                <div class="form-group">
                    <label class="" for="exampleFile">Фотография</label>
                    <input
                        class="form-control-file"
                        id="exampleFile"
                        name="image"
                        type="file"
                    />
                </div>
                @error('image')
                <span class="help-block text-danger">{{$message}}</span>
                @enderror
                <button class="btn btn-secondary">Изменить</button>
            </form>
        </div>
    </div>
    </div>
@endsection
