import axios from "axios";

export default {
    state: {},
    getters: {},
    mutations: {
        set_all_departments: (state, data) => {
            console.log(data);
        },
    },

    actions: {
        getAllDepartments: (context) => {
            axios.get(`${window.url}api/getAllDepartments`).then((response) => {
                context.commit("set_all_departments", response.data);
            });
        },
    },
};
