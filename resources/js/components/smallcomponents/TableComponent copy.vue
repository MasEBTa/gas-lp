<template>
    <table class="table table-striped">
      <thead>
        <tr>
          <th v-for="header in dataHeader" :key="header.id">{{ header }}</th>
        </tr>
      </thead>
      <tbody>
        <tr  v-for="body in dataBody" :key="body.id">
          <td v-for="data in body" :key="data.id"  v-html="data"></td>
        </tr>
      </tbody>
    </table>
</template>
  
<script>
export default {
  props: ['headData', 'bodyData', 'callback'],
  data() {
    return {
      dataHeader: [],
      dataBody: []
    };
  },
  created() {
    this.dataHeader = this.headData;
    if (this.bodyData instanceof Promise) {
      this.bodyData.then(result => {
        this.dataBody = result;
        setTimeout(() => {
          this.callback();
        }, 3000);
      });
    } else {
      this.dataBody = this.bodyData;
      this.callback();
    }
  },
  mounted() {
    // 
  },
};
</script>
  