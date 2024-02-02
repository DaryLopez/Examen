<?php

namespace App\Livewire;

use App\Models\Person;
use Livewire\Component;

class AdditionalInfo extends Component
{
    public $edad_promedio;
    public $hombres;
    public $mujeres;
    public $persona_menor;
    public $persona_mayor;

    protected $listeners = ['personAdded' => 'updateTable'];

    public function mount()
    {
        $persons = Person::all();
        $this->edad_promedio = Person::avg("age");
        $this->hombres = count(Person::where("sex", "hombre")->get());
        $this->mujeres = count(Person::where("sex", "mujer")->get());
        $persona_menor = Person::whereNotNull('age')->orderBy('age')->first();
        if ($persona_menor) {
            $this->persona_menor = $persona_menor->age;
        }
        else {
            $this->persona_menor = null;
        }
        $persona_mayor = Person::whereNotNull('age')->orderBy('age', 'desc')->first();
        if ($persona_menor) {
            $this->persona_mayor = $persona_mayor->age;
        }
        else {
            $this->persona_mayor = null;
        }

    }
    public function updateTable()
    {
        $this->mount();
    }
    public function render()
    {
        return view('livewire.additional-info');
    }
}
