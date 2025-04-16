<!-- Pulsante per aprire il modale -->
<button type="button" data-bs-toggle="modal" data-bs-target="#tagModal" class="btn btn-sm btn-primary">
    Add Tags
</button>

<!-- Modal -->
<div class="modal fade" id="tagModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content p-4">
            <div class="modal-header">
                <h5 class="modal-title">Add Tags</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Available Tags:</h5>
                <div id="tag-list">
                    @foreach($tags as $tag)
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                    <label class="form-label me-2">{{ $tag->name }}</label>
                    @endforeach
                </div>

                <hr>

                <h5>Add new tag</h5>
                <div class="row">
                    <div class="col-6">
                        <label for="new-tag-name" class="form-label">Tag name</label>
                        <input type="text" name="name" id="new-tag-name" class="form-control mb-2">
                    </div>
                    <div class="col-3">
                        <label for="new-tag-color" class="form-label">Tag color</label>
                        <input type="color" name="color" id="new-tag-color" class="form-control">
                    </div>
                </div>
                <button type="button" id="add-tag-btn" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>