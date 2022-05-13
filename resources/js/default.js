import { S } from "./utils";

const btnMenuMobile = S("button.menu");
const sidebar = S(".sidebar");
const container = S(".container");

const handleToggleSidebar = () => {
  sidebar.classList.toggle("active");
  container.classList.toggle("overflow-hidden");
};

btnMenuMobile.addEventListener("click", handleToggleSidebar);
