<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example Query</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Lista de Posts</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <ul>
            @foreach($posts as $post)
                <li class="mb-4">
                    <h2 class="text-lg font-semibold">{{ $post->title }}</h2>
                    <p class="text-gray-700">{{ $post->excerpt }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</div>

</body>
</html>
