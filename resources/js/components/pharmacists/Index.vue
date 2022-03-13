<template>
    <div>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Registered Pharmacists</h1>
        </div>
        <div class="row">
            <div class="card  mx-auto">
                <div v-if="showMessage">
                    <div class="alert alert-success">{{ message }}</div>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form>
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <input
                                            type="search"
                                            v-model.lazy="search"
                                            class="form-control mb-2"
                                            placeholder="Jane Doe"
                                        />
                                    </div>
                                    <div class="col">
                                        <button
                                            type="submit"
                                            class="btn btn-primary mb-2"
                                        >
                                            Search
                                        </button>
                                    </div>
                                    <div class="col">
                                        <select
                                            v-model="selectedDeprtment"
                                            name="city"
                                            class="form-control"
                                            aria-label="Default select example"
                                        >
                                            <option
                                                v-for="department in departments"
                                                :key="department.id"
                                                :value="department.id"
                                                >{{ department.name }}</option
                                            >
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>
                            <router-link
                                :to="{ name: 'PharmacistsCreate' }"
                                class="btn btn-primary mb-2"
                                >Create</router-link
                            >
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <caption>List of Registered Pharmacists</caption>
                        <thead>
                            <tr class="align-items-center">
                                <th scope="col">#Id</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">License #</th>
                                <th scope="col">License Verified</th>
                                <th scope="col">Manage</th>
                            </tr>
                        </thead>
                        <tbody class="align-items-center">
                            <tr
                                v-for="pharmacist in pharmacists"
                                :key="pharmacist.id"
                            >
                                <th scope="row">#{{ pharmacist.id }}</th>
                                <td>{{ pharmacist.first_name }}</td>
                                <td>{{ pharmacist.last_name }}</td>
                                <td>{{ pharmacist.license_number }}</td>
                                <td>{{ pharmacist.license_verified }}</td>
                                <td>
                                    <router-link
                                        :to="{
                                            name: 'PharmacistsEdit',
                                            params: { id: pharmacist.id }
                                        }"
                                        class="btn btn-success"
                                        >Edit</router-link
                                    >
                                    <button
                                        class="btn btn-danger"
                                        @click="deletePharmacist(pharmacist.id)"
                                    >
                                    <i class="bi bi-123"></i>
                                        Delete
                                    </button>


                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            employees: [],
            pharmacists: [],
            showMessage: false,
            message: "",
            search: null,
            selectedDeprtment: null,
            departments: []
        };
    },
    watch: {
        search() {
            this.getPharmacists();
        },
        selectedDeprtment() {
            this.getPharmacists();
        }
    },
    created() {
        this.getPharmacists();
        this.getDepartments();
    },
    methods: {
        getPharmacists() {
            axios
                .get("/api/pharmacists", {
                    params: {
                        search: this.search,
                        department_id: this.selectedDeprtment
                    }
                })
                .then(res => {
                    this.pharmacists = res.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getDepartments() {
            axios
                .get("/api/employees/departments")
                .then(res => {
                    this.departments = res.data;
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        deletePharmacists(id) {
            axios.delete("api/pharmacists/" + id).then(res => {
                this.showMessage = true;
                this.message = res.data;
                this.getPharmacists();
            });
        }
    }
};
</script>

<style></style>
