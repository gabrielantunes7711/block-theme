// window.addEventListener("load", function () {
//   const editPageChoice = confirm("Gostaria de Editar o Site?");

//   function generatePrintButton() {
//     const printButton = document.createElement("button");
//     printButton.id = "printButton";
//     printButton.classList.add("btn--primary");
//     printButton.textContent = "Download";
//     printButton.style =
//       "position: fixed; bottom: 20px; right: 20px; z-index: 100";
//     const body = document.body;
//     const firstChild = body.firstChild;

//     body.insertBefore(printButton, firstChild);
//     printButton.addEventListener("click", () => {
//       const opt = {
//         filename: "george-cunha-site.pdf",
//         image: { type: "jpeg", quality: 0.98 },
//         html2canvas: { scale: 2 },
//         jsPDF: { unit: "in", format: "a3", orientation: "landscape" },
//         pagebreak: {
//           after: "section",
//         },
//       };
//       html2pdf().set(opt).from(body).save();
//     });
//   }

//   function editPage() {
//     const editableElements = document.querySelectorAll(
//       "span, p, h1, h2, h3, h4, h5, h6, button, a, strong"
//     );

//     for (const linkSeo of allLinkSeo) {
//       linkSeo.removeEventListener("click", linkSeoHandler);
//       linkSeo.addEventListener("click", () => {
//         alert("O conteúdo deste elemento é inserido dinâmicamente");
//       });
//     }

//     for (const element of editableElements) {
//       element.addEventListener("click", (evt) => {
//         evt.preventDefault();
//       });

//       element.setAttribute("contenteditable", true);
//     }
//   }

//   if (editPageChoice == true) {
//     generatePrintButton();
//     editPage();
//   }
// });
