<div>


@include('livewire.todo.modal')

<div class="container-fluid">
    <div class="row">

        <div class="col-lg-8 m-auto">
            <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#createModal">
                Create Todo
              </button>
            <div class="card mt-1">
                <div class="card-header">
                    <h3> Todo List</h3>

                </div>
                <div class="card-body">
                    <table class="table table-striped ">
                        <tr>
                            <th>sl</th>
                            <th>Title</th>
                            <th>Descrioption</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($todos as $key => $todo )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $todo->title }}</td>
                                <td>{{ $todo->description }}</td>
                                <td>
                                    <img style="width: 60px; height:60px;" src="{{ asset('uploads/image') }}/{{ $todo->image }}" alt="">
                                </td>
                                <td>
                                    <button  wire:click="edit({{ $todo->id }})" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updateModal">Edit</button>
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
