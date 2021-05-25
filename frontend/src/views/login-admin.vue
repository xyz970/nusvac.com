<template>
  <body>
    <div class="container">
      <div class="px-4 py-4">
        <div class="card">
          <div class="card-header">
            <h1 style="color:#828187; font-weight: bold;" class="text-center">Login</h1>
            
          </div>
          <div class="card-body">
            <div class="col">
              <div class="form-group">
                <div class="col">
                  <form @submit.prevent="login">
                    <label class="" for="#username">Username</label>
                    <input
                      v-model="username"
                      type="text"
                      name="username"
                      required
                      id="username"
                      class="form-control"
                      placeholder=""
                      aria-describedby="helpId"
                    />
                    <small id="helpId" class="text-muted"
                      >Masukkan username</small
                    >
                    <br />
                    <br />
                    <label for="#username">Password</label>
                    <input
                      v-model="password"
                      type="password"
                      name="username"
                      id="username"
                      required
                      class="form-control"
                      placeholder=""
                      aria-describedby="helpId"
                    />
                    <small id="helpId" class="text-muted"
                      >Masukkan password</small
                    >
                    <br />
                    <br />
                    <br />
                    <div class="pt-8">
                      <button class="btn btn-success" type="submit">
                        Login
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="card-footer text-muted">Footer</div> -->
        </div>
      </div>
    </div>
  </body>
</template>

<script>
import axios from "axios";
export default {
  data: () => {
    return {
      username: null,
      password: null,
    };
  },
  methods: {
    login() {
      axios
        .post("admin/login", {
          username: this.username,
          password: this.password,
        })
        .then(
            (response) => 
            console.log(response),
            window.location.href = '/admin/home/'
            )
        .catch((e) => {
          console.log(e);
        });
    },
  },
};
</script>

<style>
</style>