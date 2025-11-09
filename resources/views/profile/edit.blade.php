@extends('layouts.layout') {{-- Menggunakan layout Bootstrap utama Anda --}}
@section('title', 'My Profile')

@section('content')

@extends('partials.navigation')
@extends('partials.header')

    <section class="page-section bg-light py-4" id="profile-settings">
        <div class="container">
            <div class="row g-3 justify-content-center">

                <!-- Left column: ringkasan profil -->
                <div class="col-lg-4">
                    <div class="card shadow-sm border-0 rounded-lg">
                        <div class="card-body text-center p-3">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=ffc800&color=000&size=128"
                                alt="Avatar" class="rounded-circle mb-3" width="96" height="96">

                            <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                            <p class="text-muted mb-2 small">{{ Auth::user()->email }}</p>

                            <div class="d-grid gap-2">
                                
                                <a href="{{ route('dashboard') }}" class="btn btn-warning btn-sm text-dark">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
                                </a>
                            </div>
                        </div>

                        <div class="card-footer bg-transparent border-0 pt-0 pb-3 text-center">
                            <small class="text-muted">Terakhir diperbarui:
                                {{ optional(Auth::user()->updated_at)->diffForHumans() ?? '-' }}</small>
                        </div>
                    </div>
                </div>

                <!-- Right column: tabs untuk forms -->
                <div class="col-lg-8">
                    <div class="card shadow-sm border-0 rounded-lg">
                        <div class="card-header bg-warning text-dark d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 fs-6">Pengaturan Akun</h4>

                            <ul class="nav nav-tabs card-header-tabs" id="profileTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="info-tab" data-bs-toggle="tab"
                                        data-bs-target="#info" type="button" role="tab" aria-controls="info"
                                        aria-selected="true">
                                        <i class="fas fa-user me-2"></i>Profil
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="password-tab" data-bs-toggle="tab"
                                        data-bs-target="#password" type="button" role="tab" aria-controls="password"
                                        aria-selected="false">
                                        <i class="fas fa-key me-2"></i>Kata Sandi
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link text-danger" id="delete-tab" data-bs-toggle="tab"
                                        data-bs-target="#delete" type="button" role="tab" aria-controls="delete"
                                        aria-selected="false">
                                        <i class="fas fa-trash-alt me-2"></i>Hapus Akun
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body p-3 p-md-4">
                            <div class="tab-content" id="profileTabsContent">
                                <div class="tab-pane fade show active" id="info" role="tabpanel"
                                    aria-labelledby="info-tab">
                                    @include('profile.partials.update-profile-information-form')
                                </div>

                                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                    @include('profile.partials.update-password-form')
                                </div>

                                <div class="tab-pane fade" id="delete" role="tabpanel" aria-labelledby="delete-tab">
                                    @include('profile.partials.delete-user-form')
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- optional small note -->
                    <div class="text-center mt-3">
                        <small class="text-muted">Tip: Gunakan tab di atas untuk mengelola profil, kata sandi, atau
                            menghapus akun.</small>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
