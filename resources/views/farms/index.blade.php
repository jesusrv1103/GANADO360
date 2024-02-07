@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Farms</h1>
    <a href="{{ route('farms.create') }}" class="btn btn-primary mb-3">Add New Farm</a>
    @component('components.table', ['columns' => ['ID', 'Name', 'Location', 'Actions']])
        @foreach($farms as $farm)
            <tr>
                <td>{{ $farm->id }}</td>
                <td>{{ $farm->name }}</td>
                <td>{{ $farm->location }}</td>
                <td>
                    <a href="{{ route('farms.show', $farm) }}" class="btn btn-info">View</a>
                    <a href="{{ route('farms.edit', $farm) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('farms.destroy', $farm) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endcomponent
@endsection
