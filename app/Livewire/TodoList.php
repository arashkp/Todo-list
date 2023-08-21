<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodoList extends Component
{
    public $todos;
    public $task = "";
    public function mount()
    {
        $this->fetchTodos();

    }

    public function addTodo(){
        if ($this->task != "") {
            $todo = new Todo();
            $todo->task = $this->task;
            $todo->save();
            $this->task = "";
            $this->fetchTodos();
        }
    }

    public function markAsDone(Todo $todo)
    {
        $todo->status = "done";
        $todo->save();
        $this->fetchTodos();
    }

    public function render()
    {
        return view('livewire.todo-list');
    }

    private function fetchTodos()
    {
        $this->todos = Todo::all()->reverse();
    }

    public function delete(Todo $todo)
    {
        $todo->delete();
        $this->fetchTodos();
    }

}
