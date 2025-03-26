<x-layout>
    <x-slot name="title">
        Edit user
    </x-slot>

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Form Edit user </h4>
        </div>
        <div class="card-content">
            {{-- @php
                            $role = Auth::user()->role; // Ambil role user yang sedang login
                        @endphp --}}
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('operator_cabang.user.update' , $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="first-name-horizontal-icon">Name</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Name"
                                            id="first-name-horizontal-icon" name="name" value="{{ old('name', $user->name) }}"> 
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                    @error('name')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-4">
                                <label for="first-name-horizontal-icon">username</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="username"
                                            id="first-name-horizontal-icon" name="username" value="{{ old('username', $user->username) }}"> 
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                    @error('username')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="email-horizontal-icon">Email</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="email" class="form-control" placeholder="Email"
                                            id="email-horizontal-icon" name="email" value="{{ old('email', $user->email) }}">
                                        <div class="form-control-icon">
                                            <i class="bi bi-envelope"></i>
                                        </div>
                                    </div>
                                    @error('email')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="role-select">Role</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <select class="form-control" required id="role-select" name="role" value="{{ old('role', $user->role) }}">
                                            <option value="">Pilih Role</option>
                                            <option value="operator_cabang">operator cabang</option>
                                            <option value="bag_pelaksanaan_cabang">bagian pelaksannan</option>
                                        </select>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                    @error('role')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <label for="password-horizontal-icon">Password</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="password" class="form-control" placeholder="Password" name="password" id="password-horizontal-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-lock"></i>
                                        </div>
                                    </div>
                                    @error('password')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="password-horizontal-icon">confirm Password</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <input type="password" class="form-control" placeholder="confirm Password" name="password_confirmation" id="password-horizontal-icon">
                                        <div class="form-control-icon">
                                            <i class="bi bi-lock"></i>
                                        </div>
                                    </div>
                                </div>
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