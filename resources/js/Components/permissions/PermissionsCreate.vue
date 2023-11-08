<template>
    <div class="row">
        <div class="col-md-12">
            <div class="form-check-inline">
                <input
                    type="radio"
                    class="form-check-input"
                    id="inlineradio1"
                    name="Permission_type"
                    v-model="permissionData.permission_type"
                    value="basic"
                />
                <label for="inlineradio1" class="form-check-label">Basic</label>
            </div>
            <div class="form-check-inline">
                <input
                    type="radio"
                    class="form-check-input"
                    id="inlineradio2"
                    name="Permission_type"
                    v-model="permissionData.permission_type"
                    value="crud"
                />
                <label for="inlineradio2" class="form-check-label">CRUD</label>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            permissionData: {
                permission_type: "basic",
                name: "",
                display_name: "",
                description: "",
            },
        };
    },
};
</script>
<!--

            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="display_name">Display Name</label>
                        <input type="text" class="form-control" name="display_name" id="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success float-right">
                            Save
                        </button>
                    </div>
                </div>
            </div> -->
