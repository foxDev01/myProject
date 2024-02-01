@extends('layouts.main')
@section('content')
<main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Проекты</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($projs as $proj)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{ asset('storage/'. $proj->preview_image)}}" alt="blog post">
                        </div>
                                <div class="d-flex justify-content-between" >
                                    <p class="blog-post-category">{{$proj->category->title}}</p>
                                    @auth()
                                       <form action=" {{ route('proj.like.store', $proj->id) }} " method="POST" >
                                           @csrf
                                            <button type="submit" class="border-0 bg-transparent">
                                               
                                                    @if(auth()->user()->likedProjects->contains($proj->id))
                                                <i  title="Не нравится" class="fas fa-thumbs-up"></i>
                                                    @else
                                                <i title="Нравится"  class="far fa-thumbs-up"></i>    
                                                    @endif
                                            </button>
                                            <span> {{ $proj->liked_i_user_count }} </span>
                                        </form>
                                        @endauth
                                        @guest()
                                                <div> 
                                                    <i class="far fa-thumbs-up"></i> 
                                                    <span  > {{ $proj->liked_i_user_count }} </span>
                                                </div>
                                        @endguest
                                    </div>
                            <a href="{{route ('proj.show', $proj->id)}}" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{$proj->title}}</h6>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                    <div class="mx-auto" style="margin-top: -100px;" >
                             {{ $projs->links() }}
                            </div>
                    </div>
                            
            </section>


<!-- ------------------------------------------------------------------------->

        </div>

    </main>
@endsection