<template>
  <div :style="{ backgroundColor: colorSecondary || 'rgb(248, 248, 248)' }">
    <div class="container pt-5">
      <div class="text">
        <h1>Tentang Kami</h1>
        <p>{{ about }}</p>
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
</style>

<script>
export default {
  props: ['colorSecondary','about'],
};
</script>
