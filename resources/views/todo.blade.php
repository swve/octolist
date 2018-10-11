@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Todo home page</h1>
   <br>
   

   @foreach ($tasks as $task)
         <p> {{ $task->task_value }}</p>
    @endforeach

</div>
@endsection
