import { Request, Response } from "express";
import bcrypt from "bcrypt";
import JWT from "jsonwebtoken";
import dotenv from "dotenv";
import { nanoid } from "nanoid";
import { User } from "../models/User";
import { PasswordReset } from "../models/PasswordReset";
import { emailForgotPassword } from "../services/sendEmail";

dotenv.config();

export const login = async (req: Request, res: Response) => {
  const { email, password } = req.body;
  const user = await User.findOne({ where: { email } });
  const verifPassword = user ? await bcrypt.compare(password, user.password) : false;

  if (!user || !verifPassword)
    return res.status(401).json({
      error: "O e-mail e/ou senha digitados são incorretos",
    });

  const token = JWT.sign(
    { id: user.id, email: user.email },
    process.env.JWT_KEY as string,
    {
      expiresIn: "48h",
    }
  );

  const userData = { name: user.name, email: user.email, isAdmin: user.isAdmin };

  res.json({ user: userData, token });
};

export const forgotPassword = async (req: Request, res: Response) => {
  const { email } = req.body;
  const user = await User.findOne({ where: { email } });

  if (!user)
    return res.status(404).json({ error: "Desculpe, mas não encontramos sua conta" });

  const code = nanoid(8);
  const expireIn = new Date();
  expireIn.setHours(expireIn.getHours() + 1);

  await PasswordReset.create({ email, code, expireIn });
  await emailForgotPassword(code, email);

  res.json({});
};
