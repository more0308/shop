
@extends('layouts.app')

@section('content')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->

        <!-- breadcrumb-area-end -->
        <div class="col-xs-12 col-sm-6" style="margin-left: auto; margin-right: auto; padding-top: 30px" >
            <div class="mb-4 card">
                <div class="card-body" >
                    <form method="post" action="{{route('product.payment.post')}}">
                        @csrf
                        <div class="form-group">
                            <label class="" for="exampleEmail">Фамилия Имя Отчество</label>
                            <input
                                class="form-control"
                                name="full_name"
                                type="text"/>
                        </div>
                        @error('full_name')
                        <span class="help-block text-danger">{{$message}}</span>
                        @enderror

                        <div class="form-group">
                            <label class="" for="exampleEmail">Адресс получения</label>
                            <input
                                class="form-control"
                                name="address"
                                type="text"/>
                        </div>
                        @error('address')
                        <span class="help-block text-danger">{{$message}}</span>
                        @enderror

                        <div class="form-group">
                            <h2>Сумма к оплате: {{$total_price}}.00 $</h2>
                        </div>

                        <button class="btn btn-secondary">Оплатить товар</button>
                    </form>
                </div>
            </div>
        </div>
    </main>


@endsection
