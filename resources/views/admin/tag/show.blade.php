@extends('admin.layouts.main')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 d-flex align-items-center">
            <h1 class="m-0 mr-2">{{$tag->title}}</h1>
            
          </div><!-- /.col -->
          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.tag.index')}}">Тэги</a></li>
              <li class="breadcrumb-item active">{{$tag->title}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        </div>
      <div class="row">
        <div class="col-5">

          <div class="card">
                
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <tbody>
                   
                        <tr>
                          <td>ID</td>
                          <td>{{$tag->id}}</td>
                          <td colspan="2" class="text-center" >Действия</td>
                        
                        </tr>
                        <tr>
                          <td>Название</td>
                          <td>{{$tag->title}}</td>
                          <td class="text-center" > <a title="Изменить" href="{{route('admin.tag.edit',$tag->id)}}" class="  text-success"  > <i  class="fas fa-edit"></i> </a></td>
                          <td class="text-center">
                          <form action="{{route('admin.tag.delete', $tag->id)}}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent">
                              <i class="fas fa-trash-alt text-danger text-center " role="button" ></i>
                            </button>
                          
                          </form>
                        </tr>
                      
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>

          </div> 
        
          <!-- ./col -->
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
</div>
  <!-- /.content-wrapper -->
  @endsection