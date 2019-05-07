
const routes = [
  {
    path: '/',
    component: () => import('layouts/MyLayout.vue'),
    children: [
      { path: '', component: () => import('pages/Index.vue') },
      { path: '/cadastroContatos', component: () => import('pages/Home.vue') },
      { path: '/listarAtivosContatos', component: () => import('pages/ListarAtivos.vue') },
      { path: '/calendario', component: () => import('pages/calendario.vue') }
    ]
  }
]

// Always leave this as last one
if (process.env.MODE !== 'ssr') {
  routes.push({
    path: '*',
    component: () => import('pages/Error404.vue')
  })
}

export default routes
