<!-- BOXICONS -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<style>
.menu-item {
    position: relative;
    overflow: hidden;
    transition: all 0.25s ease;
}

/* HOVER */
.menu-item:hover {
    transform: translateX(6px);
    background: rgba(255,255,255,0.10);
}

/* ACTIVE */
.menu-item.active {
    background: linear-gradient(90deg, rgba(255,255,255,0.18), transparent);
    backdrop-filter: blur(10px);
    box-shadow: inset 0 0 15px rgba(255,255,255,0.1);
}

/* GARIS KIRI */
.menu-item::before {
    content: "";
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%) scaleY(0);
    width: 4px;
    height: 60%;
    background: #ccff33;
    border-radius: 10px;
    transition: transform 0.25s ease;
}

.menu-item.active::before {
    transform: translateY(-50%) scaleY(1);
}

/* ICON */
.menu-icon {
    font-size: 18px;
    transition: 0.25s;
}

.menu-item:hover .menu-icon {
    transform: scale(1.15);
}

/* TITLE */
.menu-title {
    font-size: 11px;
    opacity: 0.6;
    padding: 10px 12px 4px;
}
</style>

<aside class="fixed bg-gradient-to-b from-[#006400] via-[#38b000] to-[#006400] w-64 min-h-screen shadow-2xl hidden md:flex flex-col text-white">

    <!-- HEADER -->
    <div class="p-5 text-xl font-bold border-b border-white/20 flex items-center gap-3 tracking-wide">
        <i class='bx bx-clinic text-2xl'></i>
        <span>POSYANDU</span>
    </div>

    <nav class="mt-4 flex-1 text-sm">

        <div class="menu-title">MENU KADER</div>

        <a href="dashboard_kader.php?page=home" class="menu-item flex items-center gap-3 px-4 py-2 mx-2 rounded-xl">
            <i class='bx bx-home-alt-2 menu-icon'></i>
            <span>Dashboard</span>
        </a>

        <a href="dashboard_kader.php?page=kelola_ibu_hamil" class="menu-item flex items-center gap-3 px-4 py-2 mx-2 rounded-xl">
            <i class='bx bx-female menu-icon'></i>
            <span>Ibu Hamil</span>
        </a>

        <a href="dashboard_kader.php?page=kesehatan_ibu_hamil" class="menu-item flex items-center gap-3 px-4 py-2 mx-2 rounded-xl">
            <i class='bx bx-heart-circle menu-icon'></i>
            <span>Kesehatan Ibu</span>
        </a>

        <a href="dashboard_kader.php?page=kelola_balita" class="menu-item flex items-center gap-3 px-4 py-2 mx-2 rounded-xl">
            <i class='bx bx-child menu-icon'></i>
            <span>Balita</span>
        </a>

        <a href="dashboard_kader.php?page=kesehatan_balita" class="menu-item flex items-center gap-3 px-4 py-2 mx-2 rounded-xl">
            <i class='bx bx-plus-medical menu-icon'></i>
            <span>Kesehatan Balita</span>
        </a>

        <a href="dashboard_kader.php?page=penimbangan" class="menu-item flex items-center gap-3 px-4 py-2 mx-2 rounded-xl">
            <i class='bx bx-line-chart menu-icon'></i>
            <span>Penimbangan</span>
        </a>

        <a href="dashboard_kader.php?page=imunisasi" class="menu-item flex items-center gap-3 px-4 py-2 mx-2 rounded-xl">
            <i class='bx bx-injection menu-icon'></i>
            <span>Imunisasi</span>
        </a>

        <a href="dashboard_kader.php?page=kegiatan" class="menu-item flex items-center gap-3 px-4 py-2 mx-2 rounded-xl">
            <i class='bx bx-calendar-event menu-icon'></i>
            <span>Kegiatan</span>
        </a>

    </nav>

    <!-- LOGOUT (FIX RAPI) -->
    <div class="p-4 border-t border-white/20">
        <a href="../../auth/logout.php"
        onclick="return confirm('Yakin ingin logout?')"
        class="menu-item flex items-center gap-3 px-4 py-2 mx-2 rounded-xl text-red-200 hover:text-white hover:bg-red-500/20 transition">
            
            <i class='bx bx-log-out menu-icon'></i>
            <span>Logout</span>
        </a>
    </div>

</aside>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const menuItems = document.querySelectorAll(".menu-item");
    const urlParams = new URLSearchParams(window.location.search);
    const currentPage = urlParams.get("page");

    menuItems.forEach(item => {
        const link = item.getAttribute("href");

        if (link.includes("page=" + currentPage)) {
            item.classList.add("active");
        }

        item.addEventListener("click", function () {
            menuItems.forEach(i => i.classList.remove("active"));
            this.classList.add("active");
        });
    });

});
</script>