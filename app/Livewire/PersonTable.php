<?php

namespace App\Livewire;

use App\Models\Person;
use Livewire\Component;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PersonTable extends Component
{
    public $persons;
    public $nacionalidades;
    protected $listeners = ['personAdded' => 'updateTable'];

    public function mount()
    {
        $this->persons = Person::all();
        $this->nacionalidades = $this->obtenerNacionalidadProbable();
    }
    public function updateTable()
    {
        $this->mount();
    }

    public function obtenerNacionalidadProbable()
    {
        $client = new Client();

        $personas = Person::all();

        $nacionalidades = [];

        foreach ($personas as $persona) {

                $response = $client->get('https://api.nationalize.io/?name=' . urlencode($persona->name));

                $data = json_decode($response->getBody(), true);
                // Verificamos si se encontraron resultados
                if (!empty($data['country'])) {
                    $nacionalidadProbable = $data['country'][0]['country_id'];
                    // Agregamos la nacionalidad más probable al arreglo
                    array_push($nacionalidades, $nacionalidadProbable);
                }
            }

        return $nacionalidades;
    }
    public function render()
    {
        return view('livewire.person-table');
    }
}
