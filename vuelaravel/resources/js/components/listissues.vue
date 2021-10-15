<template>
  <div style="width: 50%; margin-left: 25%">
    <h2
      style="border-left: 2px solid red; padding-left: 10px"
      class="form-label"
    >
      List issues
    </h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Issues</th>
          <th scope="col">Detail</th>
          <th scope="col">Status</th>
          <th scope="col">actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="issue in issues" v-bind:key="issue.id">
          <th scope="row">{{ issue.id }}</th>
          <td>{{ issue.title }}</td>
          <td>
            <a
              style="margin-right: 4px"
              v-bind:href="'/customerissuedetail?id=' + issue.id"
              class="link-info"
              >Dispaly</a
            >
          </td>
          <td>{{ issue.status }}</td>
          <td>
            <a
              href="#"
              @click="updateStatus"
              :tabindex="issue.id"
              v-if="issue.status != 'closed'"
              class="link-danger"
            >
              close</a
            >
          </td>
        </tr>
      </tbody>
    </table>
    <a href="/sendissues" class="link-primary right">Submit issues</a>
  </div>
</template>
<script>
export default {
  data() {
    return {
      issues: [],
      Detail: "",
    };
  },
  created() {
    this.loadIssues();
  },
  methods: {
    loadIssues: function () {
      axios
        .get("/api/getissues")
        .then((response) => {
          this.issues = response.data;
        })
        .catch(function (error) {
          console.log(error.response);
        });
    },
    updateStatus: function () {
      let id = parseInt(event.target.getAttribute("tabindex"));
      console.log(id);
      axios
        .post("/api/updateissue", { id: id })
        .then((response) => {
          this.sendmessage();
          this.loadIssues();
        })
        .catch(function (error) {
          console.log(error.response);
        });
    },
    sendmessage: function () {
      axios
        .post("/api/send-mail", {
          title: "notification issue closed by client",
          body: "issue closed",
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
