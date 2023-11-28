import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
    },
    {
      path: "/about",
      name: "about",
      component: () => import("../views/AboutView.vue"),
    },
    {
      path: "/login",
      name: "login",
      component: () => import("../views/Login.vue"),
    },
    {
      path: "/register",
      name: "register",
      component: () => import("../views/Register.vue"),
    },
    {
      path: "/profile",
      name: "profile",
      component: () => import("../views/Profile.vue"),
    },
    {
      path: "/admin",
      component: () => import("../layout/admin.vue"),
      children: [
        {
          path: "/user",
          name: "user",
          component: () => import("../views/admin/users/index.vue"),
        },
        {
          path: "/setting",
          name: "admin_setting",
          component: () => import("../views/admin/settings/index.vue"),
        },
        {
          path: "user/create",
          name: "admin-user-create",
          component: () => import("../views/admin/users/create.vue"),
        },
        {
          path: "user/:id/edit",
          name: "admin-user-edit",
          component: () => import("../views/admin/users/edit.vue"),
        },
        {
          path: "/roles",
          name: "admin_roles",
          component: () => import("../views/admin/roles/index.vue"),
        },
      ],
    },
  ],
});
// const admin = [];

export default router;

