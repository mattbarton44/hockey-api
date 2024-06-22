export default defineNuxtRouteMiddleware((to, from) => {
  return navigateTo(to.fullPath.split('/games')[0])
})