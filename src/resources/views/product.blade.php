@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('content')

<div class="products-content">
    <div class="products-utilities">
        <div class="products-heading">
            <h2>商品一覧</h2>
        </div>
        <div class="register-button">
            <button class="register-button-submit" type="submit" onclick="location.href='/products/register'">+商品を追加</button>
        </div>
    </div>
    <form class="search-form" action="/products/search" method="get">
        @csrf
        <div class="search-form-item">
            <input class="search-form-item-input" type="text" name="keyword" placeholder="商品名で検索" value="{{ old('keyword') }}">
            <div class="search-form-button">
                <button class="search-form-button-submit" type="submit">検索</button>
            </div>
            <div class="search-category-heading">
                <p>価格順で表示</p>
            </div>
            <select class="search-form-item-select" name="">
                <option value="">カテゴリ</option>
            </select>
        </div>
    </form>
    <form class="products-form" action="/products/{productld}" method="post">
        @csrf
        @foreach ($contents as $content)
        <div class="products-card">
            <div class="card-image">
                <a href="/products/{productld}">
                    <img src="{{ \Storage::url($content->image) }}" alt="画像">
                </a>
            </div>
            <div class="card-content">
                <p class="card-content--item">{{ $content['name'] }}</p>
                <p class="card-content--item">￥{{ $content['price']}}</p>
            </div>
        </div>
        @endforeach
        {{ $contents->links() }}
    </form>
</div>

@endsection