<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    @include('home.homecss')

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Custom styles */
        .post-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .post-container img {
            width: 30%;
            height: auto;
            border-radius: 8px;
            margin: 20px auto;
        }

        .post-container h4 {
            margin: 10px 0;
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        .post-container p {
            font-size: 16px;
            color: #555;
            text-align: center;
        }

        .btn {
            display: block;
            width: 15%;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <!-- Header section start -->
    <div class="header_section">
        @include('home.header')

        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>

    @foreach ($post as $post)
    <div class="post-container">
        <img src="/postimage/{{ $post->image }}" alt="">
        <h4>{{ $post->title }}</h4>
        <p>{{ $post->description }}</p>
        <a onclick="return confirm('Are You Sure You Want To Delete This ?')" class="btn btn-danger" href="{{ url('my_post_del', $post->id) }}">Delete</a>

        <a class="btn btn-primary" href="{{ url('post_update', $post->id) }}">Update</a>
    </div>
    @endforeach

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
