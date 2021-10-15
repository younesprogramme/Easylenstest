<template>
  <div style="width: 50%; margin-left: 25%">
    <h2
      style="border-left: 2px solid red; padding-left: 10px"
      class="form-label"
    >
      Display issues
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
              v-bind:href="'/adminissuedetail?id=' + issue.id"
              class="link-info"
              >Dispaly</a
            >
          </td>
          <td>{{ issue.status }}</td>
          <td>
            <div class="btn-group" role="group" aria-label="Basic example">
              <a
                style="margin-right: 4px"
                v-bind:href="'/editissue?id=' + issue.id"
                type="button"
                class="link-info"
                >Edit</a
              >
              <a
                style="margin-right: 4px"
                :tabindex="issue.id"
                status="submitted"
                href="#"
                @click="updateStatus"
                class="link-secondary"
                >submitted</a
              >
              <a
                style="margin-right: 4px"
                :tabindex="issue.id"
                status="in progress"
                href="#"
                @click="updateStatus"
                class="link-primary"
                >In Progress</a
              >
              <a
                style="margin-right: 4px"
                :tabindex="issue.id"
                status="resolved"
                href="#"
                @click="updateStatus"
                class="link-success"
                >Resolved</a
              >
              <a
                style="margin-right: 4px"
                :tabindex="issue.id"
                status="closed"
                href="#"
                @click="updateStatus"
                class="link-danger"
                >Closed</a
              >
            </div>
          </td>
        </tr>
      </tbody>
    </table>
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
    issuesdelail: function () {
      let id = parseInt(event.target.getAttribute("tabindex"));
      console.log(id);
      axios
        .post("/api/getissuedetail", { id: id })
        .then((response) => {
          this.Detail = response.data[0].detail;
        })
        .catch(function (error) {
          console.log(error.response);
        });
    },
    updateStatus: function () {
      let id = parseInt(event.target.getAttribute("tabindex"));
      let status = event.target.getAttribute("status");
      axios
        .post("/api/admineditissue", { id: id, status: status })
        .then((response) => {
          this.loadIssues();
          this.sendmessage(status);
          alert(response.data.message);
        })
        .catch(function (error) {
          console.log(error.response);
        });
    },
    sendmessage: function (status) {
      axios
        .post("/api/admin-mail", { status: status })
        .then((response) => {})
        .catch(function (error) {
          console.log(error.response);
        });
    },
  },
};
</script>
