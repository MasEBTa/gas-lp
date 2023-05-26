<template>
  <div :style="{ backgroundColor: colorBody || 'rgb(248, 248, 248)' }">
    <div class="container pt-5 pb-5">
      <div class="text">
        <h1>Popular Fitur</h1>
        <p>Nikmati berbagai fitur menarik yang kami berikan</p>
      </div>
      <div class="card-cover">
        <div class="row" :class="{ 'centered': fitures.length < 4 }">
          <div v-for="fitur in fitures" :key="fitur.id" class="col-md-3">
            <div class="card" @mouseover="hoverColor = colorSecondary" @mouseleave="hoverColor = null" :style="cardHoverStyle">
              <div class="image-wrapper">
                <div class="circle-background"></div>
                <img :src="baseAsset+'/'+fitur.logo_name" alt="">
              </div>
              <p>{{ fitur.title }}</p>
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
  width: 150px;
  height: 150px;
  margin: 0 auto;
  overflow: hidden;
}

.row {
  flex-wrap: nowrap;
}

.circle-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background-color: #f2f2f2; /* Ganti dengan warna yang sesuai */
  opacity: 0.5;
  transition: background-color 0.3s;
}

.card:hover .circle-background {
  background-color: var(--hoverColor); /* Ganti dengan warna yang diinginkan saat hover */
}

.card img {
  max-width: 100%;
  height: auto;
  display: block;
  border-radius: 50%;
  object-fit: cover;
}

.card p {
  margin-top: 10px;
}
</style>

<script>
export default {
  props: ['colorBody', 'colorSecondary', 'fiturPopular', 'baseAsset'],
  data() {
    return {
      hoverColor: null,
      fitures: []
    };
  },
  computed: {
    cardHoverStyle() {
      return {
        '--hoverColor': this.hoverColor
      };
    }
  },
  created() {
    this.fitures = this.fiturPopular;
  },
  mounted() {
    // console.log(this.fitures);
  },
};
</script>
