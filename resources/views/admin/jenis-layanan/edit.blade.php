<x-layout>
    <x-slot name="title">
        Edit jenis layanan 
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Form Edit jenis layanan </h4>
        </div>
        <div class="card-content">
            @php
                $role = Auth::user()->role; // Ambil role user yang sedang login
            @endphp
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route($role . '.jenis-layanan.update' , $jenis->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-4">
                                <label for="first-name-horizontal-icon">nama jenis</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="nama jenis"
                                            id="first-name-horizontal-icon" name="nama_jenis" value="{{ old('nama_jenis', $jenis->nama_jenis) }}"> 
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                                @error('nama_jenis')
                                        <small>{{ $message }}</small>
                                    @enderror
                            </div>
                            
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset"
                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>