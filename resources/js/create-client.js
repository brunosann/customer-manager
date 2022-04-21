import { S, SS } from "./utils";

const radiosToggle = SS(
  '[name="info_cell"], [name="info_net"], [name="info_telephone"], [name="info_tv"]'
);

const handleChangedRadios = (e) => {
  const radio = e.target;
  const elementToClose = S(`.${radio.name.split("_")[1]}`);
  const isToOpen = !!Number(radio.value);

  if (isToOpen) elementToClose.classList.add("show");
  else elementToClose.classList.remove("show");
};

radiosToggle.forEach((radio) => {
  radio.addEventListener("change", handleChangedRadios);
});
