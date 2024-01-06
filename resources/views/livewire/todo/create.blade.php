<form wire:submit.prevent="store">

    <div class="mb-3">
        <label for="" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" wire:model.live="title">
        @error('title')
            <span class="text text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Description</label>
        <input type="text" name="dscription" id="dscription" class="form-control" wire:model.blur="description">
        @error('description')
            <span class="text text-danger">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <br>
    <div wire:loading.inline>
        loading...
      </div>
</form>
