require("./bootstrap");

import { createApp } from "vue";
import { store } from "./store/store";

import LogoutComponent from "./Components/auth/LogoutComponent.vue";
// import LogoutComponent from "./components/auth/LogoutComponent.vue";
import Departments from "./Components/Departments.vue";
import PermissionsCreate from "./Components/permissions/PermissionsCreate.vue";
import Users from "./Components/users/Users.vue";

import Form from "vform";
window.Form = Form;

import Multiselect from "@vueform/multiselect";
import "@vueform/multiselect/themes/default.css";

const app = createApp({});

app.component("logout-component", LogoutComponent);
app.component("departments", Departments);
app.component("permissions-create", PermissionsCreate);
app.component("users", Users);
app.component("multi-select", Multiselect);

window.url = "/";

app.use(store);

app.mount("#app");
