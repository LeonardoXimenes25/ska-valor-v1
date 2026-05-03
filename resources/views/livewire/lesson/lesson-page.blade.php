<div class="lesson-page mt-4 pt-4">
     <section class="py-5 bg-light vh-100">
        <div class="container pb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold m-0">Materia Foun</h3>
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

        @if (session()->has('error'))
            <div class="alert alert-danger mt-2">
                {{ session('error') }}
            </div>
        @endif

        <div class="row g-4">
            @foreach ($lessons as $lesson)
            <!-- Materi 1: PDF -->
            <div class="col-md-6 col-lg-4">
                <div class="card card-course h-100 p-3">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-danger-subtle text-danger badge-category">{{$lesson->programCategory->name}}</span>
                            <small class="text-muted">PDF • 2.4 MB</small>
                        </div>
                        <div class="text-danger file-icon text-center">
                            <i class="bi bi-file-earmark-pdf-fill"></i>
                        </div>
                        <h5 class="card-title fw-bold mb-2">{{ $lesson->title }}</h5>
                        <p class="card-text text-muted small flex-grow-1">
                            {{ Str::limit($lesson->description, 100) }}
                        </p>
                        <div class="teacher-info">
                            <div class="teacher-img"><i class="bi bi-person"></i></div>
                            <div>
                                <p class="m-0 small fw-bold">Dr. Ahmad Faisal</p>
                                <p class="m-0 text-muted" style="font-size: 0.7rem;">Upload: {{$lesson->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                        {{-- download button start --}}
                        <button 
                            wire:click="download({{ $lesson->id }})" 
                            wire:loading.attr="disabled"
                            class="btn btn-danger w-100 fw-bold mt-3" 
                            style="border-radius: 10px;"
                        >
                            <!-- Teks saat normal -->
                            <span wire:loading.remove wire:target="download({{ $lesson->id }})">
                                <i class="bi bi-cloud-arrow-down-fill me-2"></i>Unduh Materi
                            </span>

                            <!-- Teks/Icon saat sedang proses download -->
                            <span wire:loading wire:target="download({{ $lesson->id }})">
                                <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                Menyiapkan File...
                            </span>
                        </button>
                        {{-- download button end--}}
                    </div>
                </div>
            </div>
            @endforeach

        <!-- Pagination -->
        {{-- <x-pagination :paginator="$modules" /> --}}
    </div>
    </section>
</div>
