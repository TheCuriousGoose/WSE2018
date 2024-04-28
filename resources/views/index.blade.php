@extends('layouts.app')

@section('title')
    {{ __('Homepage | Pre-order shop') }}
@endsection

@section('content')
    <section class="bg-primary text-white p-2 rounded-3">
        <h1>{{ __('Welcome to ') . config('app.name') }}</h1>
        <p class="fs-5">
            {{ __('Here you can pre-order various different products with cool symbols! So go ahead pick a color and design of your liking!') }}
        </p>
    </section>
    <hr>
    <div class="row row-gap-3">
        @foreach ($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>
@endsection
