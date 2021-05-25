<template>
  <body class="text-gray-800 antialiased">
    <main class="profile-page sm:pt-60">
      <section class="relative py-16 bg-gray-300">
        <div class="container mx-auto px-4">
          <div
            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64"
          >
            <div class="px-6">
              <div class="flex flex-wrap justify-center">
                <div
                  class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center"
                >
                  <div class="relative">
                    <img
                      alt="..."
                      src="../assets/img/person.png"
                      class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px"
                    />
                  </div>
                </div>
                <div
                  class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center"
                >
                  <div class="py-6 px-3 mt-32 sm:mt-0">
                    <button
                      @click="logout"
                      class="bg-pink-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150"
                      type="button"
                    >
                      Logout
                    </button>
                  </div>
                </div>
              </div>
              <div v-if="profile == null">
                <div class="justify-center">
                  <p class="text-center">Loading...</p>
                </div>
              </div>
              <div v-else class="text-center mt-12">
                <h3
                  class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2"
                >
                  {{ profile.user.first_name }} {{ profile.user.last_name }}
                </h3>
                <div
                  class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase"
                >
                  <!-- <i
                    class="fas fa-map-marker-alt mr-2 text-lg text-gray-500"
                  ></i> -->
                  {{ profile.user.address }}
                </div>
                <div
                  class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase"
                >
                  <!-- <i
                    class="fas fa-map-marker-alt mr-2 text-lg text-gray-500"
                  ></i> -->
                  Status -
                  {{ profile.status.status }}
                </div>
                <div class="mb-2 text-gray-700 mt-10">
                  <font-awesome-icon icon="hospital-alt" />
                  {{ profile.vaccineCenter.name }} -
                  {{ profile.vaccineCenter.address }}
                </div>
                <div class="mb-2 text-gray-700">
                  <!-- <i class="fas fa-university mr-2 text-lg text-gray-500"></i
                  > -->
                  <font-awesome-icon icon="address-card" />

                  {{ profile.vaccineCenter.contact }}
                </div>
              </div>
              <div class="mt-10 py-10 border-t border-gray-300 text-center">
                <div class="flex flex-wrap justify-center">
                  <div class="w-full lg:w-9/12 px-4">
                    <p class="mb-4 text-lg leading-relaxed text-gray-800">
                      An artist of considerable range, Jenna the name taken by
                      Melbourne-raised, Brooklyn-based Nick Murphy writes,
                      performs and records all of his own music, giving it a
                      warm, intimate feel with a solid groove structure. An
                      artist of considerable range.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </body>
</template>

<script>
import axios from "axios";
export default {
  data: () => {
    return {
      profile: null,
      vaccineCenter: null,
    };
  },
  created() {
    document.title = `Nusvac - Profil`;
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
          this.vaccineCenter = res.data.vaccineCenter;
        });
    }
  },

  methods: {
    logout() {
      var token = localStorage.getItem("token-peserta");
      axios
        .get("peserta/logout/", {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((res) => {
          localStorage.removeItem("token-peserta");
          console.log(res);
          this.$router.push("/");
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