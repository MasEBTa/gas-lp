<template>
  <div :style="{ backgroundColor: colorBody || 'rgb(248, 248, 248)' }" class="pb-5">
    <div class="container pt-5 pb-5 justify-content-center">
      <div class="row diatas">
        <!-- gambar di kiri -->
        <div class="col-md-6">
          <div class="gambar-daftar">
            <img :src="baseAsset+'/'+daftarSrc" :alt="baseAsset+daftarSrc" class="img-fluid">
          </div>
        </div>
        <div class="col-md-6 text-right">
          <div class="daftar">
            <span class="badge">daftar toko</span>
            <h1>{{ daftarTitle }}</h1>
          </div>
          <div class="unduh-daftar">
            <span class="unduh">unduh</span>
            <a :href="linkDaftar"><img class="img-unduh" :src="baseAsset+'/'+daftarDownload" :alt="baseAsset+daftarDownload"></a>
          </div>
        </div>
      </div>
      <div class="row dibawah">
        <!-- gambar di kanan -->
        <div class="col-md-6 order-md-last">
          <div class="gambar-download">
            <img :src="baseAsset+'/'+downloadSrc" :alt="baseAsset+downloadSrc" class="img-fluid">
          </div>
        </div>
        <div class="col-md-6 text-left d-flex">
          <div class="download">
            <span class="badge">Download</span>
            <h1>{{ downloadTitle }}</h1>
          </div>
          <div class="unduh-daftar">
            <span class="unduh">unduh</span>
            <a :href="linkDownload"><img class="img-unduh" :src="baseAsset+'/'+downloadApps" :alt="baseAsset+downloadApps"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['linkDaftar', 'linkDownload', 'colorBody', 'daftarSrc', 'baseAsset', 'daftarTitle', 'downloadTitle', 'downloadSrc', 'daftarDownload', 'downloadApps'],
  data() {
    return {
      //
    };
  },
  computed: {
    //
  },
  methods: {
    //
  },
  mounted() {
    //
  }
};
</script>

<style scoped>
.diatas {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  margin-bottom: 30px;
}

.gambar-daftar,
.gambar-download {
  margin-bottom: 15px;
}

.daftar,
.download {
  margin-bottom: 15px;
}

.bage,
.unduh {
  font-size: 18px;
  font-weight: bold;
}

h1 {
  font-size: 24px;
  font-weight: bold;
}

.img-unduh {
  max-width: 100px;
}

.text-right{
  text-align: left;
}
.text-left {
  text-align: right;
  flex-direction: column;
  justify-content: center;
}

@media (max-width: 768px) {
  .diatas,
  .dibawah {
    flex-direction: column;
  }

  .text-right,
  .text-left {
    text-align: center;
  }
  
  .order-md-last {
    order: 0;
  }
}
</style>
