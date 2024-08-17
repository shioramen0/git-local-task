@extends('adminlte::page')

@section('title', 'タスク編集')

@section('content_header')
  <h1>タスク編集</h1>
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

  {{-- 編集画面 --}}
  <div class="card">
    <form action="{{ route('task.update', $task->id) }}" method="post">
      @csrf
      @method('PUT')
      <div class="card-body">
        {{-- 目標名入力 --}}
        <div class="form-group">
          <label for="taskname">目標名</label>
            <input type="text" class="form-control" id="taskname" name="taskname"
             value="{{ old('taskname', $task->taskname) }}" placeholder="目標名" />
        </div>
        {{-- 達成度入力 --}}
        <div class="form-group">
          <label for="percentage">達成度</label>
            <input type="text" class="form-control" id="percentage" name="percentage"
             value="{{ old('percentage', $task->percentage) }}" placeholder="達成度" />
        </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <a class="btn btn-default" href="{{ route('task.index') }}" role="button">戻る</a>
          <div class="ml-auto">
            <button type="submit" class="btn btn-primary">編集</button>
          </div>
        </div>
      </div>
    </form>
  </div>
@stop