@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenue vous avez étés connectés :D 
<br><br>
                    <a name="" id="" class="btn btn-success" href="#" role="button">Aller à la To-Do List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
