<div>
    <div class="modal fade addWishModelC" id="aboutcard-{{ $wish->id }}" tabindex="-1" aria-labelledby="aboutcard" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize text-info" id="exampleModalLabel ">
                        edit wish</h5>
                    <button type="button" class="btn-close btn-info" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div>
                    <form id="edit-wish-form" action="{{ route('wishlist.update') }}" method="POST"
                        enctype="multipart/form-data" class="">
                        @csrf
                        <input type="hidden" class="wishId" name="id" value="{{ $wish->id }}" />
                        <div>
                            <div class="container py-2">
                                <label for="basic-icon-default-email">Image</label>
                                <div class="image-preview">
                                    <input class="form-control" type="file" onchange="readURL(this)" name="image"
                                        data-update="yes" id="formFileMultiple" class="image-input" accept="image/*" />
                                    <div class="image-updated  mt-3 ">
                                        <img src="{{ $wish->image }}" alt="" class="mh-15 w-25">
                                    </div>
                                </div>
                            </div>
                            <p class="text-alternate">Edit Wish Info</p>
                            <div>
                                <div class="container py-2">
                                    <div class="input-group">
                                        <span class="input-group-text p-2">
                                            Name
                                        </span>
                                        <input type="text" name="name" class="form-control" placeholder=""
                                            value="{{ $wish->name }}">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="container py-2">
                                    <div class="input-group">
                                        <span class="input-group-text p-2">
                                            Url
                                        </span>
                                        <input type="text" name="url" class="form-control" placeholder="Url"
                                            value="{{ $wish->url }}">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="container py-2">
                                    <div class="input-group">
                                        <span class="input-group-text p-2">
                                            Price
                                        </span>
                                        <input name="price" type="text" class="form-control" placeholder="Price"
                                            value="{{ $wish->price }}">
                                        <span class="input-group-text">
                                            <i class="fas fa-solid fa-question bg-dark text-light rounded-pill p-2"></i>
                                        </span>
                                    </div>
                                    <span class="small text-start">
                                        Don't forget to add to the total to cover shipping and tax.
                                    </span>
                                </div>
                            </div>
                            <div class="form-group container my-2 text-start">
                                <label for="category">Select Category</label>
                                <br>
                                <select class="category-tag" style="width: 100%" name="categories[]"
                                    multiple="multiple">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="container py-2 text-start">
                                <div class="text-black mx-2"
                                    style="font-family: Nunito, Roboto, 'Helvetica Neue', Arial, sans-serif;">
                                    @if ($wish->repeat)
                                        <input type="checkbox" id="clickboth" name="repeat" value='1' checked>
                                    @else
                                        <input type="checkbox" id="clickboth" name="repeat" value='0'>
                                    @endif
                                    <label for="clickboth">Allow Repeat Purchases</label>
                                    <!-- <input type="checkbox">
                                                              Allow Repeat Purchases -->
                                </div>
                                <p class="small text-gary"><span class="mx-2"></span> Check
                                    if
                                    you want repeat purchases of this gift. If
                                    unchecked, the item will automatically delete from your
                                    wishlist after the first purchase.</p>
                            </div>

                            <div class="text-end py-3 container">
                                <button type="submit" value='submit'
                                    class="btn btn-info btn-lg ms-auto border-0 text-uppercase form-control">Update</button>
                            </div>
                        </div>

                    </form>
                    <div class="text-end">
                        <form action="{{ route('wish.destroy') }}" method="post">
                            @csrf
                            <input name="id" type="hidden" value="{{ $wish->id }}">
                            <button type="submit" class="btn btn-outline-info ms-auto border-0 text-uppercase"
                                id="delete-{{ $wish->id }}">Delete
                                Wish</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
