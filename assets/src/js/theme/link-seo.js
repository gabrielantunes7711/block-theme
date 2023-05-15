function linkSeoHandler() {
  let link = $(this).find("a").attr("href");
  window.location.href = link;
}
const allLinkSeo = document.querySelectorAll(".link-seo");

for (const linkSeo of allLinkSeo) {
  linkSeo.addEventListener("click", linkSeoHandler);
}
