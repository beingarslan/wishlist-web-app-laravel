<div>
    <div class="modal fade addWishModelC" id="addWishModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable rounded">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Add a wish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/wish/store" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <p class="text-start">Set details</p>
                        <div class="form-group my-2">
                            <input class="form-control rounded" type="text" placeholder="Name" name="name">
                        </div>
                        <div class="form-group my-2">
                            <input class="form-control rounded" type="text" placeholder="Price" name="price">
                        </div>
                        <div class="form-group my-2">
                            <input class="form-control rounded" type="text" placeholder="Url" name="url">
                        </div>
                        <div class="form-group my-2">
                            <label class="my-2" for="basic-icon-default-email">Image</label>
                            <input class="form-control" type="file" name="image" accept="image/*" />
                        </div>
                        <div class="form-group my-2">
                            <label class="my-2" for="categories">Select Category</label>
                            <br>
                            <select id="categories" class="category-tags form-select" style="width: 100%" name="categories[]" multiple="multiple">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->name }}">
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-check my-3">
                            <input class="form-check-input" name='repeat' type="checkbox" value="1"
                                id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Allow Repeat Purchases
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
