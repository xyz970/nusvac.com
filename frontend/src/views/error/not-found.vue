<template>
  <body class="antialiased bg-body text-body font-body" v-scroll-reveal>
    <div class="container mx-auto py-4 px-4">
      <section class="py-8 px-4 text-center">
        <div class="w-1/2 mx-auto">
          <img class="mb-8" src="../../assets/img/error.svg" alt="" />
          <h1 class="text-9xl mb-2 font-semibold text-gray-600 font-heading">
            404
          </h1>
          <h2 class="text-gray-600 font-bold">Page not found</h2>
          <p class="mb-6 text-gray-400">
            Dunder Mifflin is the place where all the paper enthusiastic met one
            day and started selling supplies with true love.
          </p>
          <!-- <div>
                        <a class="px-4 text-indigo-600 hover:underline" href="#"
                            >Link1</a
                        ><a
                            class="px-4 text-indigo-600 hover:underline"
                            href="#"
                            >Link1</a
                        ><a
                            class="px-4 text-indigo-600 hover:underline"
                            href="#"
                            >Link1</a
                        ><a
                            class="px-4 text-indigo-600 hover:underline"
                            href="#"
                            >Link1</a
                        >
                    </div> -->
        </div>
      </section>
    </div>
  </body>
</template>

<script>
export default {
  created() {
    window.title = "Error - 404";
  },
};
</script>

<style></style>
