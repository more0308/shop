
@extends('layouts.admin')

@section('content')

    <div class="col-xs-12 col-sm-6" style="margin-left: auto; margin-right: auto" >
        <div class="mb-4 card">
            <div class="card-body" >
                <form method="post" action="{{route('admin.product.create.post')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="" for="exampleEmail">Название продукта UA</label>
                        <input
                            class="form-control"
                            name="title1"
                            placeholder="Название продукта"
                            type="text"/>
                    </div>
                    @error('title1')
                    <span class="help-block text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label class="" for="exampleEmail">Название продукта RU</label>
                        <input
                            class="form-control"
                            name="title2"
                            placeholder="Название продукта"
                            type="text"/>
                    </div>
                    @error('title2')
                    <span class="help-block text-danger">{{$message}}</span>
                    @enderror

                    <div class="form-group">
                        <label class="" for="exampleEmail">Название продукта EN</label>
                        <input
                            class="form-control"
                            name="title3"
                            placeholder="Название продукта"
                            type="text"/>
                    </div>
                    @error('title3')
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
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" >{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="" for="exampleText">Описание UA</label>
                        <textarea
                            class="form-control"
                            id="exampleText"
                            name="describe1"
                        ></textarea>
                    </div>
                    @error('describe')
                    <span class="help-block text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label class="" for="exampleText">Описание RU</label>
                        <textarea
                            class="form-control"
                            id="exampleText"
                            name="describe2"
                        ></textarea>
                    </div>
                    @error('describe')
                    <span class="help-block text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-group">
                        <label class="" for="exampleText">Описание EN</label>
                        <textarea
                            class="form-control"
                            id="exampleText"
                            name="describe3"
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
                    <button class="btn btn-secondary">Создать</button>
                </form>
            </div>
        </div>
    </div>
@endsection
