import { SS, S } from "./utils";

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
