import Dashboard from '../components/client/dashboardComponent';
import EmailComponent from '../components/client/emailComponent';

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
        path: '/client/emails',
        component: EmailComponent,
        name: 'EmailComponent',
    },


]
