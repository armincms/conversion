Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'media-library',
      path: '/media-library',
      component: require('./components/Tool'),
    },
  ])
})
