import { body } from "express-validator";
import { User } from "../models/User";

const storeUserRequest = [
  body("name").exists().withMessage("Campo obrigatório"),
  body("email")
    .exists()
    .withMessage("Campo obrigatório")
    .custom(async (value: string) => {
      const user = await User.findOne({ where: { email: value } });
      if (user) throw new Error("E-mail já cadastrado");
      return true;
    }),
  body("password")
    .exists()
    .withMessage("Campo obrigatório")
    .isLength({ min: 8 })
    .withMessage("mínimo de 8 caracteres"),
  body("confirmPassword").custom((value: string, { req }) => {
    const password: string = req.body.password;
    if (value !== password) throw new Error("Confirmação de senha errada");
    return true;
  }),
];

export default storeUserRequest;
