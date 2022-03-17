import { Request, Response } from "express";
import bcrypt from "bcrypt";
import { User } from "../models/User";

export const store = async (req: Request, res: Response) => {
  const { name, email, password } = req.body;
  const encryptedPassword = await bcrypt.hash(password, 12);
  const user = await User.create({ name, email, password: encryptedPassword });
  res.status(201).json(user);
};

export const update = async (req: Request, res: Response) => {
  const { id } = req.params;
  let { name, email, password } = req.body;
  password = password ? await bcrypt.hash(password, 12) : undefined;
  const user = await User.findByPk(id);
  if (!user) return res.status(404).json({});
  await user.update({ name, email, password });
  return res.json({});
};
