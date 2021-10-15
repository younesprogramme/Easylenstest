<template>
  <div style="width: 50%; margin-left: 25%">
    <h2
      style="border-left: 2px solid red; padding-left: 10px"
      class="form-label"
    >
      Edit Issue
    </h2>
    <form>
      <div class="mb-3">
        <label
          style="border-left: 2px solid red; padding-left: 10px"
          class="form-label"
          >Issue title</label
        >
        <input v-model="title" class="form-control" />
      </div>
      <div class="mb-3">
        <label
          style="border-left: 2px solid red; padding-left: 10px"
          class="form-label"
          >Issue detail</label
        >
        <textarea v-model="detail" class="form-control" />
      </div>

      <a type="button" @click="updateIssue" class="btn btn-primary">Update</a>
      <a type="button" href="admin" class="btn btn-primary">Back</a>
    </form>
  </div>
</template>
<script>
export default {
  data() {
    return {
      issues: [],
      title: "",
      detail: "",
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
          this.detail = response.data[0].detail;
          console.log(this.detail);
        })
        .catch(function (error) {
          console.log(error.response);
        });
    },
    updateIssue: function () {
      let id = this.$route.query.id;
      console.log(id);
      axios
        .post("/api/editissue", {
          id: id,
          title: this.title,
          detail: this.detail,
        })
        .then((response) => {
          this.loadIssues();
          alert(response.data.message);
        })
        .catch(function (error) {
          console.log(error.response);
        });
    },
  },
};
</script>