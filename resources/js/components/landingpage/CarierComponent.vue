<template>
  <div :style="{ backgroundColor: colorBody || 'rgb(248, 248, 248)' }">
    <div class="container pt-5 pb-5">
      <div class="text">
        <h1>Temukan Karir Impian</h1>
        <p>Apapun jenis tokomu dapat bergabung bersama Gas</p>
      </div>
      <div class="row mt-3">
        <div class="col-md-6 col-lg-4 mt-3" v-for="carir in cariers" :key="carir.id">
          <div class="card">
            <div class="card-img">
              <!-- image di kiri -->
              <img :src="baseAsset+'/'+carir.picture_name" :alt="carir.picture_name">
            </div>
            <div class="card-info">
              <!-- keterangan di kanan -->
              <h2>{{ carir.title }}</h2>
              <p>{{ carir.description }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['colorBody', 'cariers', 'baseAsset'],
  data() {
    return {
      hoverColor: null,
      carir: []
    };
  },
  created() {
    this.carir = this.cariers;
  },
};
</script>

<style scoped>
.text {
  text-align: center;
  margin-bottom: 30px;
}

h1 {
  font-size: 32px;
  font-weight: bold;
  margin-bottom: 10px;
}

p {
  font-size: 18px;
}

.card {
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: white;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
  transition: box-shadow 0.3s ease;
}

.card:hover {
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.card-img img {
  width: 100%;
  max-width: 500px;
  min-height: 150px;
  max-height: 200px;
  height: auto;
  border-radius: 8px;
  margin-bottom: 10px;
}

.card-info h2 {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 10px;
}

.card-info p {
  font-size: 16px;
  margin-bottom: 0;
}
</style>
