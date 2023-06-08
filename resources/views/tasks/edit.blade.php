@extends('layouts.app')
@section('content')
@if(auth()->user()->id == $task->user_id)
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="card">
            <div class="card-header">
                Edit Task
            </div>

            <div class="card-body">
                <form action="{{ route('task.update', $task->id) }}" method="POST" class="form-horizontal">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task</label>

                        <div class="col-sm-9">
                            <textarea type="text" name="name" id="task-name" class="form-control">{{ $task->name }}</textarea>
                        </div>
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <br>
                    @can('update', $task)
                    <div class="form-group">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <a class="btn" href="{{route('task.index')}}">Back</a>
                        </div>
                    </div>
                    @endcan
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
