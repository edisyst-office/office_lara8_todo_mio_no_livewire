<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddStep extends Component
{
    public $steps = [];
    public $todo;

    public function mount($todo)
    {
        $this->$todo = $todo;
    }

    public function increment()
    {
        $this->steps[] = count($this->steps);
    }

    public function remove($index)
    {
        unset($this->steps[$index]);
    }


    public function render()
    {
        return view('livewire.add-step');
    }
}
