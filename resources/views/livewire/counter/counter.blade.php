

    <div style="text-align: center">
        <button
        wire:keydown.space="increment"
        wire:keydown.enter="increment"
        >+</button>
        <h1>{{ $count }}</h1>
    </div>
