<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Validate;
use Livewire\Component;


class Todos extends Component
{
//variables
    public $todos, $todo_id;
    public $updateMode = false;

//validate title
    #[Validate('required',as:'tutul',message:'title den bbhai')]
    #[Validate('min:3',message:'3 tar beshi den bhaii')]
    public $title;
//validate description
    #[Validate('required',message:'likha likhi koren')]
    #[Validate('min:20',message:'aro likhen bhai.')]
    public $description;


    public function render()
    {
        $this->todos = Todo::all();
        return view('livewire.todo.todos');
    }

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
            });
        });
    }
   public function store(){
        $this->validate();
        Todo::create([
            'title'=> $this->title,
            'description'=> $this->description,
        ]);

        session()->flash('message','dhukseeeee');
        $this->reset();


    }


//edit
    public function edit($id){
        $todo = Todo::find($id);
        $this->todo_id =$todo->id;
        $this->title = $todo->title;
        $this->description = $todo->description;
        $this->updateMode =true;


    }
//update
    public function update(){
      $this->validate();
        // $todo_data = Todo::find($this->todo_id);
        // $todo_data->update([
        //     'title' => $this->title,
        //     'description' => $this->description,
        // ]);
        Todo::where('id',$this->todo_id)->update([
            'title'=> $this->title,
            'description'=> $this->description,
        ]);
        $this->updateMode = false;
        $this->reset();

    }
//cancel
    public function cancel(){
        $this->updateMode = false;
        $this->reset();
    }
//delete
    public function delete($id){
       $todo= Todo::find($id)->delete();

    }

}
