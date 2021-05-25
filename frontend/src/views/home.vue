<template>
  <body>
    <scrollactive
      active-class="navbar-items-active"
      class="top-0 fixed z-50 w-full h-auto sm:h-22 flex flex-wrap justify-end px-2 py-3 scrollactivebar-expand-lg bg-white shadow"
    >
      <div class="flex items-center flex-no-shrink text-black mr-6 flex-grow">
        <!-- <svg
                    class="fill-current h-8 w-8 mr-2"
                    width="54"
                    height="54"
                    viewBox="0 0 54 54"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"
                    />
                </svg> -->
        <img src="../assets/img/logo.png" alt="" />
        <!-- <span class="font-semibold text-xl tracking-tight"
                    >T</span
                > -->
      </div>
      <div class="block sm:hidden">
        <button
          @click="toggle"
          class="flex items-center px-3 py-2 border rounded text-red border-red hover:text-white hover:border-white"
        >
          <svg
            class="fill-current h-4 w-4"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
          </svg>
        </button>
      </div>
      <div
        :class="open ? 'block' : 'hidden'"
        class="w-full sm:flex sm:items-center sm:w-auto sm:pr-9"
      >
        <div class="text-base sm:flex-grow">
          <a href="#home" class="scrollactive-item navbar-items"> Home </a>
          <a href="#jadwal" class="scrollactive-item navbar-items"> Jadwal </a>
          <a href="#vaccenter" class="scrollactive-item navbar-items mr-4">
            Vaksin Center
          </a>
          <!-- <a href="" class="scrollactive-item navbar-items"> Tentang Kami </a> -->
        </div>
        <div v-if="profile == null">
          <!-- <div class="pl-0 sm:pl-4" v-for="(profil, key) in profile" :key="key"> -->
          <!-- <a
            href=router.push("login")
            class="scrollactive-item no-underline inline-block text-base px-6 py-2 rounded-md border bg-blue-400 text-white border-indigo-300 hover:bg-indigo-300 mt-4 sm:mt-0"
            >Login</a
          > -->
          <!-- <a href="#home" class="scrollactive-item navbar-items">
              {{ profil.user.first_name }} {{ profil.user.last_name }}</a
            >
          </div> -->
          <div class="pl-0 sm:pl-4">
            <router-link
              :to="{ path: '/peserta/login' }"
              class="no-underline inline-block text-base px-6 py-2 rounded-md border bg-blue-400 text-white border-indigo-300 hover:bg-indigo-300 mt-4 sm:mt-0"
            >
              Login
            </router-link>
          </div>
        </div>
        <div class="pl-0 sm:pl-2" v-else>
          <!-- <a
            href=router.push("login")
            class="scrollactive-item no-underline inline-block text-base px-6 py-2 rounded-md border bg-blue-400 text-white border-indigo-300 hover:bg-indigo-300 mt-4 sm:mt-0"
            >Login</a
          > -->
          <!-- <div
            @click="redirect"
            class="text-blue-500 transform transition-transform hover:translate-x-8"
          >
            <a class="space-x-10 no-underline space-y-10">
              <font-awesome-icon icon="user-alt" />
              {{ profile.user.first_name }} {{ profile.user.last_name }}
            </a>
          </div> -->
          <button @click="redirect" class="flex items-center pt-3 sm:pt-0">
            <div class="mr-3">
              <p class="text-sm text-blue-600">
                {{ profile.user.first_name }} {{ profile.user.last_name }}
              </p>
              <p class="text-sm text-blue-400">{{ profile.user.nik }}</p>
            </div>
            <span class="text-blue-600">
              <font-awesome-icon icon="user-alt" />
            </span>

            <!-- <span>
              <svg
                class="text-gray-400"
                width="10"
                height="6"
                viewbox="0 0 10 6"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M9.08335 0.666657C8.75002 0.333323 8.25002 0.333323 7.91669 0.666657L5.00002 3.58332L2.08335 0.666657C1.75002 0.333323 1.25002 0.333323 0.916687 0.666657C0.583354 0.99999 0.583354 1.49999 0.916687 1.83332L4.41669 5.33332C4.58335 5.49999 4.75002 5.58332 5.00002 5.58332C5.25002 5.58332 5.41669 5.49999 5.58335 5.33332L9.08335 1.83332C9.41669 1.49999 9.41669 0.99999 9.08335 0.666657Z"
                  fill="currentColor"
                ></path>
              </svg>
            </span> -->
          </button>
        </div>
      </div>
    </scrollactive>
    <section
      id="home"
      class="home pl-4 pr-0 pt-40 sm:pt-28 bg-white dark:bg-gray-800 sm:px-6"
      v-scroll-reveal.reset
    >
      <div class="container items-center max-w-6xl mx-auto xl:px-8">
        <div class="flex items-center sm:-mx-3">
          <div class="w-full md:w-1/2 md:px-3 lg:pr-20">
            <div
              class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0"
            >
              <h3
                class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl"
              >
                <span class="block text-gray-600 xl:inline">Ayo ikut </span>
                <span class="block text-blue-400 xl:inline">Vaksinasi</span>
              </h3>
              <p
                class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl"
              >
                Ayo ikut Vaksinasi serentak, kunjungi vaksin center yang telah
                terdaftar
              </p>
              <div class="relative flex flex-col sm:flex-row sm:space-x-4">
                <a
                  href="#_"
                  class="flex transform hover:scale-110 transition-transform motion-reduce:transform-none items-center w-1/2 sm:w-1/2 px-6 py-3 mb-3 text-lg text-white bg-blue-400 rounded-md sm:mb-0 hover:bg-blue-500"
                >
                  Daftar sekarang
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 ml-2"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  >
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                  </svg>
                </a>
                <!-- <a href="#_" class="flex items-center px-6 py-3 text-gray-500 bg-gray-100 rounded-md hover:bg-gray-200 hover:text-gray-600">
              Bagaimana kerja kami
            </a> -->
              </div>
            </div>
          </div>
          <div class="w-0 sm:px-32 sm:w-1/2 invisible sm:visible">
            <div class="w-full h-auto">
              <img src="../assets/img/doctor.png" class="" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section 2 -->
    <section
      id="jadwal"
      class="jadwal pl-4 pr-0 pt-28 pb-12 sm:pt-56 sm:pb-20 bg-white sm:px-6"
      v-scroll-reveal.reset
    >
      <div class="container items-center max-w-6xl mx-auto xl:px-8">
        <div class="flex items-center sm:-mx-3">
          <div class="w-0 sm:px-32 sm:w-1/2 invisible sm:visible">
            <div class="w-full h-auto">
              <img src="../assets/img/waiting.svg" />
            </div>
          </div>
          <div class="w-full md:w-1/2 md:px-3 lg:pr-20">
            <div
              class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0"
            >
              <h3
                class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl"
              >
                <span class="block text-gray-600 xl:inline">Catat </span>
                <span class="block text-blue-400 xl:inline"
                  >Jadwalnya yaa!!</span
                >
              </h3>
              <p
                class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl"
              >
                Ayo ikut Vaksinasi serentak, kunjungi vaksin center yang telah
                terdaftar
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section 3 -->
    <section
      id="vaccenter"
      class="vaccenter pt-36 pb-20 bg-white"
      v-scroll-reveal.reset
    >
      <div class="container max-w-6xl mx-auto">
        <h2 class="text-4xl font-bold text-gray-600 tracking-tight text-center">
          Daftar Vaksin Center
        </h2>
        <p class="mt-2 text-lg text-center text-gray-600">
          Lihat Daftar vaksin center dibawah ini
        </p>
        <div
          class="grid grid-cols-4 gap-8 mt-10 sm:grid-cols-8 lg:grid-cols-12 sm:px-8 xl:px-0"
        >
          <div v-if="vaksin_center == null">
            <div class="items-center">
              <p class="text-center">Loading...</p>
            </div>
          </div>
          <div
            class="flex flex-col items-center justify-between col-span-4 px-8 py-12 space-y-4 bg-gray-100 sm:rounded-xl"
            v-for="(vaksin_centers, key) in vaksin_center.slice(0, 5)"
            :key="key"
          >
            <div class="p-3 text-white bg-blue-500 rounded-full">
              <font-awesome-icon icon="hospital-alt" />
            </div>
            <h4 class="text-xl font-medium text-gray-700">
              {{ vaksin_centers.name }}
            </h4>
            <p class="text-base text-center text-gray-500">
              {{ vaksin_centers.address }},
              {{ vaksin_centers.contact }}
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-gray-200">
      <div
        class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8"
      >
        <nav class="flex flex-wrap justify-center -mx-5 -my-2">
          <div class="px-5 py-2">
            <a
              href="#"
              class="text-base leading-6 text-gray-500 hover:text-gray-900"
            >
              About
            </a>
          </div>
          <div class="px-5 py-2">
            <a
              href="#"
              class="text-base leading-6 text-gray-500 hover:text-gray-900"
            >
              Our Partners
            </a>
          </div>
          <div class="px-5 py-2">
            <a
              href="#"
              class="text-base leading-6 text-gray-500 hover:text-gray-900"
            >
              Contact
            </a>
          </div>
        </nav>
        <div class="flex justify-center mt-8 space-x-6">
          <a href="#" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Facebook</span>
            <svg
              class="w-6 h-6"
              aria-hidden="true"
              fill="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                fill-rule="evenodd"
                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Instagram</span>
            <svg
              class="w-6 h-6"
              aria-hidden="true"
              fill="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                fill-rule="evenodd"
                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Twitter</span>
            <svg
              class="w-6 h-6"
              aria-hidden="true"
              fill="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"
              ></path>
            </svg>
          </a>
        </div>
        <p class="mt-8 text-base leading-6 text-center text-gray-400">
          © 2021 Nusantara Vaccine Centre
        </p>
      </div>
    </section>
  </body>
</template>

<script>
import axios from "axios";

export default {
  created() {
    document.title = "Nusvac - Home";
    var user = localStorage.getItem("token-peserta");
    // console.log(user);
    if (user) {
      axios
        .get("peserta/profil", {
          headers: {
            Authorization: `Bearer ${user}`,
          },
        })
        .then((res) => {
          this.profile = res.data;
        });
    }

    axios
      .get("vaksin/center")
      .then((res) => {
        this.vaksin_center = res.data;
        // console.log(this.vaksin_center);
      })
      .catch((err) => {
        console.log(err);
      });
  },
  data: () => {
    return {
      profile: null,
      vaksin_center: [],
      open: false,
    };
  },
  methods: {
    redirect() {
      this.$router.push("peserta/profil");
    },
    vaksinCenter() {
      axios
        .get("vaksin/center")
        .then((res) => {
          this.vaksin_center = res.data;
          // console.log(this.vaksin_center);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    toggle() {
      this.open = !this.open;
    },
  },
};
</script>

<style></style>
