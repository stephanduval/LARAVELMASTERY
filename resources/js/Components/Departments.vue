<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <h5 class="float-start text-light">Departments List</h5>
                    <button
                        class="btn btn-success float-end"
                        @click="createDepartment"
                        v-if="current_permissions.has('departments-create')"
                    >
                        New Department
                    </button>
                </div>
                <div class="card-body">
                    <!-- <button @click="testAction" class="btn btn-info">test</button> -->
                    <!-- {{test}} -->
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th
                                        v-if="
                                            current_permissions.has(
                                                'departments-update',
                                            ) ||
                                            current_permissions.has(
                                                'departments-delete',
                                            )
                                        "
                                    >
                                        > Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(
                                        department, index
                                    ) in departments.data"
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
                        </table>
                    </div>
                    <div
                        class="d-flex justify-content-center"
                        v-if="departmentLinks.length > 3"
                    >
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li
                                    :class="`page-item ${
                                        link.active ? 'active' : ''
                                    } ${!link.url ? 'disabled' : ''}`"
                                    v-for="(link, index) in departmentLinks"
                                    :key="index"
                                >
                                    <a
                                        class="page-link"
                                        href="#"
                                        v-html="link.label"
                                        @click.prevent="getResults(link)"
                                    ></a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <!-- Modal -->
                    <div
                        class="modal fade"
                        id="exampleModal"
                        tabindex="-1"
                        aria-labelledby="exampleModalLabel"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5
                                        class="modal-title"
                                        id="exampleModalLabel"
                                    >
                                        {{
                                            !editMode
                                                ? "Create Department"
                                                : "Update Department"
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="departmentName"
                                                    >Name</label
                                                >
                                                <input
                                                    id="departmentName"
                                                    type="text"
                                                    class="form-control"
                                                    name="name"
                                                    v-model="
                                                        departmentData.name
                                                    "
                                                />

                                                <div
                                                    class="text-danger"
                                                    v-if="
                                                        departmentData.errors.has(
                                                            'name',
                                                        )
                                                    "
                                                    v-html="
                                                        departmentData.errors.get(
                                                            'name',
                                                        )
                                                    "
                                                />
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
                                        @click="
                                            !editMode
                                                ? storeDepartment()
                                                : updateDepartment()
                                        "
                                        class="btn btn-success"
                                    >
                                        {{
                                            !editMode ? "Store" : "Save Changes"
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
</template>

<script>
export default {
    data() {
        return {
            editMode: false,
            departmentData: new Form({
                id: "",
                name: "",
                director_id: "",
            }),
            departmentErrors: {
                name: false,
                director_id: false,
            },
        };
    },
    methods: {
        getResults(link) {
            if (!link.url || link.active) {
                return;
            } else {
                this.$store.dispatch("getDepartmentsResults", link);
            }
        },
        createDepartment() {
            this.editMode = false;
            this.departmentData.name = "";
            $("#exampleModal").modal("show");
        },
        storeDepartment() {
            // this.departmentData.name == '' ? this.departmentErrors.name = true : this.departmentErrors.name = false
            // this.departmentData.director_id == '' ? this.departmentErrors.director_id = true : this.departmentErrors.director_id = false

            // if(this.departmentData.name && this.departmentData.director_id) {
            this.$store.dispatch("storeDepartment", this.departmentData);
            // }
        },
        editDepartment(department) {
            this.editMode = true;
            this.departmentData.id = department.id;
            this.departmentData.name = department.name;
            $("#exampleModal").modal("show");
        },
        updateDepartment() {
            // this.departmentData.name == '' ? this.departmentErrors.name = true : this.departmentErrors.name = false
            // this.departmentData.director_id == '' ? this.departmentErrors.director_id = true : this.departmentErrors.director_id = false

            // if(this.departmentData.name && this.departmentData.director_id) {
            this.$store.dispatch("updateDepartment", this.departmentData);
            // }
        },
        deleteDepartment(department) {
            this.$store.dispatch("deleteDepartment", department);
        },
        // testAction() {
        //     this.$store.dispatch('testAction')
        // }
    },
    mounted: function () {
        // console.log("Roles", window.auth_roles);
        // console.log("Permissions", window.auth_permissions);
        this.$store.dispatch("getDepartments");
        this.$store.dispatch("getAuthRolesAndPermissions");
    },
    computed: {
        departmentLinks() {
            return this.$store.getters.departmentLinks;
        },
        departments() {
            return this.$store.getters.departments;
        },
        current_roles() {
            return this.$store.getters.current_role;
        },
        current_permissions() {
            return this.$store.getters.current_permissions;
        },
    },
};
</script>
