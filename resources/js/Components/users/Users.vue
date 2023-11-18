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
                    <!-- <button @click="testAction" class="btn btn-info">test</button> -->
                    <!-- {{test}} -->
                    <div class="table-responsive">
                        <!-- <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th
                                        v-if="
                                            current_permissions.has(
                                                'users-update',
                                            ) ||
                                            current_permissions.has(
                                                'users-delete',
                                            )
                                        "
                                    >
                                        > Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(department, index) in departments"
                                    :key="index"
                                >
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ department.name }}</td>
                                    <td
                                        v-if="
                                            current_permissions.has(
                                                'departments-update',
                                            ) ||
                                            current_permissions.has(
                                                'departments-delete',
                                            )
                                        "
                                    >
                                        <button
                                            class="btn btn-success mx-1"
                                            @click="editDepartment(department)"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button
                                            class="btn btn-danger mx-1"
                                            @click="
                                                deleteDepartment(department)
                                            "
                                        >
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table> -->
                    </div>

                    <!-- Modal -->
                    <div
                        class="modal fade"
                        id="exampleModal"
                        tabindex="-1"
                        aria-labelledby="exampleModalLabel"
                        aria-hidden="true"
                    >
                        <div
                            class="modal-dialog modal-xl modal-dialog-centered"
                        >
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title"
                                        id="exampleModalLabel"
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
                                        aria-label="Close"
                                    ></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col md-3"></div>
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                v-model="userData.name"
                                            />
                                            <div
                                                class="text-danger"
                                                v-if="
                                                    userData.errors.has('name')
                                                "
                                            ></div>
                                        </div>
                                        <div class="col md-3"></div>

                                        <div class="form-group">
                                            <label for="name">Email</label>
                                            <input
                                                type="email"
                                                class="form-control"
                                                v-model="userData.email"
                                            />
                                            <div
                                                class="text-danger"
                                                v-if="
                                                    userData.errors.has('email')
                                                "
                                            ></div>
                                        </div>
                                    </div>
                                    <div class="col md-3"></div>

                                    <div class="form-group">
                                        <label for="name">Password</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="userData.password"
                                        />
                                        <div
                                            class="text-danger"
                                            v-if="
                                                userData.errors.get('password')
                                            "
                                        ></div>
                                    </div>
                                    <div class="col md-3"></div>

                                    <div class="form-group">
                                        <label for="department_id"
                                            >Department</label
                                        >
                                        <multi-select
                                            v-model="userData.department_id"
                                            :options="filtered_departments"
                                            :searchable="true"
                                        />
                                        <!-- Interesting unusued multi-select options -->
                                        <!-- :close-on-select="true"
                                            :clear-on-select="false"
                                            :preserve-search="true"
                                            placeholder="Select Department"
                                            label="name"
                                            track-by="id"
                                            :preselect-first="false"  -->

                                        <div
                                            class="text-danger"
                                            v-if="userData.errors.has('name')"
                                        ></div>
                                    </div>
                                </div>

                                <!-- <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="director_id"
                                                    >Director</label
                                                >
                                                <select
                                                    name="director_id"
                                                    class="form-control"
                                                    v-model="
                                                        departmentData.director_id
                                                    "
                                                >
                                                    <option value="">
                                                        Select a person
                                                    </option>
                                                    <option value="1">
                                                        IT Director
                                                    </option>
                                                    <option value="2">
                                                        HR Director
                                                    </option>
                                                </select>

                                                <div
                                                    class="text-danger"
                                                    v-if="
                                                        departmentData.errors.has(
                                                            'director_id',
                                                        )
                                                    "
                                                    v-html="
                                                        departmentData.errors.get(
                                                            'director_id',
                                                        )
                                                    "
                                                />
                                            </div>
                                        </div> -->
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
                                @click="!editMode ? storeUSer() : updateUser()"
                                class="btn btn-success"
                            >
                                {{ !editMode ? "Store" : "Save Changes" }}
                            </button>
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
                department_id: "", // added department_id
                name: "",
                email: "", // added email
                password: "", // added password
            }),
        };
    },
    // rest of the code...

    methods: {
        createUser() {
            console.log("created");

            this.editMode = false;
            this.userData.name = "";
            $("#exampleModal").modal("show");
        },
        storeUser() {
            // this.departmentData.name == '' ? this.departmentErrors.name = true : this.departmentErrors.name = false
            // this.departmentData.director_id == '' ? this.departmentErrors.director_id = true : this.departmentErrors.director_id = false

            // if(this.departmentData.name && this.departmentData.director_id) {
            this.$store.dispatch("storeDepartment", this.departmentData);
            // }
        },
        editUser(department) {
            this.editMode = true;
            this.userData.id = department.id;
            this.userData.name = department.name;
            $("#exampleModal").modal("show");
        },
        updateUser() {
            // this.departmentData.name == '' ? this.departmentErrors.name = true : this.departmentErrors.name = false
            // this.departmentData.director_id == '' ? this.departmentErrors.director_id = true : this.departmentErrors.director_id = false

            // if(this.departmentData.name && this.departmentData.director_id) {
            this.$store.dispatch("updateUser", this.userData);
            // }
        },
        deleteDepartment(department) {
            this.$store.dispatch("deleteUser", userData.id);
        },
        // testAction() {
        //     this.$store.dispatch('testAction')
        // }
    },
    mounted: function () {
        this.$store.dispatch("getAllDepartments");
        this.$store.dispatch("getAuthRolesAndPermissions");
    },
    computed: {
        filtered_departments() {
            return this.$store.getters.filtered_departments;
        },
        // test() {
        //     return this.$store.getters.test
        // },
        // departments() {
        //     return this.$store.getters.users;
        // },
        current_roles() {
            return this.$store.getters.current_role;
        },
        current_permissions() {
            return this.$store.getters.current_permissions;
        },
    },
};
</script>
