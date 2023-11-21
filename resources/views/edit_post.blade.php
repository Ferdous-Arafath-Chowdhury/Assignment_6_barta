<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div class="card">
                    <div class="card-body">
                        @if (session('success')) 
                            {{ session('success') }}
                        @endif
                    </div> 
    <form action="{{ route('update', $post->id) }}" method="POST">
        @method('PUT')
        @csrf

        <div class="text-gray-700 font-normal w-full">
            <textarea 
                class="block w-full p-2 pt-2 text-gray-900 rounded-lg border-none outline-none focus:ring-0 focus:ring-offset-0"
                name="barta"
                rows="2"
                placeholder="What's going on, Shamim">{{ $post->description }}</textarea>
        </div>

        <button type="submit">Update</button>
    </form>
</body>
</html>
