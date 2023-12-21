<template>
    <input type="hidden" name="token_id" v-model="token_id" />
</template>

<script>
export default {
    data() {
        return {
            token_id: "",
        };
    },
    mounted() {
        this.parseToJson(window.token);
    },
    methods: {
        parseToJson(tokenValue) {
            let base64Url = tokenValue.split(".")[1];
            let base64 = base64Url.replace(/-/g, "+").replace(/_/g, "/");
        },
    },
};
</script>
