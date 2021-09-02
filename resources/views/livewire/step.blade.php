<div>
    <div class="py-2 px-2">
        <h3>
            <span>Add steps if required</span>
            <span wire:click="increment" class="fas fa-plus px-2"></span>
        </h3>
    </div>

    @foreach($steps as $step)
        <div class="py-2 px-2" wire:key="{{$step}}">
            <input type="text" name="step[]" class="py-2 px-2 border rounded"
                   placeholder="{{'Describe step '.($step +1)}}" />
            <span wire:click="remove({{$step}})" class="fas fa-minus px-2"></span>
        </div>
    @endforeach

</div>
