@extends("layouts.layout")
@section('title', "All - Product")
@section('content')

<div class ="container mb-4">
@include('partials.navigation')
</div>


    <section class="page-section bg-light " id="all-products">
        <div class="container">
            <div class="text-start">
                <a href = "/" class="btn btn-primary btn-xl text-uppercase mb-4 mt-5"><i class="fas fa-arrow-left"></i> Back to Home</a>
            </div>

        </div>
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase pd-5 mt-5">OUR PRODUCTS</h2>
                    <h3 class="section-subheading text-muted">Explore Our Collections</h3>
                </div>
                
                <div class="row g-5 justify-content-center ">
                    @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#productModal{{ $product->id }}">
                                <img class="img-fluid" src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">{{ $product->name }}</div>
                                <div class="portfolio-caption-subheading text-muted">
                                    Rp{{ number_format($product->price, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <nav aria-label="Pagination Produk" class="pagination-sm"> 
                        {{ $products->links('pagination::bootstrap-5') }}
                    </nav>
                </div>
            </div>
    </section>
@endsection