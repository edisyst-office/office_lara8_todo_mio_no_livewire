@if($todo->completed)
    <span class="fas fa-check px-2 text-dark"
          onclick="event.preventDefault();
          document.getElementById('form-incomplete-{{$todo->id}}').submit();" />
    <form style="display: none" id="{{'form-incomplete-'.$todo->id}}"
          action="{{route('todo.incomplete', $todo->id)}}" method="post">
        @csrf
        @method('delete')
    </form>
@else
    <span class="fas fa-check px-2 text-light"
          onclick="event.preventDefault();
          document.getElementById('form-complete-{{$todo->id}}').submit();" />
    <form style="display: none" id="{{'form-complete-'.$todo->id}}"
          action="{{route('todo.complete', $todo->id)}}" method="post">
        @csrf
        @method('put')
    </form>
@endif