<div>
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="signup-container my-5">
            <div class="signup-header mb-4 text-center">
                <h2 class="fw-bold mb-2">Formulariu Rejistrasaun</h2>
                <p class="mb-0 opacity-75">Favor kompleta ita nia dadus atu bergabung</p>
            </div>

            <div class="form-section shadow p-4 bg-white rounded">
                <form enctype="multipart/form-data" wire:submit="save">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12 mb-2">
                            <h5 class="fw-bold"><i class="bi bi-shield-lock me-2"></i>Informasaun Akun</h5>
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" wire:model="email" name="email" class="form-control"  placeholder="example@gmail.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password"  wire:model="password" name="password" class="form-control" placeholder="Mínimu 6 karaktere" required>
                        </div>

                        <div class="col-md-12 mb-2 mt-4">
                            <h5 class="fw-bold"><i class="bi bi-person-badge me-2"></i>Informasaun Privadu</h5>
                            <hr>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Naran Kompletu</label>
                            <input type="text"  wire:model="name" name="name" class="form-control" placeholder="Melsior Miranda Branco" required maxlength="60">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Sexu</label>
                            <div class="d-flex gap-3 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sex" id="sexM" value="m" {{ old('sex') == 'm' ? 'checked' : '' }} checked>
                                    <label class="form-check-label" for="sexM">Mane</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sex" id="sexF" value="f" {{ old('sex') == 'f' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="sexF">Feto</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Fatin Moris</label>
                            <input type="text"  wire:model="place_of_birth" name="place_of_birth" class="form-control" placeholder="Lospalos" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Data Moris</label>
                            <input type="date" wire:model="date_of_birth" name="date_of_birth" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Hela Fatin</label>
                            <input type="text" wire:model="address" name="address" class="form-control" rows="2" placeholder="Villa Centro" required></input>
                        </div>

                        <div class="row">
    <div class="col-md-3">
        <label>Munisipiu</label>
        <select id="municipality" name="municipality" class="form-select" required>
            <option value="">Hili...</option>
            @foreach($municipalities as $mun)
                <option value="{{ $mun }}">{{ $mun }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3">
        <label>Postu Administrativu</label>
        <select id="post" name="administrative_post" class="form-select" required disabled>
            <option value="">Hili Postu...</option>
        </select>
    </div>

    <div class="col-md-3">
        <label>Suku (Tribe)</label>
        <select id="tribe" name="tribe" class="form-select" required disabled>
            <option value="">Hili Suku...</option>
        </select>
    </div>

    <div class="col-md-3">
        <label>Aldeia (Village)</label>
        <select id="village" name="village" class="form-select" required disabled>
            <option value="">Hili Aldeia...</option>
        </select>
    </div>
</div>


                        <div class="col-md-12 mb-2 mt-4">
                            <h5 class="fw-bold"><i class="bi bi-book me-2"></i>Programa & Kontaktu</h5>
                            <hr>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Hili Programa</label>
                            <select name="program_category_id" class="form-select" required>
                                <option value="" selected disabled>Hili Kategoria...</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{ old('program_category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nu. Kontaktu (WhatsApp)</label>
                            <input type="tel" name="phone_number" class="form-control" value="{{ old('phone_number') }}" placeholder="670xxxx">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Naran Wali /Inan Aman</label>
                            <input type="text" name="parent_name" class="form-control" value="{{ old('parent_name') }}" placeholder="Naran Aman/Inan">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Numeru Wali</label>
                            <input type="tel" name="parent_phone" class="form-control" value="{{ old('parent_phone') }}" placeholder="Nomoru Telepon Wali">
                        </div>

                        <div class="col-md-12 mt-4">
                            <button type="submit" class="btn btn-primary btn-signup w-100 shadow">
                                Rejistu Agora <i class="bi bi-arrow-right ms-2"></i>
                            </button>
                        </div>

                        <div class="col-md-12 text-center mt-3">
                            <p class="text-muted small">Sudah memiliki akun? <a href="{{route('login')}}" class="text-decoration-none fw-bold">Login</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Popup Susesu --}}
    @if(session('success_popup'))
    <script>
        Swal.fire({
            title: "Rejistu Susesu!",
            text: "{{ session('success_popup') }}",
            icon: "success",
            confirmButtonColor: "#0d6efd",
            confirmButtonText: "Ok, ba Login Agora",
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('login') }}";
            }
        });
    </script>
    @endif

    {{-- Popup Error (Server/Database) --}}
    @if(session('error'))
    <script>
        Swal.fire({
            title: "Error!",
            text: "{{ session('error') }}",
            icon: "error",
            confirmButtonColor: "#dc3545"
        });
    </script>
    @endif

    {{-- Popup Validasaun (Input Sala) --}}
    @if ($errors->any())
    <script>
        Swal.fire({
            title: "Dadus La Kompleta",
            html: `
                <div style="text-align: left;">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            `,
            icon: "warning",
            confirmButtonColor: "#f89406"
        });
    </script>
    @endif
    
   <script>
document.addEventListener('DOMContentLoaded', function () {
    // Data JSON Anda
    const locationData = { /* Masukkan/Paste data JSON Anda di sini atau oper dari Laravel */ };

    const munSelect = document.getElementById('municipality');
    const postSelect = document.getElementById('post');
    const tribeSelect = document.getElementById('tribe'); // Suku
    const villageSelect = document.getElementById('village'); // Aldeia

    // 1. Munisipiu change -> Load Postu
    munSelect.addEventListener('change', function () {
        resetSelect(postSelect, 'Hili Postu...');
        resetSelect(tribeSelect, 'Hili Suku...');
        resetSelect(villageSelect, 'Hili Aldeia...');

        const munName = this.value;
        if (munName && locationData[munName]) {
            const posts = Object.keys(locationData[munName]);
            updateOptions(postSelect, posts, 'Hili Postu...');
        }
    });

    // 2. Postu change -> Load Suku (Tribe)
    postSelect.addEventListener('change', function () {
        resetSelect(tribeSelect, 'Hili Suku...');
        resetSelect(villageSelect, 'Hili Aldeia...');

        const munName = munSelect.value;
        const postName = this.value;

        if (postName && locationData[munName][postName]) {
            const tribes = Object.keys(locationData[munName][postName]);
            updateOptions(tribeSelect, tribes, 'Hili Suku...');
        }
    });

    // 3. Suku change -> Load Aldeia (Village/Array)
    tribeSelect.addEventListener('change', function () {
        resetSelect(villageSelect, 'Hili Aldeia...');

        const munName = munSelect.value;
        const postName = postSelect.value;
        const tribeName = this.value;

        if (tribeName && locationData[munName][postName][tribeName]) {
            const villages = locationData[munName][postName][tribeName]; // Ini sudah berupa Array
            updateOptions(villageSelect, villages, 'Hili Aldeia...');
        }
    });

    // Helper: Update Options
    function updateOptions(selectElement, dataArray, placeholder) {
        selectElement.innerHTML = `<option value="">${placeholder}</option>`;
        dataArray.forEach(item => {
            const option = document.createElement('option');
            option.value = item;
            option.textContent = item;
            selectElement.appendChild(option);
        });
        selectElement.disabled = false; 
    }

    // Helper: Reset Select
    function resetSelect(selectElement, placeholder) {
        selectElement.innerHTML = `<option value="">${placeholder}</option>`;
        selectElement.disabled = true;
    }
});
</script>
</div>
