<template>
  <div style="width: 50%; margin-left: 25%">
    <h2
      style="border-left: 2px solid red; padding-left: 10px"
      class="form-label"
    >
      Display Issue
    </h2>
    <form>
      <div class="mb-3">
        <label
          style="border-left: 2px solid red; padding-left: 10px"
          class="form-label"
          >Issue title</label
        >
        <input v-model="title" class="form-control" disabled />
      </div>
      <div class="mb-3">
        <label
          style="border-left: 2px solid red; padding-left: 10px"
          class="form-label"
          >Issue detail</label
        >
        <textarea v-model="Detail" class="form-control" disabled />
      </div>
      <a type="button" href="/admin" class="btn btn-primary">Display issues</a>
    </form>
  </div>
</template>
<script>
export default {
  data() {
    return {
      issues: [],
      title: "",
      Detail: "",
    };
  },
  created() {
    console.log(this.$route.query.id);
    this.loadIssues();
  },
  methods: {
    loadIssues: function () {
      var id = this.$route.query.id;
      axios
        .post("/api/getissuedetail", { id: id })
        .then((response) => {
          this.title = response.data[0].title;
          this.Detail = response.data[0].detail;
          console.log(this.Detail);
        })
        .catch(function (error) {
          console.log(error.response);
        });
    },
  },
};
</script>