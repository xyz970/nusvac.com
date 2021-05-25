<template>
  <body>
    <section class="w-full px-8 py-28" v-scroll-reveal.reset>
      <div class="max-w-5xl mx-auto">
        <div class="flex flex-col items-center md:flex-row">
          <div class="w-full space-y-5 md:w-3/5 md:pr-16">
            <h2
              class="text-2xl font-extrabold leading-none text-gray-800 sm:text-3xl md:text-5xl"
            >
              Vaksinasi Serentak
            </h2>
            <p class="text-xl text-gray-600 md:pr-16">
              Jadilah bagian vaksinasi serentak
            </p>
          </div>

          <div class="w-full mt-16 md:mt-0 md:w-2/5">
            <div
              class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7"
            >
              <h3 class="mb-6 text-2xl font-medium text-gray-700 text-center">
                Silahkan login menggunakan akun anda
              </h3>
              <form @submit.prevent="login()" method="post">
                <input
                  type="text"
                  id="nik"
                  v-model="nik"
                  name="nik"
                  class="block w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none"
                  placeholder="NIK"
                />
                <input
                  type="password"
                  id="password"
                  v-model="password"
                  name="password"
                  class="block w-full px-4 py-3 mb-4 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none"
                  placeholder="Password"
                />
                <div class="block">
                  <button
                    type="submit"
                    class="w-full px-3 py-4 font-medium text-white bg-blue-600 rounded-lg"
                  >
                    Login
                  </button>
                </div>
              </form>

              <p class="w-full mt-4 text-sm text-center text-gray-500">
                Tidak punya akun?
                <router-link
                  :to="{ path: '/peserta/daftar' }"
                  class="text-blue-500 no-underline"
                >
                  Daftar disini
                </router-link>
                <!-- <a href="#_" class="text-blue-500 no-underline"
                  >Daftar disini</a
                > -->
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</template>

<script>
import axios from "axios";

export default {
  created() {
    document.title = "Nusvac - Login Peserta";
  },
  data: () => {
    return {
      nik: null,
      password: null,
    };
  },

  methods: {
    login() {
      axios
        .post("peserta/login", {
          nik: this.nik,
          password: this.password,
        })
        .then((res) => {
          if (res.status == 200) {
            // console.log("selamat datang " + res.data.user.nik);
            localStorage.setItem("token-peserta", res.data.token);
            this.$router.push("/");
          } else {
            console.log(res);
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style>
</style>