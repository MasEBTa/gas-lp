@extends('layouts.app')

@section('css')
<style>

</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Set</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($fitur as $item)  
          <tr id="row-{{ $item->id }}"> <!-- Tambahkan atribut id pada baris tabel -->
            <td>{{ $loop->iteration }}</td>
            <td class="judul">{{ $item->title }}</td> <!-- Tambahkan kelas 'judul' pada kolom judul -->
            <td class="deskripsi">{{ $item->description }}</td> <!-- Tambahkan kelas 'deskripsi' pada kolom deskripsi -->
            <td>
              <button type="button" class="btn btn-success @if ($loop->first) disabled @endif" onclick="naikkan({{ $item->urutan }})">Naik</button>
              <button type="button" class="btn btn-danger @if ($loop->last) disabled @endif">Turun</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- fitur popular -->
    <fitur-component 
        :color-body="'rgb(248, 248, 248)'" 
        :color-secondary="'red'"
        :fitur-popular="{{ json_encode($fitur) }}"
        :base-asset="'{{ asset('storage') }}'"
        id="fitur"
    ></fitur-component>
    <!-- ./fitur popular -->
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
let csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'; // Untuk memberi tahu Laravel bahwa ini adalah permintaan Ajax

// Mendapatkan token dari cookie laravel_session
const token = document.cookie.replace(/(?:(?:^|.*;\s*)laravel_session\s*=\s*([^;]*).*$)|^.*$/, "$1");
// function getCookieValue(cookieName) {
//   const cookies = document.cookie.split("; ");
//   for (let i = 0; i < cookies.length; i++) {
//     const cookie = cookies[i].split("=");
//     if (cookie[0] === cookieName) {
//       return cookie[1];
//     }
//   }
//   return null;
// }

// const laravelSession = getCookieValue("laravel_session");

// Menyertakan token Sanctum dalam setiap permintaan
axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

// Melakukan permintaan untuk mengambil data dari API
axios.get('/api/data/fitur')
  .then(response => {
    console.log(response.data); // Menampilkan data dari API
  })
  .catch(error => {
    console.error(error);
  });

// function naikkan(param) {
//   axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;
//   axios.put('/fiture/naik', {urutan: param})
//     .then(function (response) {
//       console.log(response);
//       // Berhasil diperbarui, lakukan tindakan yang diperlukan
//       // Memperbarui data di tabel

//       let rowId = response.data.id;
//       let row = document.getElementById('row-' + rowId);
//       let fiturData = @json($fitur);

//       row.querySelector('.judul').textContent = response.data.title;
//       row.querySelector('.deskripsi').textContent = response.data.description;
//       row.querySelector('.btn-danger').textContent = response.data.urutan;

//       // memperbarui data di component
//       let fiturComponent = new Vue({
//         el: '#fitur',
//         data: {
//             colorBody: 'rgb(248, 248, 248)',
//             colorSecondary: 'red',
//             fiturPopular: fiturData,
//             baseAsset: '{{ asset('storage') }}'
//         }
//       });
//     })
//     .catch(function (error) {
//       console.error(error);
//       // Terjadi kesalahan, tangani kesalahan atau tampilkan pesan error
//     });
// }
</script>
@endsection
