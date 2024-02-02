<div>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th class="hide-on-mobile">Apellido</th>
                    <th class="hide-on-mobile">Edad</th>
                    <th>Sexo</th>
                    <th>Correo</th>
                    <th>Nacionalidad mas probable</th>
                </tr>
            </thead>
            <input type="hidden" wire:model="persons">
            <tbody>
                @forelse ($persons as $person)
                    <tr>
                        <td data-label="Nombre">{{ $person->name }}</td>
                        <td class="hide-on-mobile" data-label="Apellido">{{ $person->last_name }}</td>
                        <td class="hide-on-mobile" data-label="Edad">{{ $person->age }}</td>
                        <td data-label="Sexo">{{ $person->sex }}</td>
                        <td data-label="Correo">{{ $person->email }}</td>
                        <td data-label="Nacionalidad mas probable">{{ $nacionalidades[$loop->index] }}</td>

                    </tr>
                @empty
                    <tr>
                        <td>No data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
