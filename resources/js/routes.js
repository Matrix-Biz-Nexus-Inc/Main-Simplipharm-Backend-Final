import EmployeesIndex from "./components/employees/Index";
import EmployeesCreate from "./components/employees/Create";
import EmployeesEdit from "./components/employees/Edit";
//pharmacist routes
import PharmacistsIndex from "./components/pharmacists/Index";
import PharmacistsCreate from "./components/pharmacists/Create";
import PharmacistsEdit from "./components/pharmacists/Edit";

//pharmacies routes
import PharmaciesIndex from "./components/pharmacies/Index";
import PharmaciesCreate from "./components/pharmacies/Create";
import PharmaciesEdit from "./components/pharmacies/Edit";


export const routes = [
    { //prescriptions aka employees routes - cyber protection
        path: "/employees",
        name: "EmployeesIndex",
        component: EmployeesIndex
    },
    {
        path: "/employees/create",
        name: "EmployeesCreate",
        component: EmployeesCreate
    },
    {
        path: "/employees/:id",
        name: "EmployeesEdit",
        component: EmployeesEdit
    },
        { //pharmacists routes start
            path: "/pharmacists",
            name: "PharmacistsIndex",
            component: PharmacistsIndex
        },
    {
        path: "/pharmacists/create",
        name: "PharmacistsCreate",
        component: PharmacistsCreate
    },
    {
        path: "/pharmacists/:id",
        name: "PharmacistsEdit",
        component: PharmacistsEdit
    },
    { //pharmacies routes start
            path: "/pharmacies",
            name: "PharmaciesIndex",
            component: PharmaciesIndex
        },
    {
        path: "/pharmacies/create",
        name: "PharmaciesCreate",
        component: PharmaciesCreate
    },
    {
        path: "/pharmacies/:id",
        name: "PharmaciesEdit",
        component: PharmaciesEdit
    }
];
