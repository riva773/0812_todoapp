@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title','Todo一覧')

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
        <h1>新規作成</h1>
        <form action="/todos" method="post">
            @csrf
            <input class="form__input" type="text" name="content" value="{{ old('content') }}">
            <select name="category_id" id="category_id" class="category__input">
                <option value="0" {{ old('category_id', '0') == '0' ? 'selected' : '' }}>カテゴリ</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                </option>
                @endforeach
            </select>
            <button type="submit" class="form__create-btn">作成</button>
        </form>
    </div>

    <div class="search__form">
        <h1>Todo検索</h1>
        <form action="/todos/search" method="GET">
            @csrf
            <input class="form__input" type="text" name="content" value="{{ $q ?? '' }}">
            <select name="category_id" id="category_id" class="category__input">
                <option value="0">カテゴリ</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}
                </option>
                @endforeach
            </select>
            <button type="submit" class="form__create-btn">検索</button>
        </form>
    </div>


    <div class="todo">
        <div class="todo__head">
            <h2 class="todo__text">Todo</h2>
            <h2 class="category__text">カテゴリ</h2>
        </div>
        <div class="todo__list">
            @foreach($todos as $todo)
            <div class="todo__box">
                <div class="todo__name">
                    <input type="text"
                        class="content__form" name="content" id="content"
                        value="{{ $todo->content }}" form="{{ $todo->id }}update__form">
                </div>
                <div class="category__name">
                    <p class="category__form">{{ $todo->category->name }}</p>
                </div>
                <div class="btn">
                    <div class="update">
                        <form action="/todos/update" method="post" class="update__form" id="{{$todo->id}}update__form">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" , value="{{ $todo->id }}">
                            <button type="submit" class="update__btn">
                                更新
                            </button>
                        </form>
                    </div>
                    <div class="delete">
                        <form action="/todos/delete" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $todo->id }}">
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