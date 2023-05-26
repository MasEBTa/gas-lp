<template>
  <div class="jbt pt-4 pb-4" :style="{ backgroundColor: colorPrimary || 'aliceblue' }">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text">
          <h1 class="display-4 fw-bold" :style="{ color: titleColor }">{{ title }}</h1>
          <p class="lead">{{ description }}</p>
          <hr class="my-4">
          <!-- <a class="btn btn-primary btn-lg" href="#" role="button">Get Started</a> -->
        </div>
        <div class="col-md-6 gambar">
          <img :src="namePic" alt="">
        </div>
      </div>
    </div>
  </div>
</template>
  
<script>
  export default {
    props: ['title', 'description', 'colorPrimary', 'namePic', 'titleColor'],
    mounted() {
    //   console.log(this.title);
    }
  }
</script>
  
<style scoped>
  .jbt {
    padding-top: 1rem;
    padding-bottom: 1rem;
  }
  .text {
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  
  .gambar {
    background-size: cover;
    background-position: center;
  }
  img {
    width: 90%;
    max-width: 600px;
  }
  @media (max-width: 768px) {
    .jbt .row {
      flex-direction: column-reverse;
    }
  
    .gambar {
      background-image: none;
      text-align: center;
    }
  }
</style>
  