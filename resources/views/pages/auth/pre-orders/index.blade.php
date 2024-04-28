@extends('layouts.auth.app')

@section('content')
    <h1>Pre-orders</h1>
    <hr>
    <div class="row">
        <div class="col-8">
            @foreach ($preOrders as $preOrder)
                <a href="{{ route('auth.pre-orders.edit', $preOrder) }}" class="card mb-2">
                    <div class="card-header d-flex">
                        Pre-order #{{ $preOrder->id }}
                        <div class="ms-auto">
                            {{ $preOrder->status }}
                        </div>
                    </div>
                    <div class="card-body d-flex gap-2 flex-wrap">
                        @foreach ($preOrder->preOrderItems as $item)
                            <div class="pre-order-image-container">
                                <img src="{{ str_replace('{color}', strtolower($item->color->name), $item->product->image) }}"
                                    alt="Image of {{ $item->product->name }}" height="100">
                                <img class="design-symbol" src="{{ $item->designSymbol->image }}"
                                    alt="Image of {{ $item->designSymbol->name }}" height="40">
                            </div>
                        @endforeach
                    </div>
                </a>
            @endforeach
            <div class="my-3">
                {{ $preOrders->links() }}
            </div>
        </div>
        <div class="col-4">
            <div class="d-flex">
                <h2>Filters</h2>
                <div class="ms-auto">
                    <a href="{{ route('auth.pre-orders.index') }}" class="btn btn-primary"> Reset</a>
                </div>
            </div>
            <div class="mb-3">
                <label for="Status">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="all">All</option>
                    <option value="open" @if (request()->status === 'open') selected @endif>Open</option>
                    <option value="prepared" @if (request()->status === 'prepared') selected @endif>Prepared</option>
                    <option value="closed/delivered" @if (request()->status === 'closed/delivered') selected @endif>Closed/delivered
                    </option>
                </select>
            </div>
            <hr>
            <div class="mb-3">
                <label for="pre-orders-before">Pre-orders after:</label>
                <input type="date" class="form-control mb-2" id="pre-orders-after"
                    value="{{ request()->ordered_after }}">
                <label for="pre-orders-after">Pre-orders before:</label>
                <input type="date" class="form-control" id="pre-orders-before" value="{{ request()->ordered_before }}">
            </div>
        </div>
    </div>
    @vite(['resources/js/app/pre-orders.js'])
@endsection
