import { body } from "express-validator";

const loginAuthRequest = [
  body("email").exists().withMessage("Campo obrigatório"),
  body("password").exists().withMessage("Campo obrigatório"),
];

export default loginAuthRequest;
