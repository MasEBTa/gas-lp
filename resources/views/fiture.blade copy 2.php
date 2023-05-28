@extends('layouts.app')

@section('css')
<style>

</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center" id="wadah-table">
      {{-- <table-component id="tabelFitur"></table-component> --}}
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
<script>
window.addEventListener('DOMContentLoaded', async function() {
    var apiToken = '{{ session('api_token') }}'; // Retrieve the token from the session
    let csrfToken = '{{ csrf_token() }}'; // Dapatkan token CSRF dari meta tag atau cookie;
    let dataTable;
    let headers = ['Judul', 'Deskripsi', 'popular', 'set'];
    let body = [];
    
    try {
        // Permintaan ke endpoint /api/check-token
        const checkTokenResponse = await axios.get('/api/check-token', {
            headers: {
              'Authorization': 'Bearer ' + apiToken,
              'X-CSRF-TOKEN': csrfToken,
              'Accept': 'application/json'
            }
        });

        if (checkTokenResponse.data.status === 'success') {
            // Token otentikasi valid, lakukan permintaan ke endpoint /api/data/fitur
            const dataFiturResponse = await axios.get('/api/data/fitur', {
                headers: {
                  'Authorization': 'Bearer ' + apiToken,
                  'X-CSRF-TOKEN': csrfToken,
                  'Accept': 'application/json'
                }
            });

            // Handle response data /api/data/fitur
            dataTable = dataFiturResponse.data.data;
            // console.log(dataTable);
        } else {
            // Token otentikasi tidak valid atau tidak ada
            console.error('Token is invalid or not present');
            // Redirect ke halaman lain
            window.location.href = '/login';
        }
    } catch (error) {
        // Handle error
        console.error(error);
    }
    let iteration = 0;
    let jumlahElemen = dataTable.length;
    dataTable.forEach(element => {
      iteration++;
      let myObj = {};
      // myObj.no = iteration;
      myObj.judul = element.title;
      myObj.deskripsi = element.description;
      if (element.popular == 1) {
        element.popular = 'yes';
      } else {
        element.popular = 'no';
      }
      myObj.deskripsi = element.popular;
      myObj.set = `
        <button type="button" class="btn btn-success ${iteration == 1 ? 'diabled' : ''}" onclick="naikkan(${element.id})">Naik</button>
        <button type="button" class="btn btn-danger ${jumlahElemen == iteration ? 'diabled' : ''}" onclick="naikkan(${element.id})">Turun</button>
      `;
      body.push(myObj);
    });
    
    // console.log(headers);
    // console.log(body);

    // Membuat table dengan table-component
    const table = `<table-component id='tabelFitur' head-data='${JSON.stringify(headers)}' body-data="${JSON.stringify(body)}"></table-component>`;
    // Ambil elemen div
    const divTable = document.getElementById('wadah-table');
    divTable.innerHTML = table;

});
</script>
@endsection
