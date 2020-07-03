<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label for="task_name" class="col-md-3 col-form-label">Tasks Name</label>
            <div class="col-md-9">
                <input type="text" name="task_name" value="{{ old('task_name', $tasks->task_name) }}" id="task_name" class="form-control @error('task_name') is-invalid @enderror">
                @error('task_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="assignt_to" class="col-md-3 col-form-label">Assigned To</label>
            <div class="col-md-9">
                <select name="assignt_to" id="assignt_to" class="form-control  @error('assignt_to') is-invalid @enderror">
                    <option value="">Select Developer</option>
                    @foreach ($users as $id => $user )
                        <option {{ $id === old('name', $user->name) ? 'selected' : '' }}value="{{ $id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('assignt_to')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-3 col-form-label">Description</label>
            <div class="col-md-9">
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $tasks->description) }}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <hr>
        <div class="form-group row mb-0">
            <div class="col-md-9 offset-md-3">
                <button type="submit" class="btn btn-primary">{{ $tasks->exists ? 'Update' : 'Save' }}</button>
                <a href="{{ route('tasks.task') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>
