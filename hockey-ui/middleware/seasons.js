export default defineNuxtRouteMiddleware((to, from) => {
  console.log(to);
  console.log(from);
  return navigateTo(to.fullPath.split('/seasons')[0])
})