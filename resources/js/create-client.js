import { S, SS, maskCPF, maskCNPJ, maskCEP } from "./utils";

// toggle show or hide plans radios
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
// toggle show or hide plans radios

// change person type
let typePerson = "FISICA";
const inputsTypePerson = SS('[name="type"]');
const inputDoc = S("#doc");
const labelDoc = S('label[for="doc"]');

const handleDocPersonMask = (e) => {
  if (typePerson === "FISICA") e.target.value = maskCPF(e.target.value);
  if (typePerson === "JURIDICA") e.target.value = maskCNPJ(e.target.value);
};

inputDoc.addEventListener("input", handleDocPersonMask);

const handleToggleTypePerson = (e) => {
  const inputPersonValue = e.target.value;
  inputDoc.value = "";
  if (inputPersonValue === "FISICA") {
    labelDoc.innerText = "Cpf";
    inputDoc.setAttribute("placeholder", "Cpf");
    typePerson = "FISICA";
  }
  if (inputPersonValue === "JURIDICA") {
    labelDoc.innerText = "Cnpj";
    inputDoc.setAttribute("placeholder", "Cnpj");
    typePerson = "JURIDICA";
  }
};

inputsTypePerson.forEach((input) =>
  input.addEventListener("change", handleToggleTypePerson)
);
// change person type

// get address by zip code
const zipCode = S("#zip_code");

const handleGetAddress = async (e) => {
  try {
    const zipCodeValue = e.target.value;
    const response = await fetch(
      `https://viacep.com.br/ws/${zipCodeValue}/json/`
    );
    const responseJson = await response.json();
    if (responseJson.erro) throw "Não encontrado";
    S("#city").value = responseJson.localidade;
    S("#state").value = responseJson.uf;
    S("#street").value = responseJson.logradouro;
    S("#district").value = responseJson.bairro;
    S("#complement").value = responseJson.complemento;
  } catch (error) {
  } finally {
    S("#number").focus();
  }
};

const handleZipCodeMaks = (e) => {
  e.target.value = maskCEP(e.target.value);
};

zipCode.addEventListener("input", handleZipCodeMaks);
zipCode.addEventListener("blur", handleGetAddress);
// get address by zip code
