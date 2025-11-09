@extends("layouts.layout")
@section("title", "Home Page")


@section('content')

@extends('partials.navigation')



    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Serve The Lord</div>
            <div class="masthead-heading text-uppercase">Unseen Clothes</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#about">Discover Our Story</a>
        </div>
    </header>
    
    <section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">OUR PRODUCTS</h2>
            <h3 class="section-subheading text-muted">Best Selling Products of All Time.</h3>
        </div>
        <div class="row">

            @forelse($products as $product)
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" href="#productModal{{ $product->id }}">
                        <img class="img-fluid" src="{{ asset($product->image) }}" alt="Portfolio {{ $product->name }}" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">{{ $product->name }}</div>
                        <div class="portfolio-caption-subheading text-muted">{{ $product->category ?? '' }}</div>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Produk unggulan akan segera hadir.</p>
                </div>
            @endforelse
            
            <div class="col-12 text-center mt-4">
                <a class="btn btn-primary btn-xl text-uppercase" href="{{ route('products.index') }}">More Products</a>
            </div>
        </div>
    </div>
</section>

    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">About</h2>
                <h3 class="section-subheading text-muted">Best Bible Clothing in Indonesia</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset('assets/img/about/1.jpg') }}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Est. 2009</h4>
                            <h4 class="subheading">Our Humble Beginnings</h4>
                        </div>
                        <div class="timeline-body"><p class="text-muted">As a small team we begin our journey to Gospel the Lord through fabrics </p></div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{ asset ('assets/img/about/2.jpg') }}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>March 2009</h4>
                            <h4 class="subheading">An Agency is Born</h4>
                        </div>
                        <div class="timeline-body"><p class="text-muted">Founded by three former colleagues, we launched with a mission to simplify digital marketing and bring authentic, story-driven campaigns to life.</p></div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset ('assets/img/about/3.jpg')}}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>December 2015</h4>
                            <h4 class="subheading">Transition to Full Service</h4>
                        </div>
                        <div class="timeline-body"><p class="text-muted">To better serve our growing client needs, we completed our transformation from a purely digital firm to a full-service agency, integrating in-house capabilities for Brand Strategy, Public Relations, and Media Buying.</p></div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('assets/img/about/4.jpg')}}" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>July 2020</h4>
                            <h4 class="subheading">Phase Two Expansion</h4>
                        </div>
                        <div class="timeline-body"><p class="text-muted">Despite global challenges, we successfully executed Phase Two Expansion by opening our second major office in Surabaya, Indonesia. This move secured our presence in the Jakarta, Indonesia market and allowed us to serve an international client base more effectively.</p></div>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Our Amazing Customer</h2>
                <h3 class="section-subheading text-muted">The people who make our story possible.</h3>
            </div>
            <div class="row justify-content-center">
                
                @forelse ($reviews as $index => $review)
                    @if ($index < 3) 
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{ asset('assets/img/team/' . ($index + 1) . '.jpg') }}" alt="{{ $review->user->name ?? 'Reviewer' }}" />
                            
                            <h4>{{ $review->user->name ?? 'Reviewer' }}'s</h4>
                            <div class="mt-2">
                                <h3>Review</h3>
                                <p class="text-muted">{{ $review->rating ?? 'N/A' }}/10</p>
                                <p class="text-muted">"{{ $review->review }}"</p>
                            </div>
                        </div>
                    </div>
                    @endif
                @empty
                    <div class="col-lg-8 text-center">
                        <p class="large text-muted">Belum ada testimonial untuk ditampilkan saat ini.</p>
                    </div>
                @endforelse

            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Ready to be the next success story? Let's turn your vision into a measurable impact. Partner with us today and let's define the next chapter of your personal's growth</p></div>
            </div>
        </div>
    </section>
@endsection