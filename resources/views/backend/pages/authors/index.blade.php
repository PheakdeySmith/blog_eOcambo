@extends('backend.layouts.dashboard_master')
@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Author List</h4>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        {{-- <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#createAuthorModal">New Author</button>
                        </div> --}}
                        <div class="input-group" style="width: 300px;">
                            <input type="text" id="searchInput" class="form-control" placeholder="Search...">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Author Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="authorTableBody">
                                @foreach ($authors as $author)
                                    <tr>
                                        <td>{{ $author->id }}</td>
                                        <td>
                                            @if ($author->user && $author->user->image)
                                                <img src="{{ asset('storage/' . $author->user->image) }}" alt="Author Image" style="width: 40px; height: 40px; object-fit: cover;">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>{{ $author->name }}</td>
                                        <td>
                                            @if($author->user->status)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="d-flex align-items-center">
                                            <button class="btn btn-sm btn-primary me-2 edit-btn" data-id="{{ $author->id }}"
                                                data-name="{{ $author->name }}" data-status="{{ $author->user->status }}" data-image="{{ $author->user->image }}"
                                                data-bs-toggle="modal" data-bs-target="#editAuthorModal">
                                                Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $author->id }}"
                                                data-bs-toggle="modal" data-bs-target="#deleteAuthorModal">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="text-muted">
                            Showing {{ $authors->firstItem() }} to {{ $authors->lastItem() }} of {{ $authors->total() }}
                            authors
                        </div>
                        <div>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item {{ $authors->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $authors->previousPageUrl() }}"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $authors->lastPage(); $i++)
                                        <li class="page-item {{ $authors->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $authors->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item {{ $authors->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $authors->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('backend.pages.authors.create')
    @include('backend.pages.authors.edit')
    @include('backend.pages.authors.destroy')

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if (session('success'))
            Swal.fire({ icon: 'success', title: 'Success', text: "{{ session('success') }}", showConfirmButton: false, timer: 3000 });
        @endif
        @if (session('error'))
            Swal.fire({ icon: 'error', title: 'Error', text: "{{ session('error') }}", showConfirmButton: false, timer: 3000 });
        @endif

        document.getElementById('searchInput').addEventListener('input', function () {
            let searchTerm = this.value.toLowerCase();
            document.querySelectorAll('#authorTableBody tr').forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(searchTerm) ? '' : 'none';
            });
        });

        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                document.getElementById('editAuthorName').value = this.dataset.name;
                document.getElementById('editAuthorStatus').value = this.dataset.status;
                document.getElementById('editAuthorForm').action = `/authors/${this.dataset.id}`;

                let preview = document.getElementById('editAuthorImagePreview');
                if (this.dataset.image) {
                    preview.src = `/storage/${this.dataset.image}`;
                    preview.style.display = 'block';
                } else {
                    preview.style.display = 'none';
                }
            });
        });

        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                document.getElementById('deleteAuthorId').value = this.dataset.id;
                document.getElementById('deleteAuthorForm').action = `/authors/${this.dataset.id}`;
            });
        });
    });
</script>
@endsection
