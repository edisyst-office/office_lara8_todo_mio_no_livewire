@extends('todos.layout')

@section('content')
    <div class="container text-center">
        <h1>Titolo: {{$todo->title}}</h1>


        <div class="py-2 px-2">
            <p class="py-2 px-2 border rounded"><strong>Descrizione:</strong> {{$todo->description}}</p>
        </div>

        <div class="py-2 px-2">
            @if($todo->steps->count() > 0)
                <div class="py-2 px-2">
                    <h3>Steps correlati:</h3>
                    @foreach($todo->steps as $step)
                        <p class="py-2 px-2 border rounded">
                            <strong>{{$step->name}}</strong>
                        </p>
                    @endforeach
                </div>
            @endif

        </div>

        <a href="{{route('todo.index')}}" class="m-5 py-2 px-2 btn btn-primary rounded text-white">Torna alla lista</a>
    </div>
@endsection



