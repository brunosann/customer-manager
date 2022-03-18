import { Request, Response } from "express";
import bcrypt from "bcrypt";
import JWT from "jsonwebtoken";
import dotenv from "dotenv";
import { User } from "../models/User";

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
