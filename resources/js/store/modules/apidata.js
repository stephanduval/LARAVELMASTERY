import axios from "axios";

export default {
    state: {
        filtered_departments: [],
    },
    getters: {
        filtered_departments(state) {
            return state.filtered_departments;
        },
    },
    mutations: {
        set_all_departments: (state, data) => {
            state.filtered_departments = [];
            data.forEach((department) =>
                state.filtered_departments.push({
                    value: department.id,
                    label: department.name,
                }),
            );
            // console.log(data);
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
