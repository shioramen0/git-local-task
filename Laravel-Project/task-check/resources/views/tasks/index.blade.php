@extends('adminlte::page')

@section('title', '目標一覧')

@section('content_header')
    <h1>目標一覧</h1>
@stop

@section('content')
    {{--完了メッセージ --}}
    @if (session('message'))
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                ×
            </button>
            {{ session('message') }}
        </div>
    @endif

    {{-- 新規登録画面へ --}}
    <a class="btn btn-primary mb-2" href="{{ route('tasks.create') }}" role="button">新規登録</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>項目数</th>
                        <th>目標名</th>
                        <th>達成度</th>
                        <th style="width: 70px"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{number_format($task->number)}}</td>
                            <td>{{ $task->name }}</td>
                            {{-- 数字フォーマット --}}
                            <td>{{number_format($task->percentage)}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm mb-2" href="{{ route('tasks.edit', $task->id) }}"
                                    role="button">編集</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}"method="post">
                                    @csrf
                                    @method('DELETE')
                                    {{-- 簡易的に確認メッセージを表示 --}}
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('削除してもよろしいですか?');">
                                        削除
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop 