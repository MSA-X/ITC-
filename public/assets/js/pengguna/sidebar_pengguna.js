document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.getElementById("navbar");
    const sidebar = document.getElementById("sidebar");
    const toggleSidebar = document.getElementById("toggleSidebar");
    const closeBtn = document.getElementById("closeSidebar");
    const sidebarDropdown = document.getElementById("sidebarDropdown");

    window.addEventListener("scroll", function () {
        navbar.classList.toggle("scrolled", window.scrollY > 50);
    });

    toggleSidebar?.addEventListener("click", () => {
        sidebar.classList.toggle("open");
    });

    closeBtn?.addEventListener("click", () => {
        sidebar.classList.remove("open");
    });

    document.addEventListener("click", function (event) {
        if (!sidebar.contains(event.target) && !toggleSidebar.contains(event.target)) {
            sidebar.classList.remove("open");
        }
    });

    window.addEventListener("resize", () => {
        if (window.innerWidth < 768) sidebar.classList.remove("open");
    });

    if (window.innerWidth < 768) sidebar.classList.remove("open");

    const currentPage = window.location.pathname.split("/").pop();
    const allLinks = document.querySelectorAll("a.nav-link, a.dropdown-item, .sidebar a");

    allLinks.forEach(link => {
        const href = link.getAttribute("href");
        if (href && href.includes(currentPage)) {
            link.classList.add("active", "disabled");

            const isInSidebarDropdown = link.closest("#sidebarDropdown");
            if (isInSidebarDropdown && sidebarDropdown) {
                sidebarDropdown.style.display = "block";
            }
        }
    });
});

function toggleSidebarDropdown() {
    const dropdown = document.getElementById("sidebarDropdown");
    if (dropdown) {
        dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
    }
}

const profiles = document.querySelectorAll('.profile');

profiles.forEach(profile => {
    profile.addEventListener('click', function() {
        this.classList.toggle('active');
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const logoutButton = document.getElementById("logoutButton");
    const logoutForm = document.getElementById("logoutForm");
    if (!logoutButton || !logoutForm) return;

    logoutButton.addEventListener("click", function (e) {
        e.preventDefault();

        Swal.fire({
            title: "Keluar dari Akun",
            html: `<p>Apakah anda yakin akan keluar?</p>
                    <img src="/assets/img/ilustration.jpg" width="300" height="150" style="margin-top: 20px; border-radius:10px;">`,
            background: "#256020",
            color: "#fff",
            showDenyButton: true,
            denyButtonText: "Yakin banget!",
            confirmButtonText: "Enggak jadi deh..",
            reverseButtons: true,
            draggable: true,
            confirmButtonColor: "#b4b4b4",
        }).then((result) => {
            if (result.isDenied) {
                document.getElementById("logoutForm").submit();
            }
            // Kalau batal, SweetAlert tutup dan tidak logout
        });
    })
});