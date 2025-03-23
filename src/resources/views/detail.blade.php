@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')

<div class="detail-content">
    <form action="/products" enctype="multipart/form-data" method="post">
        @csrf
        <div class="detail-image">
            <div class="detail-image--item">
                <img src="" alt="画像">
            </div>
            <input type="file" name="image" placeholder="ファイルを選択" value="{{ old('image') }}" />
        </div>
        <div class="form-group">
            <div class="form-group-title">
                <p class="form-label">商品名</p>
            </div>
            <div class="form-group-content">
                <div class="form-input--text">
                    <input type="text" name="name" placeholder="商品名を入力" value="">
                </div>
                <div class="form-error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group-title">
                <p class="form-label">値段</p>
            </div>
            <div class="form-group-content">
                <div class="form-input--text">
                    <input type="text" name="price" placeholder="値段を入力" value="">
                </div>
                <div class="form-error">
                    @error('price')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group-title">
                <p class="form-label">季節</p>
            </div>
            <div class="form-group-content">
                <div class="form-input-check">
                    @foreach ($seasons as $season)
                    <label><input type="checkbox" name="season" value="{{ $season['id'] }}">{{ $season['name'] }}</label>
                    @endforeach
                </div>
                <div class="form-error">
                    @error('season')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group-title">
                <p class="form-label">商品説明</p>
            </div>
            <div class="form-group-content">
                <div class="form-input--text">
                    <textarea name="description" placeholder="商品の説明を入力する"></textarea>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection