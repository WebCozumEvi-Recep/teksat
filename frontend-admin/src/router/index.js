import { createRouter, createWebHistory } from 'vue-router'
import DashboardPage from '../pages/DashboardPage.vue'
import DomainsPage from '../pages/DomainsPage.vue'
import ProductsPage from '../pages/ProductsPage.vue'
import OrdersPage from '../pages/OrdersPage.vue'
import CodPaymentsPage from '../pages/CodPaymentsPage.vue'
import FraudOrdersPage from '../pages/FraudOrdersPage.vue'

const routes = [
  { path: '/dashboard', component: DashboardPage },
  { path: '/domains', component: DomainsPage },
  { path: '/products', component: ProductsPage },
  { path: '/orders', component: OrdersPage },
  { path: '/logistics/cod-payments', component: CodPaymentsPage },
  { path: '/security/fraud', component: FraudOrdersPage }
]

export default createRouter({
  history: createWebHistory(),
  routes
})
