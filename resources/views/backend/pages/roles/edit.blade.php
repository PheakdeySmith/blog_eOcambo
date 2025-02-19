@extends('backend.layouts.dashboard_master')

@section('content')
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        transform: translateX(18px);
    }

    .slider.round {
        border-radius: 20px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .ml-2 {
        margin-left: 10px;
    }


    .permission-label {
    margin-left: 15px; /* Adjust space between toggle and text */
    padding-left: 10px; /* Add padding inside the label */
}

</style>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Role's Permissions</h4>
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            @foreach ($permissions as $module => $permissionList)
                                <h6>{{ ucwords($module) }}</h6>
                                <div class="form-check">
                                    @foreach ($permissionList as $perm)
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group mb-3">
                                                    <div class="input-group">
                                                        <label class="switch">
                                                            <input type="checkbox" name="permissions[]" value="{{ $perm->name }}"
                                                                @if (in_array($perm->name, $rolePermissions)) checked @endif
                                                                data-toggle="toggle">
                                                            <span class="slider round"></span>
                                                        </label>
                                                        <span class="permission-label ml-2">&nbsp;&nbsp;</span>
                                                        <span class="permission-label ml-2">{{ $perm->name }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary ml-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('backend.pages.roles.destroy')

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (session('message'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: "{{ session('message') }}",
                    showConfirmButton: false,
                    timer: 3000
                });
            @endif

            document.getElementById('searchInput').addEventListener('input', function () {
                let searchTerm = this.value.toLowerCase();
                document.querySelectorAll('#roleTableBody tr').forEach(row => {
                    row.style.display = row.textContent.toLowerCase().includes(searchTerm) ? '' : 'none';
                });
            });
        });
    </script>
@endsection
