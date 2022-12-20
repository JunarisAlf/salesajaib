<div class="modal fade show" id="updateBaner" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
    <form 
        class="forms-sample" 
        method="POST" 
        action={{ route('admin.updateBanerProperty', ['prop' => $property->id]) }}
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Baner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input class="form-control tw-h-auto" type="file" id="formFile" name="baner">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
