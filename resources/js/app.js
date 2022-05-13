import { SS, S } from "./utils";

const matchMedia = window.matchMedia("(max-width: 700px)");

// show month select field
const inputMonth = S("#filter-month");
const radiosDate = SS('[name="date"]');

const handleShowMonth = (e) => {
  const target = e.target;
  if (target.value === "month") {
    inputMonth.parentElement.classList.add("box-filters", "show");
  } else {
    inputMonth.parentElement.classList.remove("box-filters", "show");
  }
};

radiosDate.forEach((radio) => radio.addEventListener("click", handleShowMonth));
// show month select field

// checking if you are required to fill in the month
const formFilters = S("#form-filters");

const handleSubmitFilters = (e) => {
  e.preventDefault();
  const target = e.target;
  const isFieldMonthOpen = inputMonth.parentElement.classList.contains("show");
  if (isFieldMonthOpen && !inputMonth.value) return alert("Selecione o mês");
  target.submit();
};

formFilters.addEventListener("submit", handleSubmitFilters);
// checking if you are required to fill in the month

// open and close customer search on mobile
const formSearchClient = S("#form-search");
const boxSearch = S(".box-search");

const handleSearchClient = (e) => {
  if (matchMedia.matches) e.preventDefault();
  const target = e.target;
  const isBoxSearchOpen = boxSearch.classList.contains("active");
  if (!isBoxSearchOpen) return boxSearch.classList.add("active");
  if (isBoxSearchOpen && !target.client.value)
    return boxSearch.classList.remove("active");
  target.submit();
};

formSearchClient.addEventListener("submit", handleSearchClient);
// open and close customer search on mobile

//
const btnArrow = S(".btn-arrow");
const boxFiltersArrow = S(".bg-gray-filters");

btnArrow.addEventListener("click", (e) => {
  const target = e.currentTarget;
  target.classList.toggle("open");
  boxFiltersArrow.classList.toggle("open");
});
