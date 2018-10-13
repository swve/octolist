@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Todo home page</h1>
    

   
    <form action="{{ route('todoStore') }}" method="post">
        @csrf
        <div class="form-group">
            <label for=""></label>
            <input type="text" class="form-control" name="task_value" id="" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Just enter to add a new task</small>
        </div>
    </form>
    <br>
    @foreach ($tasks as $task)

   @if($task->task_status==="checked")
   <div class="input-group" style="opacity: 0.5;">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input class="todoBtn" type="checkbox" value="{{ $task->id }}" {{ $task->task_status }}  aria-label="Radio button for following text input">
               
                <input class="todoCSRF" type="hidden" id="csrf" name="csrf" value="{{ csrf_token() }}">
            </div>
        </div>
        <input type="text" class="form-control" value="{{ $task->task_value }}" aria-label="">
        
        <form action="todo/destroy/{{ $task->id }}" method="post">
        @csrf
        <button type="submit"  name="" value="{{ $task->id }}" class="btn btn-danger deleteBtn">Supprimer</button>
        </form>
    </div>
    <br>
@else
<div class="input-group" >
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input class="todoBtn" type="checkbox" value="{{ $task->id }}" {{ $task->task_status }}  aria-label="Radio button for following text input">
                <input type="hidden" id="csrf" name="csrf" value="{{ csrf_token() }}">
            </div>
        </div>
        <input type="text" class="form-control" value="{{ $task->task_value }}" aria-label="">
        <form action="todo/destroy/{{ $task->id }}" method="post">
        @csrf
        <button type="submit"  name="" value="{{ $task->id }}" class="btn btn-danger deleteBtn">Supprimer</button>
        </form>
    </div>
    <br>


    @endif


   

    @endforeach
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script>
        $(document).ready(function () {

            $(".todoBtn").on("click", function () {

                todoID = $(this).val();
                if($(this)[0].checked==true ){
                    checkStatus="checked";
                    $(this).closest('.input-group').css('opacity','0.5');
                    iziToast.success({
                        title: 'Checked',
                        message: 'Vous avez checké cet item ' + todoID 
                    });
                }
                else{
                    checkStatus="unchecked";
                    $(this).closest('.input-group').css('opacity','1');
                    iziToast.error({
                        title: 'Unchecked',
                        message: 'Vous avez unchecké cet item ' + todoID 
                    });
                }
                var CSRF_TOKEN = $(this).closest(".todoCSRF").val();
                
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    method: "POST",
                    url: "todo/update/" + todoID,
                    data: {
                        taskID: todoID ,
                        taskSTAT : checkStatus ,
                        _token: CSRF_TOKEN
                        }
                })
                    
                
                
            });



              $(".btn0").on("click", function () {
                  todoID = $(this).val();
                  $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    method: "POST",
                    url: "todo/destroy/" + todoID,
                    data: {
                        taskID: todoID ,
                        
                        },
                   
                            
                       
                        
                })
                  
              });

        });



    </script>

</div>
@endsection
