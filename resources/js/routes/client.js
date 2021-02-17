export default [
    {
        path:'/client',
        redirect:'/client/dashboard'
    },

    {
        path: '/client/dashboard',
        component: Dashboard,
        name: 'Dashboard',
    },
    {
        path: '/admin/patients',
        component: Patients,
        name: 'Patients',
    },

    {
        path: '/admin/gender',
        component: Gender,
        name: 'Gender',
    },
    {
        path: '/admin/services',
        component: Services,
        name: 'Services',
    },

]
