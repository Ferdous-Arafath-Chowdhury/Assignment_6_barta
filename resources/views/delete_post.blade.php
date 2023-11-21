<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head section -->
</head>
<body>
    <!-- Post details -->
    <div class="card">
        <div class="card-body">
            @if (session('success1')) 
                {{ session('success1') }}
            @endif
        </div> 
    <form action="{{ route('destroy' , $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
        @method('DELETE')
        @csrf

        <button type="submit">Delete</button>
    </form>
</body>
</html>
