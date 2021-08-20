@extends('admin.layout.default')

@section('title', $title)

@section('breadcrumb')
<li class="breadcrumb-item active">{{ $title }}</li>
@endsection


@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-right">
                        <a href="{{ route('admin.partner.edit') }}" class="btn btn-md btn-outline-secondary">+ Partner
                            Ekle</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 3%">#</th>
                                    <th style="width: 20%">Partner Adı</th>
                                    <th style="width: 20%">Yetkili</th>
                                    <th style="width: 20%">Telefon</th>
                                    <th style="width: 20%">E-posta</th>
                                    <th width="width: 5%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($partnerCursor as $partner)
                                    <tr>
                                        <td><i class="nav-icon far fa-circle text-{{ statusCSS($partner->status)}}"></i></td>
                                        <td>{{ $partner->name }}</td>
                                        <td>{{ $partner->cname }}</td>
                                        <td>{{ $partner->mpno }}</td>
                                        <td>{{ $partner->email }}</td>

                                        <td>
                                            <a href="{{ route('admin.partner.edit', ['partner_id' => $partner->id]) }}"
                                                class="btn btn-outline-primary btn-md">
                                                <i class="fa fa-edit"></i> Düzenle</a>
                                            <a href="{{ route('admin.partner.delete', ['partner_id' => $partner->id]) }}"
                                                class="btn btn-outline-danger btn-md">
                                                <i class="fa fa-trash"></i> Sil</a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
