@extends('layouts.main')
@section('content')
<main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up"> Категории</h1>
            <section class="featured-posts-section">              
            <ul>
                @foreach($categories as $category)
                 <li class="list-group-item d-flex justify-content-between align-items-center" > <a href="{{ route('category.proj.index', $category->id) }}">{{$category->title}} </a> </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between align-items-center" > 
                
                    <div class="mx-auto" >
                             {{ $categories->links() }}
                            </div>
                    
                </li>
            </ul>
            
            </section>
        </div>
    </main>
@endsection