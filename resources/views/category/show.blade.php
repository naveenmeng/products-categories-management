@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Category Details</h4>
                    <a href="{{ url('category') }}" class="btn btn-outline-light btn-sm">Back</a>
                </div>
                <div class="card-body">
                    {{-- Category Name --}}
                    <div class="mb-4">
                        <h5 class="fw-bold">Name</h5>
                        <p class="text-muted">{{ $category->name }}</p>
                    </div>

                    {{-- Category Description --}}
                    <div class="mb-4">
                        <h5 class="fw-bold">Description</h5>
                        <p class="text-muted">{!! $category->description !!}</p>
                    </div>

                    {{-- Category Status --}}
                    <div>
                        <h5 class="fw-bold">Status</h5>
                        <span class="badge {{ $category->status == 1 ? 'bg-success' : 'bg-secondary' }}">
                            {{ $category->status == 1 ? 'Visible' : 'Hidden' }}
                        </span>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">
                        Edit Category
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
