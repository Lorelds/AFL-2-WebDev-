@extends("layouts.layout")
@section("title", "Edit Product")

@section('content')

<header class="masthead" style="background-image: url('{{ asset('assets/img/header-bg.jpg') }}'); padding-top:4rem; padding-bottom:2rem; filter:brightness(0.85);">
    <div class="container text-center">
        <div class="masthead-subheading">Edit Produk Anda</div>
        <h1 class="masthead-heading text-uppercase fs-3 mb-0">
            Untuk Produk: {{ $product->name ?? 'N/A' }}
        </h1>
    </div>
</header>

<section class="page-section bg-light" id="edit-admin">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                {{-- Error Handling --}}
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
                        <h4 class="mb-0">Formulir Edit Produk</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        
                        {{-- Tambahkan enctype untuk upload file --}}
                        <form method="POST" 
                              action="{{ route('products.update', $product->id) }}" 
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH') 

                            {{-- Nama Produk --}}
                            <div class="mb-3">
                                <label for="name" class="form-label fs-5 fw-bold">Nama Produk</label>
                                <input type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name', $product->name) }}" 
                                       placeholder="Masukkan nama produk" 
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Harga Produk --}}
                            <div class="mb-3">
                                <label for="price" class="form-label fs-5 fw-bold">Harga Produk</label>
                                <input type="number" 
                                       class="form-control @error('price') is-invalid @enderror" 
                                       id="price" 
                                       name="price" 
                                       value="{{ old('price', $product->price) }}" 
                                       placeholder="Masukkan harga produk" 
                                       required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Gambar Produk --}}
                            <div class="mb-4">
                                <label for="image" class="form-label fs-5 fw-bold">Gambar Produk</label>
                                
                                {{-- Preview Gambar Lama --}}
                                @if ($product->image)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $product->image) }}" 
                                             alt="Gambar Produk" 
                                             class="img-fluid rounded" 
                                             style="max-height: 200px;">
                                    </div>
                                @endif

                                <input type="file" 
                                       class="form-control @error('image') is-invalid @enderror" 
                                       id="image" 
                                       name="image" 
                                       accept="image/*">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Deskripsi Produk --}}
                            <div class="mb-4">
                                <label for="description" class="form-label fs-5 fw-bold">Deskripsi Produk</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" 
                                          name="description" 
                                          rows="5" 
                                          placeholder="Tuliskan deskripsi produk..."
                                          required>{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tombol --}}
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
