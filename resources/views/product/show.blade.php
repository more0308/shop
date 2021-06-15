@extends('layouts.app')

@section('content')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->
        <section class="breadcrumb-area d-flex align-items-center" data-background="/assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap text-center">
                            <h2>{{$product->title}}</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">@lang('home.home')</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->
        <!-- product-details-area -->
        <section class="product-details gray-bg pt-120 pb-120">
            <div class="container">
                <div class="t-product-wrap">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="product-details-wrap">
                                <div class="product-details-thumb">
                                    <img src="/{{$product->image}}" alt="img">
                                </div>
                                <div class="product-details-tab">
                                    <ul class="nav product-tab" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link btn active" id="item-details-tab" data-toggle="tab" href="#item-details" role="tab" aria-controls="item-details" aria-selected="true">@lang('product.describe_product')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn" id="product-reviews-tab" data-toggle="tab" href="#product-reviews" role="tab" aria-controls="product-reviews" aria-selected="false">@lang('product.comments')</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content product-tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="item-details" role="tabpanel" aria-labelledby="item-details-tab">
                                            <div class="product-details-content">
                                                <h3>{{$product->title}}</h3>
                                                <p>{{$product->describe}}</p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="product-reviews" role="tabpanel" aria-labelledby="product-reviews-tab">
                                            <div class="item-comment-wrap">
                                                @forelse($comments as $comment)
                                                <div class="item-single-comment">
                                                    <ul>
                                                        <li>
                                                            <div class="item-comment-avatar">
                                                               <img src="/assets/img/product/item_comment_avatar01.jpg" alt="img">
                                                            </div>
                                                            <div class="item-comment-content">
                                                                <h5>{{$comment->user->name}}</h5>
                                                                <span>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                    </span>
                                                                <small>{{$comment->created_at}}</small>
                                                                <p>{{$comment->describe}}</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                    @empty
                                                   <p>@lang('product.first')</p>
                                                @endforelse
                                                    <div class="pagination-wrap mt-30 text-center">
                                                        <nav>
                                                            <ul class="pagination">
                                                                <li class="page-item"><a href="{{$comments->previousPageUrl()}}"><i class="fas fa-chevron-left"></i></a></li>
                                                                <li class="page-item"><a href="{{$comments->nextPageUrl()}}"><i class="fas fa-chevron-right"></i></a></li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                    @if(\Illuminate\Support\Facades\Auth::check())
                                                <div class="item-comment-box">
                                                    <h3>@lang('product.leave_review')</h3>
                                                    <div class="item-comment-form">
                                                        <form action="{{route('product.comment', ['product_id'=>$product->id])}}" method="post">
                                                            @csrf
                                                            <textarea name="message" id="message" placeholder="@lang('product.your_opinion')"></textarea>
                                                            <button class="btn">@lang('product.send')</button>
                                                            @error('message')
                                                            <span class="help-block text-danger">{{$message}}</span>
                                                            @enderror
                                                        </form>

                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <aside class="vendor-profile-sidebar item-details-sidebar">
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    <div class="item-sidebar-action text-center">
                                        <div class="item-sidebar-btn mb-25">
                                                <form action="{{route('product.order.add', ['id'=>$product->id, 'name'=>$product->title, 'price'=>$product->price, 'image'=>$product->image])}}" method="post">
                                                    @csrf
                                                    <input class="btn" name="count" type="text" placeholder="@lang('product.quantity')">
                                                    <input type="submit" class="btn" value="@lang('product.add')">
                                                </form>
                                        </div>
                                    </div>
                                @endif
                                <div class="sidebar-item-info">
                                    <h5 class="vendor-sidebar-title text-center">@lang('product.information')</h5>
                                    <ul>
                                        <li>@lang('product.price')<span>${{$product->price}}.00</span></li>
                                        <li>@lang('product.quantity_in_stock')<span>{{$product->count}}</span></li>
                                        <li>@lang('product.for_sale')<span>{{date('Y-m-d',strtotime($product->created_at))}}</span></li>
                                        <li>@lang('product.category')<span>{{$product->category->title}}</span></li>
                                        <li>@lang('product.rating')<span>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </span></li>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product-details-area-end -->
    </main>
    <!-- main-area-end -->
@endsection
