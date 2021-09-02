@extends('todos.layout')

@section('content')
    <div class="container text-center">
        <h1>Che compito devi fare?</h1>
        <x-alert></x-alert>

        <form action="{{route('todo.store')}}" method="post">
            @csrf
            <div class="py-2 px-2">
                <input type="text" name="title" class="py-2 px-2 border rounded" placeholder="Title">
            </div>
            <div class="py-2 px-2">
                <textarea name="description" rows="4" cols="40" class="py-2 px-2 border rounded" placeholder="Description"></textarea>
            </div>

            <div class="py-2 px-2">
                <livewire:step />
            </div>

            <input type="submit" value="Create" class="py-2 px-2 rounded btn-primary">
        </form>

        <a href="{{route('todo.index')}}" class="m-2 py-2 px-2 btn btn-outline-secondary rounded text-white">Torna alla lista</a>
    </div>
@endsection




