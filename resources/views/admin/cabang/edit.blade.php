<x-layout>
    <x-slot name="title">
        Edit Cabang
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Form Add Cabang </h4>
        </div>
        <div class="card-content">
            @php
                $role = Auth::user()->role; // Ambil role user yang sedang login
            @endphp
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route($role . '.cabang.store') }}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="row">

                            <div class="col-md-4">
                                <label for="first-name-horizontal-icon">nama cabang</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="nama cabang"
                                            id="first-name-horizontal-icon" name="nama_cabang" value="{{ old('nama_cabang', $cabang->nama_cabang) }}"> 
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                                @error('nama_cabang')
                                        <small>{{ $message }}</small>
                                    @enderror
                            </div>

                            
                            <div class="col-md-4">
                                <label for="role-select">operator cabang</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <select class="form-control" required id="role-select" name="id_operator_cabang">
                                            <option value="">Pilih operator</option>
                                            @foreach ($OP as $op)
                                                <option value="{{ $op->id }}" {{ old('id_operator_cabang', $cabang->id_operator_cabang) == $op->id ? 'selected' : '' }}>
                                                    {{ $op->username }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                    @error('id_operator_cabang')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                            </div>
                            
                            <div class="col-md-4">
                                <label for="email-horizontal-icon">alamat</label>
                            </div>
                            <d<div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <textarea class="form-control" placeholder="Alamat" id="alamat-horizontal-icon" name="alamat">{{ old('alamat' , $cabang->alamat) }}</textarea>
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                                @error('alamat')
                                    <small class="text-danger">{{ $message }}</small>
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