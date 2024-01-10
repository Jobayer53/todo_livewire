<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;


class Todos extends Component
{
    use WithFileUploads;
//variables
    public $todos, $todo_id, $editImage, $oldImage;

//validate title
    public $title;
//validate description

    public $description;
//validate image

    public $image;

//validate edit title

    public $editTitle;
//validate description

    public $editDescription;

//custom validate
    public function boot(){
        $this->withValidator(function($validator){
            $validator->after(function($validator){
                if(str($this->title)->startsWith('"')){
                    $validator->errors()->add('title','Quotation codao ka?');
                }
                if(str($this->description)->startsWith('"')){
                    $validator->errors()->add('description','kita? someshha kita?');
                }
                if(str($this->editTitle)->startsWith('"')){
                    $validator->errors()->add('editTitle','Quotation codao ka?');
                }
                if(str($this->editDescription)->startsWith('"')){
                    $validator->errors()->add('editDescription','kita? someshha kita?');
                }
            });
        });
    }

    public function render()
    {
        $this->todos = Todo::all();
        return view('livewire.todo.todos');
    }
   public function store(){
        $this->validate([
            'title'=> 'required| min:3',
            'description' => 'required| min:20',
            'image' => 'required',
        ], [
            'title.required' => 'Title den bhai.',
            'title.min' => 'Kome 3 da lehen.',
            'description.required' => 'Eida lekhbo keda?.',
            'description.min' => 'kome 20 ta lehen',
            'image.required' => 'Sorom pao naki?.',
        ]);

        $extension = $this->image->getClientOriginalExtension();
        $file_name = rand('0','999999').'.'.$extension;
        $this->image->storeAs('uploads/image/', $file_name, 'public');

        Todo::create([
            'title'=> $this->title,
            'description'=> $this->description,
            'image'=> $file_name,
        ]);

        $this->reset();
        $this->dispatch('close-modal');



    }


//edit
    public function edit($id){
        $todo = Todo::find($id);
        $this->todo_id =$todo->id;
        $this->editTitle = $todo->title;
        $this->editDescription = $todo->description;
        $this->oldImage = $todo->image;



    }
//update
    public function update(){
        $this->validate([
            'editTitle'=> 'required| min:3',
            'editDescription' => 'required| min:20',

        ], [
            'editTitle.required' => 'Title den bhai.',
            'editTitle.min' => 'Kome 3 da lehen.',
            'editDescription.required' => 'Eida lekhbo keda?.',
            'editDescription.min' => 'kome 20 ta lehen',

        ]);

        if($this->editImage){
            $todo_data = Todo::where('id' , $this->todo_id)->get();
            $file_path = public_path('uploads/image/'.$todo_data->first()->image);
            unlink($file_path);

            $extension = $this->editImage->getClientOriginalExtension();
            $file_name = rand('0','999999').'.'.$extension;
            $this->editImage->storeAs('uploads/image/', $file_name, 'public');

            Todo::where('id', $this->todo_id)->update([
                'title' => $this->editTitle,
                'description' => $this->editDescription,
                'image' => $file_name,
            ]);
            $this->reset();
            $this->dispatch('close-modal');
        }
        else{

           Todo::where('id', $this->todo_id)->update([
                'title' => $this->editTitle,
                'description' => $this->editDescription,

            ]);
            $this->reset();
            $this->dispatch('close-modal');
        }

    }

//delete
    public function delete($id){
        $todo_data = Todo::where('id' , $id)->get();
        $file_path = public_path('uploads/image/'.$todo_data->first()->image);
        unlink($file_path);
       $todo= Todo::find($id)->delete();
       $this->reset();

    }
    public function closeModal(){
        $this->resetValidation();
        $this->reset();

    }
}
