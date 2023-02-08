<div class="col-lg-3 col-md-3 col-sm-6 col-12 p-2 shadow-hover">
      <div class="card product-card border-0 ">
        <div data-bs-toggle="modal"
        data-bs-target="#aboutcard-{{ $wish->id }}">
          <a class="btn btn-sm absolute top right" href="#">
              <i class="far fa-heart"></i> </a>
          <a class="card-img-top d-block overflow-hidden" href="#">
              <img src="{{ $wish->image }}" class="w-100 card-img" height="300px"
                  alt=""></a>
          <div class="card-body">
              <div class="justify-content-between flex-wrap">
                  <div class="product-price text-start">
                      <span class="light text-capitalize">{{ $wish->name }}</span>
                  </div>
              </div>
          </div>
        </div>
          <div class="product-rating small text-alternate text-end">
              <button
                  class="rounded-circle-left rounded-circle-right btn btn-outline-success border-0 p-2 text-uppercase ms-auto">share
                  <i class="fas fa-sad-tear ms-2"></i></button>

                  <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$wish->id}}" name='id'>
                    <button type="submit"
                    class="rounded-circle-left rounded-circle-right btn btn-outline-success border-0 p-2 text-uppercase ms-auto">Add to Cart
                   <i class="fas fa-cart ms-2"></i> </button>
                  </form>


          </div>
      </div>
      @include ('guest.wishlist.edit', ['wish' => $wish])
</div>
