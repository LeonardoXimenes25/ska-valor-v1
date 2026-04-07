@extends('layout.app')

@section('content')
    <section class="py-5 bg-light" style="min-height: 100vh">
        <div class="container pb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold m-0">Materi Terbaru</h3>
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Filter: Semua Kategori
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Sains</a></li>
                    <li><a class="dropdown-item" href="#">Teknologi</a></li>
                    <li><a class="dropdown-item" href="#">Bahasa</a></li>
                    <li><a class="dropdown-item" href="#">Matematika</a></li>
                </ul>
            </div>
        </div>

        <div class="row g-4">
            @foreach ($modules as $module)
            <!-- Materi 1: PDF -->
            <div class="col-md-6 col-lg-4">
                <div class="card card-course h-100 p-3">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-danger-subtle text-danger badge-category">{{$module->programCategory->name}}</span>
                            <small class="text-muted">PDF • 2.4 MB</small>
                        </div>
                        <div class="text-danger file-icon text-center">
                            <i class="bi bi-file-earmark-pdf-fill"></i>
                        </div>
                        <h5 class="card-title fw-bold mb-2">{{ $module->title }}</h5>
                        <p class="card-text text-muted small flex-grow-1">
                            {{ Str::limit($module->description, 100) }}
                        </p>
                        <div class="teacher-info">
                            <div class="teacher-img"><i class="bi bi-person"></i></div>
                            <div>
                                <p class="m-0 small fw-bold">Dr. Ahmad Faisal</p>
                                <p class="m-0 text-muted" style="font-size: 0.7rem;">Upload: {{$module->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                        <a href="{{ route('module.download', $module->id) }}" class="btn btn-primary btn-download mt-3">
                            <i class="bi bi-cloud-arrow-down-fill me-2"></i>Unduh Materi
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        <!-- Pagination -->
        <x-pagination :paginator="$modules" />
    </div>
    </section>
@endsection