@extends('layouts.auth.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Order detail for #{{ $preOrder->id }}
                </div>
                <div class="card-body">
                    <div class="mb-3 row gap-0">
                        <div
                            class="col-4 text-center @if ($preOrder->status === 'open') bg-warning @else bg-secondary-subtle @endif">
                            <p class="mb-0">Open</p>
                        </div>
                        <div
                            class="col-4 text-center @if ($preOrder->status === 'prepared') bg-warning @else bg-secondary-subtle @endif">
                            <p class="mb-0">Prepared</p>
                        </div>
                        <div
                            class="col-4 text-center @if ($preOrder->status === 'closed/delivered') bg-warning @else bg-secondary-subtle @endif">
                            <p class="mb-0">Closed / Delivered</p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <p class="fw-bold mb-0 fs-5">Contact info</p>
                        <div class="card p-2">
                            <p class="mb-1">
                                <span class="fw-bold">Firstname:</span>
                                {{ $preOrder->firstname }}
                            </p>
                            <p class="mb-1">
                                <span class="fw-bold">Lastname:</span>
                                {{ $preOrder->lastname }}
                            </p>
                            <p class="mb-1">
                                <span class="fw-bold">Email:</span>
                                {{ $preOrder->email }}
                            </p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <p class="fw-bold mb-0 fs-5">Products</p>
                        @foreach ($preOrder->preOrderItems as $item)
                            <div class="card p-2 mb-1">
                                <p class="mb-1">
                                    <span class="fw-bold">Product name:</span>
                                    {{ $item->product->name }}
                                </p>
                                <p class="mb-1">
                                    <span class="fw-bold">Color:</span>
                                    {{ $item->color->name }}
                                </p>
                                <p class="mb-1">
                                    <span class="fw-bold">Design symbol id:</span>
                                    {{ $item->designSymbol->id }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                    <form action="{{ route('auth.pre-orders.update', $preOrder) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="remarks" class="fw-bold">Remarks</label>
                            <textarea name="remarks" id="remarks" cols="30" rows="2" class="form-control">{{ $preOrder->remarks }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="remarks" class="fw-bold">Status</label>
                            <div class="w-100 d-flex justify-content-around">
                                <div class="d-flex flex-column">
                                    <label for="status" class="fw-bold mb-2">Open</label>
                                    <input type="radio" name="status" value="open" @checked($preOrder->status === 'open')>
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="status" class="fw-bold mb-2">Prepared</label>
                                    <input type="radio" name="status" value="prepared" @checked($preOrder->status === 'prepared')>
                                </div>
                                <div class="d-flex flex-column">
                                    <label for="status" class="fw-bold mb-2">Closed/Delivered</label>
                                    <input type="radio" name="status" value="closed/delivered"
                                        @checked($preOrder->status === 'closed/delivered')>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
