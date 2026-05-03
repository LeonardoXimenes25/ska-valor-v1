<div class="container mt-5 pt-5" style="min-height: 100vh">
    <header class="header-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">Lista Formadores SKA VALOR</h1>
            <p class="lead">No pain, no Gain.</p>
        </div>
    </header>

    <main class="container">
        <!-- Filter & Search -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <div class="filter-section">
                    <div class="row g-3">
                        <div class="col-md-5">
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control border-start-0" id="searchTeacher" placeholder="Cari nama pengajar...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select" id="filterDept">
                                <option value="">Semua Departemen</option>
                                <option value="IT">Teknologi Informasi</option>
                                <option value="Ekonomi">Ekonomi & Bisnis</option>
                                <option value="Sains">Sains Terapan</option>
                                <option value="Bahasa">Bahasa & Sastra</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary w-100" style="background-color: var(--accent-color); border: none;">Terapkan Filter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Teacher List -->
        <div class="row g-4 mb-5" id="teacherGrid">
            @foreach ($teachers as $teacher)
            <div class="col-md-6 col-lg-4 teacher-item" data-dept="{{ $teacher->department }}">
                <div class="card teacher-card h-100">
                    <div class="teacher-img-container">
                        <i class="bi bi-person-circle teacher-img-placeholder"></i>
                    </div>
                    <div class="card-body text-center">
                        <span class="badge badge-dept mb-2">{{ $teacher->department ?? 'Formador' }}</span>
                        <h5 class="card-title fw-bold">{{$teacher->full_name}}</h5>
                        <p class="text-muted mb-3 small">{{$teacher->major}}</p>
                        <div class="social-links mb-3">
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                            <a href="#"><i class="bi bi-envelope-fill"></i></a>
                            <a href="#"><i class="bi bi-google"></i></a>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-outline-primary btn-sm rounded-pill btn-detail" 
                            data-name="{{ $teacher->full_name }}"
                            data-dept="{{ $teacher->department }}"
                            data-bio="{{ $teacher->bio }}"
                            data-edu="{{ $teacher->major }} | {{ $teacher->degree_level }}"
                            data-inst="{{ $teacher->institution_name }}"
                            data-bs-toggle="modal" 
                            data-bs-target="#teacherModal">Haree Detailu</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <!-- Modal Detail Pengajar -->
    <div class="modal fade" id="teacherModal" tabindex="-1" aria-labelledby="teacherModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px;">
                <div class="modal-header border-0 bg-primary text-white" style="border-radius: 15px 15px 0 0;">
                    <h5 class="modal-title fw-bold" id="teacherModalLabel">Profil Formador</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 text-center">
                    <div class="mb-3">
                        <i class="bi bi-person-circle" style="font-size: 80px; color: #bdc3c7;"></i>
                    </div>
                    <h4 class="fw-bold mb-1" id="modalName">-</h4>
                    <p class="badge-dept px-3 py-1 rounded-pill d-inline-block mb-3" id="modalDept">-</p>
                    <hr>
                    <div class="text-start">
                        <h6 class="fw-bold"><i class="bi bi-info-circle me-2"></i>Bio</h6>
                        <p id="modalBio" class="text-muted small">-</p>
                        
                        <h6 class="fw-bold"><i class="bi bi-book me-2"></i>Edukasaun</h6>
                        <p id="modalInst" class="mb-0 fw-bold small text-primary">-</p>
                        <p id="modalEdu" class="text-muted small">-</p>
                    </div>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Taka</button>
                    <button type="button" class="btn btn-primary rounded-pill px-4">Hubungi via Email</button>
                </div>
            </div>
        </div>
    </div>
</div>
