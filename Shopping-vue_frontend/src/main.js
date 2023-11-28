import { createPinia } from "pinia";
import { createApp } from "vue";
import axios from "axios";
import {
  Checkbox,
  Input,
  Select,
  Avatar,
  Menu,
  Table,
  Card,
  List,
  Drawer,
  Button,
  message,
} from "ant-design-vue";
import App from "./App.vue";
import router from "./router";

// Import CSS
import "./assets/main.css";
import "tailwindcss/tailwind.css";
import "./static/fontawesome-free-6.4.2-web/css/all.min.css";
import "ant-design-vue/dist/reset.css";

// sử dụng toàn cục
window.axios = axios;

const app = createApp(App);

// Use Ant Design Vue components
app.use(Button);
app.use(Input);
app.use(Select);
app.use(Checkbox);
app.use(Card);
app.use(Table);
app.use(Menu);
app.use(Drawer);
app.use(List);
app.use(Avatar);
app.use(router);

// Use Pinia for state management
app.use(createPinia());

// Mount the app
app.mount("#app");

// Configure global properties
app.config.globalProperties.$message = message;
