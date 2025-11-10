@extends("layouts.layout") {{-- Menggunakan layout Bootstrap Anda --}}
@section("title", "My Dashboard")

@section('content')

<div class ="container mb-4">
@include('partials.navigation') 
</div>


<header class="masthead" style="background-image: url('{{ asset('assets/img/header-bg.jpg') }}'); padding-top:4rem; padding-bottom:2rem; filter:brightness(0.85);">
    <div class="container">
        <div class="masthead-subheading">Selamat Datang, {{ Auth::user()->name }}!</div>
        <div class="masthead-heading text-uppercase">My Dashboard</div>
    </div>
</header>

<section class="page-section bg-light" id="dashboard">
    <div class="container">
        
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">

            <div class="col-lg-4">
                    <div class="card shadow-sm border-0 rounded-lg">
                        <div class="card-body text-center p-3">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=ffc800&color=000&size=128"
                                alt="Avatar" class="rounded-circle mb-3" width="96" height="96">

                            <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                            <p class="text-muted mb-2 small">{{ Auth::user()->email }}</p>

                            <div class="d-grid gap-2">
                                
                                <a href="{{ route('profile.edit') }}" class="btn btn-warning btn-sm text-dark">
                                    Edit Profile
                                </a>
                                <a href="{{ route('reviews.create') }}" class="btn btn-primary btn-sm text-dark">
                                    Create Review
                                </a>
                            </div>
                        </div>

                        <div class="card-footer bg-transparent border-0 pt-0 pb-3 text-center">
                            <small class="text-muted">Last Updated:
                                {{ optional(Auth::user()->updated_at)->diffForHumans() ?? '-' }}</small>
                        </div>
                    </div>
                </div>


            <div class="col-lg-8">
                <h2 class="section-heading text-uppercase mb-4">My Reviews</h2>
                
                @forelse ($reviews as $review)
                    <div class="card mb-3 shadow-sm border-0">
                        <div class="card-body d-flex">
                            
                            <div class="flex-shrink-0 me-3">
                                <a href="#!">
                                    <img src="{{ asset( $review->product->image) }}" 
                                        alt="{{ $review->product->name ?? 'Produk Dihapus' }}" 
                                        style="width: 250px; height: 250px; object-fit: cover;"
                                        class="rounded">
                                </a>
                            </div>

                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title mb-0">
                                            {{ $review->product->name ?? 'Produk Dihapus' }}
                                        </h5>
                                        <small class="text-muted">
                                            Rating: <span class="badge bg-warning text-dark">{{ $review->rating }}/10</span>
                                        </small>
                                    </div>
                                    
                                    <div class="d-flex">
                                        <a href="{{ route('reviews.edit', $review) }}" class="btn btn-warning btn-sm text-dark me-2">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('reviews.destroy', $review) }}" method="POST" 
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus review ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <p class="card-text fst-italic mb-1">"{{ $review->review }}"</p>
                                <small class="text-muted">
                                    Reviewed at: {{ $review->created_at->format('d M Y') }}
                                </small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-info" role="alert">
                        You don't have any reviews yet.
                        <a href="{{ route('reviews.create') }}" class="alert-link">Review our product</a>.
                    </div>
                @endforelse

                <div class="d-flex justify-content-center mt-4">
                    {{ $reviews->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>
</section>
@endsection