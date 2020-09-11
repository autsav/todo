@extends('layouts.app')


@section('content')
<div class="container">
<h1 class="text-white">Edit the Task</h1>

<form method="POST" action="/task/{{ $task->id }}">
<div class="form-group">
    <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ $task->description }}</textarea>
    @if ($errors->has('description'))
                    <span>{{ $errors->first('description')}}</span>
                    @endif
</div>

<div class="form-group">
    <button type="submit" name="update" class="btn btn-primary">Update task</button>
</div>
{{ csrf_field() }}
</form>
</div>

@stop
