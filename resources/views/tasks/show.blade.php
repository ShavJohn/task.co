@extends('layouts.main')

@section('title', 'Tasks | Show Task')

@section('content')
    <main class="py-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-title">
                            <strong>Task Details</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="first_name" class="col-md-3 col-form-label">Task Name</label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext text-muted">{{ $tasks->task_name }}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-md-3 col-form-label">Created By</label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext text-muted">{{ $tasks->createdBy->name}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-3 col-form-label">Assignt To</label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext text-muted">{{$tasks->assignetTo->name}}</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-3 col-form-label">Status</label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext text-muted">{{ $tasks->status }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="company_id" class="col-md-3 col-form-label">Description</label>
                                        <div class="col-md-9">
                                            <p class="form-control-plaintext text-muted">{{ $tasks->description }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-9 offset-md-3">
                                            <a href="{{ route('tasks.edit', $tasks->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('tasks.task') }}" class="btn btn-outline-secondary">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
