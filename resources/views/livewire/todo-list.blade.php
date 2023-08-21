<div class="flex pt-3 justify-center" xmlns:wire="http://www.w3.org/1999/xhtml">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div>
        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white" type="text" wire:model="task" wire:keydown.enter="addTodo" placeholder="add todo">
        <br/>
        @forelse($todos as $todo)
            <div class="mb-3">
                @if ($todo->status == 'open')
                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" id="markAsDone" wire:change="markAsDone({{$todo->id}})">
                @endif
                <label for="markAsDone" style="{{($todo->status == 'done' ? 'text-decoration: line-through' : '')}}">{{ $todo->task }}</label>
                @if ($todo->status == 'done')
                    <button wire:click="delete({{$todo->id}})">
                        <img class="flex" style="max-width: 15px" src="{{asset('img/delete.svg')}}" alt="Delete task"/>
                    </button>
                @endif
            </div>
        @empty
            No Todos here!
        @endforelse


    </div>
</div>
