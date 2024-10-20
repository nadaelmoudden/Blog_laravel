<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- basic -->
        <base href="/public">

        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            font-weight: 500
        }

        .header_section {
            background-color: #007bff;
            color: white;
            padding: 10px 0;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-top: 20px;
        }

        form > div {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        img {
            /* max-width: 50px; */
            height: auto;
            width: 20%;
            margin-top: 5px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        </style>

        @include('home.homecss')

    </head>
    <body>
        <!-- header section start -->
        <div class="header_section">
            @include('home.header')
        </div>



        <div>
            <h1 class="header_section">Update Post</h1>
        </div>

        <div class="container">
            <form action="{{ url('update_post_data', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{ $data->title }}">
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="10">{{ $data->description }}</textarea>
                </div>
                <div>
                    <label for="image">Old Image</label>
                    <img src="/postimage/{{ $data->image }}" alt="Old Image">
                </div>
                <div>
                    <label for="image">Change Current Image</label>
                    <input type="file" name="image" id="image">
                </div>
                <div>
                    <button type="submit">Update Post</button>
                </div>
            </form>
        </div>



    </body>
</html>
