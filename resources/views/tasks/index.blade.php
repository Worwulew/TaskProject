@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="card border-primary-subtle mb-2">
                <div class="card-header">
                    New Task
                </div>

                <div class="card-body">
                    <form action="{{ route('task.store') }}" method="POST" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-9">
                                <textarea type="text" name="name" id="task-name" class="form-control" placeholder="Enter text here">{{ old('name') }}</textarea>
                            </div>
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if (count($tasks) > 0)
                <div class="card border-dark-subtle mb-1">
                    <div class="card-header">
                        Latest Tasks
                    </div>

                    <div class="card-body">
                        <table class="table table-striped task-table">
                            <thead class="card-title">
                            <th>Tasks</th>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                @can('view', $task)
                                <tr>
                                    <td class="table-text">
                                    <div>
                                    <span class="text-primary">Task :</span>
                                    {{ $task->name }}
                                    </div>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                        @can('update', $task)
                                        <a class="btn btn-secondary" href="{{route('task.edit', $task->id)}}">Edit</a>
                                        @endcan
                                        @can('delete', $task)
                                        <form action="{{route('task.destroy', $task->id)}}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                        </div>
                                        @endcan
                                    </td>
                                </tr>
                                @endcan
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            <div>
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
@endsection
