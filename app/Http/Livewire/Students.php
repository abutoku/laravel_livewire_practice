<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class Students extends Component
{
    public $ids ;
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

    public function edit($id)
    {
        $student = Student::where('id',$id)->first();
        $this->ids = $student->id;
        $this->firstname = $student->firstname;
        $this->lastname = $student->lastname;
        $this->email = $student->email;
        $this->phone = $student->phone;
    }

    public function update()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        if($this->ids)
        {
            $student = Student::find($this->ids);
            $student->update([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'phone' => $this->phone,
            ]);

            session()->flash('message','Student updated Successfully!');
            $this->resetInputFields();
            $this->emit('studentUpdated');
        }
    }

    public function delete($id)
    {
        if($id)
        {
            Student::where('id',$id)->delete();
            session()->flash('message','Student Deleted Successfully!');
        }
    }

    public function render()
    {
        $students = Student::orderBy('id','DESC')->get();
        return view('livewire.students',
            ['students' => $students]);
    }
}
