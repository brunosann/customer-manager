import { Request, Response } from "express";
import { User } from "../models/User";

export const store = async (req: Request, res: Response) => {
  const { name, email, password } = req.body;
  const user = await User.create({ name, email, password });
  res.status(201).json(user);
};

export const update = async (req: Request, res: Response) => {
  const { id } = req.params;
  const { name, email, password } = req.body;
  const user = await User.findByPk(id);
  if (!user) return res.status(404).json({});
  await user.update({ name, email, password });
  return res.json({});
};
