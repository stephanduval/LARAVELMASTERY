// Boostrap.js is the first JS code to run in out application
import "./bootstrap";

import { createApp } from "vue";
import { store } from "./store/store";

import LogoutComponent from "./Components/auth/LogoutComponent.vue";
import Departments from "./Components/Departments.vue";
import PermissionsCreate from "./Components/permissions/PermissionsCreate.vue";
import Users from "./Components/users/Users.vue";

import existingApp from "./app";

import Form from "vform";
window.Form = Form;

import Multiselect from "@vueform/multiselect";
import "@vueform/multiselect/themes/default.css";

const app = createApp({});

app.component("logout-component", LogoutComponent);
app.component("departments", Departments);
app.component("permissions-create", PermissionsCreate); // Use kebab-case here
app.component("users", Users); // Use kebab-case here
app.component("multi-select", Multiselect);

window.url = "/";
// Global URL

// if (existingApp) {
//     // Unmount the existing app instance
//     existingApp.unmount();
// }

app.use(store);

app.mount("#app");
