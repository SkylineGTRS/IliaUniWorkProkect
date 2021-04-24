@extends('layouts.app')
@section('content')
    <main class="my-5">
        <div class="container">
            <!--Section: Content-->
            <section class="text-center">
                <h4 class="mb-5"><strong>Latest posts</strong></h4>

                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-lg-4 col-md-12 mb-4">
                            <div class="card" style="background-color: {{ $post['color'] }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post['name'] }}</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk of the
                                        card's content.
                                    </p>
                                    <a href="{{ route('postById', [$post['id']]) }}" class="btn btn-primary">Read</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            <!--Section: Content-->
        </div>
    </main>
@endsection
