<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col justify-center items-center">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Card 1 -->
            <div class="bg-white shadow-lg rounded-lg p-4 transform hover:scale-105 transition-transform duration-300">
                <div class="flex items-center border-b pb-4">
                    <img src="https://i.pinimg.com/736x/38/cc/46/38cc4640083a4a6be408081de15b9457.jpg" alt="Profile Photo" class="w-14 h-14 rounded-full mr-4 border-2 border-blue-500">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Tri Buana Tunggal Dewi</h2>
                        <p class="text-gray-600">Kelas: XI PPLG A</p>
                        <p class="text-gray-600">Jurusan: Pengembangan Perangkat Lunak dan Gim</p>
                        <p class="text-blue-500">Instagram: @only._wii</p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white shadow-lg rounded-lg p-4 transform hover:scale-105 transition-transform duration-300">
                <div class="flex items-center border-b pb-4">
                    <img src="https://i.pinimg.com/736x/f0/36/09/f03609250d0ee1c57aa2c0a70be2e618.jpg" alt="Profile Photo" class="w-14 h-14 rounded-full mr-4 border-2 border-green-500">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Chelo Arung Samudro</h2>
                        <p class="text-gray-600">Kelas: XI PPLG A</p>
                        <p class="text-gray-600">Jurusan: Pengembangan Perangkat Lunak dan Gim</p>
                        <p class="text-blue-500">Instagram: @grreeedd_</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="mt-8">
            <a href="{{ route('login') }}" class="bg-blue-500 text-white py-2 px-4 rounded mr-4 hover:bg-blue-600 transform hover:scale-105 transition-transform duration-300">Login</a>
            <a href="{{ route('register') }}" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transform hover:scale-105 transition-transform duration-300">Register</a>
        </div>
    </div>

</body>
</html>