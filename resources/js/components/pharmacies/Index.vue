<template>
    <div class="container-fluid">
    
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Registered Pharmacies</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the</p>
    
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Registered Pharmacies</h6>
                <div v-if="showMessage">
                    <div class="alert alert-success">{{ message }}</div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="dataTable_length">
                                    <form>
                                        <div class="form-row align-items-center">
                                            <div class="col">
                                                <input type="search" v-model.lazy="search" class="form-control mb-2" placeholder="Jane Doe" />
                                            </div>
                                            <div class="col">
<!--                                                 <button type="submit" class="btn btn-primary mb-2">
                                                                                Search
                                                                            </button>-->
                                            </div>
                                            <div class="col">
                                            </div>
    
                                            <div class="col">
                                                <router-link :to="{ name: 'PharmaciesCreate' }" class="btn btn-primary mb-2">Add New Pharmacy</router-link>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" style="width: 262px;">ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: auto;">Pharmacy Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: auto;">License</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: auto;">Phone</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: auto;">Area</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: auto;">Manage</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">ID</th>
                                            <th rowspan="1" colspan="1">Pharmacy Name</th>
                                            <th rowspan="1" colspan="1">License</th>
                                            <th rowspan="1" colspan="1">Phone</th>
                                            <th rowspan="1" colspan="1">Area</th>
                                            <th rowspan="1" colspan="1">Manage</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr class="even"
                                            v-for="pharmacy  in pharmacies"
                                            :key="pharmacy.id"
                                        >
                                            <td class="sorting_1">#{{ pharmacy.id }}</td>
                                            <td>{{ pharmacy.registered_name }}</td>
                                            <td>{{ pharmacy.license_num }}</td>
                                            <td>{{ pharmacy.phone }}</td>
                                            <td>{{ pharmacy.area_covered }}</td>
                                            <td>
                                                <router-link :to="{
                                                    name: 'PharmaciesEdit',
                                                    params: { id: pharmacy.id }
                                                }" class="btn btn-success">Edit</router-link>
                                                <button class="btn btn-danger" @click="deletePharmacy(pharmacy.id)">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                        <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                        <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                                    </ul>
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
            pharmacies: [],
            showMessage: false,
            message: "",
            search: null,
            selectedDeprtment: null,
            departments: []
        };
    },
    watch: {
        search() {
            this.getPharmacies();
        },
        selectedDeprtment() {
            this.getPharmacies();
        }
    },
    created() {
        this.getPharmacies();
        this.getDepartments();
    },
    methods: {
        getPharmacies() {
            axios
                .get("/api/pharmacies", {
                    params: {
                        search: this.search,
                        department_id: this.selectedDeprtment
                    }
                })
                .then(res => {
                    this.pharmacies = res.data.data;
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
        deletePharmacies(id) {
            axios.delete("api/pharmacies/" + id).then(res => {
                this.showMessage = true;
                this.message = res.data;
                this.getPharmacies();
            });
        }
    }
};
</script>

<style>

</style>
