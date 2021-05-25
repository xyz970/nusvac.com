import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

// const routes = [
//   {
//     path: '/hello',
//     name: 'hello',
//     component: import('../views/hello.vue')
//   }
// ]
const router = new VueRouter({
    base: process.env.BASE_URL,
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: () =>
                import(/* webpackChunkName: "login" */ "../views/home.vue")
        },
        {
            path: "/peserta/daftar",
            name: "daftar-peserta",
            component: () => import("../views/register.vue")
        },
        {
            path: "/peserta/login",
            name: "login",
            component: () => import("../views/login.vue")
        },
        {
            path: "/peserta/profil/",
            name: "profil-peserta",
            component: () => import("../views/profile.vue")
        },
        {
            path: "/admin/login",
            name: "login-admin",
            component: () => import("../views/login-admin.vue")
        },
        {
            path: "/admin/home/",
            name: "home-admin",
            component: () => import("../views/admin-home.vue")
        },
        {
            path: "/admin/berita/",
            name: "berita-admin",
            component: () => import("../views/admin-home.vue")
        },
        {
            path: "*",
            name: "error-404",
            component: () => import("../views/error/not-found.vue")
        }
    ]
});

export default router;
