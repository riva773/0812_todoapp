@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category/index.css') }}">
@endsection

@section('title','カテゴリー一覧')

@section('content')
@if(session('successMessage'))
<div class="todo__alert">
    <div class="todo__alert-success">
        <p>{{ session('successMessage') }}</p>
    </div>
</div>
@endif
@if($errors->any())
<div class="todo__alert">
    @foreach($errors->all() as $error)
    <div class="todo__alert-danger">
        <p>{{ $error }}</p>
    </div>
    @endforeach
</div>
@endif
<div class="form">
    <div class="todo__form">
        <form action="/categories" method="post">
            @csrf
            <input type="text" name="name" class="category__input">
            <button type="submit" class="form__create-btn">作成</button>
        </form>
    </div>

    <div class="todo">
        <h2 class="category__text">category</h2>
        <div class="todo__list">
            @foreach($categories as $category)
            <div class="todo__box">
                <div class="todo__actions">
                    <div class="update">
                        <form action="/categories/update" method="post" class="update__form">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" , value="{{ $category->id }}">
                            <div class="todo__name">
                                <input type="text"
                                    class="content__form" name="name" id="name"
                                    value="{{ $category->name }}">
                            </div>
                            <button type="submit" class="update__btn">
                                更新
                            </button>
                        </form>
                    </div>
                    <div class="delete">
                        <form action="/categories/delete" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <button type="submit" class="delete__btn">
                                削除
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection