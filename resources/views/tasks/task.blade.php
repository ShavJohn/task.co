@extends('layouts.main')

@section('title', 'Task | All TASKS')

@section('content')

    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title">
                            <div class="d-flex align-items-center">
                                <h2 class="mb-0">All Tasks</h2>
                                <div class="ml-auto">
                                    @if($role == 'menager')
                                        <a href="{{ route('tasks.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i>Crate New Task</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('tasks._filter')
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Task Name</th>
                                    <th scope="col">Created by</th>
                                    <th scope="col">Assigned to</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @include('layouts._message')
                                @if ($tasks->count())
                                    @foreach($tasks as $index => $task)
                                        <tr>
                                            <th scope="row">{{ $index + $tasks->firstItem() }}</th>
                                            <td>{{ $task->task_name }}</td>
                                            <td>{{ $task->createdBy->name }}</td>
                                            <td>{{ $task->assignetTo->name }}</td>
                                            <td>
                                                @if($role == 'menager')
                                                    {{ $task->status}}
                                                @else
                                                    @if($task->assignetTo->id == $userid)
                                                    <select name="status" id="status" class="form-control status  @error('status') is-invalid @enderror">
                                                        <option value="{{ $task->status}}">{{ $task->status}}</option>
                                                        <option value="created">Created</option>
                                                        <option value="assigned">Assigned</option>
                                                        <option value="in-progres">In-progress</option>
                                                        <option value="done">Done</option>
                                                    </select>
                                                    @else
                                                        {{ $task->status}}
                                                    @endif
                                                @endif
                                            </td>
                                            <td>{{ $task->description}}</td>
                                            <td width="150">
                                                <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-circle btn-outline-info"
                                                   title="Show"><i class="fa fa-eye"></i></a>
                                                @if($role == 'menager')
                                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-circle btn-outline-secondary"
                                                    title="Edit"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('tasks.destroy', $task->id) }}" class="btn-delete btn btn-sm btn-circle btn-outline-danger"
                                                    title="Delete"><i class="fa fa-times"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    <form id="form-delete" method="POST" style="display: none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endif
                                </tbody>
                            </table>
                            {{ $tasks->appends(request()->only('user_id'))->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
