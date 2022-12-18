
<button type="button" class="btn btn-outline-warning  btn-sm " data-bs-toggle="modal" data-bs-target="#editBrand{{ $subCategory->id }}">
    <i class="bx bx-edit "></i>
</button>
<div id="editBrand{{ $subCategory->id }}" class="modal fade" tabindex="-1" aria-labelledby="editBrand{{ $subCategory->id }}Label" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBrand{{ $subCategory->id }}Label">Edit SubCategory</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('subCategory.update',$subCategory->id) }}" method="post" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="mb-4 ">
                        <label for="exampleDataList" class="form-label">Category Name</label>
                        <select name="category_id" class="form-select " id="">
                            @forelse(\App\Models\Category::all() as $cat)
                                <option value="{{ $cat->id }}" {{ $cat->id == $subCategory->category_id ? 'selected' : '' }} > {{ $cat->name }}</option>
                            @empty
                            @endforelse
                        </select>

                    </div>
                    <div class="mb-3 ">
                        <label for="basiInput" class="form-label">Name</label>
                        <input type="text" value="{{ $subCategory->name }}"  class="form-control" name="name" id="name">
                    </div>

                    <div class="text-end mt-3 ">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ">Update</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
