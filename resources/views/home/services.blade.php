<!DOCTYPE html>
            <html>
                <head>
                    <base href="/public">

                    <style>
                        .services_section {
                            padding: 60px 0;
                        }

                        .services_taital {
                            text-align: center;
                            font-size: 36px;
                            font-weight: bold;
                            margin-bottom: 20px;
                        }

                        .services_text {
                            text-align: center;
                            font-size: 16px;
                            margin-bottom: 40px;
                            color: #777;
                        }

                        .services_section_2 {
                            display: flex;
                            justify-content: center;
                            flex-wrap: wrap;
                        }

                        .services_img {
                            width: 100%;
                            height: 200px;
                            object-fit: cover;
                            border-radius: 8px;
                            margin-bottom: 15px;
                        }

                        .services_section_2 .col-md-4 {
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                            margin-bottom: 30px;
                        }

                        .btn_main a {
                            display: inline-block;
                            padding: 10px 20px;
                            background-color: #007bff;
                            color: white;
                            border-radius: 5px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        }

                        .btn_main a:hover {
                            background-color: #0056b3;
                        }
                    </style>
                </head>
                <body>


                        <div class="page-content">
                            <div class="services_section layout_padding">
                                <div class="container">
                                    <h1 class="services_taital">Blog Posts</h1>
                                    <p class="services_text">Our blog features a diverse array of articles covering topics such as technology, lifestyle, and personal development, offering insights and inspiration for our readers.</p>
                                    <div class="services_section_2">
                                        <div class="row">
                                            @foreach ($post as $post)
                                                <div class="col-md-4">
                                                    <div><img src="/postimage/{{ $post->image }}" class="services_img"></div>
                                                    <h4>{{ $post->title }}</h4>
                                                    <p>Post By <b>{{ $post->name }}</b></p>
                                                    <div class="btn_main"><a href="{{ url('post_details', $post->id) }}">Read More</a></div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </body>
            </html>

        </div>
        </div>
    </div>
    </div>
