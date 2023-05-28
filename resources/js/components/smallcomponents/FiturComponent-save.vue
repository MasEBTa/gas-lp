<template>
  <div :style="{ backgroundColor: colrSecondary || 'rgb(248, 248, 248)' }">
    <div class="container pt-5">
      <div class="text">
        <h1>Popular Fitur</h1>
        <p>Nikmati berbagai fitur menarik yang kami berikan</p>
      </div>
      <div class="card-wrapper">
        <div class="card-cover">
          <div class="card" v-for="item in cards" :key="item.id">
            <div class="image-wrapper">
              <div class="circle-background"></div>
              <img :src="item.imageUrl" alt="">
            </div>
            <div class="card-content">
              <p>{{ item.caption }}</p>
              <div class="hover-content">
                <p>Click Me</p>
              </div>
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

.text {
  margin-bottom: 30px;
}

.card-wrapper {
  overflow-x: auto;
  white-space: nowrap;
  padding-bottom: 10px;
}

.card-cover {
  display: flex;
  align-items: center;
}

.card {
  position: relative;
  flex-shrink: 0;
  margin-right: 20px;
  padding: 20px;
  background-color: white;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  transition: transform 0.3s ease;
}

.card:last-child {
  margin-right: 0;
}

.card:hover {
  transform: translateY(-10px);
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

.circle-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 50%;
  background-color: #f2f2f2;
  opacity: 0.5;
  transition: background-color 0.3s ease;
}

.card:hover .circle-background {
  background-color: #ffcc00;
}

.card img {
  max-width: 100%;
  height: auto;
  display: block;
  border-radius: 50%;
  object-fit: cover;
}

.card-content {
  position: relative;
}

.hover-content {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: rgba(0, 0, 0, 0.8);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.card:hover .hover-content {
  opacity: 1;
}

.hover-content p {
  font-size: 18px;
  color: white;
  transform: translateY(20px);
  transition: transform 0.3s ease;
}

.card:hover .hover-content p {
  transform: translateY(0);
}

.card p {
  margin-top: 10px;
  font-size: 16px;
}

.card-wrapper::-webkit-scrollbar {
  height: 8px;
  background-color: #f5f5f5;
}

.card-wrapper::-webkit-scrollbar-thumb {
  background-color: #888;
  border-radius: 4px;
}

.card-wrapper::-webkit-scrollbar-thumb:hover {
  background-color: #555;
}

.card-wrapper::-webkit-scrollbar-track {
  background-color: #f5f5f5;
}
</style>

<script>
export default {
  props: ['colrSecondary'],
  data() {
    return {
      cards: [
        {
          id: 1,
          imageUrl: 'path_to_image1.jpg',
          caption: 'Keterangan 1'
        },
        {
          id: 2,
          imageUrl: 'path_to_image2.jpg',
          caption: 'Keterangan 2'
        },
        {
          id: 3,
          imageUrl: 'path_to_image3.jpg',
          caption: 'Keterangan 3'
        },
        {
          id: 4,
          imageUrl: 'path_to_image1.jpg',
          caption: 'Keterangan 1'
        },
        {
          id: 5,
          imageUrl: 'path_to_image2.jpg',
          caption: 'Keterangan 2'
        },
        {
          id: 6,
          imageUrl: 'path_to_image3.jpg',
          caption: 'Keterangan 3'
        },
        // Tambahkan card lainnya di sini
      ]
    };
  }
};
</script>
