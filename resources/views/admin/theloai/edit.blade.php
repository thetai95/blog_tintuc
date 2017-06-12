@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa Thể loại
                        <small>{{$theloai->Ten}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    @if(session('thongbaoloi'))
                        <div class="alert alert-danger">
                            {{session('thongbaoloi')}}
                        </div>
                    @endif

                    {!! Form::open(['method' => 'PUT', 'route' => ['theloai.update', $theloai->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('idTheLoai','Tên thể loại') !!}
                        {!! Form::text('Ten', $theloai->Ten, array('class' => 'form-control')) !!}
                    </div>
                    {!! Form::submit('Sửa', array('class' => 'btn btn-default')) !!}
                    {!! Form::reset('Làm mới', array('class' => 'btn btn-default')) !!}
                    {!! Form::close() !!}

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection