@extends('layouts.app')

@section('content')
    <!-- HERO -->
    <a class="hero" href="#">
        <div class="hero-overlay">
            <h1>Drone FY</h1>
            <p>Rent reliable drones. Fly with confidence.</p>
        </div>
        <div class="hero-bg bg1"></div>
        <div class="hero-bg bg2"></div>
        <div class="hero-bg bg3"></div>
        <div class="hero-dots">
            <span></span><span></span><span></span>
        </div>
    </a>

    <!-- ABOUT US -->
    <section class="about container">
        <div class="about-text">
            <h2>About Us</h2>
            <p>
                We provide affordable and high-quality drone rentals for creators, events,
                inspections and more. Transparent pricing, simple process, and friendly support.
            </p>
            <p>
                Pick your drone, choose dates, and fly with confidence. Whether you are a beginner
                or a pro, Drone FY has the right model for you.
            </p>
        </div>
        <div class="about-img fade-in">
            <img src="{{ asset('photo/about-drone.jpg') }}" alt="Drone">
        </div>
    </section>

    <!-- PRODUCT SEARCH & LISTING (作业要求) -->
    <div class="container" style="margin-top: 40px; margin-bottom: 40px;">
        <h2 class="sec-title">Browse Available Drones</h2>

        <!-- Search and Filter Form -->
        <form method="GET" action="{{ route('home') }}"
            style="display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 20px;">
            <input type="text" name="search" placeholder="Search product name..."
                value="{{ request('search', $lastSearch ?? '') }}"
                style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 8px; flex: 1; min-width: 200px;">
            <input type="number" name="min_price" placeholder="Min Price" value="{{ request('min_price') }}"
                style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 8px; width: 120px;">
            <input type="number" name="max_price" placeholder="Max Price" value="{{ request('max_price') }}"
                style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 8px; width: 120px;">
            <button type="submit" class="btn primary" style="border: none; cursor: pointer;">Filter</button>
        </form>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px;">
            @forelse ($products as $product)
                <div style="border: 1px solid #eee; border-radius: 12px; padding: 14px; background: #fff;">
                    @if($product->product_image)
                        <img src="{{ asset('photo/' . basename($product->product_image)) }}" alt="{{ $product->product_name }}"
                            style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px;">
                    @endif
                    <h3 style="margin: 10px 0 6px;">{{ $product->product_name }}</h3>
                    <div style="color: #555; font-size: 14px; line-height: 1.5;">
                        {!! $product->product_description !!}
                    </div>
                    <p style="font-weight: bold; margin-top: 8px;">RM{{ number_format($product->product_price, 2) }}/day</p>
                </div>
            @empty
                <p>No drones available.</p>
            @endforelse
        </div>

        {{ $products->links() }}
    </div>

    <!-- CUSTOMER FEEDBACK -->
    <section class="feedback container">
        <h2 class="sec-title">Customer Feedback</h2>
        <div class="fb-grid">
            <article class="fb-card">
                <div class="avatar">A</div>
                <h4>Ali</h4>
                <p>You can rent drones at affordable prices. If you don't need to buy one but just want temporary access,
                    give it a try.</p>
            </article>
            <article class="fb-card">
                <div class="avatar">B</div>
                <h4>Giorno</h4>
                <p>Damaged items require compensation at the original price...</p>
            </article>
            <article class="fb-card">
                <div class="avatar">C</div>
                <h4>Bucciarati</h4>
                <p>Recommended by my friend. The prices are affordable, and the seller responds quickly.</p>
            </article>
            <article class="fb-card">
                <div class="avatar">D</div>
                <h4>Devi</h4>
                <p>Simple process: choose, book, fly. Will rent again for my next project.</p>
            </article>
        </div>
    </section>

    <!-- SLOGAN / CTA -->
    <section class="slogan">
        <div class="container">
            <blockquote>
                "Once you have tasted flight, you will forever walk the earth with your eyes turned skyward."
                <cite>— Leonardo da Vinci</cite>
            </blockquote>
            <div class="cta-row">
                <a class="btn primary" href="#">Browse Drones</a>
                <a class="btn ghost" href="{{ route('purchase.history') }}">View Booking History</a>
            </div>
        </div>
    </section>
@endsection