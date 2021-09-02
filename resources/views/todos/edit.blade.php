@extends('todos.layout')

@section('content')
    <div class="container text-center">
        <h1>Edit</h1>
        <h3>{{$todo->title}}</h3>

        <x-alert></x-alert>

        <form action="{{route('todo.update', ['todo' => $todo->id ])}}" method="post" class="py-2">
            @csrf
            @method('patch')
            <div class="py-2 px-2">
                <input type="text" name="title" class="py-2 px-2 border rounded" value="{{$todo->title}}">
            </div>
            <div class="py-2 px-2">
                <textarea name="description" rows="4" cols="40" class="py-2 px-2 border rounded">{{$todo->description}}</textarea>
            </div>

            <div class="py-2 px-2">
                {{--<livewire:edit-step :steps="$todo->steps"/>--}}
                @livewire('edit-step', ['steps' => $todo->steps])
                @livewire('add-step',  ['todo' => $todo->id])
                {{--<livewire:add-step />--}}
            </div>

            <input type="submit" value="Update" class="py-2 px-2 border rounded" />
        </form>

        <a href="{{route('todo.index')}}" class="m-5 py-2 px-2 btn btn-primary rounded text-white">Torna alla lista</a>
    </div>
@endsection



