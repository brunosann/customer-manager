import { body } from "express-validator";
import { User } from "../models/User";

const updateUserRequest = [
  body("name").optional().trim().escape(),
  body("email")
    .optional()
    .trim()
    .custom(async (value: string) => {
      const user = await User.findOne({ where: { email: value } });
      if (user) throw new Error("E-mail já cadastrado");
      return true;
    }),
  body("password").optional().isLength({ min: 8 }).withMessage("mínimo de 8 caracteres"),
];

export default updateUserRequest;
