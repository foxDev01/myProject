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

            <div class="row">
                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">
                            @foreach( $randomProjs as $proj )
                            <div class="col-md-6 blog-post" data-aos="fade-up">
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
                                                <i title="Не нравится" class="fas fa-thumbs-up "></i>
                                                    @else
                                                <i title="Нравится" class="far fa-thumbs-up "></i>    
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
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
               
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Популярное</h5>
                        <ul class="post-list">
                        @foreach($likedProjs as $proj)
                            <li class="post">
                                <a href="{{route ('proj.show', $proj->id)}}" class="post-permalink media">
                                    <img src="{{'storage/'. $proj->preview_image}}" alt="blog post">
                                    <div class="media-body">
                                        <h6 class="post-title">{{$proj->title}}</h6>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                           
                    </div>
                    <div class="widget">
                        <h5 class="widget-title">Категории</h5>
                        <img src="{{asset('assets/images/blog_widget_categories.png')}} " alt="categories" class="w-100">

                        <ul class="list-group">
                        @foreach($categories as $category)
                           
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('category.proj.index', $category->id) }}">{{$category->title}} </a>
                                
                            </li>

                            @endforeach
                            <li class="list-group-item d-flex justify-content-between align-items-center" >
                                <div  style="margin-left: 90px ;" >
                             {{ $categories->links() }}
                             </div>
                            </li>
                        </div>
                        
                     </ul>
                        

                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection