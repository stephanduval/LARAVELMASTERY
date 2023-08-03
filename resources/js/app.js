import "./bootstrap";

import { createApp } from "vue/dist/vue.esm-bundler";
// WAS
//import { createApp } from "Vue";

import Departments from "./Components/Departments.vue";

const app = createApp({});

app.component("departments", Departments);

app.mount("#app");
