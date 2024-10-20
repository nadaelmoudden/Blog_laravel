<!DOCTYPE html>
<html>
    <head>
        @include('admin.css')

        <style>
            .post_title {
                font-size: 30px;
                font-weight: bold;
                text-align: center;
                padding: 30px;
                color: white;
            }

            form {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #333;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
                color: white;
            }

            form div {
                margin-bottom: 15px;
            }

            label {
                display: block;
                font-weight: bold;
                margin-bottom: 5px;
                color: #ccc;
            }

            input[type="text"],
            textarea,
            input[type="file"] {
                width: 100%;
                padding: 10px;
                border: 1px solid #555;
                border-radius: 5px;
                box-sizing: border-box;
                background-color: #333;
                color: white;
            }

            input[type="submit"] {
                display: inline-block;
                padding: 10px 20px;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #0056b3;
            }

            textarea {
                resize: none;
                background-color: #333!important; /* Black background */
                color: white;
            }

            .alert {
                padding: 15px;
                margin-bottom: 20px;
                border: 1px solid transparent;
                border-radius: 4px;
                color: white;
                background-color: #5cb85c; /* Success background color */
                border-color: #4cae4c;
            }

            .alert-success {
                color: #3c763d;
                background-color: #dff0d8;
                border-color: #d6e9c6;
            }

            .alert .close {
                color: white;
                text-shadow: none;
                opacity: 0.6;
            }

            .alert .close:hover {
                color: black;
                opacity: 0.8;
            }

            .alert .close:focus {
                outline: none;
                box-shadow: none;
            }
        </style>
    </head>
    <body>
        @include('admin.header')
        <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
            @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">

            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>

                    {{ session('message') }}
                </div>
            @endif

            <h1 class="post_title">Add Post</h1>

            <div>
                <form action="{{ url('add_post') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div>
                        <label for="title">Post Title</label>
                        <input type="text" name="title" id="title">
                    </div>
                    <div>
                        <label for="description">Post Description</label>
                        <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    </div>
                    <div>
                        <label for="image">Post Image</label>
                        <input type="file" name="image" id="image">
                    </div>
                    <div>
                        <input type="submit" value="Add Post" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>

        @include('admin.footer')
    </body>
</html>


