<div>
    <section class="formulario">
        <div class="campo">
            <label for="nombre">Nombre:</label>
            <input type="text" wire:model="name" id="nombre">
        </div>

        <div class="campo">
            <label for="apellido">Apellido:</label>
            <input type="text" wire:model="last_name" id="apellido">
        </div>

        <div class="campo">
            <label for="edad">Edad:</label>
            <input type="text" wire:model="age" id="edad">
        </div>

        <div class="campo">
            <label for="sexo">Sexo:</label>
            <input type="text" wire:model="sex" id="sexo">
        </div>

        <div class="campo">
            <label for="correo">Correo:</label>
            <input type="text" wire:model="email" id="correo">
        </div>

        <button wire:click='store'>Guardar</button>
    </section>
</div>



