@extends("layouts.layout")
@section("title", "All Reviews")

@section('content')


@include('partials.navigation') 

@include('partials.header')

<section class="page-section bg-light " id="all-reviews">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-4">
                <a href = "/" class="btn btn-primary btn-xl text-uppercase mb-4 mt-2"><i class="fas fa-arrow-left"></i> Back to Home</a>
            </div>
            <div class="col-md-8 mt-4">
                <form action="{{ route('reviews.index') }}" method="GET">
                    <div class="input-group">
                        <input 
                            type="text" 
                            name="search" 
                            class="form-control" 
                            placeholder="Cari review, produk, atau nama user..." 
                            value="{{ request('search') }}" 
                        >
                        <button type="submit" class="btn btn-dark">Cari</button>
                    </div>
                </form>
            </div>
        </div>
            
        <div class="container">
            <div class="row g-4 justify-content-center">
                
                @forelse ($reviews as $review)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card h-100 shadow-sm border-0 rounded-lg">
                        
                        <img src="{{ asset($review->product->image) }}" class="card-img-top" 
                            alt="{{ $review->product->name }}" 
                            style="height: 350px; object-fit: cover;">
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $review->product->name ?? 'Produk Dihapus' }}</h5>
                            
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <small class="text-muted">
                                    <i class="fas fa-user-circle me-1"></i> 
                                    {{ $review->user->name ?? 'Anonim' }}
                                </small>
                                <span class="badge bg-warning text-dark">
                                    <i class="fas fa-star"></i> {{ $review->rating }}/10
                                </span>
                            </div>

                            <p class="card-text fst-italic text-muted flex-grow-1">
                                "{{ Str::limit($review->review, 150) }}"
                            </p>

                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <h4 class="text-muted">Tidak ada review yang ditemukan</h4>
                    <p>Coba gunakan kata kunci pencarian yang berbeda.</p>
                </div>
                @endforelse
            </div>
            
            <div class="d-flex justify-content-center mt-5">
                <nav aria-label="Pagination Review"> 
                    {{ $reviews->links('pagination::bootstrap-5') }}
                </nav>
            </div>

        </div>
    </div>
</section>
@endsection