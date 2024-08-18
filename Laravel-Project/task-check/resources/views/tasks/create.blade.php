@extends('adminlte::page')

@section('title', '目標登録')

@section('content_header')
    <h1>目標登録</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible">
            {{-- エラーの表示 --}}
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- 登録画面 --}}
    <div class="card">
        <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <div class="card-body">
            {{-- 項目数入力 --}}
            <div class="form-group">
               <label for="tasknumber">項目数</label>
               <input type="text" class="form-control" id="tasknumber" name="tasknumber" value="{{ old('tasknumber') }}"
               placeholder="項目数" />
            </div>
             {{-- 目標入力 --}}
            <div class="form-group">
               <label for="taskname">目標名</label>
               <input type="text" class="form-control" id="taskname" name="taskname" value="{{ old('taskname') }}"
               placeholder="目標" />
            </div>
            {{-- 達成度入力 --}}
            <div class="form-group">
               <label for="percentage">達成度</label>
               <input type="text" class="form-control" id="percentage" name="percentage" value="{{ old('percentage') }}"
               placeholder="達成度" />
            </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <a class="btn btn-default" href="{{ route('tasks.index') }}" role="button">戻る</a>
                <div class="ml-auto">
                    <button type="submit" class="btn btn-primary">登録</button>
                </div>
            </div>
        </div>
        </form>
    </div>
@stop