@extends('Layouts.admin')

@section('admin_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('admin_breadcrumb')
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="{{ route('Admin_index') }}" class="link"><i
                                    class="mdi mdi-home-outline fs-4"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mail Notifier</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Manage Mail</h1>
            </div>
            <div class="col-6">
                <div class="text-end upgrade-btn">
                    <a href="#" onclick="Swal.fire('Not Available Yet')" class="btn btn-primary text-white">Bulk Send
                        Notif</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('admin_content')
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="col-12">
            <div class="card p-2">
                <div class="card-title">
                    Mail Not Sent
                </div>
                <div class="table-responsive">
                    <table id="datatable-not-sent" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Email</th>
                                <th>Page</th>
                                <th>Is Notified</th>
                                <th>Input Date</th>
                                <th>Updated Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $mail_not_sent_count = 1;
                            @endphp
                            @forelse ($all_mail_not_sent as $item)
                                <tr>
                                    <th>{{ $mail_not_sent_count++ }}</th>
                                    <th>{{ $item->notifier_email }}</th>
                                    <th>{{ $item->notifier_page }}</th>
                                    <th>
                                        @if ($item->notifier_sent == 'yes')
                                            <div class="badge bg-success">Yes</div>
                                        @else
                                            <div class="badge bg-warning">No</div>
                                        @endif
                                    </th>
                                    <th>{{ date('H:i:s d M, Y', strtotime($item->created_at)) }}</th>
                                    <th>{{ date('H:i:s d M, Y', strtotime($item->updated_at)) }}</th>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card p-2">
                <div class="card-title">
                    Mail Sent
                </div>
                <div class="table-responsive">
                    <table id="datatable-sent" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Email</th>
                                <th>Page</th>
                                <th>Is Notified</th>
                                <th>Input Date</th>
                                <th>Updated Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $mail_sent_count = 1;
                            @endphp
                            @forelse ($all_mail_sent as $item)
                                <tr>
                                    <th>{{ $mail_sent_count++ }}</th>
                                    <th>{{ $item->notifier_email }}</th>
                                    <th>{{ $item->notifier_page }}</th>
                                    <th>
                                        @if ($item->notifier_sent == 'yes')
                                            <div class="badge bg-success">Yes</div>
                                        @else
                                            <div class="badge bg-warning">No</div>
                                        @endif
                                    </th>
                                    <th>{{ date('H:i:s d M, Y', strtotime($item->created_at)) }}</th>
                                    <th>{{ date('H:i:s d M, Y', strtotime($item->updated_at)) }}</th>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
@endsection

@section('admin_js')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable-not-sent').DataTable();
            $('#datatable-sent').DataTable();
        });
    </script>
@endsection
