<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <base href="/public">
    @include('home.homecss')

    <style>
        .post-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            gap: 20px; /* Space between text and image */
            text-align: center;
        }

        .post-card:hover {
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .post-text {
            flex: 1;
            padding-right: 20px;
            text-align: left;
        }

        .post-text h4 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .post-text p {
            font-size: 14px;
            margin-bottom: 20px;
            color: #777;
        }

        .services_img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin: 0 auto; /* Center the image */
        }

        .services_img:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

    </style>
</head>
<body>
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')
        <!-- banner section start -->
    </div>

    <div class="post-card">
        <div class="post-text">
            <h4>{{ $post->title }}</h4>
            <p>Post By <b>{{ $post->name }}</b></p>
        </div>
        <div>
            <img src="/postimage/{{ $post->image }}" class="services_img">
        </div>
    </div>
</body>
</html>
