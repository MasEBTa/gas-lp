<template>
  <div :style="{ backgroundColor: colorBody || 'rgb(248, 248, 248)' }" class="pb-5">
    <div class="container pt-5 pb-5 justify-content-center">
      <div class="text">
        <h1>Fitur {{ data.title }}</h1>
        <p>{{ data.desc }}</p>
      </div>
      <div class="image-container row">
        <!-- previous -->
        <div class="col-1 d-flex align-item-center">
          <a class="prev" @click="prev">&#10094;</a>
        </div>
        <div class="col-10">
          <img :src="baseAsset + '/' + data.src" :alt="data.alt" class="slide-image">
        </div>
        <div class="col-1 d-flex align-item-center">
          <a class="next" @click="next">&#10095;</a>
        </div>
        <!-- next -->
      </div>
    </div>
  </div>
</template>

<style scoped>
.container {
  text-align: center;
}
.align-item-center {
  align-items: center;
}
.prev, .next {
  flex: auto;
}
.text {
  margin-bottom: 30px;
}

.image-container{
  height: auto;
  text-align: center;
}


.prev,
.next {
  cursor: pointer;
  /* position: absolute;
  top: 50%; */
  /* width: 120px; */
  height: 40px;
  line-height: 40px;
  text-align: center;
  background-color: rgba(0, 0, 0, 0.5);
  color: #ffffff;
  font-size: 30px;
  transition: 0.3s;
  border-radius: 4px;
  user-select: none;
}

.next {
  right: 0;
}

.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

.prev:active,
.next:active {
  background-color: rgba(143, 135, 214, 0.8);
}

img {
  width: 100%;
  height: 100%;
  max-width: 600px;
}
</style>

<script>
export default {
  props: ['colorBody','fitures', 'baseAsset'],
  data() {
    return {
      currentSlideIndex: 0,
      data: '',
      index: 6
    };
  },
  computed: {
    images() {
      return this.fitures.map((feature, index) => ({
        src: feature.picture_name,
        alt: feature.picture_name,
        title: feature.title,
        caption: `Caption ${index + 1}`,
        desc: feature.description,
        ind: index+1
      }));
    },
    countData() {
      return this.images.length;
    }
  },
  methods: {
    next() {
      this.index += 1;
      if (this.index == this.countData+1) {
        this.index = 1;
      }
      this.data = this.images.filter(item => item.ind === this.index)[0];
    },
    prev() {
      this.index -= 1;
      if (this.index == 0) {
        this.index = this.countData;
      }
      this.data = this.images.filter(item => item.ind === this.index)[0];
    },
    fillData() {
      this.data = this.images.filter(item => item.ind === this.index)[0];
    }
  },
  mounted() {
    this.fillData();
    // console.log(this.countData);
  }
};
</script>
