@extends('layouts.app')

@section('title', 'Portal Informasaun')

@section('content')
<div id="list-view">
        <header class="container py-5 text-center">
            <h2 class="display-5 fw-bold mb-3 text-dark">Informasi Terkini & Terpercaya</h2>
            <p class="text-muted mx-auto lead" style="max-width: 700px;">Temukan artikel menarik seputar teknologi, kesehatan, dan gaya hidup setiap harinya hanya di portal kami.</p>
        </header>

        <main class="container pb-5">
            <div class="row g-4" id="article-container">
                <!-- Contoh Struktur yang bisa di-looping Laravel nantinya -->
                <!-- @foreach($articles as $article) -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100">
                        <img src="{{asset('storage/' . $article->image)}}" class="card-img-top" alt="{{$article->title}}">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="badge badge-category rounded-pill">{{$article->articleCategory->name}}</span>
                                <small class="text-muted"><i class="bi bi-calendar3 me-1"></i>{{$article->published_at->format('d-m-Y')}}</small>
                            </div>
                            <h5 class="card-title fw-bold mb-3">{{$article->title}}</h5>
                            <p class="card-text text-muted small line-clamp-3 mb-4">{{$article->excerpt}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-secondary fw-medium">Oleh: Budi Santoso</small>
                                <span class="text-primary fw-bold small">
                                    <a href="{{route('detail-article', $article->slug)}}">Baca</a> <i class="fas fa-chevron-right ms-1" style="font-size: 0.7rem;"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
    @endforeach

    {{-- pagination --}}
    {{-- {{ $this->posts->links() }} --}}
@endsection

    {{-- css --}}
    @push('styles')
        <style>
        .card {
            border: none;
            border-radius: 1rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .card-title:hover {
            color: #2563eb
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            height: 220px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.05);
        }

        .badge-category {
            background-color: #eff6ff;
            color: #2563eb;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.7rem;
            padding: 0.5em 0.8em;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .article-content img {
            border-radius: 1.25rem;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .btn-primary {
            background-color: #2563eb;
            border: none;
            border-radius: 2rem;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: #f1f5f9;
            color: #64748b;
            transition: all 0.3s;
            text-decoration: none;
        }

        .social-icon:hover {
            background-color: #2563eb;
            color: white;
        }
</style>
    @endpush

