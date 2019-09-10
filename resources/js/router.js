import VueRouter from 'vue-router'

import Home from './pages/Home'
import Admin from './pages/Admin'
import Register from './pages/Register'
import Login from './pages/Login'
import Dashboard from './pages/user/Dashboard'
import AdminDashboard from './pages/admin/Dashboard'
import AdminUsuarios from './pages/admin/UsuariosWeb'
import NotFound from './pages/NotFound'

const routes = [
  { path: '*', component: NotFound },
  {
    path: '/',
    name: 'inicio',
    component: Home,
    meta: {
      auth: undefined
    }
  },
  {
    path: '/',
    name: 'admin',
    component: Admin,
    meta: {
      auth: undefined
    }
  },
  {
    path: '/registrar',
    name: 'registrar',
    component: Register,
    meta: {
      auth: false
    }
  },
  {
    path: '/ingresar',
    name: 'ingresar',
    component: Login,
    meta: {
      auth: false
    }
  },
  // USER ROUTES
  {
    path: '/dashboard',
    name: 'dashboard',
    component: Dashboard,
    meta: {
      auth: true
    }
  },
  {
    path: '/usuariosweb',
    name: 'usuariosweb',
    component: AdminUsuarios,
    meta: {
      auth: true
    }
  },
  // ADMIN ROUTES
  {
    path: '/admin',
    name: 'admin.dashboard',
    component: AdminDashboard,
    meta: {
      auth: {roles: 2, redirect: {name: 'login'}, forbiddenRedirect: '/403'}
    }
  },
]

const router = new VueRouter({
  history: true,
  mode: 'history',
  routes,
})

export default router
