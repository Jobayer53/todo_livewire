<div>




<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 ">
            <div class="card mt-5">
                <div class="card-header">
                    <h3> Add Todo </h3>

                </div>
                <div class="card-body">
                @if ($updateMode)
                    @include('livewire.todo.update')
                @else
                    @include('livewire.todo.create')
                @endif
                </div>
            </div>
        </div>
        <div class="col-lg-8 ">
            <div class="card mt-5">
                <div class="card-header">
                    <h3> Todo List</h3>

                </div>
                <div class="card-body">
                    <table class="table table-striped mt-5">
                        <tr>
                            <th>sl</th>
                            <th>Title</th>
                            <th>Descrioption</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($todos as $key => $todo )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $todo->title }}</td>
                                <td>{{ $todo->description }}</td>
                                <td>
                                    <button  wire:click="edit({{ $todo->id }})" class="btn btn-info">Edit</button>
                                    <button  wire:click="delete({{ $todo->id }})" class="btn btn-danger">Delete</button>
                                </td>

                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
