<template>
  <div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              Create Pharmacy Record
              <router-link
                :to="{ name: 'PharmaciesIndex' }"
                class="float-right"
                >Back</router-link
              >
            </div>

            <div class="card-body">
              <form @submit.prevent="storePharmacy">
                <div class="form-group row">
                  <label
                    for="company_name"
                    class="col-md-4 col-form-label text-md-right"
                    >Company Name</label
                  >

                  <div class="col-md-6">
                    <input
                      id="company_name"
                      v-model="form.company_name"
                      type="text"
                      class="form-control"
                      required
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="registered_name"
                    class="col-md-4 col-form-label text-md-right"
                    >Registered Name</label
                  >

                  <div class="col-md-6">
                    <input
                      id="registered_name"
                      v-model="form.registered_name"
                      type="text"
                      class="form-control"
                      required
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="branch_code"
                    class="col-md-4 col-form-label text-md-right"
                    >Registered Branch Code</label
                  >

                  <div class="col-md-6">
                    <input
                      id="branch_code"
                      v-model="form.branch_code"
                      type="text"
                      class="form-control"
                      required
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="phone"
                    class="col-md-4 col-form-label text-md-right"
                    >Registered Phone Number</label
                  >

                  <div class="col-md-6">
                    <input
                      id="phone"
                      v-model="form.phone"
                      type="text"
                      class="form-control"
                      required
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="address"
                    class="col-md-4 col-form-label text-md-right"
                    >Address</label
                  >

                  <div class="col-md-6">
                    <input
                      id="address"
                      v-model="form.address"
                      type="text"
                      class="form-control"
                      required
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="country"
                    class="col-md-4 col-form-label text-md-right"
                    >Country</label
                  >

                  <div class="col-md-6">
                    <select
                      v-model="form.country_id"
                      @change="getStates()"
                      name="country"
                      class="form-control"
                      aria-label="Default select example"
                    >
                      <option
                        v-for="country in countries"
                        :key="country.id"
                        :value="country.id"
                      >
                        {{ country.name }}
                      </option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="province"
                    class="col-md-4 col-form-label text-md-right"
                    >Province</label
                  >

                  <div class="col-md-6">
                    <select
                      v-model="form.state_id"
                      @change="getCities()"
                      name="state"
                      class="form-control"
                      aria-label="Default select example"
                    >
                      <option
                        v-for="state in states"
                        :key="state.id"
                        :value="state.id"
                      >
                        {{ state.name }}
                      </option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="city"
                    class="col-md-4 col-form-label text-md-right"
                    >City</label
                  >

                  <div class="col-md-6">
                    <select
                      v-model="form.city_id"
                      name="city"
                      class="form-control"
                      aria-label="Default select example"
                    >
                      <option
                        v-for="city in cities"
                        :key="city.id"
                        :value="city.id"
                      >
                        {{ city.name }}
                      </option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="license_num"
                    class="col-md-4 col-form-label text-md-right"
                    >License Number</label
                  >

                  <div class="col-md-6">
                    <input
                      id="license_num"
                      v-model="form.license_num"
                      type="text"
                      class="form-control"
                      required
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="paypal_email"
                    class="col-md-4 col-form-label text-md-right"
                    >Paypal Email Account</label
                  >

                  <div class="col-md-6">
                    <input
                      id="paypal_email"
                      v-model="form.paypal_email"
                      type="text"
                      class="form-control"
                      required
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="blockchain_ver"
                    class="col-md-4 col-form-label text-md-right"
                    >Blockchain Verification</label
                  >

                  <div class="col-md-6">
                    <input
                      id="blockchain_ver"
                      v-model="form.blockchain_ver"
                      type="text"
                      class="form-control"
                      required
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label
                    for="contact_person"
                    class="col-md-4 col-form-label text-md-right"
                    >Contact Person/Pharmacist</label
                  >
                  <div class="col-md-6">
                    <select
                      v-model="form.pharmacist_id"
                      name="contact_person"
                      class="form-control"
                      aria-label="Select Pharmacists"
                    >
                      <option
                        v-for="pharmacist in pharmacists"
                        :key="pharmacist.id"
                        :value="pharmacist.id"
                      >
                        {{ pharmacist.first_name + ' , ' + pharmacist.last_name + ' - ' + pharmacist.license_number }}
                      </option>
                    </select>
                  </div>
                </div>

                <!-- <div class="form-group row">
                  <label
                    for="date_hired"
                    class="col-md-4 col-form-label text-md-right"
                    >Date Issued</label
                  >
                  <div class="col-md-6">
                    <datepicker
                      v-model="form.date_hired"
                      input-class="form-control"
                    ></datepicker>
                  </div>
                </div> -->
                <div class="form-group row mb-0 mt-4">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                      Create Request
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
    Datepicker,
  },
  data() {
    return {
      countries: [],
      states: [],
      departments: [],
      pharmacists: [],
      cities: [],
      form: {
        company_name: "",
        registered_name: "",
        branch_name: "",
        phone: "",
        address:"",
        country_id: "",
        state_id: "",
        department_id: "",
        pharmacist_id: "",
        city_id: "",
        license_num: "",
        paypal_email: "",
        blockchain_ver: "",
        contact_person: "",
      },
    };
  },
  created() {
    this.getCountries();
    this.getDepartments();
    this.getPharmacists();
  },
  methods: {
    getCountries() {
      axios
        .get("/api/employees/countries")
        .then((res) => {
          this.countries = res.data;
        })
        .catch((error) => {
          console.log(console.error);
        });
    },
    getStates() {
      axios
        .get("/api/employees/" + this.form.country_id + "/states")
        .then((res) => {
          this.states = res.data;
        })
        .catch((error) => {
          console.log(console.error);
        });
    },
    getCities() {
      axios
        .get("/api/employees/" + this.form.state_id + "/cities")
        .then((res) => {
          this.cities = res.data;
        })
        .catch((error) => {
          console.log(console.error);
        });
    },
    getPharmacists() {
      axios
        .get("/api/employees/pharmacists")
        .then((res) => {
          this.pharmacists = res.data;
        })
        .catch((error) => {
          console.log(console.error);
        });
    },
    getDepartments() {
      axios
        .get("/api/employees/departments")
        .then((res) => {
          this.departments = res.data;
        })
        .catch((error) => {
          console.log(console.error);
        });
    },
    storePharmacy() {
      axios
        .post("/api/pharmacies", {
          company_name: this.form.company_name,
          registered_name: this.form.registered_name,
          branch_code: this.form.branch_code,
          phone: this.form.phone,
          address: this.form.address,
          country_id: this.form.country_id,
          state_id: this.form.state_id,
          city_id: this.form.city_id,
          department_id: this.form.department_id,
          pharmacist_id: this.form.pharmacist_id,
          license_num: this.form.license_num,
          paypal_email: this.form.paypal_email,
          blockchain_ver: this.form.blockchain_ver,
          contact_person: this.form.contact_person
        //   birthdate: this.format_date(this.form.birthdate),
        //   date_hired: this.format_date(this.form.date_hired),
        })
        .then((res) => {
          this.$router.push({ name: "PharmaciesIndex" });
        });
    },
    format_date(value) {
      if (value) {
        return moment(String(value)).format("YYYYMMDD");
      }
    },
  },
};
</script>

<style>
</style>
