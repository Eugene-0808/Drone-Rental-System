@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-title">Booking History</div>

    @if ($orders->isEmpty())
        <div class="empty">
            You haven't made any bookings yet.
            <div style="margin-top:10px;">
                <a href="{{ route('home') }}" style="text-decoration:none; padding:10px 14px; border-radius:8px; border:1px solid #111; display:inline-block;">Browse Drones</a>
            </div>
        </div>
    @else
        @foreach ($orders as $order)
            @php
                $oid = $order->checkout_id;
                $items = $order->orderItems;
            @endphp
            <div class="order-card">
                <div class="order-head">
                    <div class="order-meta">
                        <div><strong>Order #{{ $oid }}</strong></div>
                    </div>
                    <div class="order-total">Total: RM {{ number_format((float)$order->total_amount, 2) }}</div>
                </div>

                <div class="order-items">
                    @if ($items->isEmpty())
                        <div class="meta">No items found for this order.</div>
                    @else
                        @foreach ($items as $item)
                            <div class="item">
                                <div class="thumb">
                                    <img src="{{ $item->product->product_image ?: asset('photo/placeholder.png') }}" alt="Product"/>
                                </div>
                                <div class="item-main">
                                    <div>
                                        <div class="name">{{ $item->product->product_name }}</div>
                                        <div class="meta">
                                            Qty: {{ (int)$item->quantity }} &nbsp;|&nbsp;
                                            Days: {{ (int)$item->duration_days }}
                                        </div>
                                    </div>
                                    <div class="price-col">
                                        <div class="ppd">RM {{ number_format((float)$item->price_per_day, 2) }} / day</div>
                                        <div class="sub">RM {{ number_format((float)$item->total_price, 2) }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        @endforeach
        {{ $orders->links() }}
    @endif
</div>
@endsection