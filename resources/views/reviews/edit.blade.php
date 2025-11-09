@extends("layouts.layout")
@section("title", "Edit Review")

@section('content')


<header class="masthead" style="background-image: url('{{ asset('assets/img/header-bg.jpg') }}'); padding-top:4rem; padding-bottom:2rem; filter:brightness(0.85);">
    <div class="container text-center">
        <div class="masthead-subheading">Edit Review Anda</div>
        <h1 class="masthead-heading text-uppercase fs-3 mb-0">
            Untuk Produk: {{ $review->product->name ?? 'N/A' }}
        </h1>
    </div>
</header>

<section class="page-section bg-light" id="edit-review">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <h5 class="alert-heading">Oops! Ada kesalahan:</h5>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card shadow-sm border-0 rounded-lg">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="mb-0">Formulir Edit Review</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        
                        <form method="POST" action="{{ route('reviews.update', $review) }}">
                            @csrf
                            @method('PATCH') 
                            <div class="mb-3">
                                <label for="rating" class="form-label fs-5 fw-bold">Rating (1-10)</label>
                                <select class="form-select @error('rating') is-invalid @enderror" 
                                        id="rating" name="rating" required>
                                    @for ($i = 1; $i <= 10; $i++)
                                        <option value="{{ $i }}" 
                                            {{ old('rating', $review->rating) == $i ? 'selected' : '' }}>
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                                @error('rating')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="review" class="form-label fs-5 fw-bold">Review Anda</label>
                                <textarea class="form-control @error('review') is-invalid @enderror" 
                                        id="review" name="review" 
                                        rows="5" 
                                        placeholder="Tuliskan ulasan Anda..."
                                        required>{{ old('review', $review->review) }}</textarea>
                                @error('review')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-times me-2"></i>Batal
                                </a>
                                <button type="submit" class="btn btn-primary btn-xl text-uppercase">
                                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection