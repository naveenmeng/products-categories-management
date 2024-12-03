@extends('layouts.frontend')

@section('content')

<div class="container py-5">
    {{-- Header Section --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-success">Manage Product Categories</h3>
        <div>
            <a href="{{ url('category/create') }}" class="btn btn-primary">+ Add New Category</a>
            <a href="{{ url ('countries')}}" class="category-btn btn btn-info">Countries list</a>
            <a href="{{ url('login') }}" class="btn btn-danger">Log Out</a>
        </div>
    </div>

    {{-- Status Message --}}
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Categories Table --}}
    <div class="card shadow-sm">
        <div class="card-body p-4">
            @if ($categories->isEmpty())
                <div class="alert alert-warning text-center">No categories available. Start by adding a new category!</div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-success">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="fw-bold">{{ $category->name }}</td>
                                    <td class="text-muted">{{ $category->description }}</td>
                                    <td>
                                        <span class="badge rounded-pill {{ $category->status == 1 ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $category->status == 1 ? 'Visible' : 'Hidden' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-outline-success btn-sm me-1">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-outline-info btn-sm me-1">
                                            <i class="bi bi-eye"></i> View
                                        </a>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this category?')">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-4">
                    {{ $categories->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
