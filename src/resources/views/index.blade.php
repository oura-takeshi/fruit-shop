@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="index">
    <div class="product-top">
        <h2 class="product-top__heading">商品一覧</h2>
        <div class="product-create">
            <form action="" class="product-create__action">
                <button class="product-create__submit button">+&nbsp;商品を追加</button>
            </form>
        </div>
    </div>
    <div class="product-inner">
        <div class="search-form">
            <form action="" class="search-form__action">
                <input type="text" class="search-form__name-input" placeholder="商品名で検索">
                <button type="submit" class="search-form__submit button">検索</button>
            </form>
        </div>
        <div class="product-intro">
            <div class="product-intro__cards">
                @foreach ($products as $product)
                <div class="product-intro__card">
                    <div class="product-intro__card-img">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    </div>
                    <div class="product-intro__card-content">
                        <p class="product-intro__card-name">{{ $product->name }}</p>
                        <p class="product-intro__card-price">&yen;{{ $product->price }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $products->links() }}
        </div>
    </div>
</div>

@endsection