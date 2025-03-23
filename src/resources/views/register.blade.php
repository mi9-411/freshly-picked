@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')

<div class="register-content">
    <div class="register-heading">
        <h2>商品登録</h2>
    </div>
    <form class="form" action="/products" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group">
            <div class="form-group-title">
                <span class="form-label--item">商品名</span>
                <span class="form-label--required">必須</span>
            </div>
            <div class="form-group-content">
                <div class="form-input--text">
                    <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name') }}" />
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
                <span class="form-label--item">値段</span>
                <span class="form-label--required">必須</span>
            </div>
            <div class="form-group-content">
                <div class="form-input--text">
                    <input type="text" name="price" placeholder="値段を入力" value="{{ old('price') }}" />
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
                <span class="form-label--item">商品画像</span>
                <span class="form-label--required">必須</span>
            </div>
            <div class="form-group-content">
                <div class="form-input--image">
                    <input type="file" name="image" placeholder="ファイルを選択" value="{{ old('image') }}" />
                </div>
                <div class="form-error">
                    @error('image')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group-title">
                <span class="form-label--item">季節</span>
                <span class="form-label--required">必須</span>
                <span class="form-label--supplement">複数選択可</span>
            </div>
            <div class="form-group-content">
                <div class="form-input--check">
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
                <span class="form-label--item">商品説明</span>
                <span class="form-label--required">必須</span>
            </div>
            <div class="form-group-content">
                <div class="form-input--textarea">
                    <textarea name="description" placeholder="商品の説明を入力する">{{ old('description') }}</textarea>
                </div>
                <div class="form-error">
                    @error('description')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-button">
            <button class="form-button-return" type="button" onclick="history.back()">戻る</button>
            <button class="form-button-submit" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection