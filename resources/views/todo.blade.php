@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Todo home page</h1>
    <br>
    
    <p>New task</p>
      <form action="" method="post">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Radio button for following text input">
                    </div>
                </div>
                <input type="text" class="form-control" value="" aria-label="Text input with radio button">
            </div>
            <br>
        </form>
<br>
        @foreach ($tasks as $task)
        <form action="" method="post">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" aria-label="Radio button for following text input">
                    </div>
                </div>
                <input type="text" class="form-control" value="{{ $task->task_value }}" aria-label="Text input with radio button">
            </div>
            <br>
        </form>
        @endforeach
    
</div>
@endsection
