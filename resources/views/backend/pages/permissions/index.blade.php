@extends('backend.layouts.dashboard_master')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Permission List</h4>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#createPermissionModal">New Permission</button>
                        </div>
                        <div class="input-group" style="width: 300px;">
                            <input type="text" id="searchInput" class="form-control" placeholder="Search...">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="permissionTableBody">
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td class="d-flex align-items-center">
                                            <button class="btn btn-sm btn-primary me-2 edit-btn" data-id="{{ $permission->id }}"
                                                data-name="{{ $permission->name }}" data-bs-toggle="modal"
                                                data-bs-target="#editPermissionModal">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deletePermissionModal" data-id="{{ $permission->id }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="text-muted">
                            Showing {{ $permissions->firstItem() }} to {{ $permissions->lastItem() }} of
                            {{ $permissions->total() }} permissions
                        </div>
                        <div>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item {{ $permissions->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $permissions->previousPageUrl() }}"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $permissions->lastPage(); $i++)
                                        <li class="page-item {{ $permissions->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $permissions->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item {{ $permissions->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $permissions->nextPageUrl() }}" aria-label="Next">
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

    @include('backend.pages.permissions.create')
    @include('backend.pages.permissions.edit')
    @include('backend.pages.permissions.destroy')
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
                document.querySelectorAll('#permissionTableBody tr').forEach(row => {
                    row.style.display = row.textContent.toLowerCase().includes(searchTerm) ? '' : 'none';
                });
            });

            // Edit button
            document.querySelectorAll('.edit-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    document.getElementById('editPermissionName').value = this.dataset.name;
                    document.getElementById('editPermissionForm').action = `/permissions/${this.dataset.id}`;

                    // Open the modal
                    var myModal = new bootstrap.Modal(document.getElementById('editPermissionModal'));
                    myModal.show();
                });
            });

            // Delete button
            $('#deletePermissionModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var permissionId = button.data('id');
                var form = $(this).find('form');
                form.attr('action', '/permissions/' + permissionId);
            });

        });
    </script>
@endsection
