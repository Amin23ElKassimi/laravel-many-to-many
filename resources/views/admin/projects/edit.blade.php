@extends('layouts.admin')

@section('title', 'Creating a new post')

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-7">
                @include('partials.errors')

                <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                    {{-- CSFR serve per prendere e validare il token --}}
                    @csrf  
                    {{-- Methodo da mettere quando si usa il metodo update --}}
                    @method('PUT')

                    <div class="mb-3 input-group">
                        <label for="name" class="input-group-text">Name Project:</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ old('title', $project->name)}}">
                    </div>

                    <div class="mb-3 input-group">
                        <label for="priority" class="input-group-text">Priority:</label>
                        {{-- <input class="form-control" type="text" name="author" id="author" value="{{ old('author') }}"> --}}
                        <select class="form-select" aria-label="Default select example" name="priority" id="priority" value="{{ old('priority', $project->priority)}}" >
                            <option selected>{{ old('priority', $project->priority)}}</option>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>

                    <div class="mb-3 input-group">
                        <label for="budget" class="input-group-text">Budjet:</label>
                        <input class="form-control" type="number" name="budget" id="budget" value="{{ old('budget', $project->budget)}}">
                    </div>

                    <div class="mb-3 input-group">
                        <label for="start_date" class="input-group-text">Start Date:</label>
                        <input class="form-control" type="date" name="start_date" id="start_date" value="{{ old('start_date', $project->start_date)}}">
                    </div>

                    <div class="mb-3 input-group">
                        <label for="end_date" class="input-group-text">End Date:</label>
                        <input class="form-control" type="date" name="end_date" id="end_date" value="{{ old('end_date', $project->end_date)}}">
                    </div>

                    <div class="mb-3 input-group">
                        <label for="view" class="input-group-text">Post image url:</label>
                        <input class="form-control" type="text" name="view" id="view" value="{{ old('view', $project->view)}}">
                    </div>

                    <div class="mb-3 input-group">
                        <label for="description" class="input-group-text">Post content:</label>
                        <textarea class="form-control"  name="description" id="description" cols="30" rows="10">{{ old('description', $project->description)}}</textarea>
                    </div>
                    <div class="mb-3 input-group">
                        <button type="submit" class="btn btn-xl btn-primary">
                            Update new post
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