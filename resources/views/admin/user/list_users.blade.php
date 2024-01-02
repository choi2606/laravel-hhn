@extends('layouts.admin')
@section('title')
<title>SBG Admin | Người Dùng</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('owner/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
@endsection
@section('breadcrumbs')
    <li><a href="#">Quản lý người dùng</a></li>
    <li class="active">dữ liệu người dùng</li>
@endsection
@section('content')

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Dữ liệu người dùng</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên người dùng</th>
                                        <th>Email</th>
                                        <th>Vai trò</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 1; @endphp
                                    @forelse($users as $user)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role == 1 ? 'Quản lý' : 'Khách hàng' }}</td>
                                        </tr>
                                    @empty
                                        No users
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
    <div class="clearfix"></div>
@endsection
@section('js')
    <script src="{{ asset('owner/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('owner/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('owner/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('owner/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('owner/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('owner/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('owner/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('owner/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('owner/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('owner/assets/js/init/datatables-init.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>
@endsection
