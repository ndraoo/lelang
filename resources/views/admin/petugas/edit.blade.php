
@include('partials.header')

@include('partials.navbar')

@include('partials.sidebar')
    <div class="container">
        <h2>Edit Data Petugas</h2>
        <form method="POST" action="{{ route('admin.petugas.update', $petugas->id) }}">
            @csrf
            @method('PUT')

            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" name="nama_lengkap" value="{{ $petugas->nama_lengkap }}" required>

            <label for="username">Username:</label>
            <input type="text" name="username" value="{{ $petugas->username }}" required>

            <label for="password">Password:</label>
            <input type="password" name="password">

            <label for="password_confirmation">Konfirmasi Password:</label>
            <input type="password" name="password_confirmation">

            <label for="level">Level:</label>
            <select name="level" required>
                <option value="admin" {{ $petugas->level == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="petugas" {{ $petugas->level == 'petugas' ? 'selected' : '' }}>Petugas</option>
            </select>

            <button type="submit">Update</button>
        </form>
    </div>
    @include('partials.footer')
