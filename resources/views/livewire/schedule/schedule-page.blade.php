<div>
    <div class="container mt-5 pt-5">
        <div class="row mb-5 align-items-end">
            <div class="col-lg-8">
                <h1 class="fw-bold text-dark">Daftar Jadwal Kursus</h1>
                <p class="text-secondary mb-0">Temukan waktu belajar terbaik di Community Learning Center.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <span class="badge rounded-pill text-primary bg-primary-subtle px-3 py-2">
                    <i class="bi bi-circle-fill me-2 animate-pulse" style="font-size: 8px;"></i>
                    12 Jadwal Terbuka
                </span>
            </div>
        </div>

        <div class="filter-section p-4 mb-5">
            <div class="row g-3">
                <div class="col-md-5">
                    <label class="form-label small fw-bold text-uppercase text-muted">Cari Program</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control bg-light border-0" placeholder="Contoh: Digital Marketing...">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label small fw-bold text-uppercase text-muted">Hari</label>
                    <select class="form-select bg-light border-0">
                        <option selected>Semua Hari</option>
                        <option>Senin</option>
                        <option>Rabu</option>
                        <option>Sabtu</option>
                    </select>
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button class="btn btn-dark w-100 py-2 fw-bold rounded-3">Terapkan Filter</button>
                </div>
            </div>
        </div>

        <div class="row g-4">
            @foreach ($schedules as $schedule)
                
            <!-- Kursus 1 (Aktif) -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 course-card p-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <span class="badge bg-primary-subtle text-primary badge-id text-uppercase mb-2">{{$schedule->program->code}}</span>
                            <h5 class="fw-bold mb-0">{{$schedule->program->program_name}}</h5>
                        </div>
                        <span class="badge rounded-pill bg-success-subtle text-success">Aktif</span>
                    </div>
                    
                    <div class="d-flex align-items-center mb-4 p-2 bg-light rounded-3">
                        <div class="icon-box me-3">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                        <div>
                            <small class="text-muted d-block text-uppercase fw-bold" style="font-size: 10px;">Formador</small>
                            <span class="fw-semibold">{{$schedule->teacher->full_name}}</span>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-calendar3 me-2 text-primary"></i>
                            <span class="text-dark fw-medium">Senin & Rabu</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-clock me-2 text-primary"></i>
                            <span class="text-dark">{{$schedule->start_time}} - {{$schedule->end_time}} <small class="text-muted">OTL</small></span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-calendar-check me-2 text-primary"></i>
                            <small class="text-muted">01 Jun - 31 Agu 2024</small>
                        </div>
                    </div>
                    
                    <!-- Kuota Progress -->
                    <div class="mb-4 mt-auto">
                        <div class="d-flex justify-content-between mb-1">
                            <small class="text-muted">Sisa Kuota</small>
                            <small class="fw-bold text-primary">12 / 20 Kursi</small>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 60%"></div>
                        </div>
                    </div>
                    
                    <button class="btn btn-primary w-100 py-2 fw-bold">Daftar Sekarang</button>
                </div>
            </div>
            @endforeach

            <!-- Kursus 2 (Hampir Penuh) -->

            <!-- Kursus 3 (Penuh) -->

        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="p-5 text-center bg-white rounded-4 border border-dashed border-primary">
                    <h5 class="fw-bold">Ingin Request Program Lain?</h5>
                    <p class="text-secondary">Jika jadwal yang kamu inginkan tidak tersedia, hubungi tim admin kami.</p>
                    <a href="#" class="btn btn-outline-primary px-4 py-2 fw-bold">Hubungi WhatsApp Kami</a>
                </div>
            </div>
        </div>
    </div>
</div>
