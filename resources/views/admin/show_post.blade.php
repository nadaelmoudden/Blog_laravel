<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('admin.css')

    <style>
        .title_deg {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            padding-top: 25px;
            color: white;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #333;
            color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #555;
        }

        th {
            background-color: #444;
            font-weight: bolder;
        }

        tr:hover {
            background-color: #555;
        }

        tr:last-child td {
            border-bottom: none;
        }

        td img {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
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
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>

                    {{ session('message') }}
                </div>
            @endif

            <h1 class="title_deg">All Posts</h1>

            <table>
                <thead>
                    <tr>
                        <th>Post Title</th>
                        <th>Description</th>
                        <th>Post By</th>
                        <th>Post Status</th>
                        <th>UserType</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Edit</th>
                        <th>Status Accept</th>
                        <th>Status Reject</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post->post_status }}</td>
                            <td>{{ $post->usertype }}</td>
                            <td>
                                <img src="postimage/{{ $post->image }}" alt="">
                            </td>
                            <td>
                                {{-- <a href="{{ url('delete_post', $post->id) }}" class="btn btn-danger" onclick="return confirm('Are You Sure You Want Delete This Post ?')">Delete</a> --}}
                                <a href="{{ url('delete_post', $post->id) }}" class="btn btn-danger"
                                    onclick="confirmation(event)">Delete</a>
                            </td>
                            <td>
                                <a href="{{ url('edit_page', $post->id) }}" class="btn btn-success">Edit</a>
                            </td>
                            <td>
                                <a onclick="return confirm('Are You Sure To Active This Post ?')"
                                    class="btn btn-outline-secondary"
                                    href="{{ url('accept_post', $post->id) }}">Accept</a>
                            </td>
                            <td>
                                <a onclick="return confirm('Are You Sure To Reject This Post ?')"
                                    href="{{ url('reject_post', $post->id) }}" class="btn btn-primary">Reject</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script>
            function confirmation(ev) {
                ev.preventDefault();

                var urlToRedirect = ev.currentTarget.getAttribute('href');
                console.log(urlToRedirect);

                swal({
                        title: 'Are You Sure You Want To Delete This Post',
                        text: 'If You Delete This Post It Will Be Permanently Deleted',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })

                    .then((willCancel) => {
                        if (willCancel) {
                            window.location.href = urlToRedirect;
                        }
                    });
            }
        </script>

        @include('admin.footer')
</body>

</html>
