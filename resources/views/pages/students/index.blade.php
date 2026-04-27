@extends('layouts.app')

@section('content')
    <div class="container main-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold m-0">E-Student Directory</h3>
            <p class="text-muted small m-0">Kelola daftar siswa berdasarkan peminatan bahasa dan teknologi</p>
        </div>
        <button class="btn btn-dark rounded-3 px-4 shadow-sm">
            <i class="bi bi-plus-lg me-2"></i>Tambah Siswa
        </button>
    </div>

    <!-- Search Section -->
    <div class="search-bar shadow-sm">
        <i class="bi bi-search text-muted"></i>
        <input type="text" id="filterInput" placeholder="Cari berdasarkan nama, NISN, atau kelas...">
    </div>

    <!-- Category Filter Tags -->
    <div class="filter-tags" id="categoryFilters">
        <button class="filter-btn active" data-filter="all">Semua</button>
        <button class="filter-btn" data-filter="komputer">Komputer</button>
        <button class="filter-btn" data-filter="inggris">Inggris</button>
        <button class="filter-btn" data-filter="jepang">Jepang</button>
        <button class="filter-btn" data-filter="korea">Korea</button>
        <button class="filter-btn" data-filter="ekivalensia">Ekivalensia</button>
    </div>

    <!-- List Section -->
    <div class="list-card">
        @foreach ($students as $student)
        <div id="studentListContainer">
            <!-- Item 1 - Komputer -->
            <div class="student-row" data-category="komputer">
                <div class="avatar-sm">
                    <i class="bi bi-laptop"></i>
                </div>
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center gap-2">
                        <span class="fw-bold mb-0">{{$student->name}}</span>
                        <span class="category-label">{{$student->programCategory->name}}</span>
                    </div>
                    <div class="text-muted small">{{$student->student_id}}</div>
                </div>
                <div class="me-4 d-none d-md-block">
                    <span class="status-pill bg-success-subtle text-success">{{$student->status}}</span>
                </div>
                <div>
                    <button class="btn btn-outline-primary btn-detail px-3" 
                            data-bs-toggle="modal" 
                            data-bs-target="#detailModal"
                            onclick="fillModal(
                                '{{$student->name}}', 
                                '{{$student->programCategory->name}}', 
                                '{{$student->student_id}}', 
                                '{{$student->status}}', 
                                '{{$student->birth_place}}', '
                                '{{$student->birth_date}}')">
                        Detail <i class="bi bi-chevron-right ms-1"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Detail Profil Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="avatar-sm" style="width: 60px; height: 60px; font-size: 1.8rem;">
                        <i class="bi bi-person-check"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-0" id="detName">{{$student->name}}</h4>
                        <span id="detClass" class="text-primary fw-medium">Kelas</span>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-6">
                        <div class="info-label">NRE</div>
                        <div id="detNisn" class="fw-semibold">{{$student->student_id}}</div>
                    </div>
                    <div class="col-6">
                        <div class="info-label">Status</div>
                        <div id="detStatus" class="fw-semibold text-success">{{ $student->status }}</div>
                    </div>
                    <div class="col-12">
                        <div class="info-label">Fatin Moris & Data Moris</div>
                        <div id="detBirth" class="fw-semibold text-dark">{{$student->date_of_birth}}, {{$student->place_of_birth}}</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 p-4">
                <button type="button" class="btn btn-light w-100 py-2 rounded-3 fw-bold" data-bs-dismiss="modal">Taka</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

