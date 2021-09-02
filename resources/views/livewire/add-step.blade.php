<div>
    <div class="py-2 px-2">
        <h3>
            <span>Aggiungi step ulteriori</span>
            <span wire:click="increment" class="fas fa-plus px-2"></span>
        </h3>
    </div>

    @foreach($steps as $step)
        <div class="py-2 px-2" wire:key="{{$step}}">
            <input type="text" name="addStepName[]" class="AGGIUNGI py-2 px-2 border rounded"
                   placeholder="{{'Add step '.($step +1)}}" />
            <input type="hidden" name="todo_id" value="{{$todo}}" />
            <span wire:click="remove({{$step}})" class="fas fa-minus px-2"></span>
        </div>
    @endforeach

</div>
