<?php

namespace App\Http\Livewire;

use Livewire\Component;

class JavascriptBug extends Component
{

    public $show = false;

    public function render()
    {
        return view('livewire.javascript-bug');
    }

    public function showChart(){
        $this->show = true;
    }
}
