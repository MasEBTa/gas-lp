<template>
  <div :style="{ backgroundColor: colorBody || 'rgb(248, 248, 248)' }">
    <div class="container pt-5 pb-5">
      <div class="text">
        <h1>Kategory Toko</h1>
        <p>Apapun jenis tokomu dapat bergabung bersama Gas</p>
      </div>
      <div class="card-cover">
        <div class="row" :class="{ 'centered': jumlah < 4 }">
          <div v-for="store in stores" :key="store.id" class="col-md-3">
            <div class="card">
              <div class="image-wrapper">
                <img :src="baseAsset+'/'+store.pic_name" alt="">
              </div>
              <p>{{ store.name }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.container {
  text-align: center;
}

@media (min-width: 768px) {
  .row.centered {
    justify-content: center;
  }
}

.text {
  margin-bottom: 30px;
}

.card-cover {
  padding-top: 5px;
  overflow-x: auto;
  margin-bottom: -20px;
  scroll-behavior: smooth;
  -webkit-overflow-scrolling: touch;
}

.card {
  margin-bottom: 10px;
  padding: 10px;
  background-color: white;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s, background-color 0.3s;
}

.card-cover::-webkit-scrollbar {
  width: 5px;
  height: 5px;
  background-color: #f5f5f5;
}

.card-cover::-webkit-scrollbar-thumb {
  background-color: #888;
  border-radius: 5px;
}

.card-cover::-webkit-scrollbar-track {
  background-color: #f5f5f5;
}

.card:hover {
  transform: translateY(-5px);
}

.image-wrapper {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 200px;
  margin: 0 auto;
  overflow: hidden;
}

.row {
  flex-wrap: nowrap;
}

.card img {
  width: 100%;
  height: 100%;
  display: block;
  object-fit: cover;
}

.card p {
  margin-top: 10px;
}
</style>

<script>
export default {
  props: ['colorBody', 'storeType', 'baseAsset'],
  data() {
    return {
      hoverColor: null,
      stores: []
    };
  },
  computed: {
    jumlah() {
      return this.stores.length;
    }
  },
  created() {
    this.stores = this.storeType;
  },
  mounted() {
    console.log(this.jumlah);
  },
};
</script>
