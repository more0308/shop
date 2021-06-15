
@extends('layouts.app')

@section('content')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area products-breadcrumb-area d-flex align-items-center" data-background="assets/img/bg/breadcrumb_bg02.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap text-center">
                            <h2>@lang('home.name_store')</h2>
                            <p>@lang('home.all_and_more')</p>
                            <div class="row justify-content-center">
                                <div class="col-xl-5 col-lg-7 col-md-10">
                                    <div class="s-slider-search-form t-slider-search-form">
                                        <form action="{{route('home')}}" method="get">
                                            <input name="search" type="text" placeholder="@lang('home.search')">
                                            <button><i class="fas fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    @if(isset($get))
                                        <h2>Результаты поиска:</h2>
                                        @else
                                    <li class="breadcrumb-item"><a href="{{route('home')}}">@lang('home.home')</a></li>
                                        @endif
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->
        <!-- product-area -->
        <div class="product-area gray-bg pt-120 pb-120">
            <div class="container">
                <div class="t-product-wrap">
                    <div class="row">
                        <div class="col-lg-4 order-2 order-lg-0">
                            <aside class="product-sidebar">
                                <div class="widget">
                                    <div class="single-product-widget mb-30">
                                        <h4 class="p-sidebar-title">@lang('home.categories')</h4>
                                        <div class="p-sidebar-cat">
                                            <ul>
                                                @foreach($categories as $category)
                                                <li><a href="#">{{$category->title}}<span></span></a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget">
                                    <div class="single-product-widget mb-30">
                                        <h4 class="p-sidebar-title">Поиск по цене</h4>
                                        <div class="info_widget">
                                            <div class="price_filter">
                                                <div id="slider-range"></div>
                                                <div class="price_slider_amount">
                                                    <input type="text"  id="amount"name="price" placeholder="Add Your Price" />
                                                    <input type="submit" id="price" value="Filter" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget">
                                    <div class="single-product-widget mb-30">
                                        <h4 class="p-sidebar-title">Дата начала продаж</h4>
                                        <div class="p-finder-link">
                                            <ul>
                                                <li><input type="radio" id="Checkbox1" name="contact"><label for="Checkbox1">All Time</label><span>41549</span></li>
                                                <li><input type="radio" id="Checkbox2" name="contact"><label for="Checkbox2">Last Week</label><span>245</span></li>
                                                <li><input type="radio" id="Checkbox3" name="contact"><label for="Checkbox3">Last Month</label><span>3265</span></li>
                                                <li><input type="radio" id="Checkbox4" name="contact"><label for="Checkbox4">Last 6 Months</label><span>9655</span></li>
                                                <li><input type="radio" id="Checkbox5" name="contact"><label for="Checkbox5">Last Year</label><span>23456</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget">
                                    <div class="single-product-widget">
                                        <h4 class="p-sidebar-title">Product Rating</h4>
                                        <div class="p-rating-link">
                                            <ul>
                                                <li><input type="checkbox" id="rCheckbox1"><label for="rCheckbox1">All Rating</label><span>41549</span></li>
                                                <li><input type="checkbox" id="rCheckbox2"><label for="rCheckbox2">1 Star Rating</label><span>245</span></li>
                                                <li><input type="checkbox" id="rCheckbox3"><label for="rCheckbox3">2 Star Rating</label><span>3265</span></li>
                                                <li><input type="checkbox" id="rCheckbox4"><label for="rCheckbox4">3 Star Rating</label><span>9655</span></li>
                                                <li><input type="checkbox" id="rCheckbox5"><label for="rCheckbox5">4 Star Rating</label><span>1254</span></li>
                                                <li><input type="checkbox" id="rCheckbox6"><label for="rCheckbox6">5 Star Rating</label><span>23456</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>

                        <div class="col-lg-8">
                            <div class="row">
                                @foreach($products as $product)
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-product t-single-product mb-30">
                                        <div class="product-img">
                                            <a href="{{route('product.show', ['id'=>$product->id])}}"><img style="width: 330px;height: 440px;" src="{{$product->image}}" alt="img"></a>
                                        </div>
                                        <div class="t-product-overlay">
                                            <h5><a href="{{route('product.show', ['id'=>$product->id])}}">{{$product->title}}</a></h5>
                                            <span></span>
                                            <p>Осталось: {{$product->count}}</p>
                                            <div class="t-product-meta">
                                                <div class="t-product-rating">
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <h6>${{$product->price}}.00</h6>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @endforeach

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- product-area-end -->
        </div>
    </main>
    <!-- main-area-end -->
    <script>
        $(document).ready(function (){
            $('.price').click(function (){
                console.log('good');
            })
        })
    </script>

@endsection
