@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')

<div class="show">
    <p class="hierarchy-page"><span>商品一覧</span>&nbsp;&gt;&nbsp;{{ $product->name }}</p>
    <div class="show-inner">
        <form class="update-form" action="/products/{{ $product->id }}/update" method="post">
            @csrf
            <div class="update-form__flexbox">
                <div class="update-form__column">
                    <div class="update-form__card-img">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    </div>
                    <input type="file" name="image">
                </div>
                <div class="update-form__column">
                    <div class="update-form__row">
                        <label class="update-form__row-label" for="name">商品名</label>
                        <input class="update-form__row-text" type="text" id="name" name="name" value="{{ $product->name }}" placeholder="商品名を入力">
                    </div>
                    <div class="update-form__row">
                        <label class="update-form__row-label" for="price">値段</label>
                        <input class="update-form__row-text" type="text" id="price" name="price" value="{{ $product->price }}" placeholder="値段を入力">
                    </div>
                    <div class="update-form__row">
                        <p>季節</p>
                        <div class="update-form__seasons">
                            @foreach ($seasons as $season)
                            <div class="update-form__season">
                                @if ($product_seasons->contains('id', $season->id))
                                <input class="update-form__season-checkbox" type="checkbox" name="season[]" id="{{ $season->id }}" value="{{ $season->id }}" checked>
                                @else
                                <input class="update-form__season-checkbox" type="checkbox" name="season[]" id="{{ $season->id }}" value="{{ $season->id }}">
                                @endif
                                <label class="update-form__season-label" for="{{ $season->id }}">{{ $season->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="update-form__description">
                <label class="update-form__description-label" for="description">商品説明</label>
                <textarea class="update-form__description-textarea" id="description" name="description" placeholder="商品の説明を入力">{{ $product->description }}</textarea>
            </div>
            <div class="update-form__action">
                <div class="update-form__button-inner">
                    <button class="update-form__button--back button" name="back" value="back">戻る</button>
                    <button class="update-form__button button">変更を保存</button>
                </div>
                <div class="delete-form__action">
                    <a href="/products/{{ $product->id }}/delete"></a>
                    <img src="{{ asset('storage/TiTrash.png') }}" alt="ゴミ箱ボタン">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection