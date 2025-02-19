<!-- Create Author Modal -->
<div class="modal fade" id="createAuthorModal" tabindex="-1" aria-labelledby="createAuthorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createAuthorModalLabel">Create New Author</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createAuthorForm" class="form-inline" action="{{ route('authors.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <div class="col-md-12">
                            <label for="createAuthorName" class="form-label">Author Name</label>
                            <input id="createAuthorName" class="form-control" name="name" type="text" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-12">
                            <label for="createAuthorStatus" class="form-label">Status</label>
                            <select id="createAuthorStatus" class="form-control" name="status" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-12">
                            <label for="createAuthorImage" class="form-label">Profile Image</label>
                            <input id="createAuthorImage" class="form-control" name="image" type="file" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create Author</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
