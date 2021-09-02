<?php

namespace App\Http\Controllers;

use App\Models\Step;
use App\Http\Requests\TodoCreateRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index(){
        if (auth()->user()){
            $todos = auth()->user()->todos->sortBy('completed');
            return view('todos.index', compact('todos'));
        }
        //user_id=0 significa che il TODO è pubblico, leggibile da tutti
        $todos = Todo::where('user_id','=','0')->orderBy('completed')->get();
        return view('todos.index')->with(['todos' => $todos]);

    }

    public function create(){
        return view('todos.create');
    }

    public function show(Todo $todo){
//        $todo = Todo::find($id);
        return view('todos.show')->with(['todo' => $todo]);
    }
    public function edit(Todo $todo){
        return view('todos.edit', compact('todo'));
    }

    public function store(TodoCreateRequest $request){

//        $request->validate([
//            'title' => 'required|max:255',
//        ]); //SE VALIDATE FALLISCE, ESCE DA QUESTA FUNZIONE

//        $rules = [
//            'title' => 'required|max:255',
//        ];
//        $messages = [
//            'title.required' => 'Devi inserire un titolo',
//            'title.max' => 'Non oltre i 255 caratteri',
//        ];
//        $validator = Validator::make($request->all(), $rules, $messages);
//        if ($validator->fails()) {
//            return redirect()->back()
//                ->withErrors($validator)
//                ->withInput();
//        }

//        dd(auth()->user()->todos());
//        Todo::create($request->all());

        $todo = auth()->user()->todos()->create($request->all());

        if ($request->step){
            foreach ($request->step as $step){
                if ($step){
                    $todo->steps()->create(['name' => $step]);
                }
            }
        }
        return redirect(route('todo.index'))->with('message', 'Todo created!');
    }


    public function update(TodoCreateRequest $request, Todo $todo)
    {
        //Aggiorno titolo e descrizione
        $todo->update([
            'title' => $request->title,
            'description' => $request->description
        ]);
        //Aggiorno step già esistenti
        if ($request->stepName){
            foreach ($request->stepName as $key => $value){
                $id = $request->stepId[$key];
                if ($value){
                    if (!$id){
                        Step::create(['name' => $value]);
                    } else {
                        $step = Step::find($id);
                        $step->update(['name' => $value]);
                    }
                }

            }
        }
        //Aggiungo nuovi step
        if ($request->addStepName){
            foreach ($request->addStepName as $key => $value){
                if ($value){
                    Step::create([
                        'name' => $value,
                        'todo_id' => $todo->id,
                    ]);
                }
            }
        }
        return redirect()->back()->with('message', "Updated!");
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', "Task ".$todo->title." completed!!!");
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', "Task ".$todo->title." NOT completed!!!");
    }

    public function destroy(Todo $todo)
    {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message', "Task ".$todo->title." DELETED!!!");
    }

}
