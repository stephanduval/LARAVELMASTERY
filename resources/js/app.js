import "./bootstrap";

import { createApp } from "vue";
import { store } from "./store/store";

import Departments from "./Components/Departments.vue";
import PermissionsCreate from "./Components/permissions/PermissionsCreate.vue";
import Users from "./Components/users/Users.vue";

import existingApp from "./app";

import Form from "vform";
window.Form = Form;

import Multiselect from "@vueform/multiselect";
import "@vueform/multiselect/themes/default.css";

const app = createApp({});

app.component("departments", Departments);
app.component("permissions-create", PermissionsCreate); // Use kebab-case here
app.component("users", Users); // Use kebab-case here

window.url = "/";
// Global URL

// if (existingApp) {
//     // Unmount the existing app instance
//     existingApp.unmount();
// }

app.use(store);

app.mount("#app");
