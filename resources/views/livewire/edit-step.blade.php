<div>
    @if($steps->count())
        <h3>Elenco Step</h3>
        @foreach($steps as $step)
            <div class="py-2 px-2" wire:key="{{$step}}">
                <input type="text" name="stepName[]" class=" MODIFICA py-2 px-2 border rounded"
                       value="{{$step->name}}" />
                <input type="hidden" name="stepId[]" value="{{$step['id']}}" />
                <span wire:click="remove({{$loop->index}})" class="fas fa-minus px-2"></span>
            </div>
        @endforeach
    @endif
</div>
