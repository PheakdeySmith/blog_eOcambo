@extends('backend.layouts.dashboard_master')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Role List</h4>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#createRoleModal">New Role</button>
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
                            <tbody id="roleTableBody">
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td class="d-flex align-items-center">
                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-primary me-2 edit-btn">
                                                Edit
                                            </a>
                                            <button class="btn btn-sm btn-danger delete-btn" data-bs-toggle="modal"
                                                data-bs-target="#deleteRoleModal">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="text-muted">
                            Showing {{ $roles->firstItem() }} to {{ $roles->lastItem() }} of
                            {{ $roles->total() }} roles
                        </div>
                        <div>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item {{ $roles->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $roles->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $roles->lastPage(); $i++)
                                        <li class="page-item {{ $roles->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $roles->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item {{ $roles->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $roles->nextPageUrl() }}" aria-label="Next">
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

    @include('backend.pages.roles.create')
    @include('backend.pages.roles.destroy')
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
                document.querySelectorAll('#roleTableBody tr').forEach(row => {
                    row.style.display = row.textContent.toLowerCase().includes(searchTerm) ? '' : 'none';
                });
            });

            // Delete button
            document.querySelectorAll('.delete-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    document.getElementById('deleteRoleId').value = this.dataset.id;
                    document.getElementById('deleteRoleForm').action = `/roles/${this.dataset.id}`;
                });
            });
        });
    </script>
@endsection
