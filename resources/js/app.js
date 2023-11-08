import "./bootstrap";

import { createApp } from "vue";
import { store } from "./store/store";

import Departments from "./Components/Departments.vue";
import PermissionsCreate from "./Components/permissions/PermissionsCreate.vue";

import Form from "vform";
window.Form = Form;

const app = createApp({});

app.component("departments", Departments);
app.component("permissions-create", PermissionsCreate); // Use kebab-case here

window.url = "/";
// Global URL

app.use(store);

app.mount("#app");
