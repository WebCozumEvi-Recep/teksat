import { createRouter, createWebHistory } from 'vue-router'
import DashboardView from '../views/modules/DashboardView.vue'
import DomainsView from '../views/modules/DomainsView.vue'
import ProductsView from '../views/modules/ProductsView.vue'
import OrdersView from '../views/modules/OrdersView.vue'
import LogisticsView from '../views/modules/LogisticsView.vue'
import ReportsView from '../views/modules/ReportsView.vue'
import FraudView from '../views/modules/FraudView.vue'
import SettingsView from '../views/modules/SettingsView.vue'

export default createRouter({
  history: createWebHistory(),
  routes: [
    { path: '/', component: DashboardView },
    { path: '/domains', component: DomainsView },
    { path: '/products', component: ProductsView },
    { path: '/orders', component: OrdersView },
    { path: '/logistics', component: LogisticsView },
    { path: '/reports', component: ReportsView },
    { path: '/fraud', component: FraudView },
    { path: '/settings', component: SettingsView }
  ]
})
