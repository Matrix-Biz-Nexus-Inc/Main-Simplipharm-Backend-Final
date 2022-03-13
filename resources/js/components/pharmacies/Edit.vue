<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Update Pharmacist Record
                            <router-link
                                :to="{ name: 'PharmaciesIndex' }"
                                class="float-right"
                                >Back</router-link
                            >
                        </div>

                        <div class="card-body">
                            <form @submit.prevent="updatePharmacie">
                                <div class="form-group row">
                                    <label
                                        for="first_name"
                                        class="col-md-4 col-form-label text-md-right"
                                        >First Name</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="first_name"
                                            v-model="form.first_name"
                                            type="text"
                                            class="form-control "
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="middle_name"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Middle Name</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="middle_name"
                                            v-model="form.middle_name"
                                            type="text"
                                            class="form-control "
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="last_name"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Last Name</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="last_name"
                                            v-model="form.last_name"
                                            type="text"
                                            class="form-control "
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="school"
                                        class="col-md-4 col-form-label text-md-right"
                                        >School</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="school"
                                            v-model="form.school"
                                            type="text"
                                            class="form-control "
                                            required
                                        />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        for="license_number"
                                        class="col-md-4 col-form-label text-md-right"
                                        >License Number</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="license_number"
                                            v-model="form.license_number"
                                            type="text"
                                            class="form-control "
                                            required
                                        />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        for="license_image"
                                        class="col-md-4 col-form-label text-md-right"
                                        >License Image</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="license_image"
                                            v-model="form.license_image"
                                            type="text"
                                            class="form-control "
                                            required
                                        />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        for="department"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Department</label
                                    >

                                    <div class="col-md-6">
                                        <select
                                            v-model="form.department_id"
                                            name="department"
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

                                <div class="form-group row">
                                    <label
                                        for="date_hired"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Date Hired</label
                                    >
                                    <div class="col-md-6">
                                        <datepicker
                                            v-model="form.date_hired"
                                            input-class="form-control"
                                        ></datepicker>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        for="license_verified"
                                        class="col-md-4 col-form-label text-md-right"
                                        >License Verified</label
                                    >
                                    <div class="col-md-6">
                                        <select
                                            v-model="form.license_verified"
                                            name="license_verified"
                                            class="form-control"
                                            aria-label="Open this select menu"
                                        >
                                            <option selected>Open this select menu</option>
                                            <option value="1">Verified</option>
                                            <option value="2">Pending</option>
                                            <option value="3">Rejected</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-0 mt-4">
                                    <div class="col-md-6 offset-md-4">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            Update Record
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import moment from "moment";
export default {
    components: {
        Datepicker
    },
    data() {
        return {
            countries: [],
            states: [],
            departments: [],
            cities: [],
            form: {
                first_name: "",
                last_name: "",
                middle_name: "",
                school: "",
                license_number: "",
                license_image: "",
                department_id: "",
                license_verified: "",
                department: "",
                date_hired: null
            }
        };
    },
    created() {
        this.getCountries();
        this.getDepartments();
        this.getPharmacists();
    },
    methods: {
        getPharmacist() {
            axios
                .get("/api/pharmacists/" + this.$route.params.id)
                .then(res => {
                    this.form = res.data.data;
                    this.getStates();
                    this.getCities();
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        getCountries() {
            axios
                .get("/api/employees/countries")
                .then(res => {
                    this.countries = res.data;
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        getStates() {
            axios
                .get("/api/employees/" + this.form.country_id + "/states")
                .then(res => {
                    this.states = res.data;
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        getCities() {
            axios
                .get("/api/employees/" + this.form.state_id + "/cities")
                .then(res => {
                    this.cities = res.data;
                })
                .catch(error => {
                    console.log(console.error);
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
        updatePharmacist() {
            axios
                .put("/api/pharmacists/" + this.$route.params.id, {
                    first_name: this.form.first_name,
                    middle_name: this.form.middle_name,
                    last_name: this.form.last_name,
                    school: this.form.school,
                    license_number: this.form.license_number,
                    license_image: this.form.license_image,
                    license_verified: this.form.license_verified,
                    department_id: this.form.department_id,
                    department: this.form.department,
                    date_hired: this.format_date(this.form.date_hired)
                })
                .then(res => {
                    this.$router.push({ name: "PharmacistsIndex" });
                });
        },
        format_date(value) {
            if (value) {
                return moment(String(value)).format("YYYYMMDD");
            }
        }
    }
};
</script>

<style></style>
