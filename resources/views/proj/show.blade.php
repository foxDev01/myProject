@extends('layouts.main')

@section('content')
<main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$proj->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200"> {{ $date->translatedFormat('F')}} {{$date->day}}, {{$date->year}} • {{$date->format('H:i')}} • {{$proj->comments->count()}} коментарий </p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/' . $proj->main_image )}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                </div>
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $proj->content !!}
                    </div>
                </div>
            </section>

            
            <div class="row">
                <div class="col-lg-9 mx-auto">
                     <section class="py-3" >
                                <div class="d-flex justify-content-between" >
                                        @auth()
                                       <form action=" {{ route('proj.like.store', $proj->id) }} " method="POST" >
                                           @csrf
                                           
                                            <button type="submit" class="border-0 bg-transparent">
                                                
                                                    @if(auth()->user()->likedProjects->contains($proj->id))
                                                <i title="Не нравится" class="fas fa-thumbs-up fa-3x"></i>
                                                    @else
                                                <i title="Нравится" class="far fa-thumbs-up fa-3x"></i>    
                                                    @endif
                                            </button>
                                            <span class="fa-2x" > {{ $proj->liked_i_user_count }} </span>
                                        </form>
                                        @endauth
                                        @guest()
                                                <div> 
                                                
                                                    <i class="far fa-thumbs-up fa-3x"></i> 
                                                    <span class="fa-2x" > {{ $proj->liked_i_user_count }} </span>
                                                </div>
                                        @endguest
                                    </div>

                     </section>
                @if($relatedProjs->count() > 0 )
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Схожие проекты</h2>
                        @foreach($relatedProjs as $relatedProj)
                        <div class="row">
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <img src="{{asset('storage/' . $relatedProj->main_image )}}" alt="related post" class="post-thumbnail">
                                <p class="post-category">{{$relatedProj->category->title}}</p>
                                <a href="{{route('proj.show', $relatedProj->id)}}"> <h5 class="post-title">{{$proj->title}}</h5></a>
                            </div
                            @endforeach
                        </div>
                    @endif
                        
                       


                    </section>
                    <section class="comment-list mb-5">
                        <h2 class="section-title mb-5" data-aos="fade-up">Комментарии  ({{$proj->comments->count()}})</h2>
                            @foreach($proj->comments as $comment)
                            <div class="comment-text mb-3">
                                    <span class="username">
                                    <div>
                                        {{$comment->user->name}}
                                    </div>
                                    <span class="text-muted float-right">{{ $comment->dateAsCarbon->diffForHumans() }} </span>
                                </span><!-- /.username -->
                                    {{$comment->message}}
                            </div>
                            <hr/>
                            @endforeach
                        </section>
                    @auth()
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Добавить коментарий</h2>
                        <form action="{{route('proj.comment.store', $proj->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Коментарий</label>
                                <textarea name="message" id="comment" class="form-control" placeholder="Comment" rows="10">Коментарий</textarea>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Отправить коментарий" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection