<?php

namespace App\Livewire;

use App\Http\Requests\PersonRequest;
use App\Models\Person;
use Livewire\Component;

class Form extends Component
{
    public $name;
    public $last_name;
    public $age;
    public $sex;
    public $email;



    public function store()
    {
        $this->dispatch('personAdded');
        // Guardar los datos en el modelo Person
        $person = new Person();
        $person->name = $this->name;
        $person->last_name = $this->last_name;
        $person->age = $this->age;
        $person->sex = $this->sex;
        $person->email = $this->email;
        $person->save();


        // Restablecer los valores del formulario
        $this->reset(['name', 'last_name', 'age', 'sex', 'email']);
    }

    public function render()
    {
        return view('livewire.form');
    }
}
