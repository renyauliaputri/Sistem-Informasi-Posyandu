<div class="ml-54 bg-white shadow px-6 py-4 flex justify-between items-center fixed top-0 right-0 left-64 z-10">

    <!-- Judul -->
    <h1 class="text-lg font-bold text-gray-700">
        Sistem Informasi Posyandu
    </h1>

    <!-- User -->
    <div class="flex items-center gap-4">

        <span class="text-gray-600 text-sm">
            <?= $_SESSION['nama']; ?>
        </span>

        <a href="auth/logout.php"
           class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
           Logout
        </a>

    </div>

</div>
