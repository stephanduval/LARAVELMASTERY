<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div
                    class="card-header bg-dark d-flex justify-content-between align-items-center position-relative"
                >
                    <h1 class="float-start text-light">Departments List</h1>
                    <button
                        class="btn btn-success float-end"
                        @click="createDepartment"
                    >
                        New Department
                    </button>
                </div>
                <div class="card-body">
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
                                    <h1
                                        class="modal-title fs-5"
                                        id="exampleModalLabel"
                                    >
                                        Modal title
                                    </h1>
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    ></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    name="name"
                                                    id=""
                                                    v-model="name"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="director_id"
                                                    >Director</label
                                                >
                                                <select
                                                    name="director_id"
                                                    class="form-control"
                                                    v-model="director_id"
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
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <button
                                                    type="submit"
                                                    class="btn btn-success float-right"
                                                >
                                                    Save
                                                </button>
                                            </div>
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
                                        class="btn btn-success"
                                    >
                                        Save changes
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
            name: "",
            director_id: "",
        };
    },
    methods: {
        createDepartment() {
            $("#exampleModal").modal("show");
        },
    },
    mounted() {
        for (let i = 0; i < 10; i++) {
            console.log("The count is", i);
        }
    },
};
</script>
