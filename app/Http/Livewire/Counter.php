<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Counter extends Component
{
    //変数を指定
    public $count = 10;
    public $message;
    public $users;

    //カウント加算の関数
    public function inc(){
    $this->count++;
    }

    //mount関数
    public function mount(){
        $this->users = User::all();
    }

    //選択されたid以外のユーザーを返す
    public function delUser($id){
        $this->users = $this->users->filter(function ($value, $key) use ($id) {
            return $value['id'] != $id;
        });

        //DBからも削除
        $user = User::find($id);
        $user->delete();

    }



    public function render()
    {
        return view('livewire.counter');
    }


}
