import { body } from "express-validator";

const forgotPasswordAuthRequest = [
  body("email").exists().withMessage("Campo obrigatório"),
];

export default forgotPasswordAuthRequest;
