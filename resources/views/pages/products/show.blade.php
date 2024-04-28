@extends('layouts.app')

@section('title')
    {{ $product->name }} | {{ config('app.name') }}
@endsection

@section('content')
    <form action="{{ route('cart.store') }}" method="POST">
        @method('POST')
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <meta name="image-raw-link" content="{{ $product->image }}">
        <div class="row">
            <div class="col-6 product-image-container mt-5 pt-5">
                <img id="product-image" src="{{ str_replace('{color}', $colors->first()->name, $product->image) }}"
                    alt="image of {{ $product->name }}">
                <img id="product-symbol" class="design-symbol" src="{{ $designSymbols->first()->image }}"
                    alt="Design symbol {{ $designSymbols->first()->name }}" width="100">
            </div>
            <div class="col-6">
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->description }}</p>
                <div class="mt-2 mb-3">
                    <label class="fw-bold mb-0" for="color_id">{{ __('Color') }}</;>
                        <div class="d-flex justify-content-start gap-2">
                            @foreach ($colors as $color)
                                <div class="color-choice-box @if ($loop->first) selected @endif"
                                    data-color-name="{{ $color->name }}"
                                    style="background-color: {{ $color->color_code }}">
                                    <input type="radio" name="color_id" value="{{ $color->id }}" class="d-none"
                                        @if ($loop->first) checked @endif>
                                </div>
                            @endforeach
                        </div>
                </div>
                <div class="mt-2 mb-3">
                    <label class="fw-bold mb-0" for="design_symbol_id">{{ __('Design Symbol') }}</label>
                    <div class="d-flex gap-2 flex-wrap">
                        @foreach ($designSymbols as $symbol)
                            <div class="symbol-choice-box @if ($loop->first) selected @endif"
                                data-symbol-image="{{ $symbol->image }}">
                                <img src="{{ $symbol->image }}" alt="image of {{ $symbol->name }}" width="40">
                                <input type="radio" name="design_symbol_id" value="{{ $symbol->id }}" class="d-none"
                                    @if ($loop->first) checked @endif>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-2 mb-3 d-flex align-items-center">
                    <label class="fw-bold mb-0">{{ __('Quantity') }}</label>
                    <input type="number" name="quantity" class="form-control ms-auto w-25" value="1" min="1">
                </div>
                <div class="mt-2 mb-3">
                    <p class="fs-5">Price: {{Number::currency($product->price, in: 'EUR')}}</p>
                </div>
                <div class="mt-2 mb-3">
                    <button type="submit" class="btn btn-primary">Add to cart</button>
                </div>
            </div>
        </div>
    </form>
    @vite(['resources/js/app/show-product.js'])
@endsection
