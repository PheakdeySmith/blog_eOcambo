@extends('backend.layouts.dashboard_master')
@section('content')

    <!-- Include SweetAlert2 CSS and JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Include Bootstrap DateTimePicker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Category List</h4>
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#createCategoryModal">New Category</button>
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
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="categoryTableBody">
                                {{-- @foreach ($categories as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->category_name }}</td>
                                        <td>
                                            @if($item->status)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="d-flex align-items-center">
                                            <button class="btn btn-sm btn-primary me-2 edit-btn" data-id="{{ $item->id }}"
                                                data-category_name="{{ $item->category_name }}"
                                                data-status="{{ $item->status }}" data-bs-toggle="modal"
                                                data-bs-target="#editCategoryModal">
                                                Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $item->id }}"
                                                data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    {{-- <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="text-muted">
                            Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }}
                            categories
                        </div>
                        <div>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item {{ $categories->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $categories->previousPageUrl() }}"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $categories->lastPage(); $i++)
                                        <li class="page-item {{ $categories->currentPage() == $i ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $categories->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="page-item {{ $categories->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $categories->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    @include('admin.categories.create')
    @include('admin.categories.edit')
    @include('admin.categories.destroy')

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Display SweetAlert2 messages from session
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 3000
                });
            @endif
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 3000
                });
            @endif

            // Search functionality
            const searchInput = document.getElementById('searchInput');
            const categoryTableBody = document.getElementById('categoryTableBody');
            const rows = categoryTableBody.getElementsByTagName('tr');

            searchInput.addEventListener('input', function () {
                const searchTerm = searchInput.value.toLowerCase();

                Array.from(rows).forEach(function (row) {
                    const rowData = row.textContent.toLowerCase();
                    if (rowData.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            // // Edit Button
            // let editBtns = document.querySelectorAll('.edit-btn');
            // editBtns.forEach(btn => {
            //     btn.addEventListener('click', function () {
            //         let id = this.getAttribute('data-id');
            //         let categoryName = this.getAttribute('data-category_name');
            //         let status = this.getAttribute('data-status');

            //         document.getElementById('editCategoryName').value = categoryName;
            //         document.getElementById('editCategoryStatus').value = status;

            //         document.getElementById('editCategoryForm').action = `/categories/${id}`;
            //     });
            // });

            // // Delete Button
            // let deleteBtns = document.querySelectorAll('.delete-btn');
            // deleteBtns.forEach(btn => {
            //     btn.addEventListener('click', function () {
            //         let id = this.getAttribute('data-id');
            //         document.getElementById('deleteCategoryId').value = id;
            //         document.getElementById('deleteCategoryForm').action = '/categories/' + id;
            //     });
            // });


        });
    </script>
@endsection
