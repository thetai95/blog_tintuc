@extends('admin.layout.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thể Loại
                        <small>Danh sách</small>
                    </h1>
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
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Tên không dấu</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($theloai as $tl)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $tl->id }}</td>
                            <td>{{ $tl->Ten }}</td>
                            <td>{{ $tl->TenKhongDau }}</td>
                            <td class="center">
                                {!! Form::open(['method' => 'delete', 'route' => ['theloai.destroy', $tl->id]]) !!}
                                {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                            <td class="center">
                                <a class="btn btn-info" href="{{ route('theloai.edit', ['id' => $tl->id]) }}"> Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection