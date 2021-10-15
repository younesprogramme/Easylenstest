<template>
  <div style="width: 50%; margin-left: 25%">
    <h2
      style="border-left: 2px solid red; padding-left: 10px"
      class="form-label"
    >
      Issue submission form
    </h2>
    <form>
      <div class="mb-3">
        <label
          style="border-left: 2px solid red; padding-left: 10px"
          class="form-label"
          >Issue title</label
        >
        <input v-model="issuestitle" class="form-control" />
      </div>
      <div class="mb-3">
        <label
          style="border-left: 2px solid red; padding-left: 10px"
          class="form-label"
          >Issue detail</label
        >
        <textarea v-model="description" class="form-control" />
      </div>

      <a type="button" @click="submitIssue" class="btn btn-primary">Submit</a>
      <a type="button" href="/customer" class="btn btn-primary">Display issues</a>
    </form>
  </div>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      products: [],
      issuestitle: "",
      description: "",
      status: "submitted",
    };
  },
  created() {},
  methods: {
    submitIssue: function () {
      if (this.issuestitle == "" || this.description == "") {
        alert("required field ");
      } else {
        axios
          .post("/api/submitissue", {
            title: this.issuestitle,
            detail: this.description,
          })
          .then((response) => {
            this.sendmessage();
          })
          .catch(function (error) {
            console.log(error.response);
          });
      }
    },
    sendmessage: function () {
      axios
        .post("/api/send-mail", {
          title: "",
          body: "issue submitted successfully",
        })
        .then((response) => {
          alert("successfully submitted");
        })
        .catch(function (error) {
          console.log(error.response);
        });
    },
  },
};
</script>