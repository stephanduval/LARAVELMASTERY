import "./bootstrap";

import { createApp } from "vue";
import { store } from "./store/store"; //it can also be store.js

// WAS
//import { createApp } from "Vue";
import Departments from "./Components/Departments.vue";
import Form from "vform";
window.Form = Form;

const app = createApp({});

app.component("departments", Departments);

window.url = "/";
// Global URL

app.use(store);

app.mount("#app");
