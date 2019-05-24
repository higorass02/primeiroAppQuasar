
const routes = [
  {
    name: 'login',
    path: '/login',
    component: () => import('src/pages/login.vue')
  },
  {
    name: 'home',
    path: '/home',
    component: () => import('layouts/MyLayout.vue'),
    children: [
      { path: '', component: () => import('pages/Index.vue') },
      { name: 'cadastrar-contato', path: '/cadastroContatos', component: () => import('pages/contato/post.vue') },
      { name: 'listar-contato', path: '/listarContatos', component: () => import('pages/contato/list.vue') },
      { name: 'cadastrar-servico', path: '/cadastroServicos', component: () => import('pages/servico/post.vue') },
      { name: 'listar-servico', path: '/listarServicos', component: () => import('pages/servico/list.vue') },
      { name: 'listar-agendamento', path: '/listarAgendamento', component: () => import('pages/agendamento/list.vue') }
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
