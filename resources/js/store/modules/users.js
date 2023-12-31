import axios from "axios";

export default {
    state: {
        users: [],
        userLinks: [],
    },
    getters: {
        users(state) {
            return state.users;
        },
        userLinks(state) {
            return state.userLinks;
        },
    },
    mutations: {
        set_users: (state, data) => {
            state.users = data;

            state.userLinks = [];

            for (let i = 0; i < data.links.length; i++) {
                if (
                    i === 1 ||
                    i === Number(data.links.length - 2) ||
                    data.links[i].active ||
                    isNaN(data.links[i].label) ||
                    Number(data.links[i].label) ===
                        Number(data.current_page + 1) ||
                    Number(data.links[i].label) ===
                        Number(data.current_page - 1)
                ) {
                    state.userLinks.push(data.links[i]);
                }
            }
        },
    },
    actions: {
        getUsersResults: (context, link) => {
            axios.get(link.url).then((response) => {
                context.commit("set_users", response.data);
            });
        },
        getUsers: (context) => {
            axios.get(`${window.url}api/getUsers`).then((response) => {
                context.commit("set_users", response.data);
            });
        },
        storeUser: (context, userData) => {
            userData.post(window.url + "api/storeUser").then((response) => {
                context.dispatch("getUsers");
                $("#exampleModal").modal("hide");
            });
        },
        updateUser: (context, userData) => {
            userData
                .post(window.url + "api/updateUser/" + userData.id)
                .then((response) => {
                    context.dispatch("getUsers");
                    $("#exampleModal").modal("hide");
                });
        },
        deleteUser: (context, userData) => {
            if (confirm("Are you sure you wanna delete the user!")) {
                axios
                    .post(window.url + "api/deleteUser/" + userData.id)
                    .then(() => {
                        context.dispatch("getUsers");
                    });
            }
        },
    },
};
