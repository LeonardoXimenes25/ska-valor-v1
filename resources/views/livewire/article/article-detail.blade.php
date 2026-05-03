<div class="article-detail mt-2 pt-5">
    <header class="article-header">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">{{$article->articleCategory->name}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$article->slug}}</li>
                </ol>
            </nav>
            
            <div class="row">
                <div class="col-lg-8">
                    <a href="#" class="category-badge mb-3 d-inline-block bg-{{ $article->articleCategory->color_class }}">{{$article->articleCategory->name}}</a>
                    <h1 class="display-4 mb-4">{{$article->title}}</h1>
                    <div class="d-flex align-items-center mb-4 text-muted">
                        <img src="https://i.pravatar.cc/150?u=johndoe" alt="Author" class="rounded-circle me-2" width="40">
                        <span class="me-3">Oleh <strong>Budi Santoso</strong></span>
                        <span class="me-3"><i class="bi bi-calendar3 me-1"></i>{{$article->published_at->format('d-m-Y')}}</span>
                        <span><i class="bi bi-clock me-1"></i>{{$article->created_at->diffForHumans()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="container mb-5">
        <div class="row">
            <!-- Main Content Area -->
            <div class="col-lg-8">
                <article class="article-content">
                    <img src="{{asset('storage/' . $article->image)}}" alt="AI Technology Visualization" class="shadow-sm" loading="lazy">

                    {!!$article->content!!}
                    
                    <!-- Share Buttons -->
                    <div class="d-flex align-items-center gap-3 mt-5 py-4 border-top border-bottom">
                        <span class="fw-bold">Bagikan:</span>
                        <button class="btn btn-outline-primary btn-sm rounded-pill px-3"><i class="bi bi-facebook me-1"></i> Facebook</button>
                        <button class="btn btn-outline-info btn-sm rounded-pill px-3"><i class="bi bi-twitter me-1"></i> Twitter</button>
                        <button class="btn btn-outline-success btn-sm rounded-pill px-3"><i class="bi bi-whatsapp me-1"></i> WhatsApp</button>
                    </div>

                    <!-- Author Box -->
                    <div class="author-box">
                        <img src="https://i.pravatar.cc/150?u=johndoe" alt="Author" class="author-img border border-3 border-white shadow-sm">
                        <div>
                            <h5 class="mb-1">Budi Santoso</h5>
                            <p class="text-muted small mb-2">Penulis Teknologi & Futuris</p>
                            <p class="mb-0 small text-secondary">Budi telah menulis tentang perkembangan teknologi selama lebih dari 10 tahun dan memiliki ketertarikan khusus pada etika AI.</p>
                        </div>
                    </div>

                    <!-- Comment Section -->
                    <section class="comment-section shadow-sm">
                        <h4 class="mb-4">Tinggalkan Komentar</h4>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg bg-light border-0" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control form-control-lg bg-light border-0" placeholder="Email" required>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control form-control-lg bg-light border-0" rows="4" placeholder="Tulis komentar Anda..." required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-5 py-2 fw-bold">Kirim Komentar</button>
                                </div>
                            </div>
                        </form>
                    </section>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sticky-sidebar">
                    <!-- Search Widget -->
                    <div class="card sidebar-card p-4">
                        <h5 class="mb-3 fw-bold">Cari Artikel</h5>
                        <div class="input-group">
                            <input type="text" class="form-control border-end-0" placeholder="Ketik kata kunci...">
                            <button class="btn btn-primary border-start-0 px-3"><i class="bi bi-search"></i></button>
                        </div>
                    </div>

                    <!-- Top Articles Widget -->
                @foreach ($topArticles as $top)
                <div class="card sidebar-card p-4">
                    <h5 class="mb-4 fw-bold">Top Articles</h5>
                    
                    <a href="#" class="top-article-item">
                        <img src="{{$top->image}}" alt="{{$top->title}}" class="top-article-img" loading="lazy">
                        <div>
                            <h6 class="mb-1 fw-bold lh-sm">{{$top->title}}</h6>
                            <small class="text-muted">{{$top->published_at->format('d-m-Y')}}</small>
                        </div>
                    </a>
                </div>
                @endforeach

                    <!-- Newsletter Widget -->
                    <div class="card sidebar-card p-4 bg-primary text-white border-0">
                        <h5 class="mb-3 fw-bold">Newsletter</h5>
                        <p class="small opacity-75">Dapatkan update artikel menarik langsung ke email Anda setiap minggunya.</p>
                        <input type="email" class="form-control mb-2" placeholder="Alamat Email">
                        <button class="btn btn-light w-100 fw-bold text-primary">Langganan Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@push('styles')
    <style>
        .article-header {
            padding: 60px 0 40px;
            background-color: #fff;
        }
        .article-content img {
            border-radius: 12px;
            margin-bottom: 30px;
            width: 100%;
            height: auto;
        }
        .category-badge {
            background-color: #e9ecef;
            color: #0d6efd;
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            text-decoration: none;
        }
        .sidebar-card {
            background: white;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        .top-article-item {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            text-decoration: none;
            color: inherit;
            transition: opacity 0.2s;
        }
        .top-article-item:hover {
            opacity: 0.8;
            color: #0d6efd;
        }
        .top-article-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
        }
        .comment-section {
            background: white;
            padding: 40px;
            border-radius: 12px;
            margin-top: 50px;
        }
        .author-box {
            background: #f1f3f5;
            padding: 30px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 20px;
            margin: 40px 0;
        }
        .author-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }
        .sticky-sidebar {
            position: sticky;
            top: 90px;
        }
    </style>
@endpush
