<template>
  <section class="w-full bg-white" v-scroll-reveal>
    <div class="mx-auto max-w-7xl">
      <div class="flex flex-col lg:flex-row">
        <div
          class="relative w-full bg-cover lg:w-6/12 bg-gradient-to-r from-white via-white to-gray-100"
        >
          <div
            class="relative flex flex-col items-center justify-center w-full h-full px-10 my-20 lg:px-16 lg:my-0"
          >
            <div
              class="flex flex-col items-start space-y-8 tracking-tight lg:max-w-3xl"
            >
              <div class="relative">
                <h2 class="text-5xl font-bold text-gray-900">
                  Daftar sekarang, dan ikuti vaksinasi serentak
                </h2>
              </div>
              <p class="text-2xl text-gray-700">
                Data anda akan kami verfikasi dan untuk vaksinasi center,kita
                akan memilih tempat yang terdekat dari alamat anda
              </p>
              <!-- <a
                href="#_"
                class="inline-block px-8 py-5 text-xl font-medium text-center text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 ease"
                >Get Started Today</a
              > -->
            </div>
          </div>
        </div>

        <div class="w-full bg-white lg:w-6/12">
          <div
            class="flex flex-col items-start justify-start w-full h-full p-10 lg:p-16"
          >
            <h4 class="w-full text-3xl font-bold">Daftar</h4>
            <p class="text-lg text-gray-500">
              Jika anda sudah daftar bisa
              <router-link
                :to="{ path: '/peserta/login' }"
                class="text-blue-500 no-underline"
              >
                Login disini
              </router-link>
            </p>
            <div class="relative w-full mt-10 space-y-8">
              <!-- form daftar -->
              <form @submit.prevent="daftar" method="post">
                <div class="relative">
                <label class="font-medium text-gray-900">Nama Depan</label>
                <input
                  type="text"
                  class="form-input"
                  placeholder="Masukkan Nama Depan"
                />
              </div>
              <div class="relative">
                <label class="font-medium text-gray-900">Nama Belakang</label>
                <input
                  type="text"
                  class="form-input"
                  placeholder="Masukkan Nama Belakang"
                />
              </div>
              <div class="relative">
                <label class="font-medium text-gray-900">Tanggal Lahir</label>
                <!-- <flat-pickr></flat-pickr> -->
                <!-- <date-picker v-model="dob" 
                                ></date-picker> -->
                <!-- <v-date-picker
                                    class="inline-block h-full"
                                    v-model="dob"
                                >
                                    <template
                                        v-slot="{ inputValue, togglePopover }"
                                    >
                                        <div class="flex items-center">
                                            <button
                                                class="p-2 bg-blue-100 border border-blue-200 hover:bg-blue-200 text-blue-600 rounded-l focus:bg-blue-500 focus:text-white focus:border-blue-500 focus:outline-none"
                                                @click="togglePopover()"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    class="w-4 h-4 fill-current"
                                                >
                                                    <path
                                                        d="M1 4c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4zm2 2v12h14V6H3zm2-6h2v2H5V0zm8 0h2v2h-2V0zM5 9h2v2H5V9zm0 4h2v2H5v-2zm4-4h2v2H9V9zm0 4h2v2H9v-2zm4-4h2v2h-2V9zm0 4h2v2h-2v-2z"
                                                    ></path>
                                                </svg>
                                            </button>
                                            <input
                                                :value="inputValue"
                                                class="bg-white text-gray-700 w-full py-1 px-2 appearance-none border rounded-r focus:outline-none focus:border-blue-500"
                                                readonly
                                            />
                                        </div>
                                    </template>
                                </v-date-picker> -->
                <v-date-picker v-model="dob" :masks="masks">
                  <template #default="{ inputValue, inputEvents }">
                    <input
                      placeholder="Masukkan tanggal lahir anda"
                      class="form-input"
                      :value="inputValue"
                      v-on="inputEvents"
                    />
                  </template>
                </v-date-picker>
              </div>
              <div class="relative">
                <label class="font-medium text-gray-900">NIK</label>
                <input
                  type="text"
                  class="form-input"
                  placeholder="Masukkan NIK anda"
                />
              </div>
              <div class="relative">
                <label class="font-medium text-gray-900">Password</label>
                <input
                  type="password"
                  class="form-input"
                  placeholder="Password"
                />
              </div>
               <div class="relative">
                <label class="font-medium text-gray-900">Nomer Telepon</label>
                <input
                  type="text"
                  class="form-input"
                  placeholder="Masukkan Nomer Telepon anda"
                />
              </div> <div class="relative">
                <label class="font-medium text-gray-900">Alamat</label>
                <input
                  type="text"
                  class="form-input"
                  placeholder="Masukkan Alamat anda"
                />
              </div>
              <div class="relative">
                <button
                type="submit"
                  href="#_"
                  class="inline-block  w-full px-5 py-4  text-lg font-medium text-center text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 ease"
                  >Daftar</button
                >
                <!-- <a
                  href="#_"
                  class="inline-block w-full px-5 py-4 mt-3 text-lg font-bold text-center text-gray-900 transition duration-200 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 ease"
                  >Sign up with Google</a
                > -->
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
// import flatPickr from "vue-flatpickr-component";
export default {
  data: () => {
    return {
      dob: null,
      masks: {
        input: "YYYY-MM-DD",
      },
    };
  },
  methods: {
    daftar(){

    }
  }
  // components: {
  //     flatPickr
  // }
};
</script>

<style></style>
