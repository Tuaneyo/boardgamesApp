@extends('layouts.app')
@section('content')
    <h1>Create project</h1>
    <form method="POST" action="create">
        {{ csrf_field() }}
        <div>
            <input type="text" name="name" />
        </div>
        <div>
            <input type="text" name="description" />
        </div>
        <div>
            <button type="submit">Verzenden</button>
        </div>
    </form>

@endsection;