@extends('layouts.admin')

@section('title', 'Creating a new project')

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-7">
                @include('partials.errors')
                
                {{-- @dump($technologies->pluck('name')) --}}

                <form action="{{ route('admin.projects.store') }}" method="POST">
                    @csrf
                    {{-- Name Project: --}}
                    <div class="mb-3 input-group">
                        <label for="name" class="input-group-text">Name Project:</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                    </div>
                    {{-- status: --}}
                    <div class="mb-3 input-group">
                        <label for="status" class="input-group-text">Status:</label>
                        <select class="form-select" aria-label="Default select example" name="status" id="status" value="{{ old('status') }}" >
                            <option selected>Select Status</option>
                            <option value="off">Off</option>
                            <option value="blocked">Blocked</option>
                            <option value="hold">Hold</option>
                            <option value="ready">Ready</option>
                            <option value="done">Done</option>
                        </select>
                    </div>
                    {{-- Type: --}}
                    <div class="mb-3 input-group">
                        <label for="status" class="input-group-text">Type:</label>
                        <select class="form-select" type="text" name="type_id" id="type_id" >
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}"
                                    style="color: {{ $type->color }}"
                                    {{ $type->id == old('type_id', $type->type_id) ? 'selected' : '' }}>
                                        {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Technologies --}}
                    <div class="mb-3 input-group">
                        <div>
                            @foreach ($technologies as $technology)
                                <input class="form-check-input" type="checkbox" name="technologies[]" id="{{ $technology->id }}" value="{{ $technology->id }}"
                                {{-- ? se il tag su cui sto ciclando e' presente nei tag che ho inviato e ora voglio rivedere come errore, selezionalo, se invece non ho avuto alcun errore, cercalo all'interno della lista dei tag presenti nel mio project --}}
                                >
                                <label for="technologies"> {{ $technology->name }}</label>
                            @endforeach
                        </div>
                    </div>
                    {{-- ID_client --}}
                    <div class="mb-3 input-group">
                        <label for="ID_client" class="input-group-text">ID Client</label>
                        <input class="form-control" type="number" name="ID_client" id="ID_client" value="{{ old('ID_client') }}">
                    </div>
                    {{-- Budget --}}
                    <div class="mb-3 input-group">
                        <label for="budget" class="input-group-text">Budget:</label>
                        <input class="form-control" type="number" name="budget" id="budget" value="{{ old('budget') }}">
                    </div>
                    {{-- Start Date: --}}
                    <div class="mb-3 input-group">
                        <label for="start_date" class="input-group-text">Start Date:</label>
                        <input class="form-control" type="date" name="start_date" id="start_date" value="{{ old('start_date') }}">
                    </div>
                    {{-- End Date: --}}
                    <div class="mb-3 input-group">
                        <label for="end_date" class="input-group-text">End Date:</label>
                        <input class="form-control" type="date" name="end_date" id="end_date" value="{{ old('end_date') }}">
                    </div>
                    {{-- project image url: --}}
                    <div class="mb-3 input-group">
                        <label for="view" class="input-group-text">project image url:</label>
                        <input class="form-control" type="text" name="view" id="view" value="{{ old('view') }}">
                    </div>

                    <div class="mb-3 input-group">
                        <label for="description" class="input-group-text">project content:</label>
                        <textarea class="form-control"  name="description" id="description" cols="30" rows="10">{{ old('description')  }}</textarea>
                    </div>
                    <div class="mb-3 input-group">
                        <button type="submit" class="btn btn-xl btn-primary">
                            Create new project
                        </button>
                        <button type="reset" class="btn btn-xl btn-warning">
                            Reset all fields
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection