export default defineNuxtRouteMiddleware((to, from) => {
  return navigateTo(to.fullPath.split('/seasons')[0])
})