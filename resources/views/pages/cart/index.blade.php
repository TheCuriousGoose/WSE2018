@extends('layouts.app')

@section('content')
    <h1>Cart</h1>
    <hr>
    @if (count($items) > 0)
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#askForInfoModal">
                Pre-order now
            </button>
        </div>
        @foreach ($items as $item)
            <div class="card mb-3 p-3">
                <div class="row g-0">
                    <div class="col-md-2 cart-item-image">
                        <img src="{{ str_replace('{color}', strtolower($item['color']['name']), $item['product']['image']) }}"
                            alt="Image of {{ $item['product']['name'] }}" height="150">
                        <img class="design-symbol" src="{{ $item['design_symbol']['image'] }}"
                            alt="Image of {{ $item['product']['name'] }}" height="50">
                    </div>
                    <div class="col-6">
                        <h3 class="fw-bold">{{ $item['product']['name'] }}</h3>
                        <p>{{ $item['product']['description'] }}</p>
                    </div>
                    <div class="col-4 row">
                        <div class="col-3 d-flex flex-column justify-content-center align-items-center">
                            <p class="fw-bold">Color</p>
                            <p>{{ $item['color']['name'] }}</p>
                        </div>
                        <div class="col-5 d-flex flex-column justify-content-center align-items-center">
                            <p class="fw-bold">Design symbol</p>
                            <p>{{ $item['design_symbol']['name'] }}</p>
                        </div>
                        <div class="col-3 d-flex flex-column justify-content-center align-items-center">
                            <p class="fw-bold">Quantity</p>
                            <p>{{ $item['quantity'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p class="text-center">Add items in you cart to see them here!</p>
    @endif
    @if (count($items) > 0)
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#askForInfoModal">
                Pre-order now
            </button>
        </div>

        <div class="modal fade" id="askForInfoModal" tabindex="-1" aria-labelledby="askForInfoModalLabel"
            aria-hidden="true">
            <form action="{{ route('pre-order.store') }}" method="POST">
                @method('POST')
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="askForInfoModalLabel">Please enter your info</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="lastname">Lastname</label>
                                <input type="text" name="lastname" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label for="firstname">Firstname</label>
                                <input type="text" name="firstname" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Place pre-order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif
@endsection
