<?php
session_start();

// ambil nilai session dari register_proses.php
$error = $_SESSION["error"] ?? null;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center">
 
  <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">
      Login
    </h2>

    <?php if (isset($error)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-4">
            <strong class="font-bold">Gagal!</strong>
            <span><?php echo $error ?></span>
        </div>
    <?php endif; ?>
 
    <form class="space-y-4" action="login_proses.php" method="POST">
     
 
      <div>
        <label class="block text-sm text-gray-600 mb-1">Email</label>
        <input
          type="email"
          name="email"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
          placeholder="email@example.com"
        />
        
      </div>
 
      <div>
        <label class="block text-sm text-gray-600 mb-1">Password</label>
        <input
          type="password"
          name="password"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
          placeholder="*******"
        />
       
      </div>
 
      <button
        type="submit"
        class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition"
      >
        Login
      </button>
    </form>
  </div>
 
</body>
</html>
<?php
// menghapus session berdasarkan nilai didalamnya
unset($_SESSION["error"]);
?>