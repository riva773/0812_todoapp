@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__alert">
    <div class="todo__alert-success">
        <p>Todoを作成しました</p>
    </div>
</div>
<div class="form">
    <div class="todo__form">
        <form action="" method="post">
            @csrf
            <input class="form__input" type="text" name="" id="">
            <button type="submit" class="form__create-btn">作成</button>
        </form>
    </div>

    <div class="todo">
        <h2 class="todo__text">Todo</h2>
        <div class="todo__list">
            <div class="todo__box">
                <p class="todo__name">test</p>
                <div class="todo__actions">
                    <div class="update">
                        <form action="" method="post">
                            @csrf
                            <button type="submit" class="update__btn">
                                更新
                            </button>
                        </form>
                    </div>
                    <div class="delete">
                        <form action="" method="post">
                            @csrf
                            <button type="submit" class="delete__btn">
                                削除
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="todo__box">
                <p class="todo__name">test</p>
                <div class="todo__actions">
                    <div class="update">
                        <form action="" method="post">
                            @csrf
                            <button type="submit" class="update__btn">
                                更新
                            </button>
                        </form>
                    </div>
                    <div class="delete">
                        <form action="" method="post">
                            @csrf
                            <button type="submit" class="delete__btn">
                                削除
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection