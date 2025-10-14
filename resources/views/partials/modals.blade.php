<div class="portfolio-modal modal fade" id="productModal{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="close-modal" data-bs-dismiss="modal">
                <img src="{{ asset('assets/img/close-icon.svg') }}" alt="Close modal" />
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="modal-body">
                            
                            <h2 class="text-uppercase">{{ $product->name ?? 'Product Detail' }}</h2>
                            
                            <img class="img-fluid d-block mx-auto rounded-lg mb-4" 
                                src="{{ asset($product->image) }}" 
                                alt="Gambar Produk {{ $product->name }}" />
                            
                            <p class="mb-4 text-justify">{{ $product->description }}</p>
                            
                            <ul class="list-inline">
                                <li><strong>Price:</strong> Rp{{ number_format($product->price, 0, ',', '.') }}</li>
                            </ul>
                            
                            <hr class="my-4">

                            <h4 class="mb-3">Client Reviews ({{ $product->reviews->count() }})</h4>
                            
                            <div class="review-list">
                                
                                @forelse ($product->reviews as $review)
                                    <div class="p-3 border rounded-lg bg-light shadow-sm mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            
                                            <p class="font-weight-bold text-lg text-dark mb-0">
                                                <i class="fas fa-user-circle me-2 text-primary"></i> 
                                                {{ $review->user->name ?? 'User Anonymous' }}
                                            </p>
                                            
                                            <span class="badge bg-warning text-dark">{{ $review->rating ?? '0' }} /10</span>
                                        </div>
                                        
                                        <p class="text-gray-700 italic mb-0">"{{ $review->review }}"</p>
                                        
                                        <small class="text-muted d-block text-end mt-1">
                                            Reviewed on: {{ $review->created_at->format('M d, Y') }}
                                        </small>

                                    </div>
                                @empty
                                    <div class="text-center p-4 bg-white rounded border">
                                        <p class="text-lg text-muted mb-0">No reviews for this product yet</p>
                                    </div>
                                @endforelse
                            </div>

                            <button class="btn btn-primary btn-xl text-uppercase mt-5" data-bs-dismiss="modal" type="button">
                                <i class="fas fa-xmark me-1"></i>
                                Close Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
