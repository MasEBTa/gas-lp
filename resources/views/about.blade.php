@extends('layouts.app')

@section('css')
<style>
.image-frame {
  display: inline-block;
  border: 1px solid #ccc;
  padding: 10px;
  text-align: center;
}

.image-frame img {
  max-width: 100%;
  height: auto;
}

.image-description {
  margin-top: 10px;
}

#previewImage {
  width: 200px;
  height: 200px;
  border-radius: 50%;
  border: 1px solid #ccc;
  object-fit: cover;
}
#previewbox {
    display: none;
}
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="/about" method="post">
            @csrf
            <fieldset class="mb-3">
                <legend>Profil Perusahaan</legend>
          
                <div class="form-group">
                    <label for="name">Nama Perusahaan</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan nama Perusahaan" value="{{ $setting->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email Perusahaan</label>
                    @foreach($contact as $item)
                        @if($item->name == 'email')
                            <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email Perusahaan" value="{{ $item->description }}">
                        @endif
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="phone">Phone Perusahaan</label>
                    @foreach($contact as $item)
                        @if ($item->name == 'phone')
                            <input type="phone" name="phone" class="form-control" id="phone" placeholder="Masukkan nomor Perusahaan" value="{{ $item->description }}">
                        @endif
                    @endforeach
                </div>
                <div class="form-group mt-2">
                    <label for="image">Gambar</label>
                    <input type="file" id="imageInput" accept="image/*" onchange="halo(this)">
                </div>
                <div class="image-frame mt-3">
                    <img id="preview" src="{{ asset('storage/'.$setting->logo) }}" data-id="{{ $setting->id }}"  data-nama="{{ $setting->logo }}" alt="Preview" style="width:5rem; height:5rem; border-radius:50%;">
                    <div class="image-description">
                      <p>Logo Saat ini.</p>
                    </div>
                </div>
                <div class="image-frame mt-3" id="previewbox">
                    <img id="previewImage" src="" alt="Preview Image">
                    <div class="image-description">
                      <p>Logo Baru.</p>
                    </div>
                    <div class="btn btn-primary" onclick="updateImage()">
                        <p>simpan</p>
                    </div>
                </div>
            </fieldset>
          
            <fieldset class="mb-3">
                <legend>Jumbotron</legend>
            
                <div class="form-group">
                    <label for="jumbotron-title">Judul Jumbotron</label>
                    <input type="text" name="title" class="form-control" id="jumbotron-title" placeholder="Masukkan judul Untuk ditampilkan di jumbotron" value="{{ $jumbotrons->title }}">
                </div>
            
                <div class="form-group">
                    <label for="jumbotron-description">Deskripsi</label>
                    <textarea class="form-control" name="description" id="jumbotron-description" rows="3" placeholder="Tambahkan deskripsi untuk ditampilkan di Jumbotron">{{ $jumbotrons->description }}</textarea>
                </div>
            </fieldset>

            <fieldset class="mb-3">
                <legend>Download dan Pendaftaran</legend>
            
                <div class="form-group">
                    <label for="daftar-title">Teks Download</label>
                    <input type="text" name="title_daftar" class="form-control" id="daftar-title" placeholder="Masukkan teks Untuk mendaftar" value="{{ $daftarDownload->title_daftar }}">
                </div>
            
                <div class="form-group">
                    <label for="download-title">Teks Download</label>
                    <input type="text" name="title_download" class="form-control" id="download-title" placeholder="Masukkan teks Untuk mendownload aplikasi Gas" value="{{ $daftarDownload->title_download }}">
                </div>
            </fieldset>
          
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>                  
    </div>
</div>
@endsection

@section('script')
<script>
let file = '';
function halo(input) {
  // console.log(event);
  file = input.files[0];
  let reader = new FileReader();

  reader.onload = function(e) {
    let previewImg = document.getElementById('previewImage');
    let previewBox = document.getElementById('previewbox');
    previewBox.style.display = 'block';
    previewImg.src = e.target.result;
  };

  reader.readAsDataURL(file);
}

// upload image
function updateImage(input) {
  //   let fileName = file.name; // Mendapatkan nama file
  let formData = new FormData();
  let toDelete = document.getElementById('preview').dataset.nama; // file yang akan diganti
  let idToDelete = document.getElementById('preview').dataset.id; // file yang akan diganti
  formData.append('image', file);
  formData.append('toDelete', toDelete); // Menambahkan nama file ke FormData
  formData.append('idToDelete', idToDelete); // Menambahkan nama file ke FormData

  axios.post('/update-image', formData)
    .then(function(response) {
      let source = document.getElementById('preview');
      console.log(response.data); // Tanggapan dari server
      //   ganti logo preview
      source.src = "{{ asset('storage') }}/"+response.data.savedname;
      // hilangkan previewbox
      let previewbox = document.getElementById('previewbox');
      previewbox.style.display = "none";
    })
    .catch(function(error) {
      console.error(error); // Kesalahan jika ada
    });
}
</script>
@endsection
