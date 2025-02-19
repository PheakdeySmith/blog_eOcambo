<!-- Delete Author Modal -->
<div class="modal fade" id="deleteAuthorModal" tabindex="-1" aria-labelledby="deleteAuthorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAuthorModalLabel">Delete Author</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deleteAuthorForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <p>Are you sure you want to delete this author?</p>
                    <input type="hidden" name="author_id" id="deleteAuthorId">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
