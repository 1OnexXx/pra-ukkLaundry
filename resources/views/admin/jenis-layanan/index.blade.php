<x-layout>
    <x-slot name="title">
        Cabang management
    </x-slot>

    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css') }}">

    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>DataTable</h3>
                    <p class="text-subtitle text-muted">A sortable, searchable, paginated table without dependencies
                        thanks to simple-datatables.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @php
            $role = Auth::user()->role; // Ambil role user yang sedang login
        @endphp
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title">
                            Simple Datatable
                        </h5>
                        <a href="{{ route($role . '.jenis-layanan.create') }}" class="btn btn-primary">+</a>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>nama jenis layanan</th>
                                <th>#</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($jenis as $j)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $j->nama_jenis }}</td>
                                    <td>
                                        <a href="{{ route($role . '.jenis-layanan.edit', $j->id) }}"
                                            class="btn btn-warning">edit</a>
                                            <form action="{{ route($role . '.jenis-layanan.destroy', $j->id) }}"
                                                method="post" onclick="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">delete</button>
                                            </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

    <script src="{{ asset('assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>


    <script src="{{ asset('assets/compiled/js/app.js') }}"></script>



    <script src="{{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/simple-datatables.js') }}"></script>
</x-layout>
