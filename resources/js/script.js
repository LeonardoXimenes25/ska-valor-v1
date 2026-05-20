// Animasi Scroll Navbar
window.addEventListener("scroll", () => {
    const nav = document.querySelector(".navbar");
    if (window.scrollY > 50) {
        nav.classList.add("shadow-sm", "py-2");
    } else {
        nav.classList.remove("shadow-sm", "py-2");
    }
});

// Smooth Scroll
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if (target) {
            window.scrollTo({
                top: target.offsetTop - 80,
                behavior: "smooth",
            });
        }
    });
});

// students js
// Fungsi Mengisi Modal
function fillModal(name, kelas, nisn, status, email, birth) {
    document.getElementById("detName").innerText = name;
    document.getElementById("detClass").innerText = kelas;
    document.getElementById("detNisn").innerText = nisn;
    document.getElementById("detStatus").innerText = status;
    document.getElementById("detEmail").innerText = email;
    document.getElementById("detBirth").innerText = birth;

    const statusLabel = document.getElementById("detStatus");
    if (status === "Aktif") {
        statusLabel.className = "fw-semibold text-success";
    } else {
        statusLabel.className = "fw-semibold text-warning";
    }
}

// Fitur Cari & Filter Kategori
const filterInput = document.getElementById("filterInput");
const filterButtons = document.querySelectorAll(".filter-btn");
const studentRows = document.querySelectorAll(".student-row");
let currentCategory = "all";

function applyFilters() {
    const searchTerm = filterInput.value.toLowerCase();

    studentRows.forEach((row) => {
        const text = row.innerText.toLowerCase();
        const category = row.getAttribute("data-category");

        const matchesSearch = text.includes(searchTerm);
        const matchesCategory =
            currentCategory === "all" || category === currentCategory;

        if (matchesSearch && matchesCategory) {
            row.style.display = "flex";
        } else {
            row.style.display = "none";
        }
    });
}

// Event Listener untuk input pencarian
filterInput.addEventListener("keyup", applyFilters);

// Event Listener untuk tombol filter kategori
filterButtons.forEach((btn) => {
    btn.addEventListener("click", function () {
        // Update UI tombol aktif
        filterButtons.forEach((b) => b.classList.remove("active"));
        this.classList.add("active");

        // Set kategori terpilih dan filter
        currentCategory = this.getAttribute("data-filter");
        applyFilters();
    });
});
