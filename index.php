<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistem Informasi Posyandu</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-red-50 scroll-smooth">

<!-- NAVBAR -->
<nav class="fixed w-full bg-green-600 text-white shadow-md z-50">
<div class="container mx-auto px-6 py-4 flex justify-between items-center">

<h1 class="text-xl font-bold">❤️ POSYANDU</h1>

<div class="hidden md:flex gap-6 font-medium">
<a href="#home" class="hover:text-green-200">Home</a>
<a href="#balita" class="hover:text-green-200">Balita</a>
<a href="#imunisasi" class="hover:text-green-200">Imunisasi</a>
<a href="#penimbangan" class="hover:text-green-200">Penimbangan</a>
<a href="#kegiatan" class="hover:text-green-200">Kegiatan</a>
</div>

<a href="auth/login.php"
class="bg-white text-green-600 px-4 py-2 rounded-lg font-semibold hover:bg-green-100">
Login
</a>

</div>
</nav>

<!-- HERO -->
<section id="home" class="h-screen flex items-center pt-20 bg-green-100">
<div class="container mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">

<div>
<h1 class="text-5xl font-bold text-green-700 mb-6 leading-tight">
Sistem Informasi Posyandu Digital
</h1>

<p class="text-gray-700 mb-4 text-lg">
Membantu kader dalam mengelola data balita,
imunisasi, penimbangan, dan kegiatan posyandu
secara cepat dan terintegrasi.
</p>

<a href="login.php"
class="bg-green-600 text-white px-6 py-3 rounded-lg shadow hover:bg-green-700">
Masuk Sekarang
</a>
</div>

<div>
<img loading="lazy"
src="https://images.unsplash.com/photo-1584515933487-779824d29309?w=900"
class="rounded-xl shadow-lg w-full h-[420px] object-cover">
</div>

</div>
</section>

<!-- BALITA -->
<section id="balita" class="h-screen flex items-center bg-white">
<div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

<div>
<img loading="lazy"
src="https://images.unsplash.com/photo-1519689680058-324335c77eba?w=900"
class="rounded-xl shadow-lg w-full h-[420px] object-cover">
</div>

<div>
<h2 class="text-4xl font-bold text-green-600 mb-4">👶 Data Balita</h2>
<p class="text-gray-700 mb-4">
Pendataan lengkap identitas balita beserta orang tua
dan alamat untuk monitoring kesehatan.
</p>

<ul class="space-y-2 text-gray-700">
<li>✔ Data lengkap balita</li>
<li>✔ Riwayat pertumbuhan</li>
<li>✔ Informasi orang tua</li>
<li>✔ Penyimpanan aman</li>
</ul>
</div>

</div>
</section>

<!-- IMUNISASI -->
<section id="imunisasi" class="h-screen flex items-center bg-green-50">
<div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

<div>
<h2 class="text-4xl font-bold text-green-600 mb-4">💉 Sistem Imunisasi</h2>
<p class="text-gray-700 mb-4">
Monitoring imunisasi balita agar tidak ada
vaksin yang terlewat.
</p>

<ul class="space-y-2 text-gray-700">
<li>✔ Status imunisasi lengkap</li>
<li>✔ Riwayat vaksin</li>
<li>✔ Laporan bulanan</li>
<li>✔ Data terintegrasi</li>
</ul>
</div>

<div>
<img loading="lazy"
src="https://images.unsplash.com/photo-1612277795421-9bc7706a4a34?w=900"
class="rounded-xl shadow-lg w-full h-[420px] object-cover">
</div>

</div>
</section>

<!-- PENIMBANGAN -->
<section id="penimbangan" class="h-screen flex items-center bg-white">
<div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

<div>
<img loading="lazy"
src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?w=900"
class="rounded-xl shadow-lg w-full h-[420px] object-cover">
</div>

<div>
<h2 class="text-4xl font-bold text-green-600 mb-4">⚖️ Penimbangan Balita</h2>
<p class="text-gray-700 mb-4">
Pencatatan berat badan dan tinggi badan balita
untuk memantau tumbuh kembang secara rutin.
</p>

<div class="grid grid-cols-2 gap-4 text-sm text-gray-700">
<div class="bg-green-50 p-4 rounded shadow">
📊 Berat Badan
</div>
<div class="bg-green-50 p-4 rounded shadow">
📏 Tinggi Badan
</div>
<div class="bg-green-50 p-4 rounded shadow">
📈 Grafik Pertumbuhan
</div>
<div class="bg-green-50 p-4 rounded shadow">
🗓 Riwayat Bulanan
</div>
</div>

</div>

</div>
</section>

<!-- KEGIATAN -->
<section id="kegiatan" class="h-screen flex items-center bg-green-50">
<div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">

<div>
<h2 class="text-4xl font-bold text-green-600 mb-4">📅 Kegiatan Posyandu</h2>
<p class="text-gray-700 mb-4">
Kelola jadwal kegiatan dan dokumentasi
posyandu secara sistematis.
</p>

<ul class="space-y-2 text-gray-700">
<li>✔ Jadwal kegiatan</li>
<li>✔ Dokumentasi kegiatan</li>
<li>✔ Laporan bulanan</li>
<li>✔ Arsip digital</li>
</ul>
</div>

<div>
<img loading="lazy"
src="https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?w=900"
class="rounded-xl shadow-lg w-full h-[420px] object-cover">
</div>

</div>
</section>

<!-- FOOTER -->
<footer class="bg-green-600 text-white text-center py-4">
© <?= date('Y'); ?> Sistem Informasi Posyandu
</footer>

</body>
</html>