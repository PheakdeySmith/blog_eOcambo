<!-- Edit Author Modal -->
<div class="modal fade" id="editAuthorModal" tabindex="-1" aria-labelledby="editAuthorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAuthorModalLabel">Edit Author</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editAuthorForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 row">
                        <div class="col-md-12">
                            <label for="editAuthorName" class="form-label">Author Name</label>
                            <input id="editAuthorName" class="form-control" name="name" type="text" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-12">
                            <label for="editAuthorStatus" class="form-label">Status</label>
                            <select id="editAuthorStatus" class="form-control" name="status" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="editAuthorImage" class="form-label">Author Icon (Image)</label>
                        <input id="editAuthorImage" class="form-control" name="image" type="file" accept="image/*">
                        <small class="form-text text-muted">Upload a new icon image (optional).</small>
                        <img id="editAuthorImagePreview" class="img-fluid rounded" style="max-width: 100px; display: none;" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
