
<div>
    <!-- Create Modal -->
    <div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createModal">Create Todo List</h1>
          {{-- loading --}}
          <div wire:loading.inline>
            loading...
          </div>
           {{-- loading --}}
          <button wire:click="closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
                <div class="mb-3">
                    <label for="" class="form-label">Image</label>
                    <input type="file" class="form-control" wire:model="image">
                    @error('image')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                    @if ($image)
                        Preview Image: <br>
                        <img style="width: 100px; height:100px;" src="{{ $image->temporaryUrl() }}" alt="">
                    @endif
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-success">Save</button>
                </div>


            </form>
        </div>

      </div>
    </div>
  </div>

    <!-- Update Modal -->
    <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="updateModal">Update Todo</h1>
              {{-- loading --}}
              <div wire:loading.inline>
                loading...
              </div>
               {{-- loading --}}
              <button wire:click="closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">

                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" wire:model.live="editTitle">
                        @error('editTitle')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <input type="text"  class="form-control" wire:model.blur="editDescription">
                        @error('editDescription')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input type="file" class="form-control" wire:model="editImage">
                        @error('editImage')
                            <span class="text text-danger">{{ $message }}</span>
                        @enderror
                        Old Image:
                        <br>
                        <img style="width: 100px; height:100px;" src="{{asset('uploads/image')}}/{{ $oldImage }}" alt="">
                        <br>
                        @if ($editImage)
                        Preview Image:
                         <br>
                        <img style="width: 100px; height:100px;" src="{{ $editImage->temporaryUrl() }}" alt="">
                    @endif
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-success">Save</button>
                    </div>


                </form>
            </div>

          </div>
        </div>
      </div>







</div>


{{-- <form wire:submit.prevent="store">

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
</form> --}}
