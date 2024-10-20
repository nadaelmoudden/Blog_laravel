<html>

<head>
    @include('home.homecss')

    <style>
        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .form-container input[type="text"],
        .form-container textarea,
        .form-container input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
            box-sizing: border-box;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="header_section">
        @include('home.header')


        <div class="form-container">

            @include('sweetalert::alert')
            <h2>Add Post</h2>
            <form action="{{ url('user_post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="title">Title</label>
                <input type="text" id="title" name="title" required>

                <label for="description">Description</label>
                <textarea id="description" name="description" rows="5" required></textarea>

                <label for="image">Image</label>
                <input type="file" id="image" name="image" required>

                <button type="submit">Add Post</button>
            </form>
        </div>

</body>

</html>
