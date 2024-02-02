@extends('layouts.app')

@section('title', 'Examen')

@section('content')
 <livewire:form />

 <div class="grid-container">
    <div class="table-container">
        <livewire:person-table />
    </div>
    <div class="variables-container">
        <livewire:additional-info />
    </div>
  </div>
@endsection
