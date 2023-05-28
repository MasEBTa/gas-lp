<template>
  <div class="container">
    <div class="table-responsive">
      <table-component :callback="prosesSelesai"></table-component>
    </div>
    <button class="btn btn-primary" v-on:click="baru()">head</button>
    <!-- fitur popular -->
    <fitur-component 
        :color-body="'rgb(248, 248, 248)'" 
        :color-secondary="'red'"
        :fitur-popular="dataFitur"
        :base-asset="asset"
    ></fitur-component>
    <!-- ./fitur popular -->
  </div>
</template>

<script>
import axios from 'axios';
import TableComponent from './smallcomponents/TableComponent.vue';
import FiturComponent from './smallcomponents/FiturComponent.vue';

export default {
  components: {
    FiturComponent,
    TableComponent,
  },
  props: ['apiToken', 'csrfToken', 'baseAsset'],
  data() {
    return {
      api: '',
      csrf: '',
      dataTable: [],
      body: [],
      header: [],
      asset: ''
    };
  },
  computed: {
    dataFitur() {
      return this.getData();
    }
  },
  created() {
    this.api = this.apiToken;
    this.csrf = this.csrfToken;
    this.header = ['Judul', 'Deskripsi', 'Popular', 'Set'];
    this.asset = this.baseAsset;
  },
  methods: {
    async getData() {
      try {
        // Permintaan ke endpoint /api/check-token
        const checkTokenResponse = await axios.get('/api/check-token', {
          headers: {
            'Authorization': 'Bearer ' + this.api,
            'X-CSRF-TOKEN': this.csrf,
            'Accept': 'application/json'
          }
        });

        if (checkTokenResponse.data.status === 'success') {
          // Token otentikasi valid, lakukan permintaan ke endpoint /api/data/fitur
          const dataFiturResponse = await axios.get('/api/data/fitur', {
            headers: {
              'Authorization': 'Bearer ' + this.api,
              'X-CSRF-TOKEN': this.csrf,
              'Accept': 'application/json'
            }
          });

          // Handle response data /api/data/fitur
          this.dataTable = dataFiturResponse.data.data;
          return dataFiturResponse.data.data;
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
    },
    prosesSelesai() {
      // Tindakan yang ingin dilakukan setelah proses selesai
      console.log('Proses selesai di komponen anak');

      // select element trnya
      let element = this.$children[0].$el.lastElementChild.childNodes;
      element.forEach(elementtr => {
        // select classtlistnya dari button naik
        let classlistNaik = elementtr.childNodes[3].childNodes[1].classList;
        // simpan buttonnya
        let buttonnya = elementtr.childNodes[3].childNodes[1];
        let urutan = elementtr.childNodes[3].childNodes[1].dataset.urutan;
        // seleksi berdasar classlistnya (select yang memiliki class naik)
        classlistNaik.forEach(elementClass => {
          if (elementClass == 'naik') {
            buttonnya.addEventListener('click', () => {
              // Jalankan sesuatu saat elemen diklik
              console.log('Elemen urutannya: ', urutan);
              
              // Panggil fungsi atau lakukan tindakan lain sesuai kebutuhan Anda
              this.naikkan(urutan);
            });
          }
        });
      });
    },
    naikkan(param) {
      axios.put('/fiture/naik', {
        urutan: param,
        headers: {
          'Authorization': 'Bearer ' + this.api,
          'X-CSRF-TOKEN': this.csrf,
          'Accept': 'application/json'
        }
      })
        .then(response => {
          // this.getData();
          let data = this.makeData();
          // console.log(data);
          if (data instanceof Promise) {
            data.then(result => {
              this.$children[0].dataBody = result;
              setTimeout(() => {
                this.prosesSelesai()
              }, 2000);
            });
          } else {
            this.$children[0].dataBody = data;
          }
          this.$children[0].dataBody = this.getData();
        })
        .catch(error => {
          console.error(error);
          // Tangani kesalahan atau tampilkan pesan error
        });
    },
    async makeData() {
      await this.getData();
      let dataTab = this.dataTable;
      let body = [];
      let iteration = 0;
      let jumlahElemen = dataTab.length;
      dataTab.forEach(element => {
        iteration++;
        let myObj = {};
        myObj.judul = element.title;
        myObj.deskripsi = element.description;
        myObj.popular = element.popular == 1 ? 'yes' : 'no';
        myObj.set = `
          <button type="button" class="btn btn-success ${iteration == 1 ? 'disabled' : 'naik'}" data-urutan="${element.urutan}">Naik</button>
          <button type="button" class="btn btn-danger ${jumlahElemen == iteration ? 'disabled' : 'turun'}">Turun</button>
        `;
        body.push(myObj);
      });
      return body;
    }
  },
  mounted() {
    console.log(this.$children[1]._data.fitures);
  },
};
</script>
