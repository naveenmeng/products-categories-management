@extends('layouts.frontend')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Add Category</h4>
                    <a href="{{ url('category') }}" class="btn btn-outline-light btn-sm">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf

                        {{-- Name Input --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter category name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Description Input --}}
                        <div class="mb-3">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter category description"></textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Status Checkbox --}}
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="status" name="status" checked>
                            <label class="form-check-label" for="status">Visible</label>
                            <small class="text-muted d-block">Checked = Visible, Unchecked = Hidden</small>
                        </div>
                        @error('status')
                            <small class="text-danger d-block">{{ $message }}</small>
                        @enderror

                        {{-- Submit Button --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
