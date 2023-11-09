<template>
    <div class="row">
        <div class="col-md-12">
            <div class="form-check-inline">
                <input
                    type="radio"
                    class="form-check-input"
                    id="inlineradio1"
                    name="crudSelected"
                    v-model="permissionData.crudType"
                    value="basic"
                />
                <label for="inlineradio1" class="form-check-label">Basic</label>
            </div>
            <div class="form-check-inline">
                <input
                    type="radio"
                    class="form-check-input"
                    id="inlineradio2"
                    name="crudSelected"
                    v-model="permissionData.crudType"
                    value="crud"
                />
                <label for="inlineradio2" class="form-check-label">CRUD</label>
            </div>
        </div>
    </div>
    <div
        class="row align-items-center"
        v-if="permissionData.crudType == 'basic'"
    >
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="" />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="display_name">Display Name</label>
                <input
                    type="text"
                    class="form-control"
                    name="display_name"
                    id=""
                />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="description">Description</label>
                <input
                    type="text"
                    class="form-control"
                    name="description"
                    id=""
                />
            </div>
        </div>
    </div>

    <div
        class="row align-items-center"
        v-if="permissionData.crudType == 'crud'"
    >
        <div class="col-md-3">
            <div class="form-group">
                <label for="resource">Resource</label>
                <input
                    type="text"
                    class="form-control"
                    name="resource"
                    v-model="permissionData.resource"
                    id=""
                />
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-check-inline">
                <input
                    type="checkbox"
                    class="form-check-input"
                    id="inlinecheckbox1"
                    name="crudSelected"
                    v-model="permissionData.crudSelected"
                    value="create"
                />
                <label for="inlinecheckbox1" class="form-check-label"
                    >Create</label
                >
            </div>
            <div class="form-check-inline">
                <input
                    type="checkbox"
                    class="form-check-input"
                    id="inlinecheckbox2"
                    name="crudSelected"
                    v-model="permissionData.crudSelected"
                    value="read"
                />
                <label for="inlinecheckbox2" class="form-check-label"
                    >Read</label
                >
            </div>
            <div class="form-check-inline">
                <input
                    type="checkbox"
                    class="form-check-input"
                    id="inlinecheckbox3"
                    name="crudSelected"
                    v-model="permissionData.crudSelected"
                    value="update"
                />
                <label for="inlinecheckbox3" class="form-check-label"
                    >Update</label
                >
            </div>
            <div class="form-check-inline">
                <input
                    type="checkbox"
                    class="form-check-input"
                    id="inlinecheckbox4"
                    name="crudSelected"
                    v-model="permissionData.crudSelected"
                    value="delete"
                />
                <label for="inlinecheckbox4" class="form-check-label"
                    >Delete</label
                >
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <button type="submit" class="btn btn-success float-right">
                Save
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div
                class="row"
                v-if="
                    permissionData.resource.length >= 3 &&
                    permissionData.crudSelected.length > 0
                "
            >
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(item, index) in permissionData.crudSelected"
                            :key="index"
                        >
                            <td v-text="crudName(item)"></td>
                            <td v-text="crudDisplayName(item)"></td>
                            <td v-text="crudDisplayName(item)"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            permissionData: {
                resource: "",
                crudType: "basic",
                crudSelected: ["create", "read", "update", "delete"],
            },
        };
    },
    methods: {
        crudName(item) {
            return (
                this.permissionData.resource.toLowerCase() +
                "-" +
                item.toLowerCase()
            );
        },
        crudDisplayName(item) {
            return (
                this.permissionData.resource.substring(0, 1).toUpperCase() +
                this.permissionData.resource.substring(1) +
                "-" +
                item.substring(0, 1) +
                item.substring(1)
            );
        },
    },
};
</script>
