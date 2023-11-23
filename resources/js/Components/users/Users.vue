<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <h5 class="float-start text-light">Users List</h5>
                    <button
                        class="btn btn-success float-end"
                        @click="createUser"
                        v-if="current_permissions.has('users-create')"
                    >
                        New User
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive"></div>

                    <!-- Modal -->
                    <div
                        class="modal fade"
                        id="exampleModal"
                        tabindex="-1"
                        aria-labelledby="createorUpdateModalLabel"
                        aria-hidden="true"
                    >
                        <div
                            class="modal-dialog modal-xl modal-dialog-centered"
                        >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title"
                                        id="createorUpdateModalLabel"
                                    >
                                        {{
                                            !editMode
                                                ? "Create User"
                                                : "Update User"
                                        }}
                                    </h5>
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="close-modal"
                                        id="close-modal"
                                    ></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col md-3">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    v-model="userData.name"
                                                    id="name"
                                                    autocomplete="off"
                                                />
                                                <div
                                                    class="text-danger"
                                                    v-if="
                                                        userData.errors.has(
                                                            'name',
                                                        )
                                                    "
                                                ></div>
                                            </div>
                                        </div>
                                        <div class="col md-3">
                                            <div class="form-group">
                                                <label for="name">Email</label>
                                                <input
                                                    type="email"
                                                    class="form-control"
                                                    v-model="userData.email"
                                                    id="email"
                                                    autocomplete="off"
                                                />
                                                <div
                                                    class="text-danger"
                                                    v-if="
                                                        userData.errors.has(
                                                            'email',
                                                        )
                                                    "
                                                ></div>
                                            </div>
                                        </div>
                                        <div class="col md-3">
                                            <div class="form-group">
                                                <label for="password"
                                                    >Password</label
                                                >
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    v-model="userData.password"
                                                    id="password"
                                                />
                                                <div
                                                    class="text-danger"
                                                    v-if="
                                                        userData.errors.get(
                                                            'password',
                                                        )
                                                    "
                                                ></div>
                                            </div>
                                        </div>
                                        <div class="col md-3">
                                            <div class="form-group">
                                                <label for="department_id"
                                                    >Department</label
                                                >
                                                <multi-select
                                                    v-model="
                                                        userData.department_id
                                                    "
                                                    :options="
                                                        filtered_departments
                                                    "
                                                    :searchable="true"
                                                    id="department_id"
                                                />
                                                <div
                                                    class="text-danger"
                                                    v-if="
                                                        userData.errors.has(
                                                            'name',
                                                        )
                                                    "
                                                ></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col md-12">
                                            <div class="form-group">
                                                <label for="roles">Roles</label>
                                                <multi-select
                                                    id="roles"
                                                    v-model="
                                                        userData.selected_roles
                                                    "
                                                    :options="filtered_roles"
                                                    :searchable="true"
                                                    mode="tags"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class=".col-md-12">
                                            <div class="form-group">
                                                <label
                                                    for="permission_categories"
                                                    >Permission
                                                    Categories</label
                                                >
                                                <multi-select
                                                    v-model="
                                                        userData.selected_permission_categories
                                                    "
                                                    :options="
                                                        filtered_permission_categories
                                                    "
                                                    :searchable="true"
                                                    mode="tags"
                                                    id="permission_categories"
                                                    @input="
                                                        getFilteredPermissions
                                                    "
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col md-12">
                                            <div class="form-group">
                                                <label
                                                    for="filtered_permissions"
                                                    >Permissions</label
                                                >
                                                <multi-select
                                                    v-model="
                                                        userData.filtered_permissions
                                                    "
                                                    :options="
                                                        filtered_permissions
                                                    "
                                                    :searchable="true"
                                                    mode="tags"
                                                    id="filtered_permissions"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button
                                            type="button"
                                            class="btn btn-secondary"
                                            data-bs-dismiss="modal"
                                        >
                                            Close
                                        </button>
                                        <button
                                            type="button"
                                            @click="
                                                !editMode
                                                    ? storeUSer()
                                                    : updateUser()
                                            "
                                            class="btn btn-success"
                                        >
                                            {{
                                                !editMode
                                                    ? "Store"
                                                    : "Save Changes"
                                            }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            editMode: false,
            userData: new Form({
                id: "",
                department_id: "",
                name: "",
                email: "",
                password: "",
                selected_roles: [],
                selected_permission_categories: [],
                selected_permissions: [],
            }),
        };
    },
    methods: {
        getFilteredPermissions(values) {
            this.$store
                .dispatch("getFilteredPermissions", { values: values })
                .then(() => {
                    this.userData.selected_permissions = [];
                    this.filtered_permissions.forEach((item) => {
                        if (!item.label.includes("delete")) {
                            this.userData.selected_permissions.push(item.value);
                        }
                    });
                });
        },
        createUser() {
            this.editMode = false;
            this.userData.clear();
            this.userData.reset();
            $("#exampleModal").modal("show");
        },
        storeUser() {
            this.$store.dispatch("storeUser", this.userData);
        },
        editUser(user) {
            this.editMode = true;

            this.userData.id = user.id;
            this.userData.department_id =
                user.department_id == 0 ? "" : user.department_id;
            this.userData.name = user.name;
            this.userData.email = user.email;

            this.userData.selected_roles = [];
            this.userData.selected_permission_categories = [];
            this.userData.selected_permissions = [];

            user.roles.forEach((role) => {
                this.userData.selected_roles.push(role.id);
            });

            let permissionsArray = [];
            user.permissions.forEach((permission) => {
                let permissions = permission.name.split("-");
                permissionsArray.push(permissions[0]);
            });
            let uniqueItems = [...new Set(permissionsArray)];
            this.userData.selected_permission_categories = uniqueItems;

            this.$store
                .dispatch("getFilteredPermissions", { values: uniqueItems })
                .then(() => {
                    user.permissions.forEach((permission) => {
                        this.userData.selected_permissions.push(permission.id);
                    });
                });

            $("#exampleModal").modal("show");
        },
        updateUser() {
            this.$store.dispatch("updateUser", this.userData);
        },
        deleteUser(user) {
            this.$store.dispatch("deleteUser", user);
        },
    },
    mounted() {
        // this.$store.dispatch("getUsers");
        this.$store.dispatch("getAllDepartments");
        this.$store.dispatch("getAllRoles");
        this.$store.dispatch("getAllPermissions");
        this.$store.dispatch("getAuthRolesAndPermissions");
    },
    computed: {
        users() {
            return this.$store.getters.users;
        },
        filtered_permissions() {
            return this.$store.getters.filtered_permissions;
        },
        filtered_permission_categories() {
            return this.$store.getters.filtered_permission_categories;
        },
        filtered_roles() {
            return this.$store.getters.filtered_roles;
        },
        filtered_departments() {
            return this.$store.getters.filtered_departments;
        },
        current_roles() {
            return this.$store.getters.current_roles;
        },
        current_permissions() {
            return this.$store.getters.current_permissions;
        },
    },
};
</script>
