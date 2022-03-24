<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class Students extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $phone;

    public function resetInputFields()
    {
        $this->firstname = '';
        $this->lastname = '';
        $this->email = '';
        $this->phone = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        Student::create($validatedDate);
        //セッションのフラッシュデータにメッセージを渡す
        session()->flash('message','Student Created Successfully!');
        $this->resetInputFields();
        $this->emit('studentAdded');
    }

    public function render()
    {
        $students = Student::orderBy('id','DESC')->get();
        return view('livewire.students',
            ['students' => $students]);
    }
}
