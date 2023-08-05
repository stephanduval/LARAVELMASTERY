import "./bootstrap";

import { createApp } from "vue/dist/vue.esm-bundler";
// WAS
//import { createApp } from "Vue";
import Departments from "./Components/Departments.vue";
import Form from "vform";
window.Form = Form;

const app = createApp({});

app.component("departments", Departments);

window.url = "/";
// Global URL

app.mount("#app");
