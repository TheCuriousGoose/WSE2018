@props(['product'])

<div class="col-12 col-lg-4 col-xl-3">
    <div class="card">
        <div class="card-img-top d-flex justify-content-center">
            <img src="{{ str_replace('{color}', 'blue', $product->image) }}"
                alt="An image of {{ $product->name }}">
        </div>
        <div class="card-body">
            <p class="fw-bold pb-0 mb-0">{{ $product->name }}</p>
            <p class="lh-sm ">{{ Number::currency($product->price, in: 'EUR') }}</p>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <a href="{{route('products.show', $product)}}" class="btn btn-primary">{{ __('Show more') }}</a>
        </div>
    </div>
</div>
