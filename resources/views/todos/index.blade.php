@extends('todos.layout')

@section('content')
    <div class="container text-center">

        <h1>All TODOS</h1>
        <a href="{{route('todo.create')}}" class="m-2 py-2 px-2 btn btn-primary border rounded text-white">Crea nuovo</a>

        <x-alert></x-alert>
        <hr class="border-white">

        <p>Il controller gli passa la variabile $todos</p>
        <div>

            @forelse($todos as $todo)
                <div class="d-flex justify-content-between my-2">
                    <div class=" d-flex align-self-start my-3">
                        @include('todos.completeButton')
                    </div>
                    <div class="d-flex align-self-center">
                        @if($todo->completed)
                            <del>{{$todo->title}}</del>
                        @else()
                            <span><b>{{$todo->title}}</b></span>
                        @endif
                    </div>
                    <div class="d-flex align-self-end">

                        <a href="{{route('todo.show', $todo->id)}}" class="btn btn-success mr-2">
                            <span class="fas fa-search px-2"></span>
                        </a>

                        <a href="{{route('todo.edit', $todo->id)}}" class="btn btn-warning mr-2">
                            <span class="fas fa-edit px-2"></span>
                        </a>

                        <a href="" class="btn btn-danger">
                            <span class="btn btn-danger fas fa-trash px-2"
                              onclick="event.preventDefault();
                                      if(confirm('Sicuro di voler eliminare il task '+{{$todo->id}}+'?'))
                                      document.getElementById('form-delete-{{$todo->id}}').submit();
                                      "/>
                        </a>
                        <form style="display: none" id="{{'form-delete-'.$todo->id}}"
                              action="{{route('todo.destroy', $todo->id)}}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                    </div>

                </div>
            @empty
                <p class="alert alert-warning">Nessun task visualizzabile al momento</p>
            @endforelse
            </div>

        </div>
    </div>
@endsection



