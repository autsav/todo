@extends('layouts.app')

@section('content')

<div class="container">
        <h2 class="text-white">Add New Task</h2>

        <form method="POST" action="/task">
            <div>
                <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                @if ($errors->has('description'))
                    <span>{{ $errors->first('description')}}</span>
                    @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Task</button>
                
            </div>
            {{ csrf_field() }} 
    </form>
</div>

@endsection


